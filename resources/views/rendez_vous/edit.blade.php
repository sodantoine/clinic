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
                        <form action="{{route('rendez_vous.update',$rendez_vous)}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="form-body">
                                <h3 class="card-title">Rendez-vous</h3>
                                <hr>
                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <small class="form-control-feedback">Obligatoire (*)</small>
                                            <label class="control-label">Motif</label>
                                            <input name="motif" value="{{$rendez_vous->motif}}" type="text"  id="firstName" class="form-control" required>
                                            <small class="form-control-feedback"> This is inline help </small> </div>
                                    </div>

                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group has-danger">

                                            <input  type="hidden"  class="form-control form-control-danger" >

                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->


                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <input type="hidden"  >

                                            </input>
                                        </div>
                                    </div>
                                    <!--/span-->

                                    <!--/span-->
                                </div>
                                <!--/row-->


                                <div class="col-md-5">
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                        <button type="button" class="btn btn-inverse">Cancel</button>
                                    </div>          </div> </div>
                        </form>
                    </div>
                </div>
            </div></div></div>
@stop