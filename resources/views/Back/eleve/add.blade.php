

        <!-- Button trigger modal -->

  <div class="modal fade" id="exampleModalpopover">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">



                  <div class="card-header" style="text-align:center;justify-content:center;">
                       <h4 class="card-title"><strong>Formulaire d'ajout de centre</strong></h4>
                  </div>

                      <div class="card-body">
                          <div class="basic-form">
                              <form action="{{route('ecole.store')}}" method="POST">
                                  @csrf
                                  <div class="mb-3">
                                      <input type="text" name="ecole" class="form-control input-default " placeholder="Nom ecole">
                                  </div>
                                  
                                 
                                  <select class="default-select form-control wide mb-3" name="region_id">
                                    <option value="0"><u>Veuillez choire l'Utilisateur à attribuer</u></option>
                                    @foreach($region as $regions)
                                    <option value="{{$regions->id}}">{{$regions->Nom_Region}}</option>
                          @endforeach
                                </select>
                                <select class="default-select form-control wide mb-3" name="centre_id">
                                <option value="0"><u>Veuillez choire l'Utilisateur à attribuer</u></option>
                                    @foreach($centre as $centres)
                                    <option value="{{$centres->id}}">{{$centres->Nom_Centre}}</option>
                          @endforeach
                                </select>





                          </div>
                      </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
          </form>
        </div>
    </div>
</div>

<!-- Button trigger modal -->
