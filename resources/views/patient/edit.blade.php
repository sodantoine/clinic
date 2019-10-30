@extends('layouts.default')

@section('content')
    <h2>Editer l' evenement {{$patients->id}} </h2>
    <form action="{{route('patient.update',$patients)}} " method="POST" >
        {{csrf_field()}}
        {{method_field('PUT')}}
        @include('patient.form',['submitButtonText'=>'Modifier un evenement'])
    </form>
@stop