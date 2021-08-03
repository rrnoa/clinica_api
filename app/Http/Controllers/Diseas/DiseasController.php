<?php

namespace App\Http\Controllers\Diseas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Diseas;

class DiseasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Diseas::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|max:25|unique:diseas',
            'description' => 'required|max:255'
        ]);
        return Diseas::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $code
     * @return \Illuminate\Http\Response
     */
    public function show($code)
    {
        return Diseas::find($code);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $code
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $code)
    {
        $diseas = Diseas::find($code);
        $diseas->update($request->all());
        return $diseas;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $code
     * @return \Illuminate\Http\Response
     */
    public function destroy($code)
    {
        return Diseas::destroy($code);
    }

    /**
     * Search the specified resource from storage.
     *
     * @param  string  $code
     * @return \Illuminate\Http\Response
     */
    public function search($desc)
    {
        return Diseas::where('description', 'like', '%'.$desc.'%')->get();
    }
}
