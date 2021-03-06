@extends('layouts.default')

@section('content')
<main>
    <div class="container" style="margin-top: 80px">
        <h1 class="text-center text-blue font-weight-bold">Soin patient</h1>
    </div>
    <div class="container">
         @if(session()->has('message'))

                        <div class="alert alert-danger">
                            {{ session()->get('message')}}
                        </div>
                         
        @endif
        @if (session('status'))
                        <div class="alert alert-danger">
                           {{ session('status') }}
                        </div>
        @endif
    </div>
    <div class="row">

            <div class="col-md-8" style="margin-top: 12px" >
                
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h2 class="m-b-0 text-white font-weight-bold">Soin à {{$patient->last_name}} {{$patient->first_name}}</h2>
                    </div>
                   
                    <div class="card-body">
                        
                        <div class="form-body">
                            <h3 class="card-title">Entrez les produits à prescrire</h3>
                            <hr>

                 <form action="{{route('soin.store')}}" method="POST" onsubmit="return confirm('Voulez -vous valider  cet ordonnance') ">
                    {{csrf_field()}}
                    <div class="table-responsive m-t-40" id="app">

                        <table id="ordona" class="table display table-bordered table-striped">
                            <thead>
                                <tr> 
                                    <th>#</th>                        
                                    <th>Produit </th>
                                    <th>Quantité</th>
                                    <th>Posologie </th>
                                    <th>Supprimer</th>
                                </tr>
                            </thead>

                            <tbody id="tab">
                                <tr>
                                    <td > 
                                        <input type="text" name="id" value="{{$patient->id}}" hidden="true" /> 
                                    </td>
                                    <td > 
                                        <input type="text" class="form-control" name="prod1" required/> 
                                    </td>
                                    <td > 
                                        <input type="text" name="quant1" class="form-control" required="" /> 
                                    </td>
                                    <td > 
                                       <textarea type="text" name="poso1" class="form-control" required></textarea> 
                                    </td>
                                    <td > 
                                       <input type="button" class="btn btn-danger" value="supprimer"/>
                                    </td>
                                </tr>
                                              
                            </tbody>
                        </table>
                    </div>

                    <hr>

                    <div class="container m-t-40">
                        <input class="btn btn-info" type="button" value="Ajouter un nouveau produit" onclick="ajout();">
                                    
                        <input class="btn btn-success" type="submit" value="Prescrire">
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4" style="margin-top: 12px" >

        <div class="card card-outline-info">
                    <div class="card-header">
                        <h2 class="m-b-0 text-white font-weight-bold">Soins prescrits</h2>
                    </div>
                   
                    <div class="card-body">
                        
                        <div class="form-body">
                            
                            <div class="table-responsive m-t-40">
                                @isset($patient->soins)
                                    @foreach($patient->soins as $soin)
                                        <h5 class="font-weight-bold">Date de prescription <span class="text-blue">{{$soin->created_at}}</span></h5>
                                        <br/>
                                        <table id="ordona" class="table display table-bordered table-striped">
                                            <thead>
                                                <tr>                    
                                                    <th>Produit </th>
                                                    <th>Quantité</th>
                                                    <th>Posologie </th>
                                                </tr>
                                            </thead>

                                            <tbody >
                                
                                                @foreach($soin->prescrire as $pres)
                                                <tr>
                                
                                                    <td > 
                                                        <span>{{$pres->produit}}</span> 
                                                    </td>
                                                    <td > 
                                                        <span>{{$pres->quantite}}</span>
                                                    </td>
                                                    <td > 
                                                        <span>{{$pres->posologie}}</span> 
                                                    </td>
                                    
                                                </tr>
                                                @endforeach
                                
                                              
                                            </tbody>
                                        </table>
                                    @endforeach
                                @endisset

                                @if(count($patient->soins)==0)
                                    <h3 class="text-center">Aucun produit prescrit auparavant !</h3>
                                @endif
                               
                        
                            </div>
                
                        </div>
                    </div>
        </div>
    </div>
        
</div>
</main>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
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
    <script src="../js/prescription2.js"></script>
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
        var i=1;
function ajout(){
                i++;
                var ajt=document.getElementById("tab");
                var tr=document.createElement("tr");
                tr.setAttribute("id",i);
                var ordon=document.createElement("td");
                var produit=document.createElement("td");
                var quantite=document.createElement("td");
                var posologie=document.createElement("td");
                var supprimer=document.createElement("td");
                var produitcompo=document.createElement("input");
                var quantitecompo=document.createElement("input");
                var posologiecompo=document.createElement("textarea");
                var supprimercompo=document.createElement("input");
                var ordoncompo=document.createElement("input");
                //produit compo
                produitcompo.setAttribute("class","form-control");
                produitcompo.setAttribute("name","prod"+i);
                produitcompo.setAttribute("required","true");

                //quantite compo
                quantitecompo.setAttribute("class","form-control");
                quantitecompo.setAttribute("name","quant"+i);
                quantitecompo.setAttribute("required","true");
                //quantite compo
                posologiecompo.setAttribute("class","form-control");
                posologiecompo.setAttribute("name","poso"+i);
                posologiecompo.setAttribute("required","true");
                //supprimer compo
                supprimercompo.setAttribute("class","btn btn-danger");
                supprimercompo.setAttribute("type","button");
                supprimercompo.setAttribute("value","supprimer");
                supprimercompo.setAttribute("onclick","supprimer("+i+")");
                //ordonnance compo
                ordoncompo.setAttribute("hidden","false");
                ordoncompo.setAttribute("type","text");
                ordoncompo.setAttribute('value','');
                        
                //ajout d'elements
                produit.appendChild(produitcompo);
                quantite.appendChild(quantitecompo);
                posologie.appendChild(posologiecompo);
                supprimer.appendChild(supprimercompo);
                ordon.appendChild(ordoncompo);
                tr.appendChild(ordon);
                tr.appendChild(produit);
                tr.appendChild(quantite);
                tr.appendChild(posologie);
                tr.appendChild(supprimer);
                ajt.appendChild(tr);
                
                
         }
        function supprimer(id){
            if(i>1){
                var elemtId=document.getElementById(id);
                var elemtId2=elemtId.parentNode;
                elemtId.parentNode.removeChild(elemtId);  
                i--;
            }
        }
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
        $('#presc').DataTable({
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