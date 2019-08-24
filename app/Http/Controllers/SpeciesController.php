<?php

namespace App\Http\Controllers;

use App\Genus;
use App\Species;
use Illuminate\Http\Request;

class SpeciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("species.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("species.create");
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
            'name_fr' => 'required',
            'name_en' => 'required',
            'genus' => 'required|integer'
        ]);

        $genus = Genus::find($validatedData['genus']);
        $genus->species()->create($validatedData);

        return redirect()->route('species.index')->with('status', 'Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Species  $species
     * @return \Illuminate\Http\Response
     */
    public function show(Species $species)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Species  $species
     * @return \Illuminate\Http\Response
     */
    public function edit(Species $species)
    {
        return view("species.edit")->with(['species' => $species]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Species  $species
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Species $species)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:regnums',
            'name_fr' => 'required',
            'name_en' => 'required',
            'genus' => 'required|integer'
        ]);

        $species->genus_id = $validatedData['genus'];
        $species->name = $validatedData['name'];
        $species->name_fr = $validatedData['name_fr'];
        $species->name_en = $validatedData['name_en'];
        $species->save();

        return redirect()->route('species.index')->with('status', 'Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Species  $species
     * @return \Illuminate\Http\Response
     */
    public function destroy(Species $species)
    {
        $species->delete();

        return redirect()->route('species.index')->with('status', 'Deleted!');
    }
}
