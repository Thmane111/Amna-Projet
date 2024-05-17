
@extends('Espace-Admin.index')


@section('content')
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
		<div class="lds-ripple">
			<div></div>
			<div></div>
		</div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


<div class="container-fluid">
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/admin/service">liste des services</a></li>
            <li class="breadcrumb-item"><a href="#">Modifier un service</a></li>
        </ol>
    </div>

    <div class="row">


        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Formulaire de modification d'un service</h4>
                </div>
                <div class="card-body">
                    @if($errors->any())
                    @foreach($errors->All() as $error)
                    <div class="alert alert-icon alert-danger">
                      {{session('errors')}}
                   </div>
                    @endforeach
                    @endif
                    @if(Session::has('error'))
                 <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>{{session::get('error')}}</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                 </div>
                 @endif
                 @if(Session::has('message'))
                 <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>{{session::get('message')}}</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                 </div>
                 @endif
                    <div class="basic-form">
                        <form class="form-valide-with-icon needs-validation" novalidate=""  method="POST" action="{{ route('service.update',$modif->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{$modif->id}}">
                            <div class="mb-3">
                                <input type="hidden" name="servicecategory2" value="{{$modif->service_category_id}}">
                            <div class="input-group">
                            <select class="default-select form-control wide mb-3" name="servicecategory">
                                <option value="0"><u>Veuillez choire un type de service</u></option>
                                @foreach($service as $services)
                                <option value="{{$services->id}}">{{$services->service_category}}</option>
                      @endforeach
                            </select>
                            </div>
                            </div>

                            <div class="mb-3">
                                <div class="input-group">
                                    <span class="input-group-text">Titre du service</span>
                                    <input type="text" class="form-control" value="{{$modif->service_title}}" name="service_titre"  id="validationCustomUsername" placeholder="titre" required="">
                                    @error('service_titre')
                                    <div class="text-danger">
                                        {{"champs vide"}}
                                      </div>
                                      @enderror
                                </div>
                            </div>





                                    <textarea  id="summernote" class="form-control" name="description" placeholder="Texte">
                                        {{$modif->service_description}}
                                    </textarea>

                            <br>
                          <input type="hidden" name="image2" value="{{$modif->service_image}}">
                            <div class="mb-3">
                                    <div class="c2" style="align-items: center;justify-content:center;border-radius:40px;">
                                        <input type="file" id="image-input" name="image"  accept="image/png, image/jpg">
                                        <label for="image-input" class="btn btn-primary">
                                          <i class="fas fa-picture-o" aria-hidden="true" style="color: red;"></i>
                                          Choisir une image
                                           </i>&nbsp;
                                        </label>
                                        <div id="display-image" style="align-items: center;justify-content:center;text-align:center;border:solid 1px black;width:400px;height:200px">
                                          <img src="/photo/service/{{$modif->service_image}}" width="100%" height="100%">
                                        </div>
                                    </div>




                            </div>






                            <div class="mb-3">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required="">
                                  <label class="form-check-label" for="invalidCheck2">
                                    Check Me out
                                  </label>
                                </div>
                            </div>
                            <button type="submit" class="btn me-2 btn-primary">Submit</button>
                            <button type="submit" class="btn btn-light">cencel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

                            <script>
                              function confirmer(){
                                if(confirm('confirmer vous la suppression'))return true;
                                else return false ;
                              }
                            </script>


<script src="{{asset('Back/dist/js/jquery.min.js')}}"></script>
<script src="{{asset('Back/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('Back/dist/js/moment.js')}}"></script>


<link rel="stylesheet" href="assets/css/plugins/jquery.lineProgressbar.css">
                                <script>
                                  const image_input = document.querySelector("#image-input");

image_input.addEventListener("change", function() {
  const reader = new FileReader();
  reader.addEventListener("load", () => {
    const uploaded_image = reader.result;
    document.querySelector("#display-image").style.backgroundImage = `url(${uploaded_image})`;
    document.querySelector("#display-image img").style.display = `none`;

  });
  reader.readAsDataURL(this.files[0]);
});
</script>

<script>
    $(document).ready(function (){

        $('.Modifier').on('click', function (){

            $('#eexampleModalpopover').modal('show');

            $tr= $(this).closest('tr');
            var data= $tr.children("td").map(function() {
              return $(this).text();
            }).get();
          console.log(data);
            $('#update_id').val(data[0]);
            $('#nom_groupe').val(data[1]);
            $('#caption').val(data[2]);
        });
    });
</script>

<script>
    $(document).ready(function (){

        $('.Voir').on('click', function (){

            $('#popview').modal('show');

            $tr= $(this).closest('tr');
            var data= $tr.children("td").map(function() {
              return $(this).text();
            }).get();
          //alert(data);
          console.log(data);

            $('#nom_groupe1').html(data[1]);
            $('#dim1').html(data[2]);
            $('#desc1').html(data[3]);
            $('#etat1').html(data[4]);


        });
    });
</script>


<script>
    $(document).ready(function (){

        $('.Suuprimer').on('click', function (){

            $('#popdelete').modal('show');

            $tr= $(this).closest('tr');
            var data= $tr.children("td").map(function() {
              return $(this).text();
            }).get();
          //alert(data);
          console.log(data);

          $('#id_f').val(data[5]);


        });
    });
</script>
<script>
    $(document).ready(function (){

        $('.state').on('click', function (){

            $('#popstate').modal('show');

            $tr= $(this).closest('tr');
            var data= $tr.children("td").map(function() {
              return $(this).text();
            }).get();
          //alert(data);
          console.log(data);

          $('#id_f').val(data[6]);


        });
    });
</script>

<style>



    #display-image .fa{
    font-size:90px;
    background: red;

    }
    .rek{
    display: inline-block;
    }
    #display-image{
    width:95px;
    justify-content: center;
    margin-left: 50px;
    margin-top: 10px;
    height:100px;
    box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 5px 0px, rgba(0, 0, 0, 0.1) 0px 0px 1px 0px;

    background-position: center;
    background-size: cover;
    }


    .fs{
    display: flex;
    width:auto;
    }

     input[type="file"]{
    display: none;
    }

    .c2 label{
    color:white;
    height:40px;
    width:200px;
    background-color: rgb(79, 79, 136);

    font-family:"Montserrat",sans-serif;
    font-size: 15px;
    display: flex;
    justify-content: center;
    align-items: center;
    }

    .dd{
    display: flex;
    }



                   </style>


@endsection
