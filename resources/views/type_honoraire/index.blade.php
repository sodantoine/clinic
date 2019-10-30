@extends('layouts.default')

@section('content')
    <div style="margin-left: 250px; margin-top: 12px">
        <div class="col-md-11 align-center">

<br/>
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Types Honoraires</h4>
                    </div>




                                <table id="typeh" class="table display table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th><i class="fa fa-trash-o"></i> </th>
                                        <th><i class="fa fa-pencil"></i> </th>
                                        <th >#</th>
                                        <th>Libelle </th>
                                        <th>Prix</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($type_honoraires as $type_honoraires )
                                        <tr>
                                            <td>
                                                <form action="{{route('type_honoraire.destroy',$type_honoraires)}} "
                                                      method="POST"
                                                      onsubmit="return confirm('Voulez -vous supprimer') " >
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}
                                                    <button type="submit" class="text-danger" ><i class="fa fa-trash-o"></i> </button>
                                                </form>
                                            </td>
                                            <td><a href="{{route('type_honoraire.edit',$type_honoraires)}}"><button type="submit" ><i class="fa fa-pencil "></i> </button>  </a></td>

                                            <td>{{$type_honoraires->id}}</td>
                                            <td>{{$type_honoraires->libelle}}</td>
                                            <td>{{$type_honoraires->prix}}</td>


                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                </div>


            </div>
        </div></div></div>
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
        $('#typeh').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });

    </script>
@stop