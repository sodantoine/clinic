@extends('layouts.default')

@section('content')
    <div class="row">
        <div id="divID" class="container-fluid">
            <div class="card card-outline-info">

                <div class="card-header">
                    <h4 class="m-b-0 text-white">
                        Clinique la Merveille <span style="margin-left: 450px">{{$date}}</span>
                    </h4>
                        
                </div>
                <div class="card-body">
                       
                    <div class="form-body">
                        <h4 style="font-family: fontawesome" >
                            Nom:    <span style="color: red">{{$patient->first_name}}</span>    <br/>
                            Prénoms: <span style="color: red">{{$patient->last_name}}</span><br/>

                        </h4>
                        <hr>
    
                    </div>
                    <div class="card-body">
                   
                        <div class="table-responsive m-t-40">
                            <table  class="table display table-bordered table-striped">

                                <thead>
                                    <tr>
                                
                                        <th> Produit(s)</th>
                                        <th> Quantité(s)</th>
                                        <th> Posologie(s)</th>
                                    </tr>
                                </thead>

                                <tbody>
                                
                                    @foreach($prescription as $prescrie)
                                    <tr>

                                        <td>{{$prescrie->produit}}</td>
                                        <td>{{$prescrie->quantite}}</td>
                                        <td>{{$prescrie->posologie}}</td>                                                                          
                                    </tr>
                                    @endforeach
                                 </tbody>
                            </table>
                        </div>
                   
                    </div>

                </div>
                <div style=" font-family: 'MS Gothic';font-size: 25px;color: blue" class="text-center"> Bonne guérison!!!!!! 
                </div>

            </div>
        </div>
        <div class="container">
            <input class="btn btn-dark" type="submit" onclick="printdiv('divID');" value="Imprimer">
            <a href="{{route('ordonance.create')}}"><input class="btn btn-dark" type="button" value="Retour"></a>
        </div>
       

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
                $('#example tbody').on('click', 'tr.group', function() {
                    var currentOrder = table.order()[0];
                    if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                        table.order([2, 'desc']).draw();
                    } else {
                        table.order([2, 'asc']).draw();
                    }
                });
            });
        });
        $('#example23').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
        $('#ordona').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    </script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>

@stop