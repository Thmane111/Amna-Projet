

        <!-- Button trigger modal -->

  <div class="modal fade" id="exampleModalpopover">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">



                  <div class="card-header" style="text-align:center;justify-content:center;">
                       <h4 class="card-title"><strong>Formulaire d'ajout de categorie</strong></h4>
                  </div>

                      <div class="card-body">
                          <div class="basic-form">
                              <form action="{{route('categorie.store')}}" method="POST">
                                  @csrf
                                  <div class="mb-3">
                                      <input type="text" name="nom_cat" class="form-control input-default " placeholder="Nom categorie">
                                  </div>
                                  <div class="mb-3">
                                      <input type="text" name="caption" class="form-control input-rounded" placeholder="Diminutif">
                                  </div>
                                  <div class="mb-3">
                                  <textarea class="form-control" name="detail"  placeholder="Description"></textarea>
                                  </div>
                                  <select class="default-select form-control wide mb-3" name="navigue">
                                    <option value="0"><u>Veuillez choire un catégorie</u></option>
                                    @foreach($navv as $navvs)
                                    <option value="{{$navvs->id}}">{{$navvs->nom}}</option>
                          @endforeach
                                </select>





                          </div>
                      </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
          </form>
        </div>
    </div>
</div>

<!-- Button trigger modal -->
