
@extends('Back.index')
@php
$grp=App\Models\Attribution::all()->where('admins_id',Auth::guard('admin')->user()->id)->first();
@endphp

@section('content')
<div class="container-fluid site-width">
    <!-- START: Breadcrumbs-->
    <div class="row ">
        <div class="col-12  align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto"><span class="h4 my-auto">User Profile</span></div>

                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">User</li>
                    <li class="breadcrumb-item active"><a href="#">Profile</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END: Breadcrumbs-->

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

                        @if(Auth::guard('admin')->user()->profile_photo_path==null)
                        <img src="{{asset('Back/dist/images/profile/profile.png')}}" style="height:100px;width:100px; " alt="" class="img-fluid rounded-circle">

                        @elseif(Auth::guard('admin')->user()->profile_photo_path!=null)

                        <img src="/photo/profile/{{Auth::guard('admin')->user()->profile_photo_path}}" style="height:100px;width:100px; "  alt="" class="img-fluid rounded-circle">
                        @endif

                        <div class="media-body z-index-1">
                            <div class="pl-4">
                                <h1 class="display-4 text-uppercase text-white mb-0">{{Auth::guard('admin')->user()->prenom." ".Auth::guard('admin')->user()->name}}</h1>
                                <h6 class="text-uppercase text-white mb-0">{{$grp->groupe->nom_groupe}}</h6>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="profile-menu mt-4 theme-background border  z-index-1 p-2">
                <div class="d-sm-flex">
                    <div class="align-self-center">
                        <ul class="nav nav-pills flex-column flex-sm-row" id="accordion2" role="tablist">
                            <li class="nav-item ml-0 p-1">
                                <a class="nav-link  py-2 px-3 px-lg-4" style="background: #ad0a0a;color:white;" data-toggle='modal' data-target='#exampleModalpopover' href="#timeline">Ajouter/Modifier Profile</a>
                            </li>


                            <li class="nav-item ml-0 mb-2 mb-sm-0 p-1">
                                <a class="nav-link py-2 px-4 px-lg-4" style="background: #ad0a0a;color:white;" data-toggle="collapse" href="#collapse4" aria-expanded="false" aria-controls="collapse4">Modifier information</a>
                            </li>
                            <li class="nav-item ml-0 p-1">
                                <a class="nav-link py-2 px-4 px-lg-4" style="background: #ad0a0a;color:white;" href="#list-item-1">Modifier mot de passe</a>
                            </li>
                        </ul>
                    </div>
                    <div class="align-self-center ml-auto text-center text-sm-right">
                        <a href="#">
                            <i class="icon-social-dropbox h5"></i>
                        </a>
                        <a href="#">
                            <i class="icon-social-facebook h5"></i>
                        </a>
                        <a href="#">
                            <i class="icon-social-github h5"></i>
                        </a>
                        <a href="#">
                            <i class="icon-social-google h5"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3" ata-spy="scroll" data-target="#list-example" data-offset="0">
        <div class="col-xl-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Who To Follow</h4>
                </div>
                <div class="card-body p-0">

                    <img src="{{asset('Back/dist/images/side3.jpg')}}" width="100%" height="100%" >

                </div>
            </div>

        </div>
        <div class="col-xl-9" id="list-item-1">
            <div class="card">
                <div class="card-body">

                    <div class="col-12">
                        <form>
                            <div class="form-row">
                                <div class="col-6 mb-3 d-flex" style="border:solid 1px #ad0a0a;justify-content: center;text-align:center;align-items:center;">
                                    <label for="username" style="font-size:16px;"><strong>Nom</strong></label>

                                    <div class="col-sm-9 col-7"><span>{{Auth::guard('admin')->user()->name}}</span>
                                    </div>

                                </div>
                                <div class="col-6 mb-3 d-flex" style="border:solid 1px #ad0a0a;justify-content: center;text-align:center;align-items:center;">
                                    <label for="username" style="font-size:16px;"><strong> Prenom</strong></label>

                                    <div class="col-sm-9 col-7"><span>{{Auth::guard('admin')->user()->prenom}}</span>
                                    </div>

                                </div>

                                <div class="col-6 mb-3 d-flex" style="border:solid 1px #ad0a0a;justify-content: center;text-align:center;align-items:center;">
                                    <label for="username" style="font-size:16px;"><strong> E-mail</strong></label>

                                    <div class="col-sm-9 col-7"><span>{{Auth::guard('admin')->user()->email}}</span>
                                    </div>

                                </div>
                                <div class="col-6 mb-3 d-flex" style="border:solid 1px #ad0a0a;justify-content: center;text-align:center;align-items:center;">
                                    <label for="username" style="font-size:16px;"><strong> Téléphone</strong></label>

                                    <div class="col-sm-9 col-7"><span>{{Auth::guard('admin')->user()->telephone}}</span>
                                    </div>

                                </div>

                                <div class="col-6 mb-3 d-flex" style="border:solid 1px #ad0a0a;justify-content: center;text-align:center;align-items:center;">
                                    <label for="username" style="font-size:16px;" ><strong> Adresse</strong></label>

                                    <div class="col-sm-9 col-7"><span>{{Auth::guard('admin')->user()->adresse}}</span>
                                    </div>

                                </div>




                            </div>
                        </form>
                    </div>

                </div>

            </div>
            <div class="col-12" >
                <div class="card border">
                    <div class="card-content">
                        <div class="card-body" style="background-image: url({{asset('Front/image/za.jpg')}});
                        background-repeat: no-repeat; background-size: cover;">
                            <div class="d-md-flex">

                                <div class="content px-md-3 my-3 my-md-0">
                                    <h1 class="mb-0 font-w-600 h5" style="color:#A52A2A ;">Numéro 1 des petites annonces<br> en Mauritanie</h1><br>


                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>





    </div>



    <div class="row mt-3 collapse" id="collapse4"  role="tabpanel" data-parent="#accordion2">




        <div class="col-xl-9 " >
            <div class="card">
                <div class="card-body">

                    <div class="col-12">
                        <form action="{{route('profile.update',Auth::guard('admin')->user()->id)}}" method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="form-row">
                                <div class="col-6 mb-3">
                                    <label for="username">Nom</label>

                                    <input type="text" name="nom" value="{{Auth::guard('admin')->user()->name}}" class="form-control" placeholder="First Name">

                                </div>
                                <div class="col-6 mb-3">
                                    <label for="email">Prenom</label>
                                    <input type="text"  name="prenom" value="{{Auth::guard('admin')->user()->prenom}}"class="form-control" placeholder="Last Name">
                                </div>

                                <div class="col-6 mb-3">
                                    <label for="username">Adresse</label>

                                    <input type="text" name="adresse" value="{{Auth::guard('admin')->user()->adresse}}" class="form-control" placeholder="ajouter votre adresse">

                                </div>
                                <div class="col-6 mb-3">
                                    <label for="email">Téléphone</label>
                                    <input type="text" name="tel" value="{{Auth::guard('admin')->user()->telephone}}" class="form-control" placeholder="ajouter votre numero téléphone">
                                </div>





                                <div class="col-12">

                                    <button type="submit" class="btn btn-primary">Sign in</button>   <button type="submit" class="btn btn-outline-warning">Reset</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3" >
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Who To Follow</h4>
                </div>
                <div class="card-body p-0">

                    <img src="{{asset('Back/dist/images/side3.jpg')}}" width="100%" height="100%">

                </div>
            </div>

        </div>

    </div>
    <!-- END: Card DATA-->
