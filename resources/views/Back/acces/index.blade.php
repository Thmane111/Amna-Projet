<?php
use App\Models\Module;
use App\Models\Permission;
use App\Models\Acces;
use App\Models\Attribution;
$comp=0; ?>
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
            <li class="breadcrumb-item"><a href="#">Liste d'attribution</a></li>
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
                    <?php
                    $attrib=Attribution::All()->where('admins_id','=',Auth::guard('admin')->user()->id)->first();
                    if($vv!=0){
                     $ver=Permission::all()->where('groupe_id','=',$attrib->groupe_id)
                                                    ->where('module_id','=',$modES->id)
                                                    ->where('etat','=',1)->count();
                                                    if($ver!=0){

                         $mod3=Permission::all()->where('groupe_id','=',$attrib->groupe_id)
                                                    ->where('module_id','=',$modES->id)
                                                    ->where('etat','=',1);


                              foreach($mod3 as $mod33){
                            if($mod33->permission=="Ajouter"){
                              echo  "<button type='button' class='btn btn-primary mb-2' data-toggle='modal' data-target='#exampleModalpopover'>Ajouter un nouveau ".$modES->dimunitif."</button>";
                            }else{
                                echo " ";
                            }
                        }

                        ?>


                    <?php }else{
                      echo " ";}
                        }else{
                             echo "<button type='button' class='btn btn-primary mb-2' data-toggle='modal' data-target='#exampleModalpopover'>Ajouter un nouveau dropwon </button>";
                            }

                            ?>
                    <!-- Modal -->
                    <button type='button' class='btn btn-primary mb-2' data-toggle='modal' data-target='#exampleModalpopover'>Ajouter un nouveau dropwon </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th style="width:80px;"><strong>#</strong></th>
                                    <th><strong>Module</strong></th>
                                    <th><strong>Groupe</strong></th>

                                    <th><strong>Status</strong></th>

                                    <th style="display: none;"><strong>Id</strong></th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                     $acces_comp=0; ?>
                                @foreach($acces as  $access)

                                <tr>

                                    <td>{{$acces_comp++;}}</td>
                                    <td>{{$access->module ?  $access->module->nom_module:''}}</td>
                                    <td>{{$access->groupe ?  $access->groupe->nom_groupe:''}}</td>

                                    <td>@if($access->etat==0)
                                        <span class="badge light badge-danger" style="font-size:15px; ">desactver</span>
                                        @elseif($access->etat==1)
                                        <span class="badge light badge-success" style="font-size:15px; ">activer</span>
                                        @endif
                                    </td>

                                       <td style="display: none;">{{$access->id}}</td>

                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-success light sharp" data-toggle="dropdown">
                                                <svg width="20px" height="20px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                            </button>
                                            <div class="dropdown-menu">
                                                <?php
                                                 $attrib=Attribution::All()->where('admins_id','=',Auth::guard('admin')->user()->id)->first();
                                                           if($vv!=0){


                                                            $modCount=Permission::all()->where('groupe_id','=',$attrib->groupe_id)
                                                    ->where('module_id','=',$access->module_id)
                                                    ->where('etat','=',1)->count();
                                                    if($modCount!=0){
                                                    $mod2=Permission::all()->where('groupe_id','=',$attrib->groupe_id)
                                                    ->where('module_id','=',$access->module_id)
                                                    ->where('etat','=',1);
                                                   foreach($mod2 as $mod22) {
                                                ?>
                                                @if($mod22->permission=="Activer/désactiver")
                                                <a class="dropdown-item state" href="#">@if($access->etat==0)
                                                    activer
                                                    @else desactiver
                                                    @endif
                                                   </a>
                                                   @elseif($mod22->permission!="Ajouter")
                                                <button type="button" class="dropdown-item {{$mod22->permission}}

                                                "  >{{$mod22->permission}}</button>

                                              @endif

                                                <?php }}else{
                                                    echo"
                                                    <button type='button' class='dropdown-item Modifier'>Edit</button>
                                                   <button data-target='#popview' class='dropdown-item Voir'>Voir</button>
                                                   <a class='dropdown-item Supprimer' href='#'>Delete</a>
                                                   <a class='dropdown-item state' href='#'>";if($access->etat==0){echo 'activer';}else{echo 'desactiver';} echo "</a>";
                                               }}
                                                 ?>
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


                            @include('Back.acces.add')
@if(  $acces_count!=0)
@include('Back.acces.edit')
@include('Back.acces.view')
@include('Back.acces.delete')
@include('Back.acces.state')
@include('Back.acces.permission')
@endif

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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
            $('#nom_ac').val(data[1]);

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

            $('#module1').html(data[1]);
            $('#groupe1').html(data[2]);

            $('#etat1').html(data[3]);


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
