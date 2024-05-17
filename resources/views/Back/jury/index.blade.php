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
                <form action="{{ route('jury.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="d-flex">
                    
                    <select class="col-5 form-control wide mb-3" id="region" name="region_id">
                <option value="0"><u>Veuillez choire la region</u></option>
                @foreach($region as $regions)
                <option value="{{$regions->id}}"><u>{{$regions->Nom_Region}}</u></option>
                @endforeach
                
            </select>
               
            <select class="col-3 form-control wide mb-3" id="centre" name="centre_id">
                    <option value="0"><u>Veuillez choire le centre</u></option>
                    
            </select>
         
            <select class="col-3 form-control wide mb-3" id="serie" name="serie_id">
                    <option value="0"><u>Veuillez choire la serie</u></option>
                    
                </select>
                
               
                </div>
                    <center> <h3 >Ajouter un ficher CSV </h3></center>
                   <center>
                   <div class="col-8 d-flex">
                 
                 <input type="file" name="file" class="form-control">
                  
                  <button class="btn btn-primary d-flex" style="height: 32px;margin-left: 3px;width:145px;" type="submit">Import fichier</button>
                  </div>

                   </center>
            </form>
            <br>
                    <div class="table-responsive">
                        <center>
                 <div class="row justify-content-center">
                 <div class="col-5" >
                        <select class="col-5 form-control wide mb-3" onclick="return updateTable1()" id="liste_region" name="region2_id">
                    <option value="0"><u>Veuillez choire la region</u></option>
                    @foreach($region as $regions)
                <option value="{{$regions->id}}"><u>{{$regions->Nom_Region}}</u></option>
                @endforeach
                </select>
                </div>

                <div class="col-5" style="margin-left:5px;">
                        <select class="col-5 form-control wide mb-3"  id="liste_centre" name="centre2_id">
                    <option value="0"><u>Veuillez choire une centre</u></option>
                   
                </select>
                </div>
                 </div>
                        </center>
                        <table id="example" class="display table dataTable table-striped table-bordered editable-table">
                            <center> <strong id="html" style="color:#1ee0ac;font-size:20px;"></strong></center>
                            <thead>
                                <tr>
                                   
                                    <th><strong>Matricule du jury</strong></th>
                                    <th><strong>President Jury</strong></th>
                                    <th><strong>Serie</strong></th>
                                  
                                    <th><strong>Centre</strong></th>
                                  
                                  
                                    


                                </tr>
                            </thead>
                            <tbody id="UpdateTable">
                                <?php
                                      use App\Models\groupe;
                                    $jury_comp=0;

                                    ?>
                                    @if($jury_count!=0)
                                @foreach($jury as $jurys)

                                <tr>
                                   
                                    <td>{{$jurys->matricule}}</td>
                                    <td class="fw-bold text-secondary">{{$jurys->nom}}</td>
                                    <td>{{$jurys->region_id}} </td>
                                    <td>{{$jurys->centre_id}}</td>
                                   
                                   

                                      

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
                                                <a class="dropdown-item state" href="#">@if($jurys->etat==0)
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
url: "/getjury/centre/"+id,
type: "GET",
success: function (data) {
    console.log(data);
    $('#centre').html(data.html);
    $('#serie').html(data.html2);

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
$('#liste_region').change(function(){


    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
       });
    var id = $(this).val();




$.ajax({
dataType: "json",
url: "/getRegion2/"+id,
type: "GET",
success: function (data) {
    console.log(data);
    $('#liste_centre').html(data.html);
    $('#html').html(data.html2);

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
    var num=document.getElementById('liste_region').value;
// Supprime toutes les lignes actuelles du tableau
$('#UpdateTable tbody').empty();

// Appel AJAX pour récupérer les tickets mis à jour
$.ajax({
dataType: "json",
url: "/jury/liste/"+num,
type: "GET",
success: function (data) {
    console.log(data);
    $('#UpdateTable').html(data.html);

    $('#liste_centre').change(function(){
      var var_region = $(this).val();
      console.log(var_region);
      var num2=document.getElementById('liste_centre').value;


      $.ajax({
          dataType: "json",
          url: "/jury/liste2/" + var_region,
          type: "GET",
          success: function (data) {
            $('#UpdateTable tbody').empty();
              console.log(data);
              $('#UpdateTable').html(data.html);

            },
          error: function(error) {
              console.log(error);
          }
      });

    });

},
error: function (error) {
    console.log(error);
}
});
}

// Appel initial pour charger les tickets au chargement de la page
$(document).ready(function () {
updateTable1();
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
