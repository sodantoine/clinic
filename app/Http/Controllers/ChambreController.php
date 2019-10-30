<?php

namespace App\Http\Controllers;

use App\Models\chambre;
use App\Models\patient;
use App\Models\produit;
use Illuminate\Http\Request;

use App\Http\Requests;

class ChambreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chambres=chambre::All();
        return view('chambre.index',compact('chambres'));
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
        $verif=chambre::where('chambre_nom',$request->chamb)->count();
        if($verif!=0){
            session()->flash('message','Cette chambre existe déjà');
        }else{
            $chambre=new chambre();
            $chambre->chambre_nom=$request->chamb;
            $chambre->save();
        }

        return redirect()->route('chambre.index');
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
        $produit=produit::findOrFail($id);
        return view('chambre.show',compact('patient','produit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chambre=chambre::findOrFail($id);
        return view('chambre.edit',compact('chambre'));
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
        $chambre=chambre::findOrFail($id);
        $chambre->update([
            $chambre->chambre_nom=$request->chamb
        ]);
        return redirect()->route('chambre.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chambre=chambre::findOrFail($id);
        $chambre->delete();
        return redirect()->route('chambre.index');
    }
}
