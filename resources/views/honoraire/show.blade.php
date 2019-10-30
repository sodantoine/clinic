@extends('layouts.default')

@section('content')
    <div style="margin-left: 250px; margin-top: 12px">
        <div class="col-md-11 align-center">
            <div class="row">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Veuillez remplir les champs obligatoires!!!</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('honoraire.store')}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-body">
                                <h3 class="card-title">Honoraire</h3>
                                <hr>
                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Type Honoraire</label>
                                            <select name="id_typ" type="text" id="dtes"  class="form-control">

                                                @foreach($type_honoraire as $type_honoraire )

                                                    <option value="{{$type_honoraire->id}}">{{$type_honoraire->libelle}}  </option>
                                                @endforeach

                                            </select>
                                        </div></div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label>Montant</label>
                                            <input type="text" name="mnt"  id="qte"  class="form-control" required>
                                        </div>
                                        <!--/span-->
                                    </div>

                                        <!--/span-->
                                    </div>
                                    <!--/span-->
                                    <div class="">

                                        <input name="pat" value="{{$patient->id}}" type="hidden">
                                    </div>
                                    <!--/row-->

                                    <!--/span-->
                                </div>
                                <div class="col-md-5">
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                        <button type="button" class="btn btn-inverse">Cancel</button>
                                    </div> </div>
                        </form>
                    </div>
                </div></div>
            <div class="card-body">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Listes Honoraires</h4>
                </div>
                <div class="table-responsive m-t-40">
                    <table id="ordona" class="table display table-bordered table-striped">
                        <thead>
                        <tr>
                            <th >#</th>
                            <th >#</th>
                            <th >#</th>
                            <th>Montant </th>
                            <th >Reste</th>

                        </tr>
                        </thead>

                        <tbody>

                        @foreach($honoraires as $honoraire )
                            <tr>
                                <form action="{{route('ordonance.store')}}" method="POST">
                                    {{csrf_field()}}
                                    <td >{{ $honoraire->id }}</td></form>
                                    <td>{{$honoraire->id_type_honoraire}}</td>
                                    <td>{{$honoraire->patient_id}}</td>
                                    <td >{{$honoraire->paye}}</td>

                                    <td >{{$honoraire->reste}}</td>



                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div></div></div>
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