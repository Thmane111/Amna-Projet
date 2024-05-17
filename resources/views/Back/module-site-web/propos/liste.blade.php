
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
            <li class="breadcrumb-item"><a href="#">Liste des groupes</a></li>
        </ol>
    </div>

    <div class="row">


    	<div class="col-xl-12">
            <div class="row">
                @foreach($membre as $membres)
                <div class="col-xl-3 col-xxl-4 col-lg-4 col-md-6 col-sm-6 items">
                    <div class="card contact-bx item-content">
                        <div class="card-header border-0">
                            <div class="action-dropdown">
                                <div class="dropdown ">
                                    <div class="btn-link" data-bs-toggle="dropdown">
                                        <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="12.4999" cy="3.5" r="2.5" fill="#A5A5A5"></circle>
                                            <circle cx="12.4999" cy="11.5" r="2.5" fill="#A5A5A5"></circle>
                                            <circle cx="12.4999" cy="19.5" r="2.5" fill="#A5A5A5"></circle>
                                        </svg>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="javascript:void(0)">Delete</a>
                                        <a class="dropdown-item" href="javascript:void(0)">Edit</a>
                                        <a class="dropdown-item" href="javascript:void(0)">Voir profile</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body user-profile">
                            <div class="image-bx">
                                <img src="{{asset('Back/dist/images/pic1.jpg')}}" data-src="images/contacts/Untitled-3.jpg" alt="" class="rounded-circle">
                                <span class="active"></span>
                            </div>
                            <div class="media-body user-meta-info">
                                <h6 class="fs-18 font-w600 my-1"><a href="app-profile.html" class="text-black user-name" data-name="Alan Green">{{$membres->admin ? $membres->admin->name:'j'}}</a></h6>
                                <p class="fs-14 mb-3 user-work" data-occupation="UI Designer">{{$membres->admin ? $membres->admin->email:'j'}}</p>
                                <ul>
                                    <li><a href="javascript:void(0);"><i class="fas fa-phone-alt"></i></a></li>
                                    <li><a href="javascript:void(0);"><i class="far fa-comment-alt"></i></a></li>
                                    <li><a href="javascript:void(0);"><i class="fas fa-video"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
        <div class="progect-pagination d-flex justify-content-between align-items-center flex-wrap mt-3">
            <h4 class="mb-3">Showing 10 from 160 data</h4>
            <ul class="pagination mb-3">
                <li class="page-item page-indicator">
                    <a class="page-link" href="javascript:void(0)">
                        <i class="fas fa-angle-double-left me-2"></i>Previous</a>
                </li>
                <li class="page-item">
                    <a class=" active" href="javascript:void(0)">1</a>
                    <a class="" href="javascript:void(0)">2</a>
                    <a class="" href="javascript:void(0)">3</a>
                    <a class="" href="javascript:void(0)">4</a>
                </li>
                <li class="page-item page-indicator">
                    <a class="page-link" href="javascript:void(0)">
                    Next<i class="fas fa-angle-double-right ms-2"></i></a>
                </li>
            </ul>
        </div>
    </div>

</div>

                            <script>
                              function confirmer(){
                                if(confirm('confirmer vous la suppression'))return true;
                                else return false ;
                              }
                            </script>


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
@endsection
