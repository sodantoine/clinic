<?php

namespace App\Http\Controllers;

use App\Models\constante;
use App\Models\consultation;
use App\Models\dette;
use App\Models\hospitalisation;
use App\Models\patient;
use App\Models\personnel;
use App\Models\honoraire;
use Illuminate\Http\Request;

use App\Http\Requests;

class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients=patient::All();
        return view('personnel.create',compact('patients'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $personnel = new personnel();
        $personnel->nom_utilisateur = $request->user;
        $personnel->mot_de_passe = $request->pass;
        $personnel->type_personnel = $request->typ;
        $personnel->patient_id =$request->id_pers;
        $personnel->save();
        return redirect()->route('personnel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patients=patient::All();
        return view('personnel.show',compact('patients'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient=patient::findOrFail($id);
       
      

        return view('diver.index',compact('patient'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
