
  <div class="modal fade" id="eexampleModalpopover">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                  <div class="card-header" style="text-align:center;justify-content:center;">
                       <h4 class="card-title"><strong>Formulaire d'edition type_vende</strong></h4>
                  </div>

                      <div class="card-body">
                          <div class="basic-form">
                              <form action="{{route('plan.update',$plans->id)}}" method="POST">
                                <input type="hidden" class="form-control"  name="id" id="update_id" placeholder="Nom">

                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <input type="text" value="{{$plans->nom}}" name="nom" class="form-control input-default" id="nom" placeholder="nom">
                                </div>
                                <div class="mb-3">
                                  <input type="text" value="{{$plans->prix}}" name="prix" class="form-control input-default" id="prix" placeholder="prix">
                              </div>
                              <input type="text" name="dure2" value="{{$plans->duration}}" id="dure">
                              <select class="default-select form-control wide mb-3" name="dure">
                                  <option value="0"><u>Veuillez choire le durée</u></option>
                                  <option value="1">Mensuelle</option>
                                  <option value="2">Annuelle</option>
                              </select>
                          </div>
                      </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Modifier</button>
            </div>
          </form>
        </div>
    </div>
</div>

<!-- Button trigger modal -->
