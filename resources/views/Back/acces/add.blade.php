


        <!-- Button trigger modal -->

  <div class="modal fade" id="exampleModalpopover">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">



                  <div class="card-header" style="text-align:center;justify-content:center;">
                       <h4 class="card-title"><strong>Formulaire d'accées au module</strong></h4>
                  </div>

                      <div class="card-body">
                          <div class="basic-form">
                              <form action="{{route('acces.store')}}"  method="POST" enctype="multipart/form-data">
                                  @csrf
                                  <select class="default-select form-control wide mb-3" name="module_id">
                                    <option value="0"><u>Veuillez choire un module</u></option>
                                    @foreach($mod as $mods)
                                    <option value="{{$mods->id}}">{{$mods->nom_module}}</option>
                          @endforeach
                                </select>

                                <select class="default-select form-control wide mb-3" name="groupe_id">
                                    <option value="0">Veuillez choire un groupe</option>
                                    @foreach($groupe as $groupes)
                                    <option value="{{$groupes->id}}">{{$groupes->nom_groupe}}</option>
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
