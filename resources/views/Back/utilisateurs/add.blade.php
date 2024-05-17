
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
            <li class="breadcrumb-item"><a href="#">Liste des groupes</a></li>
        </ol>
    </div>

    <div class="row">


        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Vertical Forms with icon</h4>
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
                        <form class="form-valide-with-icon needs-validation" novalidate=""  method="POST" action="{{ route('utilisateurs.registerDash') }}">
                            @csrf
                            <input type="hidden" value="{{$grp->id}}" name="id">
                            <div class="mb-3">
                                <label class="text-label form-label" for="validationCustomUsername">Nom</label>
                                <div class="input-group">
                                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                    <input type="text" class="form-control" name="name"  id="validationCustomUsername" placeholder="Enter a username.." required="">
                                    <div class="invalid-feedback">
                                        Entrez votre nom.
                                      </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="text-label form-label" for="validationCustomUsername">Prènom</label>
                                <div class="input-group">
                                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                    <input type="text" class="form-control" name="prenom" id="validationCustomUsername" placeholder="Enter a username.." required="">
                                    <div class="invalid-feedback">
                                        Please Enter a surname.
                                      </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="text-label form-label" for="validationCustomUsername">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text"> <i class="fa fa-boite"></i> </span>
                                    <input type="text" class="form-control" name="email" id="validationCustomUsername" placeholder="Enter a username.." required="">
                                    <div class="invalid-feedback">
                                        Entrer votre E-mail svp
                                      </div>
                                </div>
                            </div>




                            <div class="mb-3">
                                <label class="text-label form-label" for="dlab-password">Mot de passe *</label>
                                <div class="input-group transparent-append">
                                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                    <input type="password" class="form-control"  name="password" id="dlab-password" placeholder="Choose a safe one.." required="">
                                    <span class="input-group-text show-pass">
                                        <i class="fa fa-eye-slash"></i>
                                        <i class="fa fa-eye"></i>
                                    </span>
                                    <div class="invalid-feedback">
                                        Please Enter a username.
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="text-label form-label" for="dlab-password">Confirmer le Mot de passe *</label>
                                <div class="input-group transparent-append">
                                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                    <input type="password" class="form-control"  name="password_confirmation" id="dlab-password" placeholder="Choose a safe one.." required="">
                                    <span class="input-group-text show-pass">
                                        <i class="fa fa-eye-slash"></i>
                                        <i class="fa fa-eye"></i>
                                    </span>
                                    <div class="invalid-feedback">
                                        Please Enter a username.
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
@endsection
