<?php

namespace App\Http\Controllers;

use App\Models\constante;
use App\Models\consultation;
use App\Models\honoraire;
use App\Models\hospitalisation;
use App\Models\lit;
use App\Models\ordonance;
use App\Models\patient;
use App\User;
use App\Models\type_honoraire;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

use App\Http\Requests;

class DiverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $hospitalisations=hospitalisation::where('etat',0)->get();
        foreach ($hospitalisations as $key => $val) {
            $patient=patient::where(['id'=>$val->patient_id])->first();
            $hospitalisations[$key]->patient=$patient->first_name;
        }
        foreach ($hospitalisations as $keys => $vals) {
            $lit=lit::where(['id'=>$vals->id_lit])->first();
            $hospitalisations[$keys]->lit=$lit->lit_nom;
        }
        foreach ($hospitalisations as $keyu => $valu) {
            $personnel=User::where(['id'=>$valu->personnel_id])->first();
            $hospitalisations[$keyu]->personnel=$personnel->name;
        }
      
        
        return view('hospitalisation.store',compact('hospitalisations','hospitalisation'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hospitalisation=hospitalisation::findOrFail($id);
        $lit=lit::findOrFail($hospitalisation->id_lit);
        /**  --Nom et prenoms patient--*/
        $patient= patient::findOrFail($hospitalisation->patient_id);
        /**  --nombre de jour en hospitalisation--*/
        $deb=new DateTime($hospitalisation->date_debut);
        $fin=new DateTime($hospitalisation->date_fin);
        $diff=date_diff($deb,$fin);
        $diffs=$diff->format('%a');
        //dd(compact('deb','fin','diff','diffs'));
        /**  --Montant en foction du nombre de jour en hospitalisation--*/
        $type_honoraire=type_honoraire::findOrFail(1);
        $prix=$type_honoraire->prix;
        $montan=$diffs*$prix;
        $montant=0;
        if($montan==0){
            $montant=4000;
        }else{
            $montant=$montan;
        }

        if($diffs==0){
            $diffs=1;
        }else{
            $diffs=diffs;
        }

        /**  --Montant versé et restant--*/
        $max_id=honoraire::select('id')->max('id');
        $honoraire=honoraire::findOrFail($max_id);


        return view('diver.show',compact('hospitalisation','montant','diffs','honoraire','patient','lit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dates=carbon::now();
        $hospitalisation=hospitalisation::findOrFail($id);
       
        $deb=new DateTime($hospitalisation->date_debut);
        // $fin=new DateTime($hospitalisation->date_fin);
        $dtes=new DateTime($dates);
        $diff=date_diff($deb,$dtes);
        $diffs=$diff->format('%a');
        /**  --Montant en foction du nombre de jour en hospitalisation--*/
        $type_honoraire=type_honoraire::findOrFail(1);
        $prix=$type_honoraire->prix;
        $montan=$diffs*$prix;
        $montant=0;
        if($montan==0){
            $montant=4000;
        }else{
            $montant=$montan;
    }
    if($diffs==0){
            $diffs=1;
        }else{
            $diffs=diffs;
        }

          return view('diver.edit',compact('hospitalisation','dates','diffs','montant'));

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
        $dates=carbon::now();
        $hopitalisation=hospitalisation::findOrFail($id);
        $hopitalisation->update([
            $hopitalisation->date_fin=$dates,
            $hopitalisation->etat='1'

        ]);
        $deb=new DateTime($hopitalisation->date_debut);
        $dtes=new DateTime($dates);
        $diff=date_diff($deb,$dtes);
        $diffs=$diff->format('%a');

        $type_honoraire=type_honoraire::findOrFail(1);
        $prix=$type_honoraire->prix;
        $montant=$diffs*$prix;

        $pa=$request->vers;
        $mnts=$request->montant;
if ($pa>$mnts ) {

     session()->flash('message','Le montant versé ne peut etre supérieur à la totale');
             return back();
}else{

     $honoraire=new honoraire();
        $honoraire->paye=$request->vers;
        
        $honoraire->id_type_honoraire='1';
        $honoraire->code=$request->montant;
        $honoraire->reste=$request->montant-$pa;
        $honoraire->patient_id=$request->mnt;
        $honoraire->save();

        return redirect()->route('diver.show',compact('hopitalisation','montant'));
   
}

        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        return view('diver.ceate',compact('consulatation'));
    }
}
