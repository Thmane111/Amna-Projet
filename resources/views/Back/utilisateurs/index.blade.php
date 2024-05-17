
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
   <?php
    use App\Models\Attribution;
    ?>
     @foreach($groupe as $groupes)
     <?php
     $attribut=Attribution::all()->where('groupe_id','=',$groupes->id);
     ?>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                        <div class="mb-3">
                            <h4 class="fs-24 font-w700">{{$groupes->nom_groupe}}</h4>
                            <span>{{$groupes->detail}}</span>
                            <div class="d-flex align-items-center mt-4 flex-wrap">
                                <ul class="kanbanimg me-3 mb-3">
                                   @foreach($attribut as $attributs)
                                    <li><img src="{{asset('Back/dist/images/profile/small/pic1.jpg')}}" alt=""></li>

                                    @endforeach
                                    <li><span>+</span></li>
                                </ul>
                                <div class="ms-4 invite mb-3">
                                    <a href="{{route('utilisateurs.create2',$groupes->id)}}" class="btn btn-primary light btn-rounded btn-md me-2 mb-2"><i class="fas fa-user-plus me-3 scale5"></i>Ajouter un membre</a>
                                    <a href="{{route('utilisateurs.Liste_Membre',$groupes->id)}}" class="btn btn-outline-light btn-rounded btn-md me-2 mb-2">Lister les membres</a>


                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex align-items-center mb-4 pb-3 justify-content-end flex-wrap">
                                <div class="me-3">
                                    <h4 class="fs-18 font-w600">{{$groupes->caption}}</h4>
                                    <span>{{$groupes->created_at}}</span>
                                </div>
                                <div class="facebook-icon me-3">
                                    <a href="javascript:void(0);"><i class="fab fa-facebook-f"></i></a>
                                </div>

                            </div>
                            <div class="d-flex  justify-content-end align-items-center">
                                <span class="fs-16 font-w600 me-3">Total Progress 60%</span>
                                <div class="progress default-progress flex-1">
                                    <div class="progress-bar bg-gradient1 progress-animated" style="width: 45%; height:10px;" role="progressbar">
                                        <span class="sr-only">45% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
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
