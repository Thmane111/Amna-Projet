    @extends('Back.index')
    @section('content')
    <!-- Main content -->

      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Formulaire De Modificaton</h1>
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
      <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- jquery validation -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Lister les modules</h3>
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
                <!-- /.card-header -->
                <!-- form start -->
                <form id="quickForm" action="{{route('groupe.update',$modif->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nom Module</label>
                      <input type="text" name="nom_groupe" value="{{$modif->nom_groupe}}" class="form-control" id="exampleInputEmail1" placeholder="Nom Module">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Diminutif</label>
                      <input type="text" name="caption" value="{{$modif->caption}}" class="form-control" id="exampleInputPassword1" placeholder="Caption">
                    </div>

                        <!-- textarea -->
                        <div class="form-group">
                          <label>Details</label>
                          <textarea class="form-control" value="{{$modif->detail}}" name="detail" rows="3" placeholder="Enter ..."></textarea>
                        </div>

                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
              </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">

            </div>
            <!--/.col (right) -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
@endsection
