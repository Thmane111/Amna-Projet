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
                    
                    
            
                    <select class="col-4 form-control wide mb-3" id="niveau" name="serie_id">
                            <option value="0"><u>Veuillez choire le niveau</u></option>
                            @foreach($serie as $series)
                        <option value="{{$series->id}}"><u>{{$series->serie}}</u></option>
                        @endforeach
                        </select>
                        
                       <a href="#" class="col-3 form-control wide mb-3 bg-danger Supprimer" style="margin-left:10px;">Reinitialiser la table</a>
                     
                       <a href="" class="col-3 form-control wide mb-3 bg-warning" style="margin-left:20px;">Publier le resultat</a>
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
                    <center>
                            <div class="col-6" style="background:blue;">
                        <select class="col-3 form-control wide mb-3" onclick="return updateTable1()" id="list_eleve" name="serie_id">
                    <option value="0"><u>Veuillez choire le niveau</u></option>
                    @foreach($serie as $series)
                <option value="{{$series->id}}"><u>{{$series->serie}}</u></option>
                @endforeach
                </select>
                </div>
                        </center>
                        <h2 id="titre"></h2>
                        <table id="example" class="display table dataTable table-striped table-bordered editable-table">
                            <thead>
                                <tr>
                                   
                                    <th><strong>Numero candidat</strong></th>
                                    <th><strong>Nom complet</strong></th>
                                    <th><strong>Date naissance</strong></th>
                                    <th><strong>Ecole/Region</strong></th>
                                    <th><strong>Moyenne</strong></th>
                                    <th><strong>Décision</strong></th>
                                    
                                  
                                    


                                </tr>
                            </thead>
                            <tbody>
                      

                               
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

                           
@if($resultat_count!=0)
@include('Back.deliberation.delete')
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
<script>





// ...

function updateTable1() {
    var num=document.getElementById('list_eleve').value;
   
// Supprime toutes les lignes actuelles du tableau
$('#example tbody').empty();

// Appel AJAX pour récupérer les tickets mis à jour
$.ajax({
dataType: "json",
url: "/eleve/liste/serie/"+num,
type: "GET",
success: function (data) {
    console.log(data);

    // Mise à jour du tableau avec les nouvelles données
    $.each(data.list_ticket, function (index, ticket) {
        var statusBadge = (ticket.statut == 0) ? '<span class="badge"style="background: green;">valide</span>' : '<span class="badge bg-danger"style="background: red;">Invalide</span>';
        var typeNom = ticket.event ? (ticket.event.Nom_Event || '') : '';
        var row = '<tr>' +
    // '<td><a href="ticket-detail.html" class="fw-bold text-secondary">#' + ticket.CIN + '</a></td>' +
    '<td>' + ticket.Numero_Candidat + '</td>' +
    '<td><span class="fw-bold ms-1">' + ticket.Prenom + ' ' + ticket.Nom + '</span></td>' +
    '<td>' + ticket.Date_Naissance + '</td>' +
    '<td>' +
    // '<div class="btn-group" role="group" aria-label="Basic outlined example">' + ticket.Lieu_Naissance +
    // '</div>' +
    '<div class="btn-group" role="group" aria-label="Basic outlined example">' + ticket.Nom_Ecole +
    '</div>' +
    '<div class="btn-group" role="group" aria-label="Basic outlined example">' + ticket.Nom_Region +
    '</div>' +
    '</td>' +
    '<td style="width:15px;"><a href="ticket-detail.html" class="fw-bold text-secondary" style="width:15px;">' + ticket.note + '</a></td>';

if (ticket.note >= 10) {
    row += '<td class="bg-success" style="text-align:center;font-size:25;color:white;">' +
        '<div class="btn-group s" style="text-align:center;" role="group" aria-label="Basic outlined example">ADMIN</div>' +
        '</td>';
} else if (ticket.note >= 9) {
    row += '<td class="bg-warning" style="text-align:center;font-size:25;color:white;">' +
        '<div class="btn-group" style="text-align:center;" role="group" aria-label="Basic outlined example">SESSION COMPLEMENTAIRE</div>' +
        '</td>';
} else if (ticket.note < 9) {
    row += '<td class="bg-danger" style="text-align:center;font-size:25;color:white;">' +
        '<div class="btn-group" style="text-align:center;" role="group" aria-label="Basic outlined example"> NON ADMIN</div>' +
        '</td>';
}

row += '</tr>';

//        if(ticket.note >=10) {
//     row += '<div class="btn-group bg-success" style="text-align:center;" role="group" aria-label="Basic outlined example">ADMIN</div>';
// }else if(ticket.note>=9) {
//     row += '<div class="btn-group bg-warning" role="group" aria-label="Basic outlined example">SESSION COMPLEMENTAIRE</div>';
// }else if(ticket.note<9){
//     row += '<div class="btn-group bg-danger" role="group" aria-label="Basic outlined example">NON ADMIN</div>';
// }

// row += '</td>' +

        $('#example tbody').append(row);
    });
    $('#example').DataTable();
},
error: function (error) {
    console.log(error);
}
});
}

// Appel initial pour charger les tickets au chargement de la page
$(document).ready(function () {
updateTable();
});

// ...



</script>






@endsection








