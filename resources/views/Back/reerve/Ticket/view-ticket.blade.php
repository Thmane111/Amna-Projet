
<!DOCTYPE html>
<html lang="en" style=";display: flex; justify-content: center; align-items: center;  margin: 0; background: #f0f0f0;">
<head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet" />







    <!-- Page CSS -->

    <script type="text/javascript" src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    <script src="{{asset('Back/assets/js/qrcode.min.js')}}"></script>


</head>
<style>
         html,
        body {
            font-family:Arial, Helvetica, sans-serif;
  font-weight: normal;
  font-style: normal;

        }
</style>

<body style="width:732px;display: flex; justify-content: center; align-items: center;  margin: 0; background: #f0f0f0;">

    <div class="layout-wrapper layout-content-navbar"  style="justify-content: center;align-items: center;text-align: center;">
        <div class="layout-container"  style="justify-content: center;align-items: center;text-align: center;">
            <div class="layout-page"  style="justify-content: center;align-items: center;text-align: center;">
                <div class="content-wrapper"  style="justify-content: center;align-items:center;text-align:center;">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y" style="justify-content: center;align-items: center;text-align: center;">


    <div class="container-xxl flex-grow-1 container-p-y" style="width: 100%; background:none;justify-content:center;align-items:center;text-align: center;">
        <div class="row mb-5"  style="background:none;width:100%;justify-content: center;align-items:center;text-align:center;">
            <div class="col-md" style="background: none;width:100%;justify-content: center;align-items: center;text-align: center;justify-content: center;align-items: center;text-align: center;">
                <div class="card" style="background:none; justify-content: center; align-items: center; text-align: center;width:100%;height:200px;">
                    @foreach($data_QR as $donnees)

                    <div class="row g-0" style="background-image: url({{ public_path('Affiche_Event/'.$donnees->event->image.'') }}); background-repeat: no-repeat; width:100%; background-size: cover; height:195px;">
                        <div class="col-md-1" id="QRC" style="width: 90px; height: 90px; justify-content: center; align-items: center; text-align: center; background:none;">
                            <h2 style="width:40px;margin-left:100%;margin-top:6%;font-size:20px;color:yellow;"><strong>{{$donnees->type__ticket->nom}}</strong></h2>
                            <img src="{{ $qrCodes[$donnees->id] }}" alt="QR Code" style="width: 40px; height: 40px; margin-left:125px;; margin-top: 5%;">
                            <h2 style="width:80px;margin-left:80%;margin-top:28px;font-size:14px;font-weight:800;color:yellow;"><strong>{{$donnees->prix." FCFA"}}</strong></h2>
                        </div>
                    </div>

                @endforeach
                </div>
            </div>
        </div>
    </div>
          </div>
    </div>
</div>







        <!--/ Card layout -->
      </div>
    </div>

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









</body>
</html>
