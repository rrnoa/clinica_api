<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Doctor::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'bi' => 'required|unique:doctors',
            'name' => 'required',
            'telf' => 'required',
            'sex' => 'required',
            'id_specialty' => 'required|exists:specialties,id'
        ];
        $request->validate($rules);
        $data = $request->all();
        return Doctor::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        return $doctor;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {        
        /*$photoStoreName = null; 
        if($request->hasFile('photo')){
            Storage::delete($doctor->photo);
            $photoStoreName = $request->photo->store('');
        }
        $doctor->fill($request->all());
        $doctor->photo = $photoStoreName;
        $doctor->save();*/
        return $doctor->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        return $doctor->delete();
    }
}
