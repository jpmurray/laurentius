<?php

namespace App\Http\Controllers;

use App\Regnum;
use Illuminate\Http\Request;

class RegnumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("regnums.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("regnums.create");
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
            'name' => 'required|unique:regnums',
        ]);

        Regnum::create($validatedData);

        return redirect()->route('regnums.index')->with('status', 'Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Regnum  $regnum
     * @return \Illuminate\Http\Response
     */
    public function show(Regnum $regnum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Regnum  $regnum
     * @return \Illuminate\Http\Response
     */
    public function edit(Regnum $regnum)
    {
        return view("regnums.edit")->with(['regnum' => $regnum]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Regnum  $regnum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Regnum $regnum)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $regnum->update($validatedData);

        return redirect()->route('regnums.edit', $regnum)->with('status', 'Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Regnum  $regnum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Regnum $regnum)
    {
        $regnum->delete();

        return redirect()->route('regnums.index')->with('status', 'Deleted!');
    }
}
