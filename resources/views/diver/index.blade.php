@extends('layouts.default')
@section('content')

    <div >
        <div class=" align-center" >
            <div class="container" style=" margin-top: 80px">
                <h1 class="font-weight-bold text-blue text-center">Traitements éffectués</h1>
            </div>

            <!-- ============================================================== -->
            <div class="row">
                <div class="col-12">


                    <div class="card card-outline-info">

                        <div class="card-body">
                            <div class="card-header">
                                <h2 class="m-b-0 text-white font-weight-bold"><span>Traitements éffectués au patient </span> {{$patient->last_name}}  {{$patient->first_name}}</h2>
                            </div>
                <div class="table-responsive m-t-40">
                                 <h3 class="text-blue text-center">Constantes</h3>
                        @if($patient->constantes->count()>0)
                                <table id="example23" class="table display table-bordered table-striped">
                                <thead>
                               <tr>
                                <th>Date de prise</th>
                                <th>Temparature</th>
                                <th>Poids</th>
                                <th>Tension Bras Droit</th>
                                <th>Tension Bras Gauche</th>
                                <th>Pouls</th>
                                
                            
                            

                            </tr>
                            </thead>

                            <tbody>
                                
                            
                                @foreach($patient->constantes as $constante)
                                <tr>

                                    <td class="center">{{$constante->created_at}}</td>
                                    <td>{{$constante->temparature}}</td>
                                    <td>{{$constante->poids}}</td>
                               
                                    <td class="center">{{$constante->tension_bras_droit}}</td>
                                    <td>{{$constante->tension_bras_gauche}}</td>
                                    <td class="center">{{$constante->pouls}}</td>
                                    
                                    
                                  
                                </tr>
                                @endforeach
                               
                            </tbody>
                        </table>
                        @else
                            <h2 class="text-center">Aucune constante prise auparavant !</h2>
                        @endif
                        <h3><a href="{{route('constante.show',$patient->id)}}">Ajouter une nouvelle constante</a></h3>
                  </div>
                  <hr>
                            <div class="table-responsive m-t-40">
                                 <h3 class="text-blue text-center">Consultations</h3>
                        @if($patient->consultations->count()>0)
                                <table id="example23" class="table display table-bordered table-striped">
                                <thead>
                               <tr>
                                <th>Date de prise</th>
                                <th>Motif</th>
                                <th>Observations</th>
                                <th>Diagnostic</th>
                            </tr>
                            </thead>

                            <tbody>
                                
                            
                                @foreach($patient->consultations as $consultation)
                                <tr>

                                    <td class="center">{{$consultation->created_at}}</td>
                                    <td>{{$consultation->motif}}</td>
                                    <td>{{$consultation->observations}}</td>
                               
                                    <td class="center">{{$consultation->diagnostic}}</td>                                             
                                </tr>
                                @endforeach
                               
                            </tbody>
                        </table>
                        @else
                            <h2 class="text-center">Aucune consultation éffectuée auparavant !</h2>
                        @endif

                        <h3><a href="{{route('consultation.show',$patient->id)}}">Ajouter une nouvelle consultation</a></h3>
                    </div>
                    <hr>
                    
                    <div class="table-responsive m-t-40">
                        <h3 class="text-blue text-center">Soins</h3>
                        @if($patient->soins->count()>0)
                        @foreach($patient->soins as $soin)
                        <h3 class="font-weight-bold"><a href="">{{$soin->created_at}}</a></h3>
                        <table id="example23" class="table display table-bordered table-striped">
                            <thead>
                            <tr>
                               
                                <th>Produit</th>
                                <th>Quantite</th>                               
                                <th>Posologie</th>
                               
                            </tr>
                            </thead>

                            <tbody>
                           
                                @foreach($soin->prescrire as $pres)
                                <tr>

                                    <td>{{$pres->produit}}</td>
                                    <td>{{$pres->quantite}}</td>
                               
                                    <td>{{$pres->posologie}}</td>                                             
                                </tr>
                                @endforeach
                               
                                
                            </tbody>
                        </table>
                        @endforeach
                        @else
                            <h2 class="text-center">Aucun soin éffectué auparavant !</h2>
                        @endif
                        <h3><a href="{{route('soin.edit',$patient->id)}}">Ajouter un nouveau soin</a></h3>

                    </div>
                    <hr style="color: black">
                    
                    <div class="table-responsive m-t-40">
                        <h3 class="text-blue text-center">Ordonnances</h3>
                        @if($patient->ordonnances->count()>0)
                        @foreach($patient->ordonnances as $ordonnance)
                        <h3 class="font-weight-bold">
                            <a href=""> {{$ordonnance->created_at}}</a></h3>
                        <table id="example23" class="table display table-bordered table-striped">
                            <thead>
                            <tr>
                               
                                <th>Produit</th>
                                <th>Quantite</th>                               
                                <th>Posologie</th>
                               
                            </tr>
                            </thead>

                            <tbody>
                           
                                @foreach($ordonnance->prescrire as $pres)
                                <tr>

                                    <td>{{$pres->produit}}</td>
                                    <td>{{$pres->quantite}}</td>
                               
                                    <td>{{$pres->posologie}}</td>                                             
                                </tr>
                                @endforeach
                               
                                
                            </tbody>
                        </table>
                        @endforeach
                        @else
                            <h2 class="text-center">Aucune ordonnance établie auparavant !</h2>
                        @endif
                        <h3><a href="{{route('prescrire.show',$patient->id)}}">Ajouter une nouvelle ordonnance</a></h3>

                    </div>
                    </div>
                    </div>
                </div>
            </div>

        </div>
    

    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->

    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/plugins/bootstrap/js/popper.min.js"></script>

    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="../assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- This is data table -->
    <script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
            $(document).ready(function() {
                var table = $('#example').DataTable({
                    "columnDefs": [{
                        "visible": false,
                        "targets": 2
                    }],
                    "order": [
                        [2, 'asc']
                    ],
                    "displayLength": 25,
                    "drawCallback": function(settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;
                        api.column(2, {
                            page: 'current'
                        }).data().each(function(group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                                last = group;
                            }
                        });
                    }
                });
                // Order by the grouping
            });
        });
        $('#cons_list').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    </script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->


@stop