
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
            <li class="breadcrumb-item"><a href="/admin/blog">page blog</a></li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6  col-md-6 col-xxl-5 ">

                            <!-- Tab panes -->
                            <div id="my-posts" class="tab-pane fade active show">
                                <div class="my-post-content pt-3">

                                    <div class="profile-uoloaded-post border-bottom-1 pb-5">
                                        <img src="/photo/blog/{{$voirs->blog_image}}" style="height:250px;" alt="" class="img-fluid w-100 rounded">

                                        <h2>{{$voirs->blog_title}}</h2>
                                    </div>


                                </div>

                            </div>

                            <div class="tab-slide-content new-arrival-product mb-4 mb-xl-0">
                                <!-- Nav tabs -->
                                <ul class="nav slide-item-list mt-3" role="tablist">
                                    <li role="presentation" class="show">
                                        <a href="#first" role="tab" data-bs-toggle="tab">
                                            <img class="img-fluid" src="images/tab/1.jpg" alt="" width="50">
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#second" role="tab" data-bs-toggle="tab"><img class="img-fluid" src="images/tab/2.jpg" alt="" width="50"></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#third" role="tab" data-bs-toggle="tab"><img class="img-fluid" src="images/tab/3.jpg" alt="" width="50"></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#for" role="tab" data-bs-toggle="tab"><img class="img-fluid" src="images/tab/4.jpg" alt="" width="50"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!--Tab slider End-->
                        <div class="col-xl-9 col-lg-6  col-md-6 col-xxl-7 col-sm-12">
                            <div class="product-detail-content">
                                <!--Product details-->
                                <div class="new-arrival-content pr">


                                    <p>Availability: <span class="item"> {{$voirs->update_at}} <i class="fa fa-shopping-basket"></i></span>
                                    </p>
                                    <p>Catégorie blog: <span class="item">{{$voirs['BlogCategory']['blog_category']}}</span> </p>
                                    <p>tags du blog:&nbsp;&nbsp;
                                        <span class="badge badge-success light">{{$voirs->blog_tag}}</span>

                                    </p>
                                    <p class="text-content">{!!$voirs->blog_description!!}</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- review -->

    </div>

</div>













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
