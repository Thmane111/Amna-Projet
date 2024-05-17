<?php
use App\Models\Module;
use App\Models\Permission;
use App\Models\Acces;
use App\Models\Attribution;
use App\Models\Product;
use App\Models\ImageProduct;
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


    <div class="container-fluid site-width">
        <!-- START: Breadcrumbs-->
        <div class="row">
            <div class="col-12  align-self-center">
                <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto"><h4 class="mb-0">Gestion des produits</h4> <p>Welcome to liner admin panel</p></div>

                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- END: Breadcrumbs-->

        <!-- START: Card Data-->
    
        <!-- END: Card DATA-->
        <div class="col-lg-12" style="margin-top:5%;">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display table dataTable table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="width:80px;"><strong>#</strong></th>
                                    <th><strong>Image</strong></th>
                                    <th><strong>Téléphone</strong></th>
                                    <th><strong>Localisation</strong></th>
                                    <th><strong>Prix produit</strong></th>
                                    <th><strong>Status</strong></th>
                                    <th><strong>Action</strong></th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                    $data_prod_comp=0;

                                    ?>
                                    @if($data_prod_count!=0)
                                @foreach($data_prod as $data_prods)
                                        <?php
                                         $img=ImageProduct::all()->where('product_id','=',$data_prods->id)->first();
                                        ?>
                                <tr>
                                    <td>{{$data_prod_comp++}}</td>
                                    <td><img src="/uploads/Annonce/{{$img->image}}" width="50px;" height="50px;"></td>
                                    <td>{{$data_prods->titre_prod}}</td>
                                    <td>{{$data_prods->ville}}</td>
                                    <td>{{$data_prods->prix_prod}}</td>

                                    <td>@if($data_prods->etat==0)
                                        <span class="badge light badge-danger" style="font-size:15px; ">desactver</span>
                                        @elseif($data_prods->etat==1)
                                        <span class="badge light badge-success" style="font-size:15px; ">activer</span>
                                        @endif
                                    </td>



                                    <td id="action">
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
                                                <a class="dropdown-item" href="{{route('Backlg.state',$data_prods->id)}}">@if($data_prods->etat==0)
                                                    activer
                                                    @else desactiver
                                                    @endif
                                                   </a>


                                              @elseif($mod22->permission=="Supprimer")
                                              <form id="destroy{{$data_prods->id}}" action="{{route('Backlg.Supprimer',$data_prods->id)}}" method="POST" class="btn btn-danger"
                                                style="background:transparent;border:solid 0px;padding:0px;">
                                                   @csrf
                                                   @method('DELETE')
                                                   <button onclick="return confirmer()"  style="background:transparent;border:solid 0px;" id="delete">supprimer</button>
                                              </form>
                                              @elseif($mod22->permission=="Voir")
                                              <a href="/bagwelle/ListProduit/show/{{$data_prods->id}}" class="dropdown-item

                                                ">{{$mod22->permission}}</a>
                                               @else
                                              <a href="/bagwelle/membre/{{$data_prods->id}}" class="dropdown-item

                                                ">{{$mod22->permission}}</a>
                                               @endif
                                                <?php }} ?>
                                            </div>

                                        </div>

                                    </td>

                                </tr>

                                @endforeach
                                @endif
                            </tbody>

                        </table>
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



















































<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- 






<script>

    function updateTable() {


    var num=document.getElementById('all_cat').value;
    console.log(num);
// Supprime toutes les lignes actuelles du tableau


// Appel AJAX pour récupérer les tickets mis à jour
$.ajax({
dataType: "json",
url: "/bagwelle/UpdateTabe1/"+num,
type: "GET",
success: function (data) {
    $('#example tbody').empty();
    console.log(data);

    // Mise à jour du tableau avec les nouvelles données
    $.each(data.list, function (index, ticket) {
        $.ajax({
dataType: "json",
url: "/bagwelle/UpdateTabe2/"+ticket.id,
type: "GET",
success: function (data) {
    console.log(data);
  
        var row = '<tr>' +
            '<td><a href="ticket-detail.html" class="fw-bold text-secondary">#' + ticket.Numero_Ticket + '</a></td>' +
            '<td> <img src=/uploads/Annonce/'+data.list1.image+' width="50px;" height="50px;"> </td>' +
            '<td><span class="fw-bold ms-1">' + ticket.prix + ' FCFA</span></td>' +
            '<td>' + ticket.nom_type + '</td>' +
            '<td>' +
            '<div class="btn-group" role="group" aria-label="Basic outlined example">' +ticket.created_at +
            '</div>' +
            '</td>' +
            '<td>' + ticket.nom_type + '</td>' +
            '<td id="action">''</td>' +
            '</tr>';
            $('#action').html(data.html);
        $('#example tbody').append(row);
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
updateTable();
});
</script>

@endsection -->
