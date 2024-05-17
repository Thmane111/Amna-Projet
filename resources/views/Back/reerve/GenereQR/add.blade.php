<?php
use App\Models\Module;
use App\Models\Permission;
use App\Models\Acces;
use App\Models\Attribution;
$categoryevent_comp=0; ?>
@extends('Espace-Admin.index')


@section('content')
<div class="container-xxl flex-grow-1 container-p-y" style="background: black;">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">UI Elements /</span> Cards Basic</h4>

    <!-- Examples -->
    <form action="{{route('ticket.store2',1)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{$data_event->id}}">
        <input type="file" class="bg-warning" name="image">
    <div class="row mb-5" >
        <div class="col-md" >
          <div class="card" style="background: none;justify-conntent:center;align-items:center;text-align:center;">
            <div class="row g-0"  style="background-image: url({{asset('Affiche_Event/'.$data_event->image.'')}});
                 background-repeat: no-repeat;width:738px; background-size: cover;height:200px;

                 justify-conntent:center;align-items:center;text-align:center;
              ">
              <div class="col-md-1"   style="width:90px;height:90px;
               justify-conntent:center;align-items:center;text-align:center;
              ">
                <img class="card-img " src="{{asset('Back/assets/img/elements/R.GIF')}}" style="width:80px;height:80px;" alt="Card image" />
              </div>
              <div  >
                <div class="card-body" >

                    <h5 class="card-title">Card title</h5>
                    <p class="card-text" style="color: yellow;text-align:right;font-size:18px;">

                      <strong>10 000 FCFA</strong>
                    </p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>








                </div>

              </div>
            </div>
          </div>

        </div>
        <button type="submit" class="btn bg-danger " style="margin-top:10px;">
            telecharger l'affiche
        </button>
        <a href="{{route('ticket.getQRCode',$data_event->id)}}" class="btn bg-warning "  style="margin-top:10px;">
            Generer QR code
        </a>
      </div>
    </form>
    <!-- Examples -->











    <!--/ Card layout -->
  </div>
@endsection
