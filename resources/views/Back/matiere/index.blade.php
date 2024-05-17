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
                <form action="{{ route('matiere.import') }}" method="POST" enctype="multipart/form-data">
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
               <a href="" class="col-3 form-control wide mb-3 bg-danger">Vider la table</a>
                </div>
                    <center> <h3 >Ajouter un ficher CSV </h3></center>
                   <center>
                   <div class="col-12 d-flex">
                 
                 <input type="file" name="file" class="form-control">
                  
                  <button class="btn btn-success d-flex" style="height: 32px;margin-left: 3px;width:130px;" type="submit">Import fichier</button>
                  <button type='button' class='btn btn-warning mb-2' data-toggle='modal' style="height: 32px;margin-left: 3px;width:275px;" data-target='#exampleModalpopover'>Ajouter une matiere</button>
                  </div>

                   </center>
            </form>
            <br>
                    <div class="table-responsive">
                        <center>
                            <div class="col-6" style="background:blue;">
                        <select class="col-3 form-control wide mb-3" onclick="return updateTable()" id="liste_serie" name="serie_id">
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
                                   
                                    <th><strong>Matiere</strong></th>
                                    <th><strong>Cefficient</strong></th>
                              
                                
                                    <th style="display:none;"><strong>Id</strong></th>
                                    <th><strong>Etat</strong></th>
                                    <th><strong>Action</strong></th>
                                  
                                    


                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                      use App\Models\groupe;
                                    $matiere_comp=0;

                                    ?>
                                    @if($matiere_count!=0)
                                @foreach($matiere as $matieres)

                                <tr>
                                   
                                    <td>{{$matieres->Nom_Matiere}}</td>
                                    <td class="fw-bold text-secondary">{{$matieres->Coefficient}}</td>
                       
                                    <td>@if($matieres->etat==0)
                                        <span class="badge light badge-danger" style="font-size:15px; ">desactiver</span>
                                        @elseif($matieres->etat==1)
                                        <span class="badge light badge-success" style="font-size:15px; ">activer</span>
                                        @endif
                                    </td>
                                    <td>{{$matieres->id}}</td>
                                      

                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-success light sharp" data-toggle="dropdown">
                                                <svg width="20px" height="20px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                            </button>

                                            <div class="dropdown-menu">
                                                <?php
                                                if($vv!=0){
                                                 $attrib=Attribution::All()->where('admins_id','=',Auth::guard('admin')->user()->id)->first();
                                                    $mod2=Permission::all()->where('groupe_id','=',$attrib->groupe_id)
                                                    ->where('module_id','=',$modES->id)
                                                    ->where('etat','=',1);
                                                   foreach($mod2 as $mod22) {
                                                ?>
                                                @if($mod22->permission=="Activer/désactiver")
                                                <a class="dropdown-item state" href="#">@if($matieres->etat==0)
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
<script>





// ...

function updateTable() {
    var num=document.getElementById('liste_serie').value;
// Supprime toutes les lignes actuelles du tableau
$('#example tbody').empty();

// Appel AJAX pour récupérer les tickets mis à jour
$.ajax({
dataType: "json",
url: "/matiere/liste/"+num,
type: "GET",
success: function (data) {
    console.log(data);

    // Mise à jour du tableau avec les nouvelles données
    var MonTitre=document.getElementById("titre");
    MonTitre.innerHTML="Liste matiere serie "+data.titre.serie;
    $.each(data.list_ticket, function (index, ticket) {
        var statusBadge = (ticket.statut == 0) ? '<span class="badge"style="background: green;">valide</span>' : '<span class="badge bg-danger"style="background: red;">Invalide</span>';
        var typeNom = ticket.event ? (ticket.event.Nom_Event || '') : '';
        var row = '<tr>' +
    '<td><a href="ticket-detail.html" class="fw-bold text-secondary">#' + ticket.Nom_Matiere + '</a></td>' +
    '<td>' + ticket.Coefficient + '</td>' +
    '<td  style="display:none;">' + ticket.id + '</td>' +
   
    '<td>';

if (ticket.etat == 0) {
    row += '<div class="btn-group bg-danger" role="group" aria-label="Basic outlined example">desactiver</div>';
} else {
    row += '<div class="btn-group bg-success" role="group" aria-label="Basic outlined example">activer</div>';
}

row += '</td>' +
    '<td>' +
    '<div class="dropdown">' +
    '<button type="button" class="btn btn-success light sharp" data-toggle="dropdown">' +
    '<svg width="20px" height="20px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>' +
    '</button>' +
    '<div class="dropdown-menu">' +
    '<a class="dropdown-item state" href="#">Modifier</a>' +
    '<a class="dropdown-item state" href="#">Supprimer</a>' +
    '<a class="dropdown-item state" href="#">Desactiver</a>' +
    '</div>' +
    '</div>' +
    '</td>' +
    '</tr>';



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







  
  <!-- {{-- <script>
    let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });

    Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
            scanner.start(cameras[0]);
        } else {
            alert('No cameras found');
        }
    }).catch(function (e) {
        console.error(e);
    });

    scanner.addListener('scan', function (e) {
        var ValScan1 = document.getElementById('text').value = e;
        var ValScan2 = document.getElementById('event').value;

        $(document).ready(function () {
            $.ajax({
                dataType: "json",
                url: "/client/QRjson",
                type: "POST",
                data: {
                    text: ValScan1,
                    event: ValScan2,
                    _token: '{{ csrf_token() }}'
                },
                success: function (data) {
                    console.log(data);

                    // Mise à jour du tableau avec les nouvelles données
                    updateTable(ValScan2);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
    });

    function updateTable(ValScan2) {
        // Supprime toutes les lignes actuelles du tableau
        $('#ticketTable tbody').empty();

        // Ajoute les nouvelles lignes basées sur les données reçues
        $.each(ValScan2, function (index, ticket) {
            var statusBadge = (ticket.statut == 0) ? '<span class="badge bg-success">Valable</span>' : '<span class="badge bg-danger">In Progress</span>';

            var row = '<tr>' +
                '<td><a href="ticket-detail.html" class="fw-bold text-secondary">#' + ticket.numero_ticket + '</a></td>' +
                '<td>' + ticket.type + '</td>' +
                '<td><span class="fw-bold ms-1">' + ticket.prix + ' FCFA</span></td>' +
                '<td>' + statusBadge + '</td>' +
                '<td>' +
                '<div class="btn-group" role="group" aria-label="Basic outlined example">' +
                '<button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#edittickit"><i class="icofont-edit text-success"></i></button>' +
                '<button type="button" class="btn btn-outline-secondary deleterow"><i class="icofont-ui-delete text-danger"></i></button>' +
                '</div>' +
                '</td>' +
                '</tr>';

            $('#ticketTable tbody').append(row);
        });
    }
</script> --}} -->
