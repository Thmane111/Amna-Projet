
  <!-- Button trigger modal -->

  <div class="modal fade" id="eexampleModalpopover">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">



                  <div class="card-header" style="text-align:center;justify-content:center;">
                       <h4 class="card-title"><strong>Formulaire d'edition groupe</strong></h4>
                  </div>

                      <div class="card-body">
                          <div class="basic-form">
                              <form action="{{route('groupe.update',$groupes->id)}}" method="POST">
                                <input type="hidden" class="form-control" value="{{$groupes->id}}" name="id" id="exampleInputEmail1" placeholder="Nom">

                                @csrf
                                @method('PUT')
                                  <div class="mb-3">
                                      <input type="text" id="nom_groupe" value="{{$groupes->nom_module}}" name="nom_groupe" class="form-control input-default " placeholder="Nom module">
                                  </div>
                                  <div class="mb-3">
                                      <input type="text" id="caption"  value="{{$groupes->demunitif}}" name="caption" class="form-control input-rounded" placeholder="Diminutif">
                                  </div>
                                  <div class="mb-3">
                                    <input type="hidden" name="detail2" value="{{$groupes->detail}}" >
                                  <textarea class="form-control" name="detail"  placeholder="Description"></textarea>
                                  </div>






                          </div>
                      </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Modifier</button>
            </div>
          </form>
        </div>
    </div>
</div>

<!-- Button trigger modal -->
