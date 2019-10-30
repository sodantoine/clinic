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
                        <form action="{{route('produit.store')}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-body">
                                <h3 class="card-title">Person Info</h3>
                                <hr>
                                <div class="row ">
                                    <div class="">
                                     <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search" required> <span class="input-group-btn">
                                                  <button class="btn btn-info" type="button">Save!</button>
                                         </span> </div></div>
                                </div></div>

                                    <!--/span-->

                    </form>
                </div>
            </div>
        </div></div></div>
@stop