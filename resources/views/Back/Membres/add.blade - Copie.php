@extends('Back.index')
    @section('content')


     <!-- Content Header (Page header) -->
     <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Gestions des utilisateurs</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v2</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
<!-- Main content -->
   <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->



        <!-- /.row -->
        <div class="row">
          <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Ajouter un utilisateurs</h3>
              </div>
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
              <div class="card-body p-0">
                <div class="bs-stepper">
                  <div class="bs-stepper-header" role="tablist">
                    <!-- your steps here -->
                    <div class="step" data-target="#logins-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                        <span class="bs-stepper-circle">1</span>
                        <span class="bs-stepper-label">Logins</span>
                      </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#information-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                        <span class="bs-stepper-circle">2</span>
                        <span class="bs-stepper-label">Various information</span>
                      </button>
                    </div>
                  </div>
                  <x-auth-session-status class="mb-4" :status="session('status')" />
    <form method="POST" action="{{ route('Backlg.store') }}" enctype="multipart/form-data" >
        @csrf
        <input type="hidden" name="role" value="1">
                  <div class="bs-stepper-content">
                    <!-- your steps content here -->
                    <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                    <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nom</label>
                        <input type="text" class="form-control" id="exampleInputName" name="name" placeholder="Nom de famille">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Prenom</label>
                        <input type="text" name="prenom" class="form-control" id="exampleInputSurname" placeholder="Prenom">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Email</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Téléphone</label>
                        <input type="number" class="form-control" name="tel" id="exampleInputNumber" placeholder="Contact">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                      <x-input-label for="password" :value="__('Password')" />

                      <x-text-input id="password" class="form-control"
                      type="password"
                      name="password"
                      required autocomplete="new-password" />

                      <x-input-error :messages="$errors->get('password')" class="mt-2" />
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                      <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                      <x-text-input id="password_confirmation" class="form-control"
                      type="password"
                      name="password_confirmation" required />

                     <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                      </div>
                    </div>
                      <a  href="#" class="btn btn-primary" onclick="stepper.next()">Next</a>
                    </div>
                    </div>
                    <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                    <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputFile">Ajouter une profile</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                          </div>
                        </div>
                      </div>
                    </div>


                    </div>
                      <a href="#" class="btn btn-primary" onclick="stepper.previous()">Previous</a>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </div>
</form>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                Visit <a href="https://github.com/Johann-S/bs-stepper/#how-to-use-it">bs-stepper documentation</a> for more examples and information about the plugin.
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    @endsection
