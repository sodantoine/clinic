<?php

namespace App\Http\Controllers;

use App\Models\dette;
use App\Models\honoraire;
use App\Models\patient;
use Illuminate\Http\Request;

class DetteController extends Controller
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
        $honoraire=honoraire::where('reste','!=',0)->get();
        foreach ($honoraire as $key => $val) {
            $patient=patient::where(['id'=>$val->patient_id])->first();
            $honoraire[$key]->patient=$patient->first_name;
            
        }

        return view('dette.create',compact('honoraire'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        $honor=honoraire::findOrFail($request->hono_id);
$rest=$honor->reste;
$vers=$request->ajout;
$opera=$rest-$vers;
if(($vers>$rest)){
    session()->flash('message','le montant ne peut etre supérieur à la dette');
    return redirect()->route('dette.create');

  }else{
     $dette=new dette();
        $dette->honoraire_id=$request->hono_id;
        $dette->personnel_id=$request->pers;
        $dette->mnt_total=$request->total;
        $dette->mnt_verse=$request->ajout;
        $dette->mnt_reste=$opera;

        $dette->save();

        $honoraire=honoraire::findOrFail($request->hono_id);
        $honoraire->update([
            $honoraire->reste=$opera
        ]);
        return redirect()->route('dette.show',compact('dette'));

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
        $dette=dette::findOrFail($id);
        return view('dette.show',compact('dette'));
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
