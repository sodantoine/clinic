@extends('layouts.default')

@section('content')
<div class="container" style="margin-top: 80px">

   <h1 class="text-blue font-weight-bold text-center">Constante patient</h1>
</div>

                    
<div class=" container-fluid row">
    <div class="col-md-6">
                    <div class="card card-outline-info m-t-10">
                            <div class="card-header">
                                <h2 class="m-b-0 text-white font-weight-bold">Nouvelle constante de {{$patient->last_name}} {{$patient->first_name}}</h2>
                            </div>
                            <div class="card-body">
                                <form action="{{route('constante.store')}}" method="POST" onsubmit="return confirm('Voulez -vous enregister ?') ">
                                         {{csrf_field()}}
                                    <div class="form-body">
                                        <h3 class="card-title">Constante</h3>
                                        <hr>
                                        <div class="row p-t-20" >
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                 
                                                    <label class="control-label">Temparature °C</label>
                                                 <input id="tch7" type="number" value="37" name="temp" class="form-control" required>

                                                    </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6" >
                                                <div class="form-group ">
                                                 
                                                    <label class="control-label">poids (Kg)</label>
                                                   <input class="form-control" type="number" value="" name="tch3_22"  required > 
                                                 </div>


                                            </div>
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Tension bras droit</label>
                                                <input id="tch6" type="number" value="30" name="tch3_22_2" class="form-control" required>
                                                </div>
                                            </div>
                                              <div class="col-md-6">
                                                <div class="form-group" >
                                                    <label class="control-label">Tension bras gauche</label>
                                                     <input id="tch7" type="number" value="" name="tch3_22_22" class="form-control" required>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Pouls</label>
                                                    <input id="tch8" type="number" value="0" name="tch34" class=" form-control"  required> </div>

                                                       
                                                
                                                </div>
                                                <div class="col-md-6">
                                                  <input name="pati" type="hidden" value="{{$patient->id}}"
                                                </div>
                                            <!--/span-->
                                        </div>
                                            
                                            <!--/span-->
                                        </div>
                                        <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i>Enregistrer</button>
                                        <button type="reset" class="btn btn-danger">Annuler</button>
                                            </div>
                                        </div>
                                        <!--/row-->
                                    
                                        
                                        
                                </div>
                                        
                                       
                                            <!--/span-->
                                     </div>
                                        
                                            
                                            <!--/span-->
                                               
                                         
                                            <!--/span-->
                                           
                                </form>
                            </div>
                        </div>
                </div>
                <div class="col-md-6 m-t-10">
                    <div class="card card-outline-info">
                    <div class="card-header">
                        <h2 class="m-b-0 text-white font-weight-bold">Constantes prises</h2>
                    </div>
                   
                    <div class="card-body">
                        
                        <div class="form-body">
                            @if($patient->constantes->count()>0)           
                                        <table id="ordona" class="table display table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>                    
                                                    <th>Température</th>
                                                    <th>Poids</th>
                                                    <th>Tension bras gauche </th>
                                                    <th>Tension bras droit </th>
                                                    <th>Pouls </th>
                                                </tr>
                                            </thead>

                                            <tbody >
                                
                                                @foreach($patient->constantes as $constante)
                                                <tr>
                                
                                                    <td > 
                                                        <span class="text-blue font-weight-bold">{{$constante->created_at}}</span> 
                                                    </td>
                                                    <td > 
                                                        <span>{{$constante->temparature}}</span>
                                                    </td>
                                                    <td > 
                                                        <span>{{$constante->poids}}</span> 
                                                    </td>
                                                    <td > 
                                                        <span>{{$constante->tension_bras_droit}}</span> 
                                                    </td>
                                                    <td > 
                                                        <span>{{$constante->tension_bras_gauche}}</span> 
                                                    </td>
                                                    <td > 
                                                        <span>{{$constante->pouls}}</span> 
                                                    </td>
                                    
                                                </tr>
                                                @endforeach
                                
                                              
                                            </tbody>
                                        </table>
                                        @else
                                           <h3 class="text-center">Aucune constante prise auparavant !</h3>
                                        @endif
                                    </div>
                                </div>
                                
                            </div>


                        </div>
                        

                        
                               
                    
                </div>
            
@stop