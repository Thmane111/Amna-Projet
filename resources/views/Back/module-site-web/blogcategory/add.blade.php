  <!-- Button trigger modal -->

  <div class="modal fade" id="exampleModalpopover">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">

              <div class="modal-body">



                    <div class="card-header" style="text-align:center;justify-content:center;">
                         <h4 class="card-title"><strong>Formulaire d'ajout blog categorie</strong></h4>
                    </div>

                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{route('blog_category.StoreBlogCategory')}}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="text" name="blogcategory" class="form-control input-default " placeholder="blog categorie">
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
