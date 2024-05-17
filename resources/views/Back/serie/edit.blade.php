
  <!-- Button trigger modal -->

  <div class="modal fade" id="eexampleModalpopover">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">



                  <div class="card-header" style="text-align:center;justify-content:center;">
                       <h4 class="card-title"><strong>Formulaire d'edition serie</strong></h4>
                  </div>

                      <div class="card-body">
                          <div class="basic-form">
                              <form action="{{route('serie.update',$series->id)}}" method="POST">
                                <input type="hidden" class="form-control" value="{{$series->id}}" name="id" id="exampleInputEmail1" placeholder="Nom">

                                @csrf
                                @method('PUT')
                                <select class="default-select form-control wide mb-3" name="niveau_id">
                                    <option value="0"><u>Veuillez choire l'Utilisateur à attribuer</u></option>
                                    @foreach($niveau as $niveaus)
                                    <option value="{{$series->id}}">{{$series->niveau}}</option>
                          @endforeach
                                </select>
                                  <div class="mb-3">
                                      <input type="text" id="nom_serie" value="{{$series->serie}}" name="serie" class="form-control input-default " placeholder="Nom module">
                                  </div>
                                  
                                  <div class="mb-3">
                                    <input type="hidden" name="detail2" value="{{$series->detail}}" >
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
