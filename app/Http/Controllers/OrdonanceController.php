<?php

namespace App\Http\Controllers;

use App\Models\ordonance;
use App\Models\patient;
use App\Models\personnel;
use App\Models\prescrire;
use App\Models\produit;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class OrdonanceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ordonance=ordonance::All();
        return view('ordonance.index',compact('ordonance'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // $ordonances=ordonance::All();
        $patients=patient::where('last_name','!=',null)->orderBy('created_at','desc')->get();
        return view('ordonance.create',compact('patients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $ordonances=new ordonance();
        $ordonances->patient_id=$request->id_pat;
        $id=$request->id_pat;
        //$ordonances->personnel_id=$request->id_use;
       // $ordonances->save();
       // $patient=$request->id_pat;

 /**
 $ord=ordonance::All();
$id_ord=$ord->last();
        $prescrire=new prescrire();
        $prescrire->posologie=$request->poso;
        $prescrire->quantite=$request->qte;
        $prescrire->ordonance_id=$id_ord->id;
        $prescrire->produit_id=$request->id_prod;
        $prescrire->save();
        */
       return redirect()->route('prescrire.show',compact('id'));



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $ordonance= ordonance::orWhereHas('patient', function($or) use($id)
        {
            $or->where('patient_id',$id);
        })->get();


        $patient=patient::findOrFail($id);

        //  $produit=produit::findOrFail($ordonance->produit_id);

        $produits=produit::All();
        return view('ordonance.show',compact('produits','patient','ordonance','produit'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ordonance=ordonance::findOrFail($id);
        $produits=produit::All();
        return view('ordonance.edit',compact('produits','ordonance'));
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
        $ordonance=ordonance::findOrFail($id);
        $ordonance->update([
            $ordonance->posologie=$request->poso,
            $ordonance->quantite=$request->qte,
        ]);                
    
        return redirect()->route('ordonance.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ordonance=ordonance::findOrFail($id);
        $ordonance->delete();
        return redirect()->route('ordonance.index');
    }
}
