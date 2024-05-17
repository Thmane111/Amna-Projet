


  <!-- Button trigger modal -->

  <div class="modal fade" id="popTache">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">



                  <div class="card-header" style="text-align:center;justify-content:center;">
                       <h4 class="card-title"><strong>Formulaire de modification des accées</strong></h4>
                  </div>

                      <div class="card-body">
                          <div class="basic-form">
                              <form action="{{route('tache.update',$taches->id)}}" method="POST">
                                <input type="hidden" name="id" class="form-control" value="{{ $taches->id}}"  id="id" placeholder="Nom">

                                @csrf
                                @method('PUT')


                                <div class="mb-3">
                                    <input type="text" value="{{$taches->tache}}" id="tache" name="tache" class="form-control input-default " placeholder="Tache">
                                </div>
                                <div class="mb-3">
                                    <input type="text" value="{{$taches->url}}" id="url" name="url" class="form-control input-default " placeholder="Tache">
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
