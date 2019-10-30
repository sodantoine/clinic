@extends('layouts.default')
@section('content')
    <div class="row">
        <div style="margin-left: 250px; margin-top: 12px">
            <div class="col-md-10 align-center">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Veuillez remplir les champs obligatoires!!!</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('personnel.store')}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-body">
                                <h3 class="card-title">Personnel</h3>
                                <hr>
                                <div class="row p-t-20">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group has-success">
                                                <small class="form-control-feedback">Obligatoire (*)</small>
                                                <label name="typ" class="control-label">Type </label>
                                                <select name="typ" class="form-control custom-select">
                                                    <option value="Infirmier">Infirmier</option>
                                                    <option value="Docteur">Docteur</option>
                                                    <option value="Entretien">Entretien</option>
                                                </select>
                                                <small class="form-control-feedback"> Select your type </small> </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <small class="form-control-feedback">Obligatoire (*)</small>
                                                <label class="control-label">User Name</label>
                                                <input name="user" type="text" id="firstName" class="form-control" placeholder="John doe">
                                                <small class="form-control-feedback"> This is inline help </small> </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group has-danger">
                                                <small class="form-control-feedback">Obligatoire (*)</small>
                                                <label class="control-label">Password</label>
                                                <input name="pass" type="password" id="lastName" class="form-control form-control-danger" placeholder="12n">
                                                <small class="form-control-feedback"> This field has error. </small> </div>
                                        </div>
                                        <!--/span-->

                                        <!--/row-->
                                        <div class="col-md-6">
                                            <div class="form-group has-danger">
                                                <small class="form-control-feedback">Obligatoire (*)</small>
                                                <label class="control-label">Confirmation</label>
                                                <input name="conf" type="password" id="lastName" class="form-control form-control-danger" placeholder="12n">
                                                <small class="form-control-feedback"> This field has error. </small> </div>
                                        </div>
                                        <!--/row-->

                                        <!--/span-->

                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group has-success">
                                                <small class="form-control-feedback">Obligatoire (*)</small>
                                                <label name="id_pers" class="control-label">Personnel </label>
                                                <select name="id_pers" type="text"   class="form-control">

                                                    @foreach($patients as $patient )

                                                        <option value="{{$patient->id}}">{{$patient->last_name}}  {{$patient->first_name}} </option>
                                                    @endforeach
                                                    s
                                                </select>
                                                <small class="form-control-feedback"> Select your type </small> </div>
                                        </div>
                                        <!--/row-->

                                        <!--/span-->

                                        <!--/row-->

                                        <!--/span-->
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                    <button type="button" class="btn btn-inverse">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div></div>
@stop