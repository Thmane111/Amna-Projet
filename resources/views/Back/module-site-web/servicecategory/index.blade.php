
@extends('Espace-Admin.index')


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
            <li class="breadcrumb-item"><a href="#">Liste des type de service</a></li>
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


                        <button type='button' class='btn btn-primary mb-2' data-bs-toggle='modal' data-bs-target='#exampleModalpopover'>Ajouter un menu </button>

                    <!-- Modal -->
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th style="width:80px;"><strong>#</strong></th>
                                    <th><strong>Nom type de service</strong></th>

                                    <th><strong>Status</strong></th>

                                    <th style="display: none;"><strong>Id</strong></th>

                                    <th style="display: none;"><strong>description</strong></th>


                                </tr>
                            </thead>
                            <tbody>
<?php $comp=0; ?>
                                @foreach($servicecategory as $servicecategorys)

                                <tr>
                                    <td>{{$comp++;}}</td>
                                    <td>{{$servicecategorys->service_category}}</td>
                                    <td>@if($servicecategorys->etat==0)
                                        <span class="badge light badge-danger" style="font-size:15px; ">desactver</span>
                                        @elseif($servicecategorys->etat==1)
                                        <span class="badge light badge-success" style="font-size:15px; ">activer</span>
                                        @endif
                                    </td>

                                       <td style="display: none;">{{$servicecategorys->id}}</td>
                                       <td style="display: none;">{{$servicecategorys->Description}}</td>
                                       <td style="display: none;">{{"/photo/service-categorie/".$servicecategorys->image}}</td>


                                    <td>
                                        <div class="dropdown">

                                            <button type="button" class="btn btn-success light sharp" data-bs-toggle="dropdown">
                                                <svg width="20px" height="20px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                            </button>

                                            <div class="dropdown-menu">


                                                    <button type="button" class="dropdown-item Modifier"  >Edit</button>
                                                    <button data-target="#popview" class="dropdown-item Voir"

                                                    >Voir</button>
                                                    <a class="dropdown-item Supprimer" href="#">Delete</a>
                                                    <a class="dropdown-item state" href="#">@if($servicecategorys->etat==0)
                                                        activer
                                                        @else desactiver
                                                        @endif
                                                       </a>

                                            </div>
                                        </div>

                                    </td>

                                </tr>

                                @endforeach


                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


                            @include('Espace-Admin.module-site-web.servicecategory.add')
@if($servicecategory_count!=0)
@include('Espace-Admin.module-site-web.servicecategory.edit')
@include('Espace-Admin.module-site-web.servicecategory.view')
@include('Espace-Admin.module-site-web.servicecategory.delete')
@include('Espace-Admin.module-site-web.servicecategory.state')
@endif
<script src="{{asset('Back/dist/js/jquery.min.js')}}"></script>
<script src="{{asset('Back/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('Back/dist/js/moment.js')}}"></script>


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
            $('#nom_serv').val(data[1]);
            $('#desc').val(data[4]);
            $('#img').attr('src', data[5]);


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

            $('#nom_serv1').html(data[1]);
            $('#etat1').html(data[2]);


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

<link rel="stylesheet" href="assets/css/plugins/jquery.lineProgressbar.css">
<script>
  const image_input = document.querySelector("#image-input");

image_input.addEventListener("change", function() {
const reader = new FileReader();
reader.addEventListener("load", () => {
const uploaded_image = reader.result;
document.querySelector("#display-image").style.backgroundImage = `url(${uploaded_image})`;
document.querySelector("#display-image img").style.display = `none`;

});
reader.readAsDataURL(this.files[0]);
});
</script>



<style>



    #display-image .fa{
    font-size:90px;
    background: red;

    }
    .rek{
    display: inline-block;
    }
    #display-image{
    width:95px;
    justify-content: center;
    margin-left: 50px;
    margin-top: 10px;
    height:100px;
    box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 5px 0px, rgba(0, 0, 0, 0.1) 0px 0px 1px 0px;

    background-position: center;
    background-size: cover;
    }
    #display-image1{
    width:95px;
    justify-content: center;
    margin-left: 50px;
    margin-top: 10px;
    height:100px;
    box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 5px 0px, rgba(0, 0, 0, 0.1) 0px 0px 1px 0px;

    background-position: center;
    background-size: cover;
    }


    .fs{
    display: flex;
    width:auto;
    }

     input[type="file"]{
    display: none;
    }

    .c2 label{
    color:white;
    height:40px;
    width:200px;
    background-color: rgb(79, 79, 136);

    font-family:"Montserrat",sans-serif;
    font-size: 15px;
    display: flex;
    justify-content: center;
    align-items: center;
    }

    .dd{
    display: flex;
    }



                   </style>




@endsection
