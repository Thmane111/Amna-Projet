


  <!-- Button trigger modal -->

  <div class="modal fade" id="eexampleModalpopover">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">



                  <div class="card-header" style="text-align:center;justify-content:center;">
                       <h4 class="card-title"><strong>Formulaire de modification des accées</strong></h4>
                  </div>

                      <div class="card-body">
                          <div class="basic-form">
                              <form action="{{route('acces.update', $access->id)}}" method="POST">
                                <input type="hidden" class="form-control" value="{{ $access->id}}" name="id" id="exampleInputEmail1" placeholder="Nom">

                                @csrf
                                @method('PUT')
                                <select class="default-select form-control wide mb-3" name="module_id">
                                    <option value="0">Veuillez choire l'Utilisateur à attribuer</option>
                                    @foreach($mod as $mods)
                                    <option value="{{$mods->id}}">{{$mods->nom_module}}</option>
                          @endforeach
                                </select>

                                <select class="default-select form-control wide mb-3" name="groupe_id">
                                    <option value="0">Veuillez choire le groupe</option>
                                    @foreach($groupe as $groupes)
                                    <option value="{{$groupes->id}}">{{$groupes->nom_groupe}}</option>
                          @endforeach
                                </select>







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
