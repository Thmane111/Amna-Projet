
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
    ?>

<div class="container-fluid">
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">Liste des permissions</a></li>
        </ol>
    </div>

    <div class="row row-eq-height">
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

                                        <form  action="{{route('groupe.store')}}" method="POST">
                                            @csrf

                                            <div class="mb-3">
                                                <input type="text" name="nom_groupe" class="form-control input-default " placeholder="Nom groupe">
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" name="caption" class="form-control input-rounded" placeholder="Diminutif">
                                            </div>
                                            <div class="mb-3">
                                            <textarea class="form-control" name="detail"  placeholder="Description"></textarea>
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
                    @foreach($serie as $series)
                    <li class="nav-item">
                        <a class="nav-link active" href="#" data-todotype="serie_{{$series->id}}">
                            <i class="icon-list"></i> {{$series->serie}}
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
                            @foreach($serie as $series)
                            <?php
 use App\Models\Serie;
         $region=Serie::all()->where('region_id','=',$series->region_id);
         ?>
                            <li class="todo-item groupe_{{$series->id}} ">
                                <div class="table-responsive">
                                    <table id="example" class="display table dataTable table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Fonctionnalité</th>
                                                <th  class="text-right">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($region as $regions)
                                     
                                            <tr>
                                            <td>{{$regions->Nom_Region}}</td>
                                                <td>{{$regions->region ?  $regions->region->Nom_Region:'vide'}}</td>
                                                <td class="text-right">
                                                    <a href="{{route('permission.permi2',[$access->module ?  $access->module->id:'0',$attribut->groupe ?  $attribut->groupe->id:''])}}" class="dropdown-item" name="idM"  >
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
@endsection
