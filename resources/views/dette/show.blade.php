@extends('layouts.default')

@section('content')
    <div style="margin-left: 250px; margin-top: 12px">
        <div class="col-md-11 align-center">
            <div class="card card-outline-info">
                <div id="divID">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Clinique la Merveille</h4>
                </div>
                <div class="row">
                 

                    <div class="card-body">
            <h3 style="margin-left: 325px">Facture de payement</h3>
                        <ul class="feeds" >
                            <li>
                                <div class="bg-light-inverse"><i class="fa fa-bell-o"></i></div> Type Honoraire<span class="text-muted"><h3>Hospitalisation</h3> </span>
                            </li>

                            <li>
                                <div class="bg-light-info"><i class="fa fa-bell-o"></i></div> Montant Total <span class="text-muted"><h3>{{$dette->mnt_total}}</h3></span></li>

                             <li>   <div class="bg-light-danger"><i class="ti-user"></i></div> Montant Déposer<span class="text-muted"><h3>{{$dette->mnt_verse}} </h3></span></li>
                            <li>
                                <div class="bg-light-success"><i class="ti-server"></i></div>Montant Restant<span class="text-muted"><h3>{{$dette->mnt_reste}}</h3></span></li>



                        </ul>


                    </div></div>
</div>
                <div class="col-md-5">
                    <div class="form-actions">
                       
<input name="b_print"   class="btn btn-success" type="button" onclick="printdiv('divID');" value=" Print " />
                    </div> </div>

            </div>
        </div>

    </div></div></div>
    <script>

@stop
