
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
            <li class="breadcrumb-item"><a href="#">page propos</a></li>
        </ol>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><a href="{{route('blog.CreateBlog')}}" class="btn btn-success">Ajouter un nouveau blog</a></h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>blog image</th>
                                    <th>Blog title</th>
                                    <th>Blog catégorie</th>
                                    <th>blog tag</th>
                                    <th style="display: none;">id</th>
                                    <th style="display: none;">Description</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($blog as $blogs)
                                <tr>
                                    <td><img class="rounded-circle" width="55" src="/photo/blog/{{$blogs->blog_image}}" alt=""></td>
                                    <td>{{$blogs->blog_title}}</td>
                                    <td>{{$blogs['BlogCategory']['blog_category']}}</td>
                                    <td>{{$blogs->blog_tag}}</td>
                                    <td style="display: none;">{{$blogs->id}}</td>
                                    <td style="display: none;">{{"/photo/blog/".$blogs->blog_image}}</td>

                                    <td>
                                        <div class="dropdown ms-auto text-end">
                                            <div class="btn-link" data-bs-toggle="dropdown">
                                                <svg width="24px" height="24px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                            </div>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a href="{{route('blog.EditBlog',$blogs->id)}}" class="dropdown-item Modifier"  >Edit</a>
                                                <a href="{{route('blog.ShowBlog',$blogs->id)}}" data-target="#popview" class="dropdown-item"

                                                >Voir</a>
                                                <a class="dropdown-item Supprimer" href="#">Delete</a>
                                                <a class="dropdown-item state" href="#">@if($blogs->etat==0)
                                                    activer
                                                    @else desactiver
                                                    @endif
                                                   </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>




    </div>

</div>




<script src="{{asset('Back/dist/js/jquery.min.js')}}"></script>
<script src="{{asset('Back/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('Back/dist/js/moment.js')}}"></script>
<link rel="stylesheet" href="assets/css/plugins/jquery.lineProgressbar.css">
@if($blog_count!=0)
    @include('Espace-Admin.module-site-web.blog.delete')
    @include('Espace-Admin.module-site-web.blog.state')

@endif
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

          $('#id_f').val(data[4]);
          $('#img').attr('src', data[5]);



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

          $('#id_s').val(data[4]);


        });
    });
</script>


<script>
    $(document).ready(function (){

        $('.Voir').on('click', function (){

            $('.bd-example-modal-lg').modal('show');

            $tr= $(this).closest('tr');
            var data= $tr.children("td").map(function() {
              return $(this).text();
            }).get();
          //alert(data);
          console.log(data);

            $('#blog_image').html(data[0]);
            $('#blog_title').html(data[1]);
            $('#blog_category').html(data[2]);
            $('#blog_tag').html(data[3]);
            $('#blog_id').html(data[4]);
            $('#blog_desc').html(data[5]);


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
