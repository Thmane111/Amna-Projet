
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

    <?php
    use App\Models\Attribution;
    use App\Models\Serie;
    use App\Models\SerieRegion;
    ?>

<div class="container-fluid">
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">Liste des permissions</a></li>
        </ol>
    </div>

    <div class="row row-eq-height">
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
        <div class="col-12 col-lg-2 mt-3 todo-menu-bar flip-menu pr-lg-0">
            <a href="#" class="d-inline-block d-lg-none mt-1 flip-menu-close"><i class="icon-close"></i></a>
            <div class="card border h-100 todo-menu-section">
                <div class="card-header d-flex justify-content-between align-items-center">

                    <a href="#"  class="bg-primary py-2 px-2 rounded ml-auto text-white" data-toggle="modal" data-target="#newtodo">
                        <i class="icon-plus align-middle text-white"></i> <span>Ajoute groupe</span>
                    </a>
                    <!-- Add Todo -->
                    <div class="modal fade" id="newtodo">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">
                                        <i class="icon-pencil"></i> Add Todo
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <i class="icon-close"></i>
                                    </button>
                                </div>

                                    <div class="modal-body">

                                        <form  action="{{route('serie.import')}}" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            
                                            <select class="default-select form-control wide mb-3" name="serie_id">
                                    <option value="0"><u>Veuillez choire l'Utilisateur à attribuer</u></option>
                                    @foreach($serie1 as $serie1s)
                                    <option value="{{$serie1s->id}}">{{$serie1s->serie}}</option>
                          @endforeach
                                </select>
                                

                                <div class="mb-3">
                                    <label style="background:green;padding:5px;color:white;">Importer un fichier excel</label>
                                                <input type="file" name="file" class="form-control input-rounded" >
                                </div>           
                                            


                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>


                </div>

                <ul class="nav flex-column todo-menu">
                    <li class="nav-item">
                        <a class="nav-link active" href="#" data-todotype="bien">
                            <i class="icon-list"></i> Bienvenue
                        </a>
                    </li>
                    @foreach($serie1 as $serie1s)
                    <li class="nav-item">
                        <a class="nav-link active" href="#" data-todotype="serie_{{$serie1s->id}}">
                            <i class="icon-list"></i> {{$serie1s->serie}}
                        </a>
                    </li>
                    @endforeach


                </ul>

            </div>
        </div>
        <div class="col-12 col-lg-10 mt-3 pl-lg-0">
            <div class="card border h-100 todo-list-section">
                <div class="card-header border-bottom p-1 d-flex">
                    <a href="#" class="d-inline-block d-lg-none flip-menu-toggle"><i class="icon-menu"></i></a>
                    <input type="text" class="form-control border-0 p-2 w-100 h-100 todo-search" placeholder="Search ...">
                </div>
                <div class="card-body p-0">

                    <div class="scrollertodo">
                        <ul class="todo-list">
                            <li class="todo-item bien">
                                <label class="chkbox">
                                    <input type="checkbox" checked="checked">
                                    <span class="checkmark mt-2"></span>
                                </label>
                                <div class="todo-content">
                                    <h3>Bienvenu.</h3>
                                    <p class="text-muted mb-0 font-weight-bold todo-date">June 8, 2020</p>
                                    <p class="small-content text-muted mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                </div>

                            </li>
                            @foreach($serie1 as $serie1s)
                            <?php

         $region=SerieRegion::all()->where('serie_id','=',$serie1s->serie_id);
         ?>
                            <li class="todo-item serie_{{$serie1s->serie_id}} ">
                                <div class="table-responsive">
                                    <table id="example" class="display table dataTable table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nom de serie</th>
                                                <th>Region</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($region as $regions)
                                     
                                            <tr>
                                            <td>{{$regions->serie->serie}}</td>
                                                <td>{{$regions->region ?  $regions->region->Nom_Region:'vide'}}</td>
                                                <td class="text-right">
                                                    <a href="#" class="dropdown-item" name="idM"  >
                                                         <i class="fa fa-plus"></i>

                                                    </a>
                                                </td>

                                            </tr>
                                          
                                           @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </li>
                            @endforeach



                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>



<script>
    $(document).ready(function (){

        $('.permission').on('click', function (){

            $('#poppermi').modal('show');

            $tr= $(this).closest('tr');
            var data= $tr.children("td").map(function() {
              return $(this).text();
            }).get();
          console.log(data);
            $('.admin_id').val(data[4]);
            $('.module_id').val(data[5]);
            $('#etat1').val(data[7]);
            $('.tache').val(data[3]);


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

            $('#module1').html(data[1]);
            $('#groupe1').html(data[2]);

            $('#etat1').html(data[3]);


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

          $('#id_f').val(data[6]);


        });
    });
</script>


<script>
    function handleClick(event) {
    // Récupérer l'élément sur lequel le clic a été effectué
    var targetElement = event.target;

    // Vérifier si l'élément sur lequel le clic a été effectué possède l'attribut data-todotype
    if (targetElement.getAttribute('data-todotype')) {
        // Récupérer la valeur de l'attribut data-todotype
        var todotypeValue = targetElement.getAttribute('data-todotype');

        // Utiliser la valeur récupérée comme nécessaire
        console.log('Valeur de data-todotype:', todotypeValue);
    }
}

// Ajouter un gestionnaire d'événement click à tous les liens avec la classe "nav-link"
var navLinks = document.querySelectorAll('.nav-link');
navLinks.forEach(function(navLink) {
    navLink.addEventListener('click', handleClick);
});

</script>
@endsection
