@extends('layouts.default')

@section('content')


<div class="container" style="margin-top: 80px">
    <h1 class="text-blue text-center font-weight-bold"> Prescrire un soin</h1>
</div>

<div class="container-fluid">
        @if (session('status'))
                        <div class="alert alert-success">
                           {{ session('status') }}
                        </div>
        @endif
</div>

<div class="row">
    
    
    <div class="col-12">

        <div class="card card-outline-info">

            <div class="card-body">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Liste de Patients!!!!!</h4>
                </div>
                <div class="table-responsive ">
                    <table id="example23" class="table display table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom prenoms</th>
                            <th>Date d'arrivée</th>
                            <th>Sexe</th>
                            <th>Date de naissance</th>
                            <th>Addresses</th>
                            <th>Numero</th>
                            <th>Situation familiale</th>

                            <th>Ordonancer</th>

                        </tr>
                        </thead>

                        <tbody>
                            @foreach($patients as $patient)
                        <tr>
             
                               {{csrf_field()}}
                                <td >
                                    <input value="{{$patient->id}}" type="hidden" name="id_pat">
                                </td>
                                <td >
                                    <span class="text-blue font-weight-bold">{{$patient->last_name}} {{$patient->first_name}}</span>
                                </td>
                                <td>
                                    <span class="text-blue font-weight-bold">
                                        {{$patient->created_at}}
                                    </span>
                                </td>
                                <td class="center">{{$patient->sex}}</td>
                                <td class="center">{{$patient->date_of_birth}}</td>
                                <td>{{$patient->address}}</td>
                                <td>{{$patient->phone_number}}</td>
                                <td>{{$patient->family_state}}</td>
                                <td>
                                    <a href="{{route('soin.edit',$patient)}}">
                                        <button type="submit" class="btn btn-info" >soin</button>
                                    </a>
                                </td>
                    
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
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
</script>
<!-- ============================================================== -->
<!-- Style switcher -->
<!-- ============================================================== -->
<script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>



@stop