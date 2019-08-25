<?php

namespace App\Http\Controllers;

use App\Genus;
use App\Rules\ComestibleUse;
use App\Rules\Disadvantages;
use App\Rules\EcologicalUse;
use App\Rules\FloweringColor;
use App\Rules\FloweringPeriod;
use App\Rules\FoliageColor;
use App\Rules\Growth;
use App\Rules\HardinessCa;
use App\Rules\Multiplication;
use App\Rules\PollinatingType;
use App\Rules\PostSummerAppeal;
use App\Rules\PruningPeriod;
use App\Rules\Root;
use App\Rules\Shape;
use App\Rules\Soil;
use App\Rules\Sun;
use App\Rules\WildlifeUse;
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
            'water' => 'nullable',
            'ph_min' => 'numeric|nullable',
            'ph_max' => 'numeric|nullable',
            'shape' => ['nullable', new Shape],
            'root' => ['nullable', new Root],
            'maturity_width_meters' => 'numeric|nullable',
            'maturity_height_meters' => 'numeric|nullable',
            'nitrogen_fixer' => 'nullable|boolean',
            'nutrient_accumulator' => 'nullable|boolean',
            'hedge' => 'nullable|boolean',
            'ground_cover' => 'nullable|boolean',
            'wildlife_use' => ['nullable', new WildlifeUse],
            'ecological_use' => ['nullable', new EcologicalUse],
            'pollinating_type' => ['nullable', new PollinatingType],
            'medicinal_use' => 'nullable|boolean',
            'comestible_use' => ['nullable', new ComestibleUse],
            'flowering_period' => ['nullable', new FloweringPeriod],
            'flowering_color' => ['nullable', new FloweringColor],
            'foliage_color' => ['nullable', new FoliageColor],
            'post_summer_appeal' => ['nullable', new PostSummerAppeal],
            'growth' => ['nullable', new Growth],
            'pruning_period' => ['nullable', new PruningPeriod],
            'multiplication' => ['nullable', new Multiplication],
            'disadvantages' => ['nullable', new Disadvantages],
            'interesting_cultivar' => 'nullable',
            'maintainers_note' => 'nullable',
        ]);

        $validatedData['interesting_cultivar'] = !isset($validatedData['interesting_cultivar']) ? null : explode(',', $validatedData['interesting_cultivar']);

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
            'water' => 'nullable',
            'ph_min' => 'numeric|nullable',
            'ph_max' => 'numeric|nullable',
            'shape' => ['nullable', new Shape],
            'root' => ['nullable', new Root],
            'maturity_width_meters' => 'numeric|nullable',
            'maturity_height_meters' => 'numeric|nullable',
            'nitrogen_fixer' => 'nullable|boolean',
            'nutrient_accumulator' => 'nullable|boolean',
            'hedge' => 'nullable|boolean',
            'ground_cover' => 'nullable|boolean',
            'wildlife_use' => ['nullable', new WildlifeUse],
            'ecological_use' => ['nullable', new EcologicalUse],
            'pollinating_type' => ['nullable', new PollinatingType],
            'medicinal_use' => 'nullable|boolean',
            'comestible_use' => ['nullable', new ComestibleUse],
            'interesting_cultivar' => 'nullable',
            'maintainers_note' => 'nullable',
        ]);

        $validatedData['sun'] = !isset($validatedData['sun']) ? null : $validatedData['sun'];
        $validatedData['soil'] = !isset($validatedData['soil']) ? null : $validatedData['soil'];
        $validatedData['water'] = !isset($validatedData['water']) ? null : $validatedData['water'];
        $validatedData['shape'] = !isset($validatedData['shape']) ? null : $validatedData['shape'];
        $validatedData['root'] = !isset($validatedData['root']) ? null : $validatedData['root'];
        $validatedData['wildlife_use'] = !isset($validatedData['wildlife_use']) ? null : $validatedData['wildlife_use'];
        $validatedData['ecological_use'] = !isset($validatedData['ecological_use']) ? null : $validatedData['ecological_use'];
        $validatedData['pollinating_type'] = !isset($validatedData['pollinating_type']) ? null : $validatedData['pollinating_type'];
        $validatedData['comestible_use'] = !isset($validatedData['comestible_use']) ? null : $validatedData['comestible_use'];
        $validatedData['interesting_cultivar'] = !isset($validatedData['interesting_cultivar']) ? null : explode(',', $validatedData['interesting_cultivar']);
        

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
