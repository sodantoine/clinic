<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use App\Models\ordonance;
use App\Models\patient;
use App\Models\personnel;
use App\Models\prescrire;
use App\Models\produit;

class PrescrireController extends Controller
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
        //dd($request);
        $req=$request->all();
        $prod=collect();
        $qte=collect();
        $poso=collect();       
        $count1=(count($req)-2)/3;
        $count1=$count1+1;
        $liste=collect();
        $id=$req['id'];
        $date=date('d/m/Y');
        //echo'req:'.count($req);
        //echo $count1;
        for($j=1;$j<$count1;$j++){

            $prod->push($req['prod'.$j]);
            $qte->push($req['quant'.$j]);
            $poso->push($req['poso'.$j]);
           // echo'ok';

        }

        $unq=$prod->unique();

        if($unq->count()!=$prod->count()){
            return redirect()->route('prescrire.show',compact('id'))->with('status', 'Erreur Veuillez entrer des produits différents!');;
        }
        else{

            $count2=$prod->count();
            $prod->toArray();
            $qte->toArray();
            $poso->toArray();
            $patient=patient::findOrFail($id);
           // echo $count2;
            $ordonances=new ordonance();
            $ordonances->patient_id=$patient->id;
            $ordonances->save();

            for($j=0;$j<$count2;$j++){

                $prescrire=new prescrire();
                $prescrire->posologie=$poso[$j];
                $prescrire->quantite=$qte[$j];
                $prescrire->produit=$prod[$j];
                $prescrire->ordonance_id=$ordonances->id;
                $prescrire->save();
                $liste->push($prescrire);
            }
            return view('prescrire.imprimer',['patient'=>$patient,'prescription'=>$liste,'date'=>$date]);
        }
       // print_r($req);
        /*$produits=produit::All();
      
        $ordonance=ordonance::findOrFail($request->id_ord);
                
        $prescries=prescrire::where('ordonance_id',$request->id_ord) ->get();
             
        foreach ($prescries as $key => $val) {
            $nom_prod=produit::where(['id'=>$val->produit_id])->first();
            $prescries[$key]->nom_prod=$nom_prod->nom_produit;
        }
       
        $verif=prescrire::where('produit_id',$request->id_prod)
            -> where('ordonance_id',$request->id_ord)->count();*/
        

        /*else{
            $prescrire=new prescrire();
            $prescrire->posologie=$request->poso;
            $prescrire->quantite=$request->qte;
            $prescrire->produit_id=$request->id_prod;
            $prescrire->ordonance_id=$request->id_ord;
            $prescrire->save();
        }
       
        return view('prescrire.show',compact('ordonance','produits','prescries'));*/
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
        $ordonnances=$patient->ordonnances;
       
        // $produits=produit::All();

        //$prescries=prescrire::where('ordonance_id',$id) ->get();
       
        
        //return view('prescrire.show',compact('ordonance','produits','prescries'));
        return view('prescrire.show',compact('patient','ordonnances'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $prescrire=prescrire::findOrFail($id);
        $produits=produit::All();
        return view('prescrire.edit',compact('produits','prescrire'));
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
         $prescrire=prescrire::findOrFail($id);
        $prescrire->update([

            
            $prescrire->posologie=$request->poso,
            $prescrire->quantite=$request->qte,
        ]);
          $produits=produit::All();
      
        $ordonance=ordonance::findOrFail($request->id_ord);

    $prescries=prescrire::where('ordonance_id',$request->id_ord) ->get();
             
              foreach ($prescries as $key => $val) {
        $nom_prod=produit::where(['id'=>$val->produit_id])->first();
        $prescries[$key]->nom_prod=$nom_prod->nom_produit;
    }
   
    

    return view('prescrire.show',compact('ordonance','produits','prescries'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $prescrire=prescrire::findOrFail($id);

        $prescrire->delete();
          $produits=produit::All();
      
        $ordonance=ordonance::findOrFail($prescrire->ordonance_id);

    $prescries=prescrire::where('ordonance_id',$prescrire->ordonance_id) ->get();

              foreach ($prescries as $key => $val) {
        $nom_prod=produit::where(['id'=>$val->produit_id])->first();
        $prescries[$key]->nom_prod=$nom_prod->nom_produit;
    }

        

    return view('prescrire.show',compact('ordonance','produits','prescries'));
    }
}
