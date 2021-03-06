@extends('layouts.default')

@section('content')
    <div style=" margin-top: 12px">
        <div class=" align-center">

            @if(session()->has('message'))

                <div class="alert alert-danger">
                    {{ session()->get('message')}}
                </div>

        @endif
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-12">

                    <div class="card card-outline-info">

                        <div class="card-body">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Chambres!!!!</h4>
                            </div>
                            <div class="table-responsive m-t-40">
                                <table id="oti" class="table display table-bordered table-striped">
                                    <thead>
                                    <tr>

                                        <th >#</th>
                                        <th>Chambre </th>
                                        <th>Ajouter</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($chambres as $chambre )
                                        <tr><form action="{{route('lit.store')}}" method="POST">
                                                {{csrf_field()}}
                                            <td ><input name="id_chamb" type="hidden" value="{{$chambre->id}}" class="form-control" ></td>
                                            <td>{{$chambre->chambre_nom}}</td>
                                            <td>
                                                <div class="input-group">
                                                    <input name="nom_lit" type="text" class="form-control" placeholder="Nom lit" required>
                                                    <span class="input-group-btn">
                                                            <button class="btn btn-info" type="submit"><i class="fa fa-plus-circle "></i> Lit</button>
                                                </span> </div></form>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white"> Lits!!!!!</h4>
                            </div>
                            <input name="b_print" type="button" onclick="printdiv('divID');" value=" Print " />


                            <div class="table-responsive m-t-40">
                                <div id="divID">
                                <table id="example23" class="table display table-bordered table-striped">
                                     
                                    <thead>

                                    <tr>
                                        <th><i class="fa fa-trash-o"></i> </th>
                                        <th><i class="fa fa-pencil"></i> </th>
                                        <th >#</th>
                                        <th>Chambres </th>
                                        <th>Lits </th>

                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($lits as $lit )
                                        <tr>
                                            <td> <form action="{{route('lit.destroy',$lit)}} "
                                                       method="POST"
                                                       onsubmit="return confirm('Voulez -vous supprimer') " >
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}
                                                    <button type="submit" class="text-danger" ><i class="fa fa-trash-o"></i> </button>
                                                </form></td>
                                            <td><a href="{{route('lit.edit',$lit)}}"><button type="submit" ><i class="fa fa-pencil "></i> </button>  </a></td>
                                                <td >{{$lit->id}}</td>
                                                <td>{{$lit->chambre_id}}</td>
                                                <td>{{$lit->lit_nom}}</td>


                                        </tr>
                                    @endforeach
                                    
                                    </tbody>

                                </table>
                                  </div>
                            </div>

                        </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
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
        $('#oti').DataTable({
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