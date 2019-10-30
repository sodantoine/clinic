<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\consultation;
use App\Http\Requests;
use App\Models\patient;
use Carbon\Carbon;
use App\Models\constante;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultations=consultation::All();
        foreach ($consultations as $key => $val) {
            $patient=patient::where(['id'=>$val->patient_id])->first();
            $consultations[$key]->patient=$patient->first_name;
        }

        return view('consultation.index',compact('consultations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients=patient::where('last_name','!=',null)->orderBy('created_at','desc')->get();
        return view('consultation.create',compact('patients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $consultation = new consultation();
        $consultation->motif = $request->motif;
        $consultation->observations = $request->obs;
        $consultation->diagnostic = $request->public;
        $consultation->date_consultation =carbon::now();
        $consultation->patient_id = $request->pati;
        $consultation->save();

        /*$constantes=new constante();
        $constantes->temparature = $request->temp;
        $constantes->poids = $request->tch3_22;
        $constantes->tension_bras_droit = $request->tch3_22_2;
        $constantes->tension_bras_gauche = $request->tch3_22_22;
        $constantes->pouls = $request->tch34;
        $constantes->consultation_id = $consultation->id;
        $constantes->patient_id = $request->pati;
        $constantes->save();*/

        return redirect()->route('consultation.create')->with('consultation','consultation ajoutée avec succès');
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
        return view('consultation.show',compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patients=patient::All();
        $consultation=consultation::findOrFail($id);
        return view('consultation.edit',compact('consultation','patients'));
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
        $consultation=consultation::findOrFail($id);
        $consultation->update([
            $consultation->motif = $request->motif,
            $consultation->observations = $request->obs,
            $consultation->diagnostic = $request->public
        ]);
        return redirect()->route('consultation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $consultation=consultation::findOrFail($id);
        $consultation->delete();
        return redirect()->route('consultation.index');
    }
}
