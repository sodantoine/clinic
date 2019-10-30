@extends('layouts.default')

@section('content')
    <div style="margin-left: 250px; margin-top: 12px">
        <div class="col-md-11 align-center">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Veuillez finilisé le payement</h4>
                </div>
                <div class="row">




                    <div class="card-body">
                        <form action="{{route('diver.update',$hospitalisation)}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <ul class="feeds" >
                                <span class="text-muted"><h3>  {{$consultation->id}}<span><h3>f</h3></span></h3></span>
                                <li>
                                    <div class="bg-light-inverse"><i class="fa fa-bell-o"></i></div> Type Honoraire<span class="text-muted"><h3>Hospitalisation</h3> </span>
                                </li>

                                <li>
                                    <div class="bg-light-info"><i class="fa fa-bell-o"></i></div> Motif <span class="text-muted"><h3>{{$hospitalisation->motif}}</h3></span></li>
                                <li>
                                    <div class="bg-light-success"><i class="ti-server"></i></div> Date Debut<span class="text-muted"><h3>{{$hospitalisation->date_debut}}</h3></span></li>
                                <li>
                                    <div class="bg-light-warning"><i class="ti-server"></i></div>Date de libération <span class="text-muted"><h3>{{$hospitalisation->date_fin}}</h3><span><i class="fa fa-check-square"></i></span> </span></li>
                                <li>
                                    <div class="bg-light-danger"><i class="ti-user"></i></div> Code Patient<span class="text-muted"><h3>{{$hospitalisation->patient_id}} {{$patient->last_name}}  {{$patient->first_name}}</h3></span></li>
                                <li>
                                    <div class="bg-light-inverse"><i class="fa fa-bell-o"></i></div> Code du Lit <span class="text-muted"><h3>{{$hospitalisation->id_lit}} {{$lit->lit_nom}}</h3></span></li>
                                <li>
                                    <div class="bg-light-inverse"><i class="fa fa-bell-o"></i></div> Nombre de jour <span class="text-muted"><h3>{{$diffs}}<span><h3>J</h3></span></h3></span></li>
                                <li>
                                    <div class="bg-light-inverse"><i class="fa fa-bell-o"></i></div> Montant Total<span class="text-muted"><h3> {{$montant}}<span><h3>f</h3></span></h3></span>
                                </li>
                                <li>
                                    <div class="bg-light-inverse"><i class="fa fa-bell-o"></i></div> Montant versé<span class="text-muted"><h3>{{$honoraire->paye}}<span><h3>f</h3></span></h3></span>
                                </li>
                                <li>
                                    <div class="bg-light-inverse"><i class="fa fa-bell-o"></i></div> Reste à Payer<span class="text-muted"><h3> {{$honoraire->reste}}<span><h3>f</h3></span></h3></span>
                                </li>

                            </ul>


                    </div></div>

                <div class="col-md-5">
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                        <button type="button" class="btn btn-inverse">Cancel</button>
                    </div> </div>
                </form>
            </div>
        </div>

    </div></div></div>
    <script>
        $('#cons_list').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });</script>
@stop
