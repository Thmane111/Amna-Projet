

        <!-- Button trigger modal -->

  <div class="modal fade" id="exampleModalpopover">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">



                  <div class="card-header" style="text-align:center;justify-content:center;">
                       <h4 class="card-title"><strong>Formulaire d'ajout de matiere</strong></h4>
                  </div>

                      <div class="card-body">
                          <div class="basic-form">
                              <form action="{{route('matiere.store')}}" method="POST">
                                  @csrf
                                  <div class="mb-3">
                                      <input type="text" name="matiere" class="form-control input-default " placeholder="Nom matiere">
                                  </div>
                                  
                                  <div class="mb-3">
                                      <input type="number" name="coeff" class="form-control input-default " placeholder="Coefficient">
                                  </div>
                                  <select class="default-select form-control wide mb-3" name="serie_id">
                                    <option value="0"><u>Veuillez choire l'Utilisateur à attribuer</u></option>
                                    @foreach($serie as $series)
                                    <option value="{{$series->id}}">{{$series->serie}}</option>
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
