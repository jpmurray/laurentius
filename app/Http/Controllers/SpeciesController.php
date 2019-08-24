<?php

namespace App\Http\Controllers;

use App\Genus;
use App\Rules\HardinessCa;
use App\Rules\Root;
use App\Rules\Shape;
use App\Rules\Soil;
use App\Rules\Sun;
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
            'name' => 'required|unique:species',
            'name_fr' => 'required',
            'name_en' => 'required',
            'genus' => 'required|integer',
            'hardiness_ca' => ['nullable', new HardinessCa],
            'sun' => ['nullable', new Sun],
            'soil' => ['nullable', new Soil],
            'water' => 'digits_between:1,5|nullable',
            'ph_min' => 'numeric|nullable',
            'ph_max' => 'numeric|nullable',
            'shape' => ['nullable', new Shape],
            'root' => ['nullable', new Root],
            'maturity_width_meters' => 'numeric|nullable',
            'maturity_height_meters' => 'numeric|nullable',
        ]);

        if ($validatedData['hardiness_ca'] == "null") {
            unset($validatedData['hardiness_ca']);
        }

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
            'name' => 'required',
            'name_fr' => 'required',
            'name_en' => 'required',
            'genus' => 'required|integer',
            'hardiness_ca' => ['nullable', new HardinessCa],
            'sun' => ['nullable', new Sun],
            'soil' => ['nullable', new Soil],
            'water' => 'digits_between:1,5|nullable',
            'ph_min' => 'numeric|nullable',
            'ph_max' => 'numeric|nullable',
            'shape' => ['nullable', new Shape],
            'root' => ['nullable', new Root],
            'maturity_width_meters' => 'numeric|nullable',
            'maturity_height_meters' => 'numeric|nullable',
        ]);

        $validatedData['sun'] = !isset($validatedData['sun']) ? null : $validatedData['sun'];
        $validatedData['soil'] = !isset($validatedData['soil']) ? null : $validatedData['soil'];
        $validatedData['water'] = !isset($validatedData['water']) ? null : $validatedData['water'];
        $validatedData['shape'] = !isset($validatedData['shape']) ? null : $validatedData['shape'];
        $validatedData['root'] = !isset($validatedData['root']) ? null : $validatedData['root'];

        $species->update($validatedData);

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
