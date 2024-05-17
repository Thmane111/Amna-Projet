
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
                              <form action="{{route('categorie.update',$cats->id)}}" method="POST">
                                <input type="hidden"  class="form-control" value="{{$cats->id}}" name="id" id="update_id" placeholder="Nom">

                                @csrf
                                @method('PUT')
                                  <div class="mb-3">
                                      <input type="text" id="nom_groupe" value="{{$cats->nom_cat}}" name="nom_cat" class="form-control input-default " placeholder="Nom module">
                                  </div>
                                  <div class="mb-3">
                                      <input type="text" id="caption"  value="{{$cats->caption}}" name="caption" class="form-control input-rounded" placeholder="Diminutif">
                                  </div>
                                  <div class="mb-3">
                                    <input type="hidden" name="detail2" value="{{$cats->detail}}" >
                                  <textarea class="form-control" name="detail"  placeholder="Description"></textarea>
                                  </div>






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
