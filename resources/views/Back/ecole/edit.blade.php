
  <!-- Button trigger modal -->

  <div class="modal fade" id="eexampleModalpopover">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">



                  <div class="card-header" style="text-align:center;justify-content:center;">
                       <h4 class="card-title"><strong>Formulaire d'edition centre</strong></h4>
                  </div>

                      <div class="card-body">
                          <div class="basic-form">
                              <form action="{{route('ecole.update',$ecoles->id)}}" method="POST">
                                <input type="hidden" class="form-control" value="{{$ecoles->id}}" name="id" id="exampleInputEmail1" placeholder="Nom">

                                @csrf
                                @method('PUT')
                                  <div class="mb-3">
                                      <input type="text" id="ecole" value="{{$ecoles->Nom_Ecole}}" name="ecole" class="form-control input-default " placeholder="Nom module">
                                  </div>
                                  <select class="default-select form-control wide mb-3" name="region_id">
                                    <option value="0"><u>Veuillez choire l'Utilisateur à attribuer</u></option>
                                    @foreach($region as $regions)
                                    <option value="{{$regions->id}}">{{$regions->Nom_Region}}</option>
                          @endforeach
                                </select>
                                <select class="default-select form-control wide mb-3" name="centre_id">
                                <option value="0"><u>Veuillez choire l'Utilisateur à attribuer</u></option>
                                    @foreach($centre as $centres)
                                    <option value="{{$centres->id}}">{{$centres->Nom_Centre}}</option>
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