</div>







<div class="modal fade" id="exampleModalpopover">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">



                  <div class="card-header" style="text-align:center;justify-content:center;">
                       <h4 class="card-title"><strong>Modifier votre profile</strong></h4>
                  </div>

                      <div class="card-body">
                          <div class="basic-form">
                              <form action="{{route('profile.update_profile',Auth::guard('admin')->user()->id)}}"  method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="id" value="{{Auth::guard('admin')->user()->id}}">
                                <div class="mb-4 d-flex flex-column gap-3 align-items-center justify-content-center"style="border-radius:60px;">
                                  <div class="user-change-photo " >
                                  <div class="c2" style="align-items: center;justify-content:center;border-radius:40px;">
                                  <div id="display-image" style="align-items: center;justify-content:center;text-align:center;
                                  border-radius:60px;
                                  ">
                                  @if(Auth::guard('admin')->user()->photo==null)
                                              <img src="{{asset('Front/image/default.png')}}" style="height:100px;width:100px; " class="img-fluid rounded-circle" >
                                  @elseif(Auth::guard('admin')->user()->photo!=null)
                                  <img src="/photo/profile/{{Auth::guard('admin')->user()->photo}}" style="height:100px;width:100px; " class="img-fluid rounded-circle" >
                                  @endif
                                            </div>
                                            <input type="file" id="image-input" name="image"  accept="image/png, image/jpg">
                                            <br>
                                            <label for="image-input" style="background: #ad0a0a;">
                                              @if(Auth::guard('admin')->user()->photo==" ")
                                              Ajouter une photo
                                  @elseif(Auth::guard('admin')->user()->photo!=" ")
                                             Changer votre profile
                                  @endif

                                    </i>&nbsp;
                                </label>

                                 </div>


                                  </div>

                                </div>
                                        </div>
                                <div class="modal-footer" style="text-align:center;justify-content:center;color:white;">
                                <button type="button"  class="btn  btn-danger " style="color: white;" id="modal-close" data-dismiss="modal">Annuler</button>
                                <button type="submit" name="edit_prof" class="btn  btn-danger" style="color: white;">Confirmer</button>
                                </div>





                          </div>
                      </div>


            </div>

          </form>
        </div>
    </div>
</div>



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
