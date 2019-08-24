<?php

namespace App\Http\Controllers;

use App\Classis;
use App\Divisio;
use Illuminate\Http\Request;

class ClassisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("classes.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("classes.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:classes',
            'divisio' => 'required|integer'
        ]);

        $divisio = Divisio::find($validatedData['divisio']);
        $divisio->classes()->create($validatedData);

        return redirect()->route('classes.index')->with('status', 'Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Classis  $classis
     * @return \Illuminate\Http\Response
     */
    public function show(Classis $classis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Classis  $classis
     * @return \Illuminate\Http\Response
     */
    public function edit(Classis $classis)
    {
        return view("classes.edit")->with(['classis' => $classis]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Classis  $classis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classis $classis)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'divisio' => 'required|integer'
        ]);

        $classis->divisio_id = $validatedData['divisio'];
        $classis->name = $validatedData['name'];
        $classis->save();

        return redirect()->route('classes.index')->with('status', 'Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Classis  $classis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classis $classis)
    {
        $classis->delete();

        return redirect()->route('classes.index')->with('status', 'Deleted!');
    }
}
