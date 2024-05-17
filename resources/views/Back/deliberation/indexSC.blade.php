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
            <li class="breadcrumb-item"><a href="#">Liste des matieres</a></li>
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
                        echo " ";
                    }}}  ?>
                    <!-- Modal -->
                    
                </div>
                <div class="card-body">
                @if(Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
         <strong>{{session::get('error')}}</strong>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
    </div>
    @endif
                <form action="{{ route('resultat.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="d-flex">
                    
                    
            
            <select class="col-3 form-control wide mb-3" id="niveau" name="niveau_id">
                    <option value="0"><u>Veuillez choire le niveau</u></option>
                    @foreach($niveau as $niveaus)
                <option value="{{$niveaus->id}}"><u>{{$niveaus->niveau}}</u></option>
                @endforeach
                </select>
                <select class="col-3 form-control wide mb-3" id="serie" name="serie_id">
                    <option value="0"><u>Veuillez choire la serie</u></option>
                   
                </select>
               <a href="" class="col-2 form-control wide mb-3 bg-danger" style="margin-left:10px;">Reinitialiser la table</a>
               <a href="" class="col-2 form-control wide mb-3 bg-warning" style="margin-left:20px;">Publier le resultat</a>
                </div>
                    <center> <h4 >Ajouter le ficher par format CSV </h4></center>
                   <center>
                   <div class="col-12 d-flex">
                 
                 <input type="file" name="file" class="form-control">
                  
                  <button class="btn btn-success d-flex" style="height: 32px;margin-left: 3px;width:130px;" type="submit">Import fichier</button>

                  </div>

                   </center>
            </form>
            <br>
                    <div class="table-responsive">
                     
                        <h2 id="titre"></h2>
                        <table id="example" class="display table dataTable table-striped table-bordered editable-table">
                            <thead>
                                <tr>
                                   
                                    <th><strong>Numero candidat</strong></th>
                                    <th><strong>Nom complet</strong></th>
                                    <th><strong>Lieu de naissance</strong></th>
                                    <th><strong>Ecole</strong></th>
                                    <th><strong>Moyenne</strong></th>
                                    <th><strong>Décision</strong></th>
                                    
                                  
                                    


                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                      use App\Models\groupe;
                                      use App\Models\Ecole;
                                    $resultat_comp=0;

                                    ?>
                                    @if($resultat_count!=0)
                                @foreach($resultat as $resultats)
                               <?php
                               
                               $recup_ecole=Ecole::all()->where('id',$resultats->ecole_id)->first();

                               ?>
                                <tr>
                                   
                                    <td>{{$resultats->Numero_Candidat}}</td>
                                    <td class="fw-bold text-secondary">{{$resultats->Prenom." ".$resultats->Nom}}</td>
                                    <td class="fw-bold text-secondary">{{$resultats->Lieu_Naissance}}</td>
                                    <td class="fw-bold text-secondary">{{$recup_ecole->Nom_Ecole}}</td>
                                    <td class="fw-bold text-secondary">{{$resultats->note}}</td>
                                    <td>@if($resultats->etat==0)
                                        <span class="badge light badge-danger" style="font-size:15px; ">desactiver</span>
                                        @elseif($resultats->etat==1)
                                        <span class="badge light badge-success" style="font-size:15px; ">activer</span>
                                        @endif
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
                             @include('Back.matiere.add')

                           



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






































<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


<script type="text/javascript">

$(document).ready(function () {
$('#region').change(function(){


    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
       });
    var id = $(this).val();




$.ajax({
dataType: "json",
url: "/getEcole/"+id,
type: "GET",
success: function (data) {
    console.log(data);
    $('#ecole').html(data);

},
error: function(error) {
    console.log(error);


}
});

//call country on region selected


});



//call city on country selected


});

</script>








<script type="text/javascript">

$(document).ready(function () {
$('#niveau').change(function(){


    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
       });
    var id = $(this).val();




$.ajax({
dataType: "json",
url: "/getSerie/"+id,
type: "GET",
success: function (data) {
    console.log(data);
    $('#serie').html(data);

},
error: function(error) {
    console.log(error);


}
});

//call country on region selected


});



//call city on country selected


});

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>







@endsection








