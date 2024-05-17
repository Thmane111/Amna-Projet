
  <!-- Button trigger modal -->

  <div class="modal fade" id="eexampleModalpopover">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">



                  <div class="card-header" style="text-align:center;justify-content:center;">
                       <h4 class="card-title"><strong>Formulaire d'edition region</strong></h4>
                  </div>

                      <div class="card-body">
                          <div class="basic-form">
                              <form action="{{route('region.update',$regions->id)}}" method="POST">
                                <input type="hidden" class="form-control" value="{{$regions->id}}" name="id" id="exampleInputEmail1" placeholder="Nom">

                                @csrf
                                @method('PUT')
                                  <div class="mb-3">
                                      <input type="text" id="nom_region" value="{{$regions->region}}" name="nom_region" class="form-control input-default " placeholder="Nom module">
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
