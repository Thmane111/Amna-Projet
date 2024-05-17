

@extends('Market-Place.index')
@section('content')


    <!-- ...:::: Start Account Dashboard Section:::... -->
    <div class="account-dashboard" style="margin-top:20px;">

        <div class="container">
            <div class="row" >
                <div class="col-12 col-lg-8 col-xl-8" style="border-radius: solid 0px;">
                <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden" style="background:rgb(138, 8, 8);">
                        <nav aria-label="breadcrumb"style="color:white;">
                            <ul style="color:white;">
                                <li><a href="/"style="color:white;"><u>Acceuil</u></a></li>
                                <li><a href="#"style="color:white;">Espace annonceur</a></li>

                            </ul>
                        </nav>
                    </div>

                  <div class="card overflow-hidden " style="border-bottom: solid 0px transparent;border-right: solid 0px transparent;">
                        <div class="row">
                    <div class="col-lg-12">
                        <div class="profile card card-body px-3 pt-3 pb-0">
                            <div class="profile-head">
                                <div class="photo-content">
                                    <div class="cover-photo"></div>
                                </div>
                                <div class="profile-info"  >
									<div class="profile-photo">
                                    @if( Auth::user()->image=='0')
										<img src="{{asset('Market-Place/image/default.png')}}" style="width:100px;height:100px;" class="img-fluid rounded-circle" alt="">
									</div>
                                    @else
                                    <img src="/photo/profile/{{ Auth::user()->profile }}" style="width:100px;height:100px;" class="img-fluid rounded-circle" alt="">
                                    @endif
									<div class="profile-details" >
										<div class="profile-name px-3 pt-2">
											<h4 class="text-primary mb-0">{{ Auth::user()->prenom }} {{ Auth::user()->name }}</h4>

										</div>
										<div class="profile-email px-2 pt-2">
											<h4 class="text-muted mb-0"><i class="fa fa-send" style="color:black;"></i> {{ Auth::user()->email }}</h4>
											<p><i class="fa fa-phone" style="color:black;"></i> +221 {{Auth::user()->telephone}}</p>
										</div>
                                        <div class="">
                            <span class="badge" id="profile" style="background:#ad0a0a;cursor:pointer;"><i class="fa fa-user" aria-hidden="true"></i> Modifier mon profil</span>
                            <span class="badge" style="background:#ad0a0a;">Supprimer mon compte</span>
                            <span class="badge" style="background:#ad0a0a;" class="clicks"><a href="#">ajouter une annonce</a></span>
                          </div>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                  </div>

                </div>

              </div><!--end row-->



            <div class="row">

                <div class="col-sm-12 col-md-3 col-lg-3">

                    <!-- Nav tabs -->
                    <div class="dashboard_tab_button" data-aos="fade-up" data-aos-delay="0">
                        <ul role="tablist" class="nav flex-column dashboard-list">

                            <li> <a href="#orders" data-bs-toggle="tab"
                                    class="nav-link btn btn-block btn-md btn-black-default-hover active">Vos annonces</a></li>
                          <style>

                            .dashboard_tab_button a:hover{
                            background: black;
                            }
                            .btn-black-default-hover {
    background: black;
    color: #FFF;
}
.dashboard_tab_button li .btn.active {
    background: #ad0a0a;;
}


                          </style>

                            <li><a href="#account-details" data-bs-toggle="tab"
                                    class="nav-link btn btn-block btn-md btn-black-default-hover" >Modifier mon profil</a>
                            </li>
                            <li><a href="#account-details" data-bs-toggle="tab"
                                    class="nav-link btn btn-block btn-md btn-black-default-hover">Reinitialiser mot de passe</a>
                            </li>
                            <li>
                            <form method="POST" action="{{ route('app.logout') }}"  >
                            @csrf

                            <a href="route('app.logout')" class="nav-link btn btn-block btn-md btn-black-default-hover"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Deconnecter') }}
