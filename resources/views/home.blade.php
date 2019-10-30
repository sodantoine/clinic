@extends('layouts.default')

@section('content')
   
        <div class="container-fluid" style="margin-top: 80px">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
         
                @if(session()->has('message'))

                    <div class="alert alert-success">
                        {{ session()->get('message')}}
                    </div>

                @endif
        </div>


        <div class="container " style="margin-top: 10px">
            <h1 class="text-blue font-weight-bold text-center"><bold>Centre de santé la merveille</bold></h1>
        </div>

        <div class="container">
            <hr style="margin-top: 70px;margin-bottom:30px"/>
        </div>

        <div class="container-fluid">

                <!-- Row -->
            <div class="row " >
                    <!-- column -->
                <div class="col-lg-3 col-md-3 text-center" style="text-align: center">
                        <!-- Card -->
                       
                    <p>
                        <a href="{{route('patient.index')}}" class=" font-weight-bold">  <img class="card-img-top img-responsive img-circle" src="../assets/images/item3.jpg" alt="Card image cap"><span>Patients</span></a>
                    </p> 

                        
                        <!-- Card -->
                </div>
                    <!-- column -->
                    <!-- column -->
                <div class="col-lg-3 col-md-3 text-center">
                        <!-- Card -->
                    
                    <p>
                        <a href="{{route('consultation.create')}}" class=" font-weight-bold">  <img class="card-img-top img-responsive img-circle" src="../assets/images/item1.jpg" alt="Card image cap"><span>Consultations</span> </a>
                    </p>

                        <!-- Card -->
                </div>
                    <!-- column -->
                    <!-- column -->
                <div class="col-lg-3 col-md-3 text-center">
                        <!-- Card -->

                
                    <p><a href="{{route('soin.index')}}" class=" font-weight-bold">
                        <img class="card-img-top img-responsive img-circle" src="../assets/images/item2.jpg" alt="Card image cap"><span> Soins</span></a>
                    </p>

                
                        <!-- Card -->
                </div>
                    <!-- column -->
                    <!-- column -->
                <div class="col-lg-3 col-md-3 text-center">
                        <!-- Card -->
                    
                       
                    <p>
                        <a href="{{route('ordonance.create')}}" class="font-weight-bold"> 
                            <img class="card-img-top img-responsive img-circle" src="../assets/images/item2.jpg" alt="Card image cap">Ordonances</a>
                    </p>   

                    
                        <!-- Card -->


                </div>
                <!-- Row -->
            </div>
        </div>
        <div class="container m-t-3 text-center">
            <hr style="margin-top: 30px;margin-bottom:40px"/>
            
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
        
@stop
