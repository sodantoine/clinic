@extends('layouts.default')

@section('content')
   

        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row">
            <div class="col-12">
               <br/><br/>
                <div id="code1" class="collapse">
                    <div class="highlight">
                                <pre>
     <code><span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"card"</span> <span class="na">style=</span><span class="s">"width: 20rem;"</span><span class="nt">&gt;</span>
      <span class="nt">&lt;img</span> <span class="na">class=</span><span class="s">"card-img-top"</span> <span class="na">src=</span><span class="s">"..."</span> <span class="na">alt=</span><span class="s">"Card image cap"</span><span class="nt">&gt;</span>
      <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"card-body"</span><span class="nt">&gt;</span>
        <span class="nt">&lt;h4</span> <span class="na">class=</span><span class="s">"card-title"</span><span class="nt">&gt;</span>Card title<span class="nt">&lt;/h4&gt;</span>
        <span class="nt">&lt;p</span> <span class="na">class=</span><span class="s">"card-text"</span><span class="nt">&gt;</span>Some quick example text to build on the card title and make up the bulk of the card's content.<span class="nt">&lt;/p&gt;</span>
        <span class="nt">&lt;a</span> <span class="na">href=</span><span class="s">"#"</span> <span class="na">class=</span><span class="s">"btn btn-primary"</span><span class="nt">&gt;</span>Go somewhere<span class="nt">&lt;/a&gt;</span>
      <span class="nt">&lt;/div&gt;</span>
    <span class="nt">&lt;/div&gt;</span></code>
</pre>
                    </div>
                </div>
                <!-- Row -->
                
                <div class="row">
                    <!-- column -->
                    <div class="col-lg-3 col-md-6" style="text-align: center">
                        <!-- Card -->
                        <div class="card">
                            <a href="{{route('patient.index')}}" class="btn btn-primary">  Patients</a>   <img class="card-img-top img-responsive" src="../assets/images/item3.jpg" alt="Card image cap">

                        </div>
                        <!-- Card -->
                    </div>
                    <!-- column -->
                    <!-- column -->
                    <div class="col-lg-3 col-md-6">
                        <!-- Card -->
                        <div class="card">
                            <a href="{{route('consultation.create')}}" class="btn btn-primary">  Consultations </a>  <img class="card-img-top img-responsive" src="../assets/images/item1.jpg" alt="Card image cap">

                        </div>
                        <!-- Card -->
                    </div>
                    <!-- column -->
                    <!-- column -->
                    <div class="col-lg-3 col-md-6">
                        <!-- Card -->
                        <div class="card">
                            <a href="{{route('rendez_vous.create')}}" class="btn btn-primary"> Rendez-vous</a>  <img class="card-img-top img-responsive" src="../assets/images/item2.jpg" alt="Card image cap">

                        </div>
                        <!-- Card -->
                    </div>
                    <!-- column -->
                    <!-- column -->
                    <div class="col-lg-3 col-md-6 img-responsive">
                        <!-- Card -->
                        <div class="card">
                            <a href="{{route('ordonance.create')}}" class="btn btn-primary"> Ordonances</a>      <img class="card-img-top img-responsive" src="../assets/images/item2.jpg" alt="Card image cap">

                        </div>
                        <!-- Card -->


                    </div>
                    <!-- column -->
                </div>
                <!-- Row -->
            </div>
        </div>
        <hr style="background-color: #002a80">
        <hr>
        <br/>
        <div class="row">
            <div class="col-12">

                <div id="code1" class="collapse">
                    <div class="highlight">
                                <pre>
     <code><span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"card"</span> <span class="na">style=</span><span class="s">"width: 20rem;"</span><span class="nt">&gt;</span>
      <span class="nt">&lt;img</span> <span class="na">class=</span><span class="s">"card-img-top"</span> <span class="na">src=</span><span class="s">"..."</span> <span class="na">alt=</span><span class="s">"Card image cap"</span><span class="nt">&gt;</span>
      <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"card-body"</span><span class="nt">&gt;</span>
        <span class="nt">&lt;h4</span> <span class="na">class=</span><span class="s">"card-title"</span><span class="nt">&gt;</span>Card title<span class="nt">&lt;/h4&gt;</span>
        <span class="nt">&lt;p</span> <span class="na">class=</span><span class="s">"card-text"</span><span class="nt">&gt;</span>Some quick example text to build on the card title and make up the bulk of the card's content.<span class="nt">&lt;/p&gt;</span>
        <span class="nt">&lt;a</span> <span class="na">href=</span><span class="s">"#"</span> <span class="na">class=</span><span class="s">"btn btn-primary"</span><span class="nt">&gt;</span>Go somewhere<span class="nt">&lt;/a&gt;</span>
      <span class="nt">&lt;/div&gt;</span>
    <span class="nt">&lt;/div&gt;</span></code>
