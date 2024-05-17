  <!-- Button trigger modal -->

  <div class="modal fade" id="eexampleModalpopover">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">



                  <div class="card-header" style="text-align:center;justify-content:center;">
                       <h4 class="card-title"><strong>Formulaire d'edition module</strong></h4>
                  </div>

                      <div class="card-body">
                          <div class="basic-form">
                              <form action="{{route('Module.update',$mods->id)}}" method="POST">
                                <input type="hidden" class="form-control"  name="id" id="update_id" id="exampleInputEmail1" placeholder="Nom">

                                @csrf
                                @method('PUT')
                                  <div class="mb-3">
                                      <input type="text" id="nom_module" value="{{$mods->nom_module}}" name="nom_module" class="form-control input-default " placeholder="Nom module">
                                  </div>
                                  <div class="mb-3">
                                      <input type="text" id="caption"  value="{{$mods->demunitif}}" name="caption" class="form-control input-rounded" placeholder="Diminutif">
                                  </div>
                                  <div class="mb-3">
                                    <input type="hidden" name="detail2" value="{{$mods->detail}}" >
                                  <textarea class="form-control" name="detail"  placeholder="Description"></textarea>
                                  </div>
                                  <input type="hidden" name="navigation2" value="{{$mods->navigation_id}}">
                                  <select class="default-select form-control wide mb-3" name="navigation">
                                    <option value="0">Veuillez choire le parent du module</option>
                                    @foreach($navigation as $navigations)
                                    <option value="{{$navigations->id}}">{{$navigations->navigue}}</option>

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
