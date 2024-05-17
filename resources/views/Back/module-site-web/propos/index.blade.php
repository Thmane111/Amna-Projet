
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
            <li class="breadcrumb-item"><a href="#">page propos</a></li>
        </ol>
    </div>

    <div class="row">
        <div class="col-xl-4">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-statistics">
                                <div class="text-center">
                                    <div class="row">
                                        <img src="{{asset('Back/dist/images/side3.jpg')}}">
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-statistics">
                                <div class="text-center">
                                    <div class="row">
                                <img src="{{asset('Back/dist/images/side3.jpg')}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <div class="col-xl-8">
            <div class="card">
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
                    <div class="profile-tab">
                        @if($propos_count!=0)

                        <div class="custom-tab-1">
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a href="#my-posts" data-bs-toggle="tab" class="nav-link active show">A propos</a>
                                </li>
                                <li class="nav-item"><a href="#about-me" data-bs-toggle="tab" class="nav-link Supprimer">Supprimer le propos</a>
                                </li>
                                <li class="nav-item"><a href="#profile-settings" data-bs-toggle="tab" class="nav-link">Modifier</a>
                                </li>
                                <li class="nav-item bg-success" ><a href="#profile-settings" style="color: white;" data-bs-toggle="tab" class="nav-link">Modification globale</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="my-posts" class="tab-pane fade active show">
                                    <div class="my-post-content pt-3">

                                        <div class="profile-uoloaded-post border-bottom-1 pb-5">
                                            <img src="/photo/propos/{{$propos->image}}" style="height:250px;" alt="" class="img-fluid w-100 rounded">
                                            <a class="post-title" href="post-details.html"><h3 class="text-black">{{$propos->titre}}</h3></a>
                                            <p>{!!$propos->LeTexte!!}</p>

                                        </div>


                                    </div>
                                </div>

                                <div id="profile-settings" class="tab-pane fade">
                                    <div class="pt-3">
                                        <div class="settings-form">
                                            <h4 class="text-primary">Modifier le propos du site</h4>
                                            <form  action="{{route('propos.update',$propos->id)}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                    <div class="mb-3">
                                                        <label class="form-label">Titre du propos</label>
                                                        <input type="text" name="titre" value="{{$propos->titre}}" placeholder="propos" class="form-control">
                                                    </div>

                                                <div class="mb-3">
                                                    <label class="text-black font-w600 form-label">Le texte</label>
                                                    <textarea rows="8" id="summernote" class="form-control" name="texte" placeholder="Texte">
                                                        {{$propos->LeTexte}}
                                                    </textarea>
                                                </div>
                                                <div class="mb-3">
                                                        <input type="hidden" name="image2" value="{{$propos->image}}">

                                                    <div class="c2" style="align-items: center;justify-content:center;border-radius:40px;">
                                                        <input type="file" id="image-input" value="{{$propos->image}}" name="image"  accept="image/png,image/jpg">
                                                        <label for="image-input" class="btn btn-primary">
                                                          <i class="fas fa-picture-o" aria-hidden="true" style="color: red;"></i>
                                                          Choisir une image
                                                           </i>&nbsp;
                                                        </label>
                                                        <div id="display-image" style="align-items: center;justify-content:center;text-align:center;border:solid 1px black;width:400px;height:200px">
                                                          <img src="/photo/propos/{{$propos->image}}" width="100%" height="100%">
                                                        </div>
                                                    </div>
                                            </div>
                                                <button class="btn btn-primary" type="submit">Modifier</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @else

                        <center><a href="{{route('propos.create')}}"  class='btn btn-primary'>Créer un propos</a></center>
                        @endif
                        <!-- Modal -->
                        <div class="modal fade" id="replyModal">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Post Reply</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <textarea class="form-control" rows="4">Message</textarea>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">btn-close</button>
                                        <button type="button" class="btn btn-primary">Reply</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>




<script src="{{asset('Back/dist/js/jquery.min.js')}}"></script>
<script src="{{asset('Back/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('Back/dist/js/moment.js')}}"></script>
<link rel="stylesheet" href="assets/css/plugins/jquery.lineProgressbar.css">
@if($propos_count!=0)
    @include('Espace-Admin.module-site-web.propos.delete')
@endif
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

        $('.Supprimer').on('click', function (){

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
