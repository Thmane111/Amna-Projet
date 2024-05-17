
  <!-- Button trigger modal -->

  <div class="modal fade" id="eexampleModalpopover">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">



                  <div class="card-header" style="text-align:center;justify-content:center;">
                       <h4 class="card-title"><strong>Formulaire d'edition categorie</strong></h4>
                  </div>

                      <div class="card-body">
                          <div class="basic-form">
                              <form action="{{route('sous_categorie.update',$sous_cats->id)}}" method="POST">
                                <input type="hidden"  class="form-control" value="{{$sous_cats->id}}" name="id" id="update_id" placeholder="Nom">

                                @csrf
                                @method('PUT')

                                <input type="hidden" id="cat" name="categorie2" value="{{ $sous_cats->categorie_id}}">
                                <select class="default-select form-control wide mb-3" name="categorie">
                                    <option value="0"><u>Veuillez choire un catégorie</u></option>
                                    @foreach($sous_cat as $sous_cats)
                                    <option value="{{$sous_cats->id}}">{{$sous_cats->nom_cat}}</option>
                          @endforeach
                                </select>

                                <div class="mb-3">
                                    <input type="text" id="nom_type" name="sous_cat" value="{{$sous_cats->nom_type}}"  class="form-control input-rounded" placeholder="type de catégorie">
                                </div>

                                <input type="hidden" id="detail" name="detail2" value="{{ $sous_cats->detail}}">
                                <div class="mb-3">
                                <textarea class="form-control" name="detail"  placeholder="Description"></textarea>
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
                <button type="submit" class="btn btn-primary">Modifier</button>
            </div>
          </form>
        </div>
    </div>
</div>

<!-- Button trigger modal -->
