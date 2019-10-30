@extends('layouts.default')

@section('content')
    
    <div class="container" style="margin-top:90px">
        <h1 class="font-weight-bold text-blue text-center">Informations personnelles du patient</h1>

    <div class="card card-outline-info" style="margin-top:20px">

        <div class="card-header">
            <h2 class="m-b-0 text-white font-weight-bold">
               Informations patient
            </h2>
        </div>
        <div class="card-body">

            <form action="{{route('patient.update',$patients)}} " method="POST" >
               {{csrf_field()}}
               {{method_field('PUT')}}
               @include('patient.form',['Save'=>'Modifier'])

            </form>
        </div>
    </div>
    </div>
@stop
