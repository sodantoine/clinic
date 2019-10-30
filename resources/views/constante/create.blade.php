@extends('layouts.default')

@section('content')
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Responsive Admin Template" />
    <meta name="author" content="RedstarHospital" />
    <title>Redstar Hospital | Bootstrap Responsive Hospital Admin Template</title>
    <!-- google font -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css" />
  <!-- icons -->
    <link href="../assets/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- bootstrap -->
    
  <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css" rel="stylesheet" type="text/css" />
    <link href="../assets/bootstrap-editable/inputs-ext/address/address.css" rel="stylesheet" type="text/css" />
  <!-- Material Design Lite CSS -->
  <link rel="stylesheet" href="../assets/material/material.min.css">
  <link rel="stylesheet" href="css/material_style.css">
  <!-- Theme Styles -->
    <link href="css/theme_style.css" rel="stylesheet" id="rt_style_components" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/plugins.min.css" rel="stylesheet" type="text/css" />
    <link href="css/responsive.css" rel="stylesheet" type="text/css" />
  <link href="css/theme-color.css" rel="stylesheet" type="text/css" />
    <link href="../assets/summernote/summernote.css" rel="stylesheet">
    <!-- favicon  -->
    <link rel="shortcut icon" href="img/favicon.ico" />
</head>
 <div style="margin-left: 250px; margin-top: 12px">
                     <div class="col-md-11 align-center">
<div class="row">

<h1>le code est:{{$patients->id}}</h1>
                    <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Veuillez remplir les champs obligatoires!!!</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{route('constante.store')}}" method="POST">
                                         {{csrf_field()}}
                                    <div class="form-body">
                                        <h3 class="card-title">Constante</h3>
                                        <hr>
                                        <div class="row p-t-20" >
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                 
                                                    <label class="control-label">Temparature</label>
                                                 <input id="tch7" type="integer" value="37" name="temp" class="form-control" required>

                                                     </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6" >
                                                <div class="form-group h">
                                                 
                                                    <label class="control-label">poids</label>
                                                   <input id="tch44" type="text" value="" name="tch3_22"  required> </div>


                                                   </div>
                                            </div>
                                            
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group h">
                                                
                                                    <label name="tail" class="control-label">taille</label>
                                                     <input id="tch5" type="text"  name="tch3" required class="form-control">

                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Tension bras droit</label>
                                                <input id="tch6" type="text" value="30" name="tch3_22_2" class="form-control" required>
                                                </div>
                                            </div>
                                              <div class="col-md-6">
                                                <div class="form-group" >
                                                    <label class="control-label">Tension bras gauche</label>
                                                     <input id="tch7" type="text" value="" name="tch3_22_22" class="form-control" required>
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
                                                    <label class="control-label">Pouls</label>
                                                    <input id="tch8" type="text" value="0" name="tch34" class=" form-control"  required> </div>

                                                       
                                                
                                                </div>
                                            </div>
                                            <!--/span-->
                                            
                                            <!--/span-->
                                                <div class="col-md-6 ">
                                                <div class="form-group">
                                                    <label>Groupe Sanguin</label>
                                                <select name="sang" class="form-control custom-select">
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
                                        </div>
                                        <!--/row-->
                                    
                                        
                                        
                                  <div>
                                                    <input name="pati" value="{{$patients->id}}" type="text" class="form-control" placeholder="{{$patients->nom}}">
                                                </div>
                                         
                                            <!--/span-->
                                           <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                        <button type="button" class="btn btn-inverse">Cancel</button>
                                   </div> </div></div>
                                </form>
                            </div>
                        </div>
                </div></div></div>
                 <script src="../assets/jquery.min.js" ></script>
    <script src="../assets/popper/popper.js" ></script>
    <script src="../assets/jquery.blockui.min.js" ></script>
  <script src="../assets/jquery.slimscroll.js"></script>
    <!-- bootstrap -->
    <script src="../assets/bootstrap/js/bootstrap.min.js" ></script>
    <script src="../assets/bootstrap-switch/js/bootstrap-switch.min.js" ></script>
    <!-- Common js-->
  <script src="../assets/app.js" ></script>
    <script src="../assets/layout.js" ></script>
  <script src="../assets/theme-color.js" ></script>
  <!-- Material -->
  <script src="../assets/material/material.min.js"></script>
    <script src="../assets/summernote/summernote.js" ></script>
    <script >
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
@stop