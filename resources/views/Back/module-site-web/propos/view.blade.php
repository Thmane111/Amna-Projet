
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
						<li class="breadcrumb-item active"><a href="javascript:void(0)">App</a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0)">Profile</a></li>
					</ol>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="profile card card-body px-3 pt-3 pb-0">
                            <div class="profile-head">
                                <div class="photo-content">
                                    <div class="cover-photo rounded"></div>
                                </div>
                                <div class="profile-info">
									<div class="profile-photo">
                                        @if(Auth::guard('admin')->user()->profile_photo_path==null)
										<img src="{{asset('Back/dist/images/profile/profile.png')}}" style="height:100px;width:100px; " class="img-fluid rounded-circle" alt="">
                                        @elseif(Auth::guard('admin')->user()->profile_photo_path!=null)
                                        <img src="/photo/profile/{{Auth::guard('admin')->user()->profile_photo_path}}" style="height:100px;width:100px; " class="img-fluid rounded-circle" alt="">

                                        @endif
									</div>
									<div class="profile-details">
										<div class="profile-name px-3 pt-2">
											<h4 class="text-primary mb-0">{{Auth::guard('admin')->user()->name}}</h4>
											<p>Administrateur</p>
										</div>
										<div class="profile-email px-2 pt-2">
											<h4 class="text-muted mb-0">{{Auth::guard('admin')->user()->email}}</h4>
											<p>Email</p>
										</div>
										<div class="dropdown ms-auto">
											<a href="#" class="btn btn-primary light sharp" data-bs-toggle="dropdown" aria-expanded="true"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></a>
											<ul class="dropdown-menu dropdown-menu-end">
												<li style="cursor:pointer;" class="dropdown-item" data-bs-toggle='modal' data-bs-target='#exampleModalpopover'><i class="fa fa-user-circle text-primary me-2"></i> Modifier profile</li>

												<li class="dropdown-item"><i class="fa fa-users text-primary me-2"></i> Add to btn-close friends</li>
												<li class="dropdown-item"><i class="fa fa-plus text-primary me-2"></i> Add to group</li>
												<li class="dropdown-item"><i class="fa fa-ban text-primary me-2"></i> Block</li>
											</ul>
										</div>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
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
											<!-- Modal -->

										</div>
									</div>
								</div>
							</div>



						</div>
                    </div>
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-tab">
                                    <div class="custom-tab-1">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item"><a href="#my-posts" data-bs-toggle="tab" class="nav-link active show">Information</a>
                                            </li>

                                            <li class="nav-item"><a href="#profile-settings" data-bs-toggle="tab" class="nav-link ">Configuration</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div id="my-posts" class="tab-pane fade active show">
                                                <div class="my-post-content pt-3">
                                                    <div class="profile-personal-info">
                                                        <h4 class="text-primary mb-4">Personal Information</h4>
                                                        <div class="row mb-2">
                                                            <div class="col-sm-3 col-5">
                                                                <h5 class="f-w-500">Nom <span class="pull-end">:</span>
                                                                </h5>
                                                            </div>
                                                            <div class="col-sm-9 col-7"><span>{{Auth::guard('admin')->user()->name}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-sm-3 col-5">
                                                                <h5 class="f-w-500">Email <span class="pull-end">:</span>
                                                                </h5>
                                                            </div>
                                                            <div class="col-sm-9 col-7"><span>{{Auth::guard('admin')->user()->email}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-sm-3 col-5">
                                                                <h5 class="f-w-500">Availability <span class="pull-end">:</span></h5>
                                                            </div>
                                                            <div class="col-sm-9 col-7"><span>Full Time (Free Lancer)</span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-sm-3 col-5">
                                                                <h5 class="f-w-500">Age <span class="pull-end">:</span>
                                                                </h5>
                                                            </div>
                                                            <div class="col-sm-9 col-7"><span>27</span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-sm-3 col-5">
                                                                <h5 class="f-w-500">Location <span class="pull-end">:</span></h5>
                                                            </div>
                                                            <div class="col-sm-9 col-7"><span>Rosemont Avenue Melbourne,
                                                                    Florida</span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-sm-3 col-5">
                                                                <h5 class="f-w-500">Year Experience <span class="pull-end">:</span></h5>
                                                            </div>
                                                            <div class="col-sm-9 col-7"><span>07 Year Experiences</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div id="profile-settings" class="tab-pane fade">
                                                <div class="pt-3">
                                                    <div class="settings-form">
                                                        <h4 class="text-primary">Account Setting</h4>
                                                        <form  action="{{route('profile.update',Auth::guard('admin')->user()->id)}}" method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <div class="row">
                                                                <div class="mb-3 col-md-6">
                                                                    <label class="form-label">Nom</label>
                                                                    <input type="text" placeholder="nom" name="nom" value="{{Auth::guard('admin')->user()->name}}" class="form-control">
                                                                </div>
                                                                <div class="mb-3 col-md-6">
                                                                    <label class="form-label">Prènom</label>
                                                                    <input type="text" placeholder="prenom" name="prenom" value="{{Auth::guard('admin')->user()->prenom}}" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                            <div class="mb-3 col-md-6">
                                                                <label class="form-label">Address</label>
                                                                <input type="text" name="adresse" value="{{Auth::guard('admin')->user()->adresse}}" placeholder="Apartment, studio, or floor" class="form-control">
                                                            </div>
                                                            <div class="mb-3 col-md-6">
                                                                <label class="form-label">Téléphone</label>
                                                                <input type="number" name="tel" value="{{Auth::guard('admin')->user()->telephone}}" class="form-control">
                                                            </div>
                                                            </div>

                                                            <button class="btn btn-primary" type="submit">Modifier</button>
                                                            <button class="btn btn-success" type="">Changer mot de passe</button>
                                                            <button class="btn btn-danger" type="">Change/modifier email</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<!-- Modal -->
									<div class="modal fade" id="replyModal">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">

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
