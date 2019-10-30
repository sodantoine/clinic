<?php

namespace App\Http\Controllers;

use App\Models\hospitalisation;
use App\Models\lit;
use App\Models\patient;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;


use App\Http\Requests;

class HospitalisationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hospitalisations=hospitalisation::All();
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
        //$hospitalisations=hospitalisation::find(2)->patient()->motif;
        

        return view('hospitalisation.index',compact('hospitalisations','hospitalisation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lits=lit::All();
        $patients=patient::All();


        return view('hospitalisation.create',compact('patients','lits'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
$verif=hospitalisation::where('patient_id',$request->pati)->
                        count();
if ($verif!=0){
    session()->flash('message','Ce patient est toujours hospitalisé');
    $lits=lit::All();
    $patients=patient::All();
    return view('hospitalisation.create',compact('patients','lits'));

}else{
    $hopitalisations=new hospitalisation();
    $hopitalisations->motif=$request->motif;
    $hopitalisations->date_debut = Carbon::now();
     $hopitalisations->date_fin = Carbon::now();
    $hopitalisations->patient_id=$request->pati;
    $hopitalisations->personnel_id=$request->use_id;
    $hopitalisations->id_lit=$request->lit;
    $hopitalisations->etat='0';
    $hopitalisations->save();
    return redirect()->route('hospitalisation.index');

}


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $patient=patient::findOrFail($id);
        $lits=lit::All();
        return view('hospitalisation.show',compact('lits','patient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lits=lit::All();
        $hospitalisation=hospitalisation::findOrFail($id);
        return view('hospitalisation.edit',compact('hospitalisation','lits'));
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
        $hopitalisations=hospitalisation::findOrFail($id);
        $hopitalisations->update([
            $hopitalisations->motif=$request->motif,
            $hopitalisations->id_lit=$request->lit
        ]);
        return redirect()->route('hospitalisation.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hospitalisation=hospitalisation::findOrFail($id);
        $hospitalisation->delete();
        return redirect()->route('hospitalisation.index');
    }
}
