<?php

namespace App\Http\Controllers;

use App\Familia;
use App\Ordo;
use Illuminate\Http\Request;

class FamiliaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("familias.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("familias.create");
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
            'name' => 'required|unique:familias',
            'ordo' => 'required|integer'
        ]);

        $ordo = Ordo::find($validatedData['ordo']);
        $ordo->familias()->create($validatedData);

        return redirect()->route('familias.index')->with('status', 'Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Familia  $familia
     * @return \Illuminate\Http\Response
     */
    public function show(Familia $familia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Familia  $familia
     * @return \Illuminate\Http\Response
     */
    public function edit(Familia $familia)
    {
        return view("familias.edit")->with(['familia' => $familia]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Familia  $familia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Familia $familia)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'ordo' => 'required|integer'
        ]);

        $familia->ordo_id = $validatedData['ordo'];
        $familia->name = $validatedData['name'];
        $familia->save();

        return redirect()->route('familias.index')->with('status', 'Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Familia  $familia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Familia $familia)
    {
        $familia->delete();

        return redirect()->route('familias.index')->with('status', 'Deleted!');
    }
}
