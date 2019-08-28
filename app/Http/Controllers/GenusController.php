<?php

namespace App\Http\Controllers;

use App\Familia;
use App\Genus;
use Illuminate\Http\Request;

class GenusController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("genera.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("genera.create");
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
            'name' => 'required|unique:genera',
            'familia' => 'required|integer'
        ]);

        $familia = Familia::find($validatedData['familia']);
        $familia->genera()->create($validatedData);

        return redirect()->route('genera.index')->with('status', 'Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Genus  $genus
     * @return \Illuminate\Http\Response
     */
    public function show(Genus $genus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Genus  $genus
     * @return \Illuminate\Http\Response
     */
    public function edit(Genus $genus)
    {
        return view("genera.edit")->with(['genus' => $genus]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Genus  $genus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Genus $genus)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'familia' => 'required|integer'
        ]);

        $genus->familia_id = $validatedData['familia'];
        $genus->name = $validatedData['name'];
        $genus->save();

        return redirect()->route('genera.index')->with('status', 'Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Genus  $genus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genus $genus)
    {
        $genus->delete();

        return redirect()->route('genera.index')->with('status', 'Deleted!');
    }
}
