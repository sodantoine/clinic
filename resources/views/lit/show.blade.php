@extends('layouts.default')

@section('content')
    <div style="margin-left: 250px; margin-top: 12px">
        <div class="col-md-11 align-center">

                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white"><span>Code Chambre:</span>{{$chambre->id}} </h4>
                    </div>

                        <form action="{{route('produit.update')}}" method="POST" class="form-horizontal form-material" >
                            {{csrf_field()}}
                            <div class="form-group">


                                    <input type="text" name="prod" class="form-control" required  placeholder="Entrer le Nom">
                                </div>

                                <div class="form-actions">
                                    <div class="col-md-6">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>

                                    </div></div>
                            </form>

                    </div>
                </div>
            </div></div></div>
@stop