

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
                              <form action="{{route('centre.import')}}" method="POST" enctype="multipart/form-data">
                                  @csrf
                                  <div class="mb-3">
                                    <label style="background:green;padding:5px;color:white;">Importer un fichier excel</label>
                                                <input type="file" name="file" class="form-control input-rounded" >
                                </div>  
                                  
                                 
                                  <select class="default-select form-control wide mb-3" name="region_id">
                                    <option value="0"><u>Veuillez choire l'Utilisateur à attribuer</u></option>
                                    @foreach($region as $regions)
                                    <option value="{{$regions->id}}">{{$regions->Nom_Region}}</option>
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
