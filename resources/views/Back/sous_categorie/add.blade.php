

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
                              <form action="{{route('sous_categorie.store')}}" method="POST">
                                  @csrf
                                  <select class="default-select form-control wide mb-3" name="categorie">
                                    <option value="0"><u>Veuillez choire un catégorie</u></option>
                                    @foreach($cat as $cats)
                                    <option value="{{$cats->id}}">{{$cats->nom_cat}}</option>
                          @endforeach
                                </select>
                                  <div class="mb-3">
                                      <input type="text" name="sous_cat" class="form-control input-rounded" placeholder="type de catégorie">
                                  </div>

                                  <select class="default-select form-control wide mb-3" name="icon_id">
                                    <option value="0"><u>Veuillez choire un icon</u></option>
                                    @foreach($icon as $icons)
                                    <option value="{{$icons->id}}">{{$icons->nom_icon}}</option>
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
