<?php

namespace App\Http\Controllers;

use App\Models\patient;
use App\Models\prescrire;
use App\Models\produit;
use App\Models\ordonance;
use App\Models\type_honoraire;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Http\Requests;

class Type_honoraireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type_honoraires=type_honoraire::All();
        return view('type_honoraire.index',compact('type_honoraires'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('type_honoraire.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type_honoraire=new type_honoraire();
        $type_honoraire->libelle=$request->typ;
        $type_honoraire->prix=$request->prix;
        $type_honoraire->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /**
        $now_ordonanace=ordonance::select('id')->max('id');
        $ordonances=ordonance::findOrFail($now_ordonanace);
        $produits=produit::findOrFail($ordonances->produit_id);

        $patient=$ordonances->patient_id;
        $produit=$ordonances->produit_id;

        $ordonance= ordonance::WhereHas('patient', function($or) use($id)
        {
        $or->where('patient_id',$id);
        })->orwhereHas('produit', function($pr) use($produit)

        {
        $pr->where('patient_id',$produit);
        })->get();
         */
        $dat=carbon::now();
        $ordonances=ordonance::findOrFail($id);
       $patient=patient::findOrFail($ordonances->patient_id);

    $prescrie=prescrire::where('ordonance_id',$id)->get();
    foreach ($prescrie as $key => $val) {
        $nom_prod=produit::where(['id'=>$val->produit_id])->first();
        $prescrie[$key]->nom_prod=$nom_prod->nom_produit;
    }
     
        return view('type_honoraire.show',compact('prescrie','dat','patient'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
