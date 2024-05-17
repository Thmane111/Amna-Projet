
  <div class="modal fade" id="eexampleModalpopover">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                  <div class="card-header" style="text-align:center;justify-content:center;">
                       <h4 class="card-title"><strong>Formulaire d'edition du navbar</strong></h4>
                  </div>

                      <div class="card-body">
                          <div class="basic-form">
                              <form action="{{route('nav.update',$navs->id)}}" method="POST">
                                <input type="hidden" class="form-control" value="{{$navs->id}}" name="id" id="exampleInputEmail1" placeholder="Nom">

                                @csrf
                                @method('PUT')
                                  <div class="mb-3">
                                      <input type="text" id="type_vende" value="{{$navs->nom}}" name="statut" class="form-control input-default " placeholder="Nom module">
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
