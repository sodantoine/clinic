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
                        <form action="{{route('hospitalisation.store')}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-body">
                                <h3 class="card-title">Hospitalisation</h3>
                                <hr>
                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <small class="form-control-feedback">Obligatoire (*)</small>
                                            <label class="control-label">Motif</label>
                                            <input name="motif" type="text" required class="form-control" >
                                             </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label">Lits</label>
                                            <select name="lit" type="text" id="dtes"  class="form-control">

                                                @foreach($lits as $lit )

                                                    <option value="{{$lit->id}}">{{$lit->lit_nom}} </option>
                                                @endforeach

                                            </select> </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/span-->

                                <!--/row-->
                                <div class="col-lg-12 col-xlg-4">


                                    <input name="pati" value="{{$patient->id}}" type="hidden" class="form-control" >
                                </div>
                                <div class="col-lg-12 col-xlg-4">


                                    <input name="use_id" value="{{ Auth::user()->id }}" type="hidden" class="form-control" >
                                </div>

                                <!--/span-->

                                <!--/span-->
                            </div></div><br/>

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