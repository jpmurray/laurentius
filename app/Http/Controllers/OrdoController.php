<?php

namespace App\Http\Controllers;

use App\Classis;
use App\Ordo;
use Illuminate\Http\Request;

class OrdoController extends Controller
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
        return view("ordos.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("ordos.create");
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
            'name' => 'required|unique:ordos',
            'classis' => 'required|integer'
        ]);

        $classis = Classis::find($validatedData['classis']);
        $classis->ordos()->create($validatedData);

        return redirect()->route('ordos.index')->with('status', 'Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ordo  $ordo
     * @return \Illuminate\Http\Response
     */
    public function show(Ordo $ordo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ordo  $ordo
     * @return \Illuminate\Http\Response
     */
    public function edit(Ordo $ordo)
    {
        return view("ordos.edit")->with(['ordo' => $ordo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ordo  $ordo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ordo $ordo)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'classis' => 'required|integer'
        ]);

        $ordo->classis_id = $validatedData['classis'];
        $ordo->name = $validatedData['name'];
        $ordo->save();

        return redirect()->route('ordos.index')->with('status', 'Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ordo  $ordo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ordo $ordo)
    {
        $ordo->delete();

        return redirect()->route('ordos.index')->with('status', 'Deleted!');
    }
}
