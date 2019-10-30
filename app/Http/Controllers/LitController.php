<?php

namespace App\Http\Controllers;

use App\Models\chambre;
use App\Models\lit;
use Illuminate\Http\Request;

use App\Http\Requests;

class LitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lits=lit::All();
        $chambres=chambre::All();
        return view('lit.index',compact('chambres','lits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lits=lit::All();
        $chambres=chambre::All();
        return view('lit.create',compact('chambres','lits'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
  $verif=lit::where('lit_nom',$request->nom_lit)->
              where('chambre_id',$request->id_chamb)->count();
  if($verif!=0){
      session()->flash('message','Ce lit existe déjà');
      return redirect()->route('lit.create');
  }else{
      $lits=new lit();
      $lits->lit_nom=$request->nom_lit;
      $lits->chambre_id=$request->id_chamb;
      $lits->save();
      return redirect()->route('lit.create');
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
        $chambre=chambre::findOrFail($id);
        return view('lit.show',compact('chambre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lit=lit::findOrFail($id);
        return view('lit.edit',compact('lit'));
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
        $lit=lit::findOrFail($id);
        $lit->update([
            $lit->lit_nom=$request->lit
        ]);
        return redirect()->route('lit.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lit=lit::findOrFail($id);
        $lit->delete();
        return redirect()->route('lit.index');
    }
}
