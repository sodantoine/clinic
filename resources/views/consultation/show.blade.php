@extends('layouts.default')

@section('content')

<div class="container" style="margin-top: 80px">

   <h1 class="text-blue font-weight-bold text-center">Consultation patient</h1>
</div>
 
<div class=" container-fluid row">
    <div class="col-md-6">
                    <div class="card card-outline-info m-t-10">
                            <div class="card-header">
                                <h2 class="m-b-0 text-white font-weight-bold">Consultation de {{ $patient->last_name}} {{$patient->first_name}}</h2>
                            </div>
                            <div class="card-body">
                                <form action="{{route('consultation.store')}}" method="POST">
                                     {{csrf_field()}}
                                    <div class="form-body">
                                        <h3 class="card-title">Consultation</h3>
                                        <hr>
                                        <div class="container-fluid p-t-20 ">
                                           <small class="form-control-feedback">    Obligatoire (*)
                                            </small>
                                            <label class="control-label">Motif</label>
                                           <input type="text" name="motif" class="form-control " required="true" />
                                           
                                        </div>
                                        <div class="container-fluid p-t-20  ">
                                            <!--/span-->
                                          
                                                <div class="form-group ">
                                                  <small class="form-control-feedback">Obligatoire (*)</small>
                                                    <label class="control-label">Observations</label>
                                                    <textarea name="obs" class="form-control form" type="text" required ></textarea>
                                                   </div>
                                            
                                            <!--/span-->
                                        </div>
                                            <!--/span-->
                                        
                                        <!--/row-->
                                        <div class="container-fluid p-t-20  ">
                                           <h5 class="box-title">Diagnostic</h5>
                                           <input type="text" name="public" class="form-control"/>
                                           <input name="pati" value="{{$patient->id}}" type="hidden" class="form-control" >
                                        </div>
                                        <br/>
                                                                                 
                                            <!--/span-->
                                     </div>
                                        

                                    <div class="container-fluid">
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Enregistrer</button>
                                        <button type="reset" class="btn btn-danger">Annuler</button>
                                   </div> </div>
                                </form>
                            </div>
                        </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-outline-info m-t-10">
                    <div class="card-header">
                        <h2 class="m-b-0 text-white font-weight-bold">Consultations précédents</h2>
                    </div>
                   
                    <div class="card-body">
                        
                        <div class="form-body">
                            @if($patient->consultations->count()>0)           
                                        <table id="ordona" class="table display table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Date consultation</th>                    
                                                    <th>Motif</th>
                                                    <th>Observation</th>
                                                    <th>Diagnostic</th>
                                                </tr>
                                            </thead>

                                            <tbody >
                                
                                                @foreach($patient->consultations as $consultation)
                                                <tr>
                                
                                                    <td > 
                                                        <span class="text-blue font-weight-bold">{{$consultation->created_at}}</span> 
                                                    </td>
                                                    <td > 
                                                        <span>{{$consultation->motif}}</span>
                                                    </td>
                                                    <td > 
                                                        <span>{{$consultation->observation}}</span> 
                                                    </td>
                                                    <td > 
                                                        <span>{{$consultation->diagnostic}}</span> 
                                                    </td>
                                                    
                                    
                                                </tr>
                                                @endforeach
                                
                                              
                                            </tbody>
                                        </table>
                                        @else
                                            <h3 class="text-center">Pas de consultations précédents !</h3>
                                         @endif
                                    </div>
                                </div>
                               
                            </div>


                        </div>
                </div>
@stop