<?php

namespace App\Http\Controllers;

use App\Models\produit;
use Illuminate\Http\Request;

use App\Http\Requests;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produits=produit::All();
        return view('produit.index',compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('produit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $verif=produit::where('nom_produit',$request->prod)->count();
        if($verif!=0){
            session()->flash('message','Ce produit existe déja');

        }else{
            $produits=new produit();
            $produits->nom_produit=$request->prod;
            $produits->save();
             }
        return redirect()->route('produit.index',compact('produits'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produits=produit::findOrFail($id);
        return view('produit.show',compact('produits'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produit=produit::findOrFail($id);
        return view('produit.edit',compact('produit'));
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
        $produit=produit::findOrFail($id);
        $produit->update([
            $produit->nom_produit=$request->prod
        ]);
        return redirect()->route('produit.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produit=produit::findOrFail($id);
        $produit->delete();
        return redirect()->route('produit.index');
    }
}
