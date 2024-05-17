  <!-- Button trigger modal -->

  <div class="modal fade" id="eexampleModalpopover">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">



                  <div class="card-header" style="text-align:center;justify-content:center;">
                       <h4 class="card-title"><strong>Formulaire d'edition de blog categorie</strong></h4>
                  </div>

                      <div class="card-body">
                          <div class="basic-form">
                              <form action="{{route('blog_category.UpdateBlogCategory',$blogcategorys->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" class="form-control"  name="id" id="update_id" id="exampleInputEmail1" placeholder="Nom">
                                  <div class="mb-3">
                                      <input type="text" id="nom_blog" value="{{ $blogcategorys->blogcategory}}" name="blogcategory" class="form-control input-default " placeholder="Nom module">
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
