  <!-- Button trigger modal -->

  <div class="modal fade" id="exampleModalpopover">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">

              <div class="modal-body">



                    <div class="card-header" style="text-align:center;justify-content:center;">
                         <h4 class="card-title"><strong>Formulaire d'ajout d'un au niveau du front</strong></h4>
                    </div>

                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{route('menu.store')}}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="text" name="nom" class="form-control input-default " placeholder="Nom menu">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" name="url" class="form-control input-rounded" placeholder="lien">
                                    </div>
                                    <div class="mb-3">
                                    <textarea class="form-control" name="detail"  placeholder="Description"></textarea>
                                    </div>


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
                  <button type="submit" class="btn btn-primary">Enregistrer</button>
              </div>
            </form>
          </div>
      </div>
  </div>

  <!-- Button trigger modal -->
