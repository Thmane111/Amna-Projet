  <!-- Button trigger modal -->

  <div class="modal fade" id="eexampleModalpopover">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">



                  <div class="card-header" style="text-align:center;justify-content:center;">
                       <h4 class="card-title"><strong>Formulaire d'edition menu</strong></h4>
                  </div>

                      <div class="card-body">
                          <div class="basic-form">
                              <form action="{{route('menu.update',$menus->id)}}" method="POST">
                                <input type="hidden" class="form-control"  name="id" id="update_id" id="exampleInputEmail1" placeholder="Nom">

                                @csrf
                                @method('PUT')
                                  <div class="mb-3">
                                      <input type="text" id="nom_url" value="{{$menus->nom_module}}" name="nom" class="form-control input-default " placeholder="Nom module">
                                  </div>
                                  <div class="mb-3">
                                      <input type="text" id="url" value="{{$menus->url}}" name="url" class="form-control input-default " placeholder="Nom module">
                                  </div>

                                  <div class="mb-3">
                                    <input type="hidden" name="detail2" value="{{$menus->detail}}" >
                                  <textarea class="form-control" name="detail"  placeholder="Description"></textarea>
                                  </div>
                                     <input type="hidden" name="parent2" value="{{$menus->parent}}">
                                  <select class="default-select form-control wide mb-3" name="parent">
                                    <option value="0">Veuillez choire le parent du menu</option>
                                    @foreach($menu as $menus)
                                    <option value="{{$menus->id}}">{{$menus->nom}}</option>

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
