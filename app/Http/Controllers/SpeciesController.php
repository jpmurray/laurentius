<?php

namespace App\Http\Controllers;

use App\Genus;
use App\Http\Requests\StoreSpecies;
use App\Http\Requests\UpdateSpecies;
use App\Species;
use Illuminate\Http\Request;

class SpeciesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }
    
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
    public function store(StoreSpecies $request)
    {
        $validatedData = $request->validated();

        $validatedData['interesting_cultivar'] = !isset($validatedData['interesting_cultivar']) ? null : explode(',', $validatedData['interesting_cultivar']);

        $genus = Genus::find($validatedData['genus']);
        $species = $genus->species()->create($validatedData);
        $species->suppliers()->sync($validatedData['suppliers']);

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
        return view('species.show')->with(['species' => $species]);
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
    public function update(UpdateSpecies $request, Species $species)
    {

        $validatedData = $request->validated();
        
        $validatedData['sun'] = !isset($validatedData['sun']) ? null : $validatedData['sun'];
        $validatedData['soil'] = !isset($validatedData['soil']) ? null : $validatedData['soil'];
        $validatedData['water'] = !isset($validatedData['water']) ? "unknown" : $validatedData['water'];
        $validatedData['shape'] = !isset($validatedData['shape']) ? null : $validatedData['shape'];
        $validatedData['root'] = !isset($validatedData['root']) ? null : $validatedData['root'];
        $validatedData['wildlife_use'] = !isset($validatedData['wildlife_use']) ? null : $validatedData['wildlife_use'];
        $validatedData['ecological_use'] = !isset($validatedData['ecological_use']) ? null : $validatedData['ecological_use'];
        $validatedData['pollinating_type'] = !isset($validatedData['pollinating_type']) ? null : $validatedData['pollinating_type'];
        $validatedData['comestible_use'] = !isset($validatedData['comestible_use']) ? null : $validatedData['comestible_use'];
        $validatedData['interesting_cultivar'] = !isset($validatedData['interesting_cultivar']) ? null : explode(',', $validatedData['interesting_cultivar']);
        $validatedData['suppliers'] = !isset($validatedData['suppliers']) ? [] : $validatedData['suppliers'];
        
        $species->update($validatedData);
        $species->suppliers()->sync($validatedData['suppliers']);

        return redirect()->route('species.edit', $species)->with('status', 'Updated!');
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
