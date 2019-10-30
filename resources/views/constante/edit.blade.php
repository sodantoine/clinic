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
                        <form action="{{route('constante.update',$constante)}}" method="POST">
                            {{csrf_field()}}
                            {{method_field("PUT")}}
                            <div class="form-body">
                                <h3 class="card-title">Constante</h3>
                                <hr>
                                <div class="row p-t-20" >
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <label class="control-label">Temparature</label>
                                            <input value="{{$constante->temparature}}" type="integer"  name="temp" class="form-control" required>


                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6" >
                                        <div class="form-group h">

                                            <label class="control-label">poids</label>
                                            <input id="tch44" type="text" value="{{$constante->poids}}" name="tch3_22"  class="form-control" required> </div>


                                </div>

                                <!--/span-->
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                  
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tension bras droit</label>
                                        <input id="tch6" type="text" value="{{$constante->tension_bras_droit}}" name="tch3_22_2" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" >
                                        <label class="control-label">Tension bras gauche</label>
                                        <input id="tch7" type="text" value="{{$constante->tension_bras_gauche}}" name="tch3_22_22" class="form-control" required>
                                    </div>
                                </div>
                                <!--/span-->

                            </div>

                            <!--/span-->
                    </div>
                    <!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Pouls</label>
                                <input id="tch8" type="text" value="{{$constante->pouls}}" name="tch34" class=" form-control" required> </div>



                        </div>
                    </div>
                    <!--/span-->

                    <!--/span-->
                    <div class="col-md-6 ">
                        <div class="form-group">
                           

                            <input  value="{{$constante->patient_id}}" type="hidden" class="form-control" >
                        </div>

                        <!--/span-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                    <button type="button" class="btn btn-inverse">Cancel</button>
                                </div>
                            </div>
                            <!--/row-->



                            <div>
                            </div> </div></div>
                    </form>
                </div>
            </div>
        </div></div></div>
@stop