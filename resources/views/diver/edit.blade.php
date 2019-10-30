@extends('layouts.default')

@section('content')
    <div style="margin-left: 250px; margin-top: 12px">
        <div class="col-md-11 align-center">
            <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Veuillez confirmez pour libérer le patient!!!</h4>
            </div>
             @if(session()->has('message'))

                    <div class="alert alert-danger">
                        {{ session()->get('message')}}
                    </div>

                @endif
            <div class="row">




                                        <div class="card-body">
                                            <form action="{{route('diver.update',$hospitalisation)}}" method="POST">
                                                {{csrf_field()}}
                                                {{method_field('PUT')}}
                                            <ul class="feeds" >

                                                <li>
                                                    <div class="bg-light-info"><i class="ti-server"></i></div> Motif <span class="text-muted"><h3>{{$hospitalisation->motif}}</h3></span></li>
                                                <li>
                                                    <div class="bg-light-success"><i class="fa fa-bell-o"></i></div> Date Debut<span class="text-muted"><h3>{{$hospitalisation->date_debut}}</h3></span></li>
                                              <li>
                                                    <div class="bg-light-danger"><i class="ti-user"></i></div> Code Patient<span class="text-muted"><h3>{{$hospitalisation->patient_id}}   </h3></span></li>
                                                <li>
                                                    <div class="bg-light-inverse"><i class="fa fa-bell-o"></i></div> Code du Lit <span class="text-muted"><h3>{{$hospitalisation->id_lit}} </h3></span></li>
                                                <li>

                                                    <div class="bg-light-inverse"><i class="fa fa-bell-o"></i></div> Nombre de jour <span class="text-muted"><h3>{{$diffs}}</h3></span></li>
                                                <li>
                                                    <div class="bg-light-inverse"><i class="fa fa-bell-o"></i></div> Montant Total<span class="text-muted"><h3> {{$montant}}<span><h3>f</h3></span></h3></span>
                                                </li>
                                                <li>
                                                    <div class="bg-light-inverse"><i class="fa fa-bell-o"></i></div> Montant versé<span class="text-muted"> <input class="form-control"  required  type="text" name="vers"></span>
                                                </li>

                                                <input class="form-control" value="{{$hospitalisation->patient_id}} "   required  type="hidden" name="mnt">
                                                <input class="form-control" value="{{$montant}}"   required  type="hidden" name="montant">
                                                </ul>

                                                <hr>



                    <div class="col-md-5">
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                            <button type="button" class="btn btn-inverse">Cancel</button>
                        </div> </div>
                </form>
                    </div>
                    </div>

            </div></div></div>

@stop