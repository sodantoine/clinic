@extends('layouts.default')

@section('content')

   <div class="container" style="margin-top: 80px">
        <h1 class="font-weight-bold text-center text-blue">Ajout d'un nouveau patient</h1>
   </div>

    <div class="container" style="margin-top: 12px">
        @if(session()->has('message'))

            <div class="alert alert-danger">
                {{ session()->get('message')}}
            </div>

        @endif
    </div>
                     
                       
<div class="container">
    <br/>
                    <div class="card card-outline-info">
                            <div class="card-header">
                                <h2 class="m-b-0 text-white font-weight-bold">Nouveau patient</h2>
                            </div>
                            <div class="card-body">
                                <form action="{{route('patient.store')}}" method="POST"
                                 onsubmit="return confirm('Voulez -vous enregistrer  ce patient ?') " >
                                    {{csrf_field()}}
                                    <div class="form-body">
                                        <h3 class="card-title">Informations personnelles du patient</h3>
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                  <small class="form-control-feedback">Obligatoire (*)</small>
                                                    <label class="control-label">Nom</label>
                                                <input name="firstn" type="text" id="firstName" class="form-control" placeholder="John doe" required maxlength="25">
                                                    </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                  <small class="form-control-feedback">Obligatoire (*)</small>
                                                    <label class="control-label">Prenoms</label>
                                                    <input name="lastn" type="text" id="lastName" class="form-control form-control-danger" required maxlength="50">
                                                    </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group has-success">
                                                  <small class="form-control-feedback">Obligatoire (*)</small>
                                                    <label name="sex" id="sex" class="control-label" required>Sexe</label>
                                                    <select name="sex" class="form-control custom-select" required>
                                                        <option value=""></option>
                                      <option value="H">Homme</option>
                                     <option value="F">Femme</option>
                                                    </select>
                                                    </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Date de naissance</label>
                                                    <input name="dateb" type="date" class="form-control" placeholder="dd/mm/yyyy" required="true">
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
                                                    <label class="control-label">Family state</label>
                                                    <select type="text" name="familys"class="form-control "  required>
                                                        <option value="Célibataire sans enfant(s)">Célibataire sans enfant(s)</option>
                                                        <option value="Marié(e) avec enfant(s)">Marié(e) avec enfant(s)</option>
                                                        <option value="Marié(e) avec enfant(s)">Marié(e) avec enfant(s)</option>
                                                        <option value="Célibataire avec enfant(s)">Célibataire avec enfant(s)</option>

                                                    </select>

                                                </div>
                                            </div>
                                            <!--/span-->
                                               <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Groupe Sanguin</label>
                                                <select name="sang" class="form-control custom-select">
                                                    <option value=""></option>
                                      <option value="A+">A+</option>
                                     <option value="O">O</option>
                                       <option value="B+">B+</option>
                                     <option value="O+">O+</option>
                                       <option value="A-">A-</option>
                                     <option value="O">O</option>
                                       <option value="B-">B-</option>
                                     <option value="AB">AB</option>
                                                    </select>
                                        
                                                </div>
                                            <!--/span-->
                                        </div></div>
                                        <!--/row-->

                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <textarea type="text" name="Address" class="form-control" required maxlength="150"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone number</label>
                                                    <input name="phone" type="text" class="form-control"  maxlength="12">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6 ">
                                                <div class="form-group h">
                                                
                                                    <label name="tail" class="control-label">taille(Cm)</label>
                                                     <input class="form-control" type="number"  name="tch3">

                                                </div>
                                            </div>
                                       
                                        
                                            <!--/span-->
                                        </div>
                                    </div>
                                    <div class="container">
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Enregistrer</button>
                                        <button type="reset" class="btn btn-danger">Cancel</button>
                                   </div> </div>
                                </form>
                            </div>
                        </div>
                </div></div></div>
@stop