
<?php
use App\Models\Module;
use App\Models\Permission;
use App\Models\Acces;
use App\Models\Attribution;
$categoryevent_comp=0; ?>
@extends('Espace-Admin.index')


@section('content')
<div class="container-xxl flex-grow-1 container-p-y" style="background: none;">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">UI Elements /</span> Cards Basic</h4>

    <!-- Examples -->


    <div class="row mb-5" >

        <div class="col-md">
            <div class="card" style="background: none; justify-content: center; align-items: center; text-align: center;">
                @foreach ($data_QR as $donnees)
                <div class="row g-0" style="background-image: url({{ asset('Affiche_Event/'.$donnees->event->image.'') }}); background-repeat: no-repeat; width: 738px; background-size: cover; height: 200px;">
                    <div class="col-md-1" id="QRC" style="width: 90px; height: 90px; justify-content: center; align-items: center; text-align: center;
                    background:none;
                    ">
                    <h2  style="width:40px;margin-left:100%;margin-top:60%;font-size:14px;color:yellow;"><strong>{{$donnees->type__ticket->nom}}</strong></h2>
                        <div class="jj" id="qrcode_{{ $donnees->id }}" style="margin-left:105%;margin-top:20%;" ></div>
                        <h2  style="width:80px;margin-left:80%;margin-top:50%;font-size:14px;font-weight:800;color:yellow;"><strong>{{$donnees->prix." FCFA"}}</strong></h2>

                        <script type="text/javascript">
                            document.addEventListener('DOMContentLoaded', function () {
                                var qrCodeDiv = document.getElementById('qrcode_{{ $donnees->id }}');
   // Ajustez la taille du QR code ici
   var qrCodeSize = 40; // Choisissez la taille souhaitée en pixels
            qrCodeDiv.style.width = qrCodeSize + "px";
            qrCodeDiv.style.height = qrCodeSize + "px";

            new QRCode(qrCodeDiv, {
                text: '{{ $donnees->Numero_Ticket }}',
                width: qrCodeSize,
                height: qrCodeSize
            });
                            });
                        </script>
                    </div>
                    <div class="card-body" >


                        <p class="card-text" style="color: yellow;text-align:right;font-size:18px;">


                        </p>








                    </div>
                </div>

                <br>
                @endforeach

            </div>
        </div>


        <a href="{{route('ticket.telechargeTicket',$id)}}" class="btn bg-warning " Z style="margin-top:10px;">
            Télécharger les tickets
        </a>
      </div>

    <!-- Examples -->











    <!--/ Card layout -->
  </div>

  <script type="text/javascript" src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
  {{-- <script type="text/javascript">
      document.addEventListener('DOMContentLoaded', function () {
          var qrCodesContainer = document.getElementById('QRC');

          @foreach ($data_QR as $donnees)
              var qrCodeDiv = document.createElement('div');
              new QRCode(qrCodeDiv, '{{ $donnees->Numero_Ticket }}'); // Remplacez 'votre_champ' par le nom du champ contenant les données pour le QR code
              qrCodesContainer.appendChild(qrCodeDiv);
          @endforeach
      });
  </script> --}}
@endsection
