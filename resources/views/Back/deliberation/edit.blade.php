
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
                              <form action="{{route('matiere.update',$matieres->id)}}" method="POST">
                                <input type="hidden" class="form-control" value="{{$matieres->id}}" name="id" id="exampleInputEmail1" placeholder="Nom">

                                @csrf
                                @method('PUT')
                                  <div class="mb-3">
                                      <input type="text" id="matiere" value="{{$matieres->Nom_Matiere}}" name="matiere" class="form-control input-default " placeholder="Nom matiere">
                                  </div>
                                  <div class="mb-3">
                                      <input type="text" id="coefficient" value="{{$matieres->coefficient}}" name="coefficient" class="form-control input-default " placeholder="Coeeficient">
                                  </div>
                                  <select class="default-select form-control wide mb-3" name="region_id">
                                    <option value="0"><u>Veuillez choire l'Utilisateur à attribuer</u></option>
                                    @foreach($serie as $series)
                                    <option value="{{$series->id}}">{{$series->serie}}</option>
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
