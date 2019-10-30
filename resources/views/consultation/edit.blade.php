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
                        <form action="{{route('consultation.update',$consultation)}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="form-body">
                                <h3 class="card-title">Consultation</h3>
                                <hr>
                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <small class="form-control-feedback">Obligatoire (*)</small>
                                            <label class="control-label">Motif</label>
                                            <input value="{{$consultation->motif}}" name="motif" type="text" id="firstName" class="form-control" required>
                                             </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <small class="form-control-feedback">Obligatoire (*)</small>
                                            <label class="control-label">Observations</label>
                                            <input value="{{$consultation->observations}}" name="obs" class="form-control form" type="text" required >
                                            </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/span-->

                                <!--/row-->
                                <div class="col-lg-12 col-xlg-4">
                                    <h5 class="box-title">Diagnostic</h5>
                                    <input value="{{$consultation->diagnostic}}"  type="text" id="dtes"  class="form-control" >
                                                                         <input type="" name="public" class="form-control"/>

                                </div>
<br/>
                                <!--/span-->
                                <!--/row-->

                                <!--/span-->
                            </div>
                            <br/><br/>
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