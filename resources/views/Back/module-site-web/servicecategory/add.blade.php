  <!-- Button trigger modal -->

  <div class="modal fade" id="exampleModalpopover">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">

              <div class="modal-body">



                    <div class="card-header" style="text-align:center;justify-content:center;">
                         <h4 class="card-title"><strong>Formulaire d'ajout d'un type de service</strong></h4>
                    </div>

                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{route('servicecategory.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="text" name="servicecategory" class="form-control input-default " placeholder="type service">
                                    </div>
                                    <div class="mb-3">
                                        <textarea  name="description" class="form-control input-default " placeholder="type service"></textarea>
                                    </div>

                                    <div class="mb-3">


                                        <div class="c2" style="align-items: center;justify-content:center;border-radius:40px;width:90px;">
                                            <input type="file" id="image-input" name="image"  accept="image/png, image/jpg">
                                            <label for="image-input" class="btn btn-primary">
                                              <i class="fas fa-picture-o" aria-hidden="true" style="color: red;"></i>
                                              Choisir une image
                                               </i>&nbsp;
                                            </label>
                                            <div id="display-image" style="align-items: center;justify-content:center;text-align:center;border:solid 1px black;width:300px;height:200px">
                                              <img src="" width="100%" height="100%">
                                            </div>
                                        </div>
                                </div>





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
