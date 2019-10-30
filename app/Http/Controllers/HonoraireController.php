<?php

namespace App\Http\Controllers;

use App\Models\honoraire;
use App\Models\patient;
use App\Models\dette;
use App\Models\type_honoraire;
use Illuminate\Http\Request;

use App\Http\Requests;

class HonoraireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $honoraire=honoraire::All();
        return view('honoraire.index',compact('honoraire'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $honoraire=new honoraire();
        $honoraire->paye=$request->mnt;
        $honoraire->id_type_honoraire=$request->id_typ;
        $honoraire->patient_id=$request->pat;
        $honoraire->save();

        return  redirect()->route('honoraire.create',compact('honoraire'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $honoraires=honoraire::All();
        $type_honoraire=type_honoraire::All();
        $patient=patient::findOrFail($id);
        return view('honoraire.show',compact('patient','type_honoraire','honoraires'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $honoraire=honoraire::findOrFail();
        return view('honoraire.edit',compact('honoraire'));
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
        $honoraire=honoraire::findOrFail($id);
        $honoraire->update([
            $honoraire->paye=$request->mnt
        ]);
        return redirect()->route('honoraire.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $honoraire=honoraire::findOrFail($id);
        $honoraire->delete();
        return redirect()->route('honoraire.index');
    }
}
