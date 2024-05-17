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
            <li class="breadcrumb-item"><a href="#">Liste des eleves</a></li>
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
                <form action="{{ route('ecole.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="d-flex">
                    
                    <select class="col-5 form-control wide mb-3" id="region" name="region_id">
                <option value="0"><u>Veuillez choire la region</u></option>
                @foreach($region as $regions)
                <option value="{{$regions->id}}"><u>{{$regions->Nom_Region}}</u></option>
                @endforeach
                
            </select>
               
            <select class="col-5 form-control wide mb-3" id="centre" name="centre_id">
                    <option value="0"><u>Veuillez choire le centre</u></option>
                    
                </select>
                
               
                </div>
                    <center> <h3 >Ajouter un ficher CSV </h3></center>
                   <center>
                   <div class="col-8 d-flex">
                 
                 <input type="file" name="file" class="form-control">
                  
                  <button class="btn btn-primary d-flex" style="height: 32px;margin-left: 3px;width:125px;" type="submit">Import fichier</button>
                  </div>

                   </center>
            </form>
            <br>
                    <div class="table-responsive">
                        <center>
                            <div class="col-6" style="background:blue;">
                        <select class="col-3 form-control wide mb-3" onclick="return updateTable()" id="liste_eleve" name="niveau_id">
                    <option value="0"><u>Veuillez choire la region</u></option>
                    @foreach($region as $regions)
                <option value="{{$regions->id}}"><u>{{$regions->niveau}}</u></option>
                @endforeach
                </select>
                </div>
                        </center>
                        <table id="example" class="display table dataTable table-striped table-bordered editable-table">
                            <thead>
                                <tr>
                                   
                                    <th><strong>Matricule</strong></th>
                                    <th><strong>Centre</strong></th>
                                    <th><strong>Nom ecole</strong></th>
                                  
                                    <th><strong>Etat dossier</strong></th>
                                    <th><strong>Action</strong></th>
                                  
                                    


                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                      use App\Models\groupe;
                                    $ecole_comp=0;

                                    ?>
                                    @if($ecole_count!=0)
                                @foreach($ecole as $ecoles)

                                <tr>
                                   
                                    <td>{{$ecoles->CIN}}</td>
                                    <td class="fw-bold text-secondary">{{$ecoles->Numero_Candidat}}</td>
                                    <td>{{$ecoles->Prenom}} {{$ecoles->Nom}}</td>
                                    <td>{{$ecoles->Date_Naissance}}</td>
                                    <td>{{$ecoles->Lieu_Naissance}}</td>
                                 
                                    <td>@if($ecoles->etat==0)
                                        <span class="badge light badge-danger" style="font-size:15px; ">desactver</span>
                                        @elseif($ecoles->etat==1)
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
                                                if($vv!=0){
                                                 $attrib=Attribution::All()->where('admins_id','=',Auth::guard('admin')->user()->id)->first();
                                                    $mod2=Permission::all()->where('groupe_id','=',$attrib->groupe_id)
                                                    ->where('module_id','=',$modES->id)
                                                    ->where('etat','=',1);
                                                   foreach($mod2 as $mod22) {
                                                ?>
                                                @if($mod22->permission=="Activer/désactiver")
                                                <a class="dropdown-item state" href="#">@if($ecoles->etat==0)
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
url: "/getEcoleCentre/"+id,
type: "GET",
success: function (data) {
    console.log(data);
    $('#centre').html(data);

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
    var num=document.getElementById('liste_eleve').value;
// Supprime toutes les lignes actuelles du tableau
$('#example tbody').empty();

// Appel AJAX pour récupérer les tickets mis à jour
$.ajax({
dataType: "json",
url: "/eleve/liste/"+num,
type: "GET",
success: function (data) {
    console.log(data);

    // Mise à jour du tableau avec les nouvelles données
    $.each(data.list_ticket, function (index, ticket) {
        var statusBadge = (ticket.statut == 0) ? '<span class="badge"style="background: green;">valide</span>' : '<span class="badge bg-danger"style="background: red;">Invalide</span>';
        var typeNom = ticket.event ? (ticket.event.Nom_Event || '') : '';
var row = '<tr>' +
            '<td><a href="ticket-detail.html" class="fw-bold text-secondary">#' + ticket.CIN + '</a></td>' +
            '<td>' +  ticket.Numero_Candidat + '</td>' +
            '<td><span class="fw-bold ms-1">' + ticket.Prenom +' '+ticket.Nom +'</span></td>' +
            '<td>' + ticket.Date_Naissance + '</td>' +
            '<td>' +
            '<div class="btn-group" role="group" aria-label="Basic outlined example">' + ticket.Lieu_Naissance +
            '</div>' +
            '</td>' +
            '<td>';

if(ticket.etat == 0) {
    row += '<div class="btn-group bg-warning" role="group" aria-label="Basic outlined example">Non valide</div>';
} else {
    row += '<div class="btn-group bg-success" role="group" aria-label="Basic outlined example">Valide</div>';
}

row += '</td>' +
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
