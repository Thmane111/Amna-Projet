@extends('Espace-Admin.index')
@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h1 class="text-black">Support Ticket</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right"></i> Apps</li>
        <li><i class="fa fa-angle-right"></i> Support Ticket</li>
      </ol>
    </div>

    <!-- Main content -->
    <div class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-12">
          <div class="info-box">
            <div class="row">
              <div class="col-lg-12">
                <h4 class="text-black m-b-1">
                    <a href="{{route('utilisateurs.create')}}" class="btn btn-success">Ajouter</a>
                </h4>
                <div class="box-body">
                <div class="table-responsive">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>

                        <th>Nom Complete</th>
                        <th>Email</th>

                        <th>Status</th>
                        <th>Action</th>

                      </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $datas)
                      <tr>

                        <td><img src="/uploads/Profile/{{$datas->profile_photo_path}}" class="img-circle img-w-30" alt="User Image"> <a href="#">{{$datas->name}}</a></td>
                        <td>{{$datas->email}}</td>
                        <td>
                            @if($datas->etat==0)
                            <span class="label label-danger">inactive</span>
                            @elseif($datas->etat==1)
                            <span class="label label-success">active</span>
                            @endif
                        </td>
                        <td>
                            <span class="label label-warning"><a href="{{route('utilisateurs.show',$datas->id)}}"> <i class="fa fa-eye"></i></a></span>
                            <span class="label label-primary"><i class="fa fa-edit"></i></span>
                            @if($datas->etat==0)
                            <a href="{{route('utilisateurs.state',$datas->id)}}" id="{{$datas->id}}">
                                <span class="label label-danger"><i class="fa fa-thumbs-down"></i></span></a>
                              @elseif($datas->etat==1)
                              <a href="{{route('utilisateurs.state',$datas->id)}}" id="{{$datas->id}}" >
                                  <i class="fa fa-thumbs-up "></i></a>
                              @endif




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
      </div>
      <!-- Main row -->
    </div>
    <!-- /.content -->
  </div>

@endsection
