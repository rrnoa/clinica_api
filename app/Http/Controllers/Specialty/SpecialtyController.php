<?php

namespace App\Http\Controllers\Specialty;

use App\Http\Controllers\Controller;
use App\Http\Library\ApiHelpers;
use App\Models\Specialty;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    use ApiHelpers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Specialty::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$user = $request->user();
        if(!$this->isAdmin($user)){
            return response('unauthorized', 403);
        }*/             
        $request->validate([
            'name' => 'required|max:255|unique:specialties'
        ]);
        return Specialty::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Specialty::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $specialty = Specialty::find($id);
        $specialty->update($request->all());
        return $specialty;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Specialty::destroy($id);
    }

    /**
     * Search the specified resource from storage.
     *
     * @param  int  $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        return Specialty::where('name', 'like', '%'.$name.'%')->get();
    }
}
