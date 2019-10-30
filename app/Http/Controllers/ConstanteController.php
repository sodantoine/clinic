<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\constante;
use App\Http\Requests;
use App\Models\patient;

class ConstanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $constantes=constante::All();
        foreach ($constantes as $key => $val) {
            $patient=patient::where(['id'=>$val->patient_id])->first();
            $constantes[$key]->patient=$patient->first_name;
        }
         return view('constante.index',compact('constantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
    
        $patient=patient::findOrFail($id);
        return view('constante.create',compact('patient'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
   
        
        $constantes=new constante();
        $constantes->temparature = $request->temp;
        $constantes->poids = $request->tch3_22;
    
        $constantes->tension_bras_droit = $request->tch3_22_2;
        $constantes->tension_bras_gauche = $request->tch3_22_22;
        $constantes->pouls = $request->tch34;
       
        $constantes->patient_id = $request->pati;
        $constantes->save();

        return redirect()->route('consultation.create')->with('constante','constante ajoutée avec succès');
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
        return view('constante.show',compact('patient'));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $constante=constante::findOrFail($id);
        return view('constante.edit',compact('constante'));
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
        $constante=constante::findOrFail($id);
        $constante->update([
            $constante->temparature = $request->temp,
        $constante->poids = $request->tch3_22,
      
        $constante->tension_bras_droit = $request->tch3_22_2,
        $constante->tension_bras_gauche = $request->tch3_22_22,
        $constante->pouls = $request->tch34,
      
        ]);
        return redirect()->route('constante.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $constante=constante::findOrFail($id);
        $constante->delete();
        return redirect()->route('constante.index');
    }
}
