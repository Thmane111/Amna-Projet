
@extends('Back.index')


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
						<li class="breadcrumb-item active"><a href="javascript:void(0)">App</a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0)">Profile</a></li>
					</ol>
                </div>
                <!-- row -->


                <!-- START: Card Data-->
                <div class="row">
                    <div class="col-12 mt-3">
                        <div class="position-relative">
                            <div class="background-image-maker py-5"></div>
                            <div class="holder-image">
                                <img src="dist/images/portfolio13.jpg" alt="" class="img-fluid d-none">
                            </div>
                            <div class="position-relative px-3 py-5">
                                <div class="media d-md-flex d-block">
                                    @if($detail->profile_photo_path==null)

                                    <img src="{{asset('Back/dist/images/profile/profile.png')}}" width="100" alt="" class="img-fluid rounded-circle">
                                    @elseif($detail->profile_photo_path!=null)
                                    <img src="/photo/profile/{{$detail->profile_photo_path}}" width="100" alt="" class="img-fluid rounded-circle">


                                    @endif



                                    <a href="#"></a>
                                    <div class="media-body z-index-1">
                                        <div class="pl-4">
                                            <h1 class="display-4 text-uppercase text-white mb-0">{{$detail->prenom." ".$detail->name}}</h1>
                                            <h6 class="text-uppercase text-white mb-0">Annonceur</h6>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-xl-3 col-md-6 mt-3">

                        <div class="card">
                            <img src="{{asset('image/panneau.jpg')}}" width="100%" height="100%">
                        </div>
                        <div class="card">
                           <button class="btn btn-warning">Modifier le profile</button>
                        </div>
                        <div class="card">
                            <button class="btn btn-primary">Supprimer le compte</button>
                         </div>
                    </div>
                    <div class="col-12 col-md-6 mt-3">
                        <div class="card">
                            <div class="card-header  justify-content-between align-items-center">
                                <h4 class="card-title">Details</h4>
                            </div>
                            <div class="card-body">
                                <dl class="row mb-0 redial-line-height-2_5">
                                    <dt class="col-sm-5">Adresse E-mail:</dt>
                                    <dd class="col-sm-7">{{$detail->email}}</dd>

                                    <dt class="col-sm-5">Numéro téléphone</dt>
                                    <dd class="col-sm-7">{{$detail->telephone}}</dd>

                                    <dt class="col-sm-5">Staut annonceurs</dt>
                                    <dd class="col-sm-7">{{$detail->type_vende ? $detail->type_vende->statut:'vide'}}</dd>

                                    <dt class="col-sm-5">Nombre d'annonce publié:</dt>
                                    <dd class="col-sm-7">547</dd>



                                </dl>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- END: Card DATA-->
            </div>







        <!-- Button trigger modal -->

        <div class="modal fade" id="exampleModalpopover">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">

                    <div class="modal-body">



                          <div class="card-header" style="text-align:center;justify-content:center;">
                               <h4 class="card-title"><strong>Modifier votre profile</strong></h4>
                          </div>

                              <div class="card-body">
                                  <div class="basic-form">
                                      <form action="{{route('profile.update_profile',$detail->id)}}"  method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="id" value="{{$detail->id}}">
                                        <div class="mb-4 d-flex flex-column gap-3 align-items-center justify-content-center"style="border-radius:60px;">
                                          <div class="user-change-photo " >
                                          <div class="c2" style="align-items: center;justify-content:center;border-radius:40px;">
                                          <div id="display-image" style="align-items: center;justify-content:center;text-align:center;
                                          border-radius:60px;
                                          ">
                                          @if($detail->photo==null)
                                                      <img src="{{asset('Front/image/default.png')}}" style="height:100px;width:100px; " class="img-fluid rounded-circle" >
                                          @elseif($detail->photo!=null)
                                          <img src="/photo/profile/{{$detail->photo}}" style="height:100px;width:100px; " class="img-fluid rounded-circle" >
                                          @endif
                                                    </div>
                                                    <input type="file" id="image-input" name="image"  accept="image/png, image/jpg">
                                                    <br>
                                                    <label for="image-input" style="background: #ad0a0a;">
                                                      @if($detail->photo==" ")
                                                      Ajouter une photo
                                          @elseif($detail->photo!=" ")
                                                     Changer votre profile
                                          @endif

                                            </i>&nbsp;
                                        </label>

                                         </div>


                                          </div>

                                        </div>
                                                </div>
                                        <div class="modal-footer" style="text-align:center;justify-content:center;color:white;">
                                        <button type="button"  class="btn  btn-danger " style="color: white;" id="modal-close" data-bs-dismiss="modal">Annuler</button>
                                        <button type="submit" name="edit_prof" class="btn  btn-danger" style="color: white;">Confirmer</button>
                                        </div>





                                  </div>
                              </div>


                    </div>

                  </form>
                </div>
            </div>
        </div>

        <!-- Button trigger modal -->












<script src="{{asset('Back/dist/js/jquery.min.js')}}"></script>
<script src="{{asset('Back/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('Back/dist/js/moment.js')}}"></script>
<!-- yyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy -->
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
    background-color: #f5af09;

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
