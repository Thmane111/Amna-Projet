<?php
use App\Models\Module;
use App\Models\Permission;
use App\Models\Acces;
use App\Models\Attribution;
$categoryevent_comp=0; ?>
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


      <tr>
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
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">

                            <button type='button' class='btn btn-primary mb-2' data-bs-toggle='modal' data-bs-target='#exampleModalpopover'>Ajouter</button>




                    <!-- Modal -->
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th style="width:80px;"><strong>#</strong></th>
                                    <th><strong>nom</strong></th>
                                    <th><strong>Detail</strong></th>
                                    <th style="display: none;"><strong>DETAIL</strong></th>
                                    <th><strong>Status</strong></th>
                                    <th style="display: none;"><strong>Id</strong></th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                      use App\Models\groupe;
                                    $groupe_comp=0; ?>
                                @foreach($categoryevent as $categoryevents)

                                <tr>
                                    <td>{{$categoryevent_comp++;}}</td>
                                    <td>{{$categoryevents->nom}}</td>
                                    <td>{{$categoryevents->detail}}</td>
                                    <td style="display: none;">{{$categoryevents->detail}}</td>
                                    <td>@if($categoryevents->etat==0)
                                        <span class="badge light bg-danger" style="font-size:15px; ">desactver</span>
                                        @elseif($categoryevents->etat==1)
                                        <span class="badge light bg-success" style="font-size:15px; ">activer</span>
                                        @endif
                                    </td>

                                       <td style="display: none;">{{$categoryevents->id}}</td>

                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-success light sharp" data-bs-toggle="dropdown">
                                                <svg width="20px" height="20px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                            </button>

                                            <div class="dropdown-menu">
                                                <button type="button" class="dropdown-item Modifier"  >Edit</button>
                                                <button data-target="#popview" class="dropdown-item Voir"

                                                >Voir</button>
                                                <a class="dropdown-item Supprimer" href="#">Delete</a>
                                                <a class="dropdown-item state" href="#">@if($categoryevents->etat==0)
                                                    activer
                                                    @else desactiver
                                                    @endif
                                                   </a>
                                            </div>

                                        </div>

                                    </td>

                                </tr>

                                @endforeach


                        </table>
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
                            @include('Espace-Admin.Type_Event.add')
@if( $categoryevent_count!=0)
@include('Espace-Admin.Type_Event.edit')
@include('Espace-Admin.Type_Event.view')
@include('Espace-Admin.Type_Event.delete')
@include('Espace-Admin.Type_Event.state')
@endif
<script src="{{asset('Back/js/jquery.min.js')}}"></script>
<script src="{{asset('Back/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('Back/js/moment.js')}}"></script>


<script>
    $(document).ready(function (){

        $('.Modifier').on('click', function (){

            $('#eexampleModalpopover').modal('show');

            $tr= $(this).closest('tr');
            var data= $tr.children("td").map(function() {
              return $(this).text();
            }).get();
          console.log(data);
            $('#update_id').val(data[5]);
            $('#nom_event').val(data[1]);
            $('#detail').val(data[3]);
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

            $('#nom_event1').html(data[1]);

            $('#desc1').html(data[3]);
            $('#etat1').html(data[4]);


        });
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

          $('#id_f').val(data[5]);


        });
    });
</script>
@endsection
