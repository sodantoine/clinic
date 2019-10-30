@extends('layouts.default')

@section('content')
    <div style="margin-left: 250px; margin-top: 12px">
        <div class="col-md-11 align-center">
<br/><br/>
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Editer un Lit </h4>
                </div>

                <form action="{{route('lit.update',$lit)}}" method="POST" class="form-horizontal form-material" >
                    {{csrf_field()}}
                    {{method_field("PUT")}}
                    <div class="form-group">


                        <input type="text" name="lit" class="form-control" value="{{$lit->lit_nom}}" required>
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