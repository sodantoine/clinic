<?php

namespace App\Http\Controllers;

use App\Models\patient;
use App\Models\rendez_vou;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class Rendez_vousController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $rendez_vous=rendez_vou::All();
        foreach ($rendez_vous as $key => $val) {
            $patient=patient::where(['id'=>$val->patient_id])->first();
            $rendez_vous[$key]->patient=$patient->first_name;
        }

        return view('rendez_vous.index',compact('rendez_vous'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients=patient::simplepaginate(1);
        return view('rendez_vous.create',compact('patients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rendez_vous=new rendez_vou();
        $rendez_vous->patient_id = $request->pat;
        $rendez_vous->motif = $request->motif;
        $rendez_vous->date_heure = Carbon::now();
        $rendez_vous->save();
        $patient=$request->pat;
        return redirect()->route('rendez_vous.show',compact('patient'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $rendez_vous=rendez_vou::findOrFail($id);
        return view('rendez_vous.show',compact('rendez_vous'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rendez_vous=rendez_vou::findOrFail($id);
        return view('rendez_vous.edit',compact('rendez_vous'));
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
        $rendez_vous=rendez_vou::findOrFail($id);
        $rendez_vous->update([
            $rendez_vous->motif = $request->motif
        ]);
        return redirect()->route('rendez_vous.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rendez_vous=rendez_vou::findOrFail($id);
        $rendez_vous->delete();
        return redirect()->route('rendez_vous.index');
    }
}
