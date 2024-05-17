<?php
use App\Models\Module;
use App\Models\Permission;
use App\Models\Acces;
use App\Models\Attribution;
$categoryevent_comp=0; ?>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/schmich/instascan-builds@master/instascan.min.js
    "></script>

@extends('Espace-Admin.index')


@section('content')
<div class="container-xxl flex-grow-1 container-p-y" style="background: black;">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">UI Elements /</span> Cards Basic</h4>

    <div class="row">
        <div class="col-lg-8 mb-4 order-0">
          <div class="card" style="background-image: url({{asset('Affiche_Event/'.$vq_event->image.'')}});
            background-repeat: no-repeat;background-size: cover;


         ">
            <div class="d-flex align-items-end  row " >
              <div class="col-sm-7" >
                <div class="card-body">
                  <h5 class="card-title text-primary">Gestion des tickets d'évenement</h5>
                  <p class="mb-4">
                    You have done <span class="fw-medium">72%</span> more sales today. Check your new badge in
                    your profile.
                  </p>

                </div>
              </div>


            </div>
          </div>
          <div class="card">
            <h5 class="card-header">Dark Table head</h5>
            <div class="table-responsive text-nowrap">
              <table class="table">
                <thead class="table-dark">
                  <tr>
                    <th>Numero Ticket</th>
                    <th>Session</th>
                    <th>Prix</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($list_ticket as $list_tickets)
                  <tr>
                    <td>
                      <i class="bx bxl-angular bx-sm text-danger me-3"></i>
                      <span class="fw-medium">#dA1723762</span>
                    </td>
                    <td>VIP</td>
                    <td>
                     10 000 FCFA
                    </td>
                    <td>
                        @if($list_tickets->statut==0)
                        <span class="badge bg-label-success me-1">
                         valable
                     </span>
                    @else
                    <span class="badge bg-label-danger me-1">
                         expiré
                    </span>
                    @endif
                </td>
                    <td>
                      <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="javascript:void(0);"
                            ><i class="bx bx-edit-alt me-1"></i> Edit</a
                          >
                          <a class="dropdown-item" href="javascript:void(0);"
                            ><i class="bx bx-trash me-1"></i> Delete</a
                          >
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
        <div class="col-lg-4 col-md-4 order-1">
          <div class="row">
            <div class="col-lg-6 col-md-12 col-6 mb-4">
              <div class="card">
                <div class="card-body">

                  <span class="fw-medium d-block mb-1">Ticket VIP</span>
                  <h3 class="card-title mb-2">{{$cpt_ticket_vip_0."/".$cpt_ticket_vip_T}}</h3>
                  <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> Disponible</small>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                  <div class="card-body">

                    <span class="fw-medium d-block mb-1">Ticket Pass</span>
                    <h3 class="card-title mb-2">{{$cpt_ticket_log_0."/".$cpt_ticket_log_T}}</h3>
                    <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> Disponible</small>
                  </div>
                </div>
              </div>
              <form action="{{route('scanner.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="col-lg-12 col-md-12 col-6 mb-4">


                    <video id="preview" width="100%"></video>
                    <input type="hidden" name="text" id="text" readonyy="" placeholder="scan" />
                    <input type="hidden" name="event" value="{{$vq_event->id}}"   placeholder="scan" />
              </div>
              </form>
          </div>
          <div class="col-lg-12 col-md-12 col-6 mb-4" style="height: 20px;background:white;">
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
          </div>
        </div>



      </div>
      <script>
        let scanner=new Instascan.Scanner({video: document.getElementById('preview')});
     Instascan.Camera.getCameras().then(function(cameras){
      if(cameras.length>0){
          scanner.start(cameras[0]);
      }else{
          alert('No cameras found');
      }
     }).catch(function(e){
      console.error(e);
     });

     scanner.addListener('scan',function(e){
      document.getElementById('text').value=e;
      document.forms[0].submit();
     });
</script>
@endsection
