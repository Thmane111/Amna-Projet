  <!-- Button trigger modal -->

  <div class="modal fade" id="eexampleModalpopover">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">



                  <div class="card-header" style="text-align:center;justify-content:center;">
                       <h4 class="card-title"><strong>Formulaire d'edition de service categorie</strong></h4>
                  </div>

                      <div class="card-body">
                          <div class="basic-form">
                              <form action="{{route('servicecategory.update',$servicecategorys->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="text" class="form-control" value="{{$servicecategorys->id}}" name="update_id" id="update_id" id="exampleInputEmail1" placeholder="Nom">
                                  <div class="mb-3">
                                      <input type="text" id="nom_serv" value="{{ $servicecategorys->servicecategory}}" name="servicecategory" class="form-control input-default " placeholder="Nom module">
                                  </div>
                                  <input type="hidden" name="description2" value="{{$servicecategorys->Description}}">
                                  <div class="mb-3">
                                    <textarea  name="description" id="desc" class="form-control input-default " placeholder="type service"></textarea>
                                </div>

                                <input type="hidden" name="image2" value="{{$servicecategorys->image}}">
                                <div class="mb-3">
                                        <div class="c2" style="align-items: center;justify-content:center;border-radius:40px;">
                                            <input type="file" id="image-input1" name="image"  accept="image/png, image/jpg">
                                            <label for="image-input1" class="btn btn-primary">
                                              <i class="fas fa-picture-o" aria-hidden="true" style="color: red;"></i>
                                              Choisir une image
                                               </i>&nbsp;
                                            </label>
                                            <div id="display-image1" style="align-items: center;justify-content:center;text-align:center;border:solid 1px black;width:300px;height:200px">
                                              <img src="" id="img" width="100%" height="100%">
                                            </div>
                                        </div>
                                </div>

                                <script>
                                    const image_input = document.querySelector("#image-input1");

                                    image_input.addEventListener("change", function() {
                                    const reader = new FileReader();
                                    reader.addEventListener("load", () => {
                                    const uploaded_image = reader.result;
                                    document.querySelector("#display-image1").style.backgroundImage = `url(${uploaded_image})`;
                                    document.querySelector("#display-image1 img").style.display = `none`;

                                    });
                                    reader.readAsDataURL(this.files[0]);
                                    });
                                    </script>





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
