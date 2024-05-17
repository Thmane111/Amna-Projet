
@extends('Back.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h1 class="text-black">Form Elements</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right"></i> Forms</li>
        <li><i class="fa fa-angle-right"></i> Form Elements</li>
      </ol>
    </div>

    <!-- Main content -->
    <div class="content">
      <div class="info-box">
        <h4 class="text-black"><a href="{{route('User.index')}}" class="btn btn-success">Retour</a></h4>
        <div class="col-md-12">
            @if(session()->has('message'))
            <div class="alert alert-icon alert-success">
               {{session('message')}}
            </div>
            @endif
            @if($errors->any())
             @foreach($errors->All() as $error)
             <div class="alert alert-icon alert-danger">
               {{session('errors')}}
            </div>
             @endforeach
             @endif
          </div>
          <form method="POST" action="{{route('User.store')}}" enctype="multipart/form-data" >
            @csrf
        <div class="row">


          <div class="col-lg-4">
            <fieldset class="form-group">
              <label>Nom Complete</label>
              <input class="form-control" name="name" id="basicInput" type="text" required>
            </fieldset>
          </div>

          <div class="col-lg-4">
            <fieldset class="form-group">
              <label>Email</label>
              <input class="form-control" name="email"  id="basicInput" type="email">
            </fieldset>
          </div>

          <div class="col-lg-4">
            <fieldset class="form-group">
              <label>Mot de Passe</label>
              <input class="form-control"  type="password"
              name="password"
              required autocomplete="new-password" id="basicInput" >
            </fieldset>
          </div>

          <div class="col-lg-4">
            <fieldset class="form-group">
              <label>Confirmation mot de pass</label>
              <input class="form-control"  type="password"
              name="password_confirmation" required id="basicInput" >
            </fieldset>
          </div>





        </div>


        <hr class="m-t-3 m-b-3">
        <h4 class="text-black">Photo de profile</h4>
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
              <label for="exampleInputFile">Simple File Input</label>
              <input name="image" type="file" id="exampleInputFile">
            </div>
          </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success">Enregistrer</button>
            <button type="reset" class="btn btn-danger">Annuler</button>
          </div>
        </form>





      </div>
      <!-- Main row -->
    </div>
    <!-- /.content -->
  </div>
  @endsection
