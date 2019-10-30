<div class="form-body">
  
  <hr>
  <div class="row p-t-20">
    <div class="col-md-6">
      <div class="form-group">
        <small class="form-control-feedback">Obligatoire (*)</small>
        <label class="control-label">Nom</label>
        <input name="firstn" type="text" value="{{ $patients->first_name}}"  class="form-control" placeholder="John doe" required >
        </div>
    </div>
    <!--/span-->
    <div class="col-md-6">
      <div class="form-group">
        <small class="form-control-feedback">Obligatoire (*)</small>
        <label class="control-label">Prenoms</label>
        <input name="lastn" type="text"  value="{{ $patients->last_name}}" class="form-control form-control-danger"   required>
      </div>
    </div>
    <!--/span-->
  </div>
  <!--/row-->
  <div class="row">
    <div class="col-md-6">
      <div class="form-group has-success">
        <small class="form-control-feedback">Obligatoire (*)</small>
        <label name="sex" value="{{ $patients->sex}}" id="sex" class="control-label">Sexe</label>
        <select name="sex" class="form-control custom-select" required="true">
          <option value="H">Homme</option>
          <option value="F">Femme</option>
        </select>
         </div>
    </div>
    <!--/span-->
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label">Date de naissance</label>
        <input name="dateb" value="{{ $patients->date_of_birth}}" id="sex" type="date" class="form-control" placeholder="dd/mm/yyyy">
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
      <label class="control-label">Situation familiale</label>
      <input  value="{{ $patients->family_state}}"  type="hidden" class="form-control" >
      <select type="text" value="{{ $patients->family_state}}" name="familys"class="form-control ">
        <option value="Célibataire sans enfant(s)">Célibataire sans enfant(s)</option>
        <option value="Marié(e) avec enfant(s)">Marié(e) avec enfant(s)</option>
        <option value="Marié(e) avec enfant(s)">Marié(e) avec enfant(s)</option>
        <option value="Célibataire avec enfant(s)">Célibataire avec enfant(s)</option>

      </select>
    </div>
  </div>
  <!--/span-->
 <div class="col-md-6 ">
                                                <div class="form-group h">
                                                
                                                    <label name="tail" class="control-label">taille(Cm)</label>
                                                     <input class="form-control" type="number" value="{{ $patients->taille}}" name="tch3" >

                                                </div>
                                            </div>
  <!--/span-->
</div>
<!--/row-->

<hr>
<div class="row">
  <div class="col-md-12 ">
    <div class="form-group">
      <label>Address</label>
      <input type="text" value="{{ $patients->address}}" name="Address" class="form-control" required maxlength="150">
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label>Phone number</label>
      <input name="phone" value="{{ $patients->phone_number}}" type="text" class="form-control" >
    </div>
  </div>
  <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Groupe Sanguin</label>
                                                <select name="sang" class="form-control custom-select" >
                                                    <option value="{{$patients->groupe_sanguin}}">{{$patients->groupe_sanguin}}</option>
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
                                            <!--/span-->
                                        </div>
  
</div>
<div class="row">
  
</div>
</div>
<div class="col-md-5">
  <div class="form-actions">
    <button type="submit"  class="btn btn-info"> <i class="fa fa-check"></i> Enregistrer</button>
    <a href="{{route('patient.index')}}">
      <button type="button" class="btn btn-danger">Annuler</button>
    </a>
  </div> </div>