</pre>
                    </div>
                </div>
                <!-- Row -->
                <div class="row">
                    <!-- column -->
                    <div class="col-lg-3 col-md-6">
                        <!-- Card -->
                        <div class="card">
                            <a href="{{route('patient.index')}}" class="btn btn-info " data-toggle="modal" data-target="#new-produit" > Nouveau Produit</a>    <img class="card-img-top img-responsive" src="../assets/images/big/img1.jpg" alt="Card image cap"></a>
                            <div class="card-body">

                                <div id="new-produit" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Nouveau Produit</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('produit.store')}}" method="POST" class="form-horizontal form-material" >
                                                    {{csrf_field()}}
                                                    <div class="form-group">
                                                        <div class="col-md-12 m-b-20">

                                                            <input type="text" name="prod" class="form-control" required data-validation-required-message="This field is required" placeholder="Entrer le Nom">
                                                            </div>
                                                        <div class="form-actions">
                                                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                                            <button type="button" class="btn btn-inverse">Cancel</button>
                                                        </div>
                                                    </div></form>

                                            </div>

                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                            </div>
                            </div>

                        <!-- Card -->
                    </div>
                    <!-- column -->
                    <!-- column -->
                    <div class="col-lg-3 col-md-6">
                        <!-- Card -->
                        <div class="card">
                            <a href="{{route('consultation.index')}}" class="btn btn-info " data-toggle="modal" data-target="#new-chambre"> Nouvelle chambre</a>   <img class="card-img-top img-responsive" src="../assets/images/big/img2.jpg" alt="Card image cap">
                            </a>     <div class="card-body">

                                <div id="new-chambre" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Nouvelle Chambre</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('chambre.store')}}" method="POST" class="form-horizontal form-material" >
                                                    {{csrf_field()}}
                                                    <div class="form-group">
                                                        <div class="col-md-12 m-b-20">

                                                            <input type="text" name="chamb" class="form-control" required data-validation-required-message="This field is required" placeholder="Entrer le Nom">
                                                        </div>
                                                        <div class="form-actions">
                                                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                                            <button type="button" class="btn btn-inverse">Cancel</button>
                                                        </div>
                                                    </div></form>

                                            </div>

                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>

                            </div>
                        </div>
                        <!-- Card -->
                    <!-- column -->

                    <!-- column -->

                            <!-- Card -->

                            <!-- column -->
                    </div>
                    <!-- column -->
                    <!-- column -->
                    <div class="col-lg-3 col-md-6 img-responsive">
                        <!-- Card -->
                        <div class="card">
                            <a href="{{route('hospitalisation.create')}}" class="btn btn-primary">  Hospitalisation</a>     <img class="card-img-top img-responsive" src="../assets/images/hos.jpg" alt="Card image cap">

                        </div></div>
                        <!-- Card -->
                    <div class="col-lg-3 col-md-6 img-responsive">
                        <!-- Card -->
                        <div class="card">
                            <a href="{{route('lit.create')}}" class="btn btn-primary"> Nouveau Lit</a>      <img class="card-img-top img-responsive" src="../assets/images/big/img4.jpg" alt="Card image cap">

                        </div></div>
                    <!-- column -->
                </div>
                <!-- Row -->

            </div>
        </div>
    </div>
@endsection
