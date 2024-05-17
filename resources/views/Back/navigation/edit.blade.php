


  <!-- Button trigger modal -->

  <div class="modal fade" id="eexampleModalpopover">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">



                  <div class="card-header" style="text-align:center;justify-content:center;">
                       <h4 class="card-title"><strong>Formulaire de modification de dropdown</strong></h4>
                  </div>

                      <div class="card-body">
                          <div class="basic-form">
                              <form action="{{route('navigation.update', $navigations->id)}}" method="POST">
                                <input type="hidden" class="form-control" value="{{ $navigations->id}}" name="id" id="exampleInputEmail1" placeholder="Nom">

                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <input type="text" name="navigation" value="{{$navigations->navigue}}" id="nom_ng" class="form-control input-default " placeholder="Nom module">
                                </div>
                                <input type="hidden" name="icon2" id="icon2" value="{{$navigations->icon ?  $navigations->icon->id:''}}">
                                <div class="mb-3">
                                    <select name="icon" class="default-select form-control wide ">
                                        <option value="0">Veuillez choisir un icons</option>
                                        @foreach($icon as $icons)
                                        <option value="{{$icons->id}}">{{$icons->nom_icon}}</option>
                                        @endforeach
                                    </select>
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