</a>
                        </form>
                            </li>
                        </ul>
                        <br>
                        <div class="contact-details-single-item">

                                <div class="contact-details-content contact-phone">
                                <marquee><img src="{{asset('Front/image/show3.jpg')}}" alt="" style="width:100%;"></marquee>
                                </div>
                            </div>
                    </div>

                </div>
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <!-- Tab panes -->
                    <div class="tab-content dashboard_content" data-aos="fade-up" data-aos-delay="200">

                        <div class="tab-pane fade show active" id="orders">
                            <h4>Liste des produits</h4>
                            <div class="table_page table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>type</th>
                                            <th>Ville/region</th>
                                            <th>Publié depuis</th>
                                            <th>Prix</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php   use App\Models\ImageProduct;?>
                                        @if($compt==0)

                                        <center><strong> <p style="font-size:20px;">Aucun annonce publié</p> </strong></center>
                                        @endif
                                        @foreach($prod_user as $prod_users)
                                        <tr>
                                            <td >
                                            {{$prod_users->category ? $prod_users->category->nom_cat:''}}
                                        </td>
                                        <td style="justify-content:left;">
                                            {{$prod_users->ville }}
                                        </td>
                                        <td style="justify-content:left;">
                                            {{$prod_users->created_at }}
                                        </td>
                                        <td style="justify-content:left;">
                                            {{$prod_users->prix_prod }} MRU
                                        </td>



                                            <td><a href="{{route('iss.show' ,$prod_users->id)}}" class="view" style="background:#ad0a0a;;padding:5px;color:white;">Details</a></td>
                                        </tr>
                                       @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="downloads">
                            <h4>Downloads</h4>
                            <div class="table_page table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Downloads</th>
                                            <th>Expires</th>
                                            <th>Download</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Shopnovilla - Free Real Estate PSD Template</td>
                                            <td>May 10, 2018</td>
                                            <td><span class="danger">Expired</span></td>
                                            <td><a href="#" class="view">Click Here To Download Your File</a></td>
                                        </tr>
                                        <tr>
                                            <td>Organic - ecommerce html template</td>
                                            <td>Sep 11, 2018</td>
                                            <td>Never</td>
                                            <td><a href="#" class="view">Click Here To Download Your File</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="address">
                            <p>The following addresses will be used on the checkout page by default.</p>
                            <h5 class="billing-address">Billing address</h5>
                            <a href="#" class="view">Edit</a>
                            <p><strong>Bobby Jackson</strong></p>
                            <address>
                                Address: Your address goes here.
                            </address>
                        </div>
                        <div class="tab-pane fade" id="account-details" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 5px 0px, rgba(0, 0, 0, 0.1) 0px 0px 1px 0px;;margin-top:20px;
                        background:#ad0a0a;color:white;
                        ">

                            <h3 style="text-align: center;padding-top:5px;color:white;"><strong> Modifier les informations</strong></h3>
                            <div class="login"  style="margin-left:10px;">
                                <div class="login_form_container">
                                    <div class="account_login_form">

                                        <form  style="margin-left: 23px;" action="{{route('iss.update',Auth::user()->id)}}"  method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')


                                            <div class="default-form-box mb-20 " style="padding-right:15px; ">
                                                <label>Nom</label>
                                                <input type="text" name="nom" style="background:white; " value="{{ Auth::user()->name }}">
                                            </div>
                                            <div class="default-form-box mb-20" style="padding-right:15px; ">
                                                <label>Prenom</label>
                                                <input type="text" name="prenom" style="background:white; " value="{{ Auth::user()->prenom }}">
                                            </div>

                                            <div class="default-form-box mb-20" style="padding-right:15px; ">
                                                <label>Téléphone</label>
                                                <input type="number" name="tel" style="background:white; "  value="{{ Auth::user()->telephone }}">
                                            </div>

                                            <br>


                                            <div class="save_button  mb-9" style="padding-bottom: 15px;background:#ad0a0a;">
                                                <button class="btn btn-md  " style="background:white;color:#ad0a0a;"
                                                    type="submit" name="edit_dash">Modifier</button>
                                            </div>
                                        </form>


                                    </div>
                                </div>
                            </div>
                        </div>

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
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Account Dashboard Section:::... -->






















    <div class="card-body">
						<div id="exampleModalCenter" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">

									<div class="modal-body" style="text-align:center;justify-content:center;">
                  <form method="POST" enctype="multipart/form-data" action="{{route('iss.update_profile',Auth::user()->id)}}">
                    @csrf
                    @method('PUT')
                  <input type="hidden" name="id_com" value="">
                  <div class="mb-4 d-flex flex-column gap-3 align-items-center justify-content-center"style="border-radius:60px;">
                    <div class="user-change-photo " >
                    <div class="c2" style="align-items: center;justify-content:center;border-radius:40px;">
                    <div id="display-image" style="align-items: center;justify-content:center;text-align:center;
                    border-radius:60px;
                    ">
                    @if(Auth::user()->image==" ")
                                <img src="{{asset('Front/image/default.png')}}" width="100%">
                    @elseif(Auth::user()->image!=" ")
                    <img src="/photo/profile/{{ Auth::user()->image }}" width="100%" style="border-radius:40px;">
                    @endif
                              </div>
                              <input type="file" id="image-input" name="image"  accept="image/png, image/jpg">
                              <br>
                              <label for="image-input" style="background: #ad0a0a;">
                                @if(Auth::user()->image==" ")
                                Ajouter une photo
                    @elseif(Auth::user()->image!=" ")
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
                          </form>

								</div>
							</div>
						</div>

					</div>









                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>



<!-- delete -->
<script>
              $(document).ready(function(){
	$(document).on('click', '#profile', function(){
		var id=$(this).val();


		$('#exampleModalCenter').modal('show');


    $tr= $(this).closest('tr');

    var data= $tr.children("td").map(function() {
       return $(this).text();
    }).get();

    console.log(data);

    $('#id_up').val(data[0]);


	});
});
            </script>

<!-- ----------------------------------- -->


    <!--  Start  -->
    <style>
                                        .table_page table thead tr th {
    color: #24262b;
    border-bottom: 3px solid  #bb1c1c;;
    border-right: 1px solid #ededed;
    font-size: 16px;
    font-weight: 600;
    text-transform: none;
    padding: 10px;
    text-align: center;
}


                                    </style>







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



@endsection


