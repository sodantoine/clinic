@extends('layouts.default')

@section('content')
    <div style="margin-left: 250px; margin-top: 12px">
        <div class="col-md-11 align-center">
            <div class="row">

                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Type Honoraire</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('type_honoraire.store')}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-body">
                                <h3 class="card-title">Type Honoraire</h3>
                                <hr>
                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label name="typ" id="sex" class="control-label">Type</label>
                                            <select name="typ" class="form-control custom-select">
                                                <option value="Hospitalisation">Hospitalisation</option>
                                                <option value="Consultation">Consultation</option>
                                            </select>
                                            </div>
                                    </div>

                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group has-danger">

                                            <label class="control-label">Prix </label>
                                            <input name="prix" type="text" id="lastName" class="form-control form-control-danger" required>
                                          </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->


                                <!--/span-->
                            </div>



                            <div class="col-md-5">
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                    <button type="button" class="btn btn-inverse">Cancel</button>
                                </div> </div>
                        </form>
                    </div>
                    <div class="card card-outline-info">



                    </div>
                </div>


        </div>
            </div></div></div>

@stop