<?php

namespace App\Http\Controllers;

use App\Divisio;
use App\Regnum;
use Illuminate\Http\Request;

class DivisioController extends Controller
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
        return view("divisios.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("divisios.create");
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
            'name' => 'required|unique:divisios',
            'regnum' => 'required|integer'
        ]);

        $regnum = Regnum::find($validatedData['regnum']);
        $regnum->divisios()->create($validatedData);

        return redirect()->route('divisios.index')->with('status', 'Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Divisio  $divisio
     * @return \Illuminate\Http\Response
     */
    public function show(Divisio $divisio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Divisio  $divisio
     * @return \Illuminate\Http\Response
     */
    public function edit(Divisio $divisio)
    {
        return view("divisios.edit")->with(['divisio' => $divisio]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Divisio  $divisio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Divisio $divisio)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'regnum' => 'required|integer'
        ]);

        $divisio->regnum_id = $validatedData['regnum'];
        $divisio->name = $validatedData['name'];
        $divisio->save();

        return redirect()->route('divisios.index')->with('status', 'Added!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Divisio  $divisio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Divisio $divisio)
    {
        $divisio->delete();

        return redirect()->route('divisios.index')->with('status', 'Deleted!');
    }
}
