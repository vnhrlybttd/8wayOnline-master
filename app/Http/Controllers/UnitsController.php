<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Units;
use Alert;

class UnitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = Units::latest()->get();
        return view ('units.index',compact('table'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('units.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'unit_name' => 'required',

        ]);
    
        Units::create($request->all());
    

        alert()->success('Success',' Unit created successfully!')->autoClose(8000);

        return redirect()->route('units.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'unit_name' => 'required',
            ]);

        $units = Units::findOrFail($id);
        $units->unit_name = $request->unit_name;
        $units->save();
      

        alert()->success('Success',' Unit Name updated successfully!')->autoClose(5000);

        return redirect()->route('units.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $find = Units::findOrFail($id);
        $find->delete();


        
        alert()->success('Success',' Unit deleted successfully!')->autoClose(8000);

        return redirect()->route('units.index');
    }
}
