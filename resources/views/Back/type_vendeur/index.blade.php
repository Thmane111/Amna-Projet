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
            <li class="breadcrumb-item"><a href="#">Liste des types annonceurs</a></li>
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
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th style="width:80px;"><strong>#</strong></th>
                                    <th><strong>Statut</strong></th>
                                    <th><strong>Status</strong></th>
                                    <th style="display: none;"><strong>Id</strong></th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                      use App\Models\groupe;
                                    $type_vende_comp=0;

                                    ?>
                                    @if($type_vende_count!=0)
                                @foreach($type_vende as $type_vendes)

                                <tr>
                                    <td>{{$type_vende_comp++;}}</td>
                                    <td>{{$type_vendes->statut}}</td>
                                    <td>@if($type_vendes->etat==0)
                                        <span class="badge light badge-danger" style="font-size:15px; ">desactver</span>
                                        @elseif($type_vendes->etat==1)
                                        <span class="badge light badge-success" style="font-size:15px; ">activer</span>
                                        @endif
                                    </td>

                                       <td style="display: none;">{{$type_vendes->id}}</td>

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
                                                <a class="dropdown-item state" href="#">@if($type_vendes->etat==0)
                                                    activer
                                                    @else desactiver
                                                    @endif
                                                   </a>
                                                   @elseif($mod22->permission!="Ajouter")
                                                <button type="button" class="dropdown-item {{$mod22->permission}}

                                                "  >{{$mod22->permission}}</button>

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
                            @include('Back.type_vendeur.add')
@if( $type_vende_count!=0)
@include('Back.type_vendeur.edit')
@include('Back.type_vendeur.view')
@include('Back.type_vendeur.delete')
@include('Back.type_vendeur.state')
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
            $('#update_id').val(data[3]);
            $('#type_vende').val(data[1]);

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

          $('#id_f').val(data[3]);


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

          $('#id_s').val(data[3]);


        });
    });
</script>
@endsection
