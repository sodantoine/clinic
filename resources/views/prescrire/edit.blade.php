@extends('layouts.default')

@section('content')
    <div style="margin-left: 250px; margin-top: 12px">
        <div class="col-md-11 align-center">
            <div class="row">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Veuillez remplir les champs obligatoires!!!</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('prescrire.update',$prescrire)}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="form-body">
                                <h3 class="card-title">Ordonance</h3>
                                <hr>
                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <!--/span-->
                                            <label>Quantité</label>

                                                <select type="text" value="{{$prescrire->quantite}}" name="qte" class="form-control" required >
                                                    <option value="1 Tab"> 1 Tab</option>
                                                    <option value="2 Tabs"> 2 Tabs</option>
                                                    <option value="3 Tabs"> 3 Tabs</option>
                                                    <option value="4 Tabs"> 4 Tabs</option>
                                                    <option value="5 Tabs"> 5 Tabs</option>
                                                    <option value="1 Paquets"> 1 Paquet</option>
                                                    <option value="2 Paquets"> 2 Paquets</option>
                                                    <option value="3 Paquets"> 3 Paquets</option>

                                                </select>


                                        </div></div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label>Posologie</label>
                                            <input type="text" value="{{$prescrire->posologie}}" name="poso"  id="qte"  class="form-control" required maxlength="150">
                                        </div>
                                        <!--/span-->
                                        <input type="hidden" value="{{$prescrire->ordonance_id}}" name="id_ord" class="form-control" required maxlength="150">

                                    </div>
                                    <!--/span-->

                                    <!--/row-->

                                        <!--/span-->
                                    </div>
                                    <!--/span-->
                                </div>
                                <div class="col-md-5">
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                        <button type="button" class="btn btn-inverse">Cancel</button>
                                    </div> </div></div>
                        </form>
                    </div>
                </div></div>


@stop