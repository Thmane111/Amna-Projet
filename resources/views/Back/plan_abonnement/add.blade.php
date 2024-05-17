

        <!-- Button trigger modal -->

  <div class="modal fade" id="exampleModalpopover">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">



                  <div class="card-header" style="text-align:center;justify-content:center;">
                       <h4 class="card-title"><strong>Formulaire d'ajout de plan d'abonnement</strong></h4>
                  </div>

                      <div class="card-body">
                          <div class="basic-form">
                              <form action="{{route('plan.store')}}" method="POST">
                                  @csrf
                                  <div class="mb-3">
                                      <input type="text" name="nom" class="form-control input-default " placeholder="nom">
                                  </div>
                                  <div class="mb-3">
                                    <input type="text" name="prix" class="form-control input-default " placeholder="prix">
                                </div>
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
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
          </form>
        </div>
    </div>
</div>

<!-- Button trigger modal -->
