<?php

namespace App\Http\Controllers;

use App\soin;
use App\Models\patient;
use App\Prescrire_soin;
use Illuminate\Http\Request;

class SoinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $patients=patient::where('last_name','!=',null)->orderBy('created_at','desc')->get();
        return view('soin.index',compact('patients'));
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
        //
        //dd($request);
        $req=$request->all();
        $prod=collect();
        $qte=collect();
        $poso=collect();       
        $count1=(count($req)-2)/3;
        $count1=$count1+1;
        $liste=collect();
        $id=$req['id'];
        $date=date('d/m/Y');
        //echo'req:'.count($req);
        //echo $count1;
        for($j=1;$j<$count1;$j++){

            $prod->push($req['prod'.$j]);
            $qte->push($req['quant'.$j]);
            $poso->push($req['poso'.$j]);
           // echo'ok';

        }

        $unq=$prod->unique();

        if($unq->count()!=$prod->count()){
            return redirect()->route('soin.edit',compact('id'))->with('status', 'Erreur Veuillez entrer des produits différents!');;
        }
        else{

            $count2=$prod->count();
            $prod->toArray();
            $qte->toArray();
            $poso->toArray();
            $patient=patient::findOrFail($id);
           // echo $count2;
            $soin=new soin();
            $soin->patient_id=$patient->id;
            $soin->save();

            for($j=0;$j<$count2;$j++){

                $prescrire=new Prescrire_soin();
                $prescrire->posologie=$poso[$j];
                $prescrire->quantite=$qte[$j];
                $prescrire->produit=$prod[$j];
                $prescrire->soin_id=$soin->id;
                $prescrire->save();
                $liste->push($prescrire);
            }
            return redirect()->route('soin.index')->with('status', 'Soin enregistré avec succès');;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\soin  $soin
     * @return \Illuminate\Http\Response
     */
    public function show(soin $soin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\soin  $soin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $patient=patient::findorFail($id);
        return view('soin.edit',compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\soin  $soin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, soin $soin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\soin  $soin
     * @return \Illuminate\Http\Response
     */
    public function destroy(soin $soin)
    {
        //
    }
}
