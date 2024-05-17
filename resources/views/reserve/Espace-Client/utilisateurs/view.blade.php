

@extends('Espace-Admin.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h1 class="text-black" >Profile utilisateur</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right"></i> Pages</li>
        <li><i class="fa fa-angle-right"></i> Profile Page</li>
      </ol>
    </div>

    <!-- Main content -->
    <div class="content">
      <div class="row">
        <div class="col-lg-12" >
          <div class="user-profile-box m-b-3">
            <div class="box-profile text-white"> <img class="profile-user-img img-responsive img-circle m-b-2" src="/uploads/Profile/{{$voirs->profile_photo_path}}" alt="User profile picture">
              <h3 class="profile-username text-center">{{$voirs->name}}</h3>
              <p class="text-center">&copy; {{$voirs->email}}</p>
              <p class="text-center">&copy; {{$voirs->created_at}}</p>

            </div>
          </div>

        </div>

      </div>
      <!-- Main row -->
    </div>
    <!-- /.content -->
  </div>

@endsection



