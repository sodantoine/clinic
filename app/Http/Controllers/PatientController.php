<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\patient;
use App\Models\consultation;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients= patient::where('last_name','!=',null)->orderBy('created_at','desc')->get();
        return view('patient.index',compact('patients','consultations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients= new patient();
        return view('patient.create',compact('patients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $verif=patient::where('last_name',$request->firstn)->
                          where('first_name',$request->lastn)->
                          where('phone_number',$request->phone)->count();
        if($verif!=0){
           session()->flash('message','Ce patient existe déjà') ;
            return redirect()->route('patient.create');

        }else{
            $patients=new patient();
            $patients->last_name = $request->firstn;
            $patients->first_name = $request->lastn;
            $patients->sex = $request->sex;
            $patients->date_of_birth = $request->dateb;
            $patients->family_state = $request->familys;
            $patients->address = $request->Address;
            $patients->phone_number = $request->phone;
            $patients->groupe_sanguin = $request->sang;
            $patients->taille = $request->tch3;
            $patients->save();
            session()->flash('message','Patient enregistré avec succès');
            return redirect()->route('home');
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
        $patients=patient::findOrFail($id);
        return view('patient.show',compact('patients'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patients=patient::findOrFail($id);
        return view(patient.edit,compact('patients'));
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
        $patients= patient::findOrFail($id);
        $patients->update([ $patients->last_name = $request->firstn,
            $patients->first_name = $request->lastn,
            $patients->sex = $request->sex,
            $patients->date_of_birth = $request->dateb,
            $patients->family_state = $request->familys,
            $patients->address = $request->Address,
            $patients->phone_number = $request->phone,
            $patients->groupe_sanguin = $request->sang,
            $patients->taille = $request->tch3]);
        session()->flash('message2','Patient modifié avec succès');
        return redirect()->route('patient.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patients= patient::findOrFail($id);
        $patients->delete();
        session()->flash('message','Patient supprimé avec succès');
        return redirect()->route('patient.index');
    }
}
