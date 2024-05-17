

        <!-- Button trigger modal -->

  <div class="modal fade" id="exampleModalpopover">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">



                  <div class="card-header" style="text-align:center;justify-content:center;">
                       <h4 class="card-title"><strong>Formulaire d'ajout de groupe</strong></h4>
                  </div>

                      <div class="card-body">
                          <div class="basic-form">
                              <form action="{{route('groupe.store')}}" method="POST">
                                  @csrf
                                  <div class="mb-3">
                                      <input type="text" name="nom_groupe" class="form-control input-default " placeholder="Nom groupe">
                                  </div>
                                  <div class="mb-3">
                                      <input type="text" name="caption" class="form-control input-rounded" placeholder="Diminutif">
                                  </div>
                                  <div class="mb-3">
                                  <textarea class="form-control" name="detail"  placeholder="Description"></textarea>
                                  </div>






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
