<?php
use App\Models\Module;
use App\Models\Permission;
use App\Models\Acces;
use App\Models\Attribution;
use App\Models\Product;
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
            <li class="breadcrumb-item"><a href="#">Liste des categories</a></li>
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
                    <?php
                     $attrib_count=Attribution::All()->where('admins_id','=',Auth::guard('admin')->user()->id)->count();

                     if($attrib_count!=0){


                    $attrib=Attribution::All()->where('admins_id','=',Auth::guard('admin')->user()->id)->first();
                    if($modESCOUNT!=0){


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
                        echo " ";
                    }}}  ?>
                    <!-- Modal -->
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display table dataTable table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="width:80px;"><strong>#</strong></th>
                                    <th><strong>Nom complet</strong></th>
                                    <th><strong>Téléphone</strong></th>
                                    <th><strong>Adresse electronique</strong></th>
                                    <th><strong>Produit publié</strong></th>
                                    <th><strong>Status</strong></th>
                                    <th><strong>Action</strong></th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                    $list_user_comp=0;

                                    ?>
                                    @if($list_user_count!=0)
                                @foreach($list_user as $list_users)
                                      <?php
                                      $nbr=Product::all()->where('user_id',$list_users->id)->count();
                                      ?>
                                <tr>
                                    <td>{{$list_user_comp++;}}</td>
                                    <td>{{$list_users->prenom." ".$list_users->nom}}</td>
                                    <td>{{$list_users->telephone}}</td>
                                    <td>{{$list_users->email}}</td>
                                    <td>{{$nbr}}</td>
                                    <td>@if($list_users->etat==0)
                                        <span class="badge light badge-danger" style="font-size:15px; ">desactver</span>
                                        @elseif($list_users->etat==1)
                                        <span class="badge light badge-success" style="font-size:15px; ">activer</span>
                                        @endif
                                    </td>



                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-success light sharp" data-toggle="dropdown">
                                                <svg width="20px" height="20px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                            </button>

                                            <div class="dropdown-menu">
                                                <?php
                                                if($modESCOUNT!=0){
                                                 $attrib=Attribution::All()->where('admins_id','=',Auth::guard('admin')->user()->id)->first();
                                                    $mod2=Permission::all()->where('groupe_id','=',$attrib->groupe_id)
                                                    ->where('module_id','=',$vv->id)
                                                    ->where('etat','=',1);
                                                   foreach($mod2 as $mod22) {
                                                ?>
                                                @if($mod22->permission=="Activer/désactiver")
                                                <a class="dropdown-item" href="{{route('Backlg.state',$list_users->id)}}">@if($list_users->etat==0)
                                                    activer
                                                    @else desactiver
                                                    @endif
                                                   </a>


                                              @elseif($mod22->permission=="Supprimer")
                                              <form id="destroy{{$list_users->id}}" action="{{route('Backlg.Supprimer',$list_users->id)}}" method="POST" class="btn btn-danger"
                                                style="background:transparent;border:solid 0px;padding:0px;">
                                                   @csrf
                                                   @method('DELETE')
                                                   <button onclick="return confirmer()"  style="background:transparent;border:solid 0px;" id="delete">supprimer</button>
                                              </form>
                                              @elseif($mod22->permission=="Voir")
                                              <a href="/bagwelle/membre/show/{{$list_users->id}}" class="dropdown-item

                                                ">{{$mod22->permission}}</a>
                                               @else
                                              <a href="/bagwelle/membre/{{$list_users->id}}" class="dropdown-item

                                                ">{{$mod22->permission}}</a>
                                               @endif
                                                <?php }} ?>
                                            </div>

                                        </div>

                                    </td>

                                </tr>

                                @endforeach
                                @endif


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
            $('#update_id').val(data[5]);
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

          $('#id_s').val(data[5]);


        });
    });
</script>
@endsection
