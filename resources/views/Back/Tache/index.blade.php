
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
            <li class="breadcrumb-item active"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">Liste des tâches</a></li>
        </ol>
    </div>

    <div class="row">




        <div class="col-lg-12">
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
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModalpopover">Effectuer un acces</button>
                    <!-- Modal -->
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display table dataTable table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="width:80px;"><strong>#</strong></th>
                                    <th><strong>Fonctionnalités</strong></th>
                                    <th><strong>Taches</strong></th>
                                    <th><strong>Lien</strong></th>

                                    <th style="display: none;"><strong>Id</strong></th>
                                    <th><strong>Status</strong></th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                     $tache_comp=0; ?>
                                @foreach($tache as  $taches)

                                <tr>

                                    <td>{{$tache_comp++}}</td>

                                    <td>{{$taches->module ?  $taches->module->nom_module:''}}</td>
                                    <td>{{$taches->tache}}</td>
                                    <td>{{$taches->url}}</td>
                                    <td style="display: none;">{{$taches->id}}</td>
                                    <td>@if($taches->etat==0)
                                        <span class="badge light badge-danger" style="font-size:13px; ">desactver</span>
                                        @elseif($taches->etat==1)
                                        <span class="badge light badge-success" style="font-size:13px; ">activer</span>
                                        @endif
                                    </td>


                                     <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-success light sharp" data-toggle="dropdown">
                                                <svg width="20px" height="20px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                            </button>
                                            <div class="dropdown-menu">
                                                <button type="button" class="dropdown-item edit"  >Edit</button>
                                                <button data-target="#popview" class="dropdown-item view"

                                                >Voir</button>
                                                <a class="dropdown-item delete" href="#">Delete</a>
                                                <a class="dropdown-item state" href="#">@if($taches->etat==0)
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
@include('Back.Tache.add')



@if( $tache_count!=0)
@include('Back.Tache.edit')
@include('Back.Tache.view')
@include('Back.Tache.delete')
@include('Back.Tache.state')
@endif

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function (){

        $('.edit').on('click', function (){

            $('#popTache').modal('show');

            $tr= $(this).closest('tr');
            var data= $tr.children("td").map(function() {
              return $(this).text();
            }).get();
          console.log(data);

            $('#tache').val(data[2]);
            $('#url').val(data[3]);
            $('#id').val(data[4]);
        });
    });
</script>

<script>
    $(document).ready(function (){

        $('.view').on('click', function (){

            $('#popview').modal('show');

            $tr= $(this).closest('tr');
            var data= $tr.children("td").map(function() {
              return $(this).text();
            }).get();
          //alert(data);
          console.log(data);

            $('#nomM1').html(data[1]);
            $('#tache1').html(data[2]);

            $('#url1').html(data[3]);


        });
    });
</script>


<script>
    $(document).ready(function (){

        $('.delete').on('click', function (){

            $('#popdelete').modal('show');

            $tr= $(this).closest('tr');
            var data= $tr.children("td").map(function() {
              return $(this).text();
            }).get();
          //alert(data);
          console.log(data);

          $('#id_f').val(data[4]);


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

          $('#id_s').val(data[4]);


        });
    });
</script>
@endsection
