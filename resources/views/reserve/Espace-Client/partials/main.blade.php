<?php
use App\Models\Ticket;
use App\Models\Event;

 $vq_event=Event::all()->where('user_id',1)->first();
$num=$vq_event->id;
 $cpt_ticket_vip_T=Ticket::all()->where('event_id',$vq_event->id)
 ->where('type__ticket_id','=',1)->count();

 $cpt_ticket_vip_0=Ticket::all()->where('event_id',$vq_event->id)
 ->where('type__ticket_id','=',1)
 ->where('statut','=',0)->count();

 $cpt_ticket_log_T=Ticket::all()->where('event_id',$vq_event->id)
 ->where('type__ticket_id','=',2)->count();

 $cpt_ticket_log_0=Ticket::all()->where('event_id',$vq_event->id)
 ->where('type__ticket_id','=',2)
 ->where('statut','=',0)->count();
 $list_ticket=Ticket::all()->where('event_id',$vq_event->id);


?>





  @extends("Espace-Client.index")
@section("content")
<div class="tab-pane" id="about">
    <div class="row">

        <div class="col-sm-4 col-sm-offset-1">

           <div class="picture-container">
                <div class="picture">
                    <video id="preview" width="100%"></video>
                    <input type="hidden" name="text" id="text" readonyy="" placeholder="scan" />
                    <input type="hidden" name="event" id="event" value="{{$vq_event->id}}"   placeholder="scan" />

                    <h3><strong>
                        <div id="mams"></div>
                    </strong></h3>
                </div>
                <button type="button" class='custom-alert' style="background:#0e1d34;color:white; " onclick="return AllumeWebCan()"><strong>Scanner</strong></button>
                <button type="button" class='custom-alert alert-primary'onclick="return EteintWebCam()" ><strong>Fermer</strong></button>


            </div>
        </div>
        <div class="col-sm-6 " id="zz"  style="justify-content:center;text-align:center;align-items:center;display:flex;background:#0e1d34;">

            <div class="col-sm-4"  style="width: 80px;height:80px;justify-content:center;text-align:center;align-items:center;">
                <div class="choice" data-toggle="wizard-checkbox" style="width: 80px;height:80px;justify-content:center;text-align:center;align-items:center;">

                    <div class="icon"   style="justify-content:center;text-align:center;align-items:center;">
                      <h5  >VIP<br>10/20</h5>
                    </div>

                </div>
            </div>
            <div class="col-sm-4"  style="width: 80px;height:80px;justify-content:center;text-align:center;align-items:center;">
                <div class="choice" data-toggle="wizard-checkbox" style="width: 80px;height:80px;justify-content:center;text-align:center;align-items:center;">

                    <div class="icon"   style="justify-content:center;text-align:center;align-items:center;">
                      <h5  >VIPP <br>10/20</h5>
                    </div>

                </div>
            </div>
            <div class="col-sm-4"  style="width: 80px;height:80px;justify-content:center;text-align:center;align-items:center;">
                <div class="choice" data-toggle="wizard-checkbox" style="width: 80px;height:80px;justify-content:center;text-align:center;align-items:center;">

                    <div class="icon"   style="justify-content:center;text-align:center;align-items:center;">
                      <h5  >PASS<br>10/20</h5>
                    </div>

                </div>
            </div>





        </div>

        <div class="col-sm-12">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="table-responsive">
                    <table id="ticketTable" class="table table-hover align-middle mb-0" style="width:100%">
                        <thead>
                            <tr>
                            <th>Numero Ticket</th>
        <th>Session</th>
        <th>Prix</th>
        <th>Status</th>
        <th>Heure</th>
                            </tr>
                        </thead>
                        <tbody >
                            @foreach($list_ticket as $list_tickets)
                            <tr>
                                <td>
                                    <a href="ticket-detail.html" class="fw-bold text-secondary">{{"#".$list_tickets->Numero_Ticket}}</a>
                                </td>
                                <td>
                                   {{$list_tickets->type__ticket->nom}}
                               </td>
                               <td>

                                   <span class="fw-bold ms-1">{{$list_tickets->prix." FCFA"}}</span>
                               </td>

                               <td>
                               @if($list_tickets->statut==0)
                               <span class="badge bg-success" style="background: green">Valable</span>
                               @else
                               <span class="badge bg-danger" style="background: red">Invalable</span>
                               @endif
                            </td>
                                <td>
                                    {{$list_tickets->created_at}}
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


































<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>

function AllumeWebCan(){

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

  var ValScan= document.getElementById('text').value=e;
  var ValScan1=ValScan= document.getElementById('text').value;
  var ValScan2=ValScan= document.getElementById('event').value;
  console.log(ValScan2);

  $(document).ready(function(){
//     $.ajax({

//     url: "/client/QRjson",
//     type: "POST",
//     data: {
//         ValScan1: document.getElementById('text').value,
//         _token: '{{csrf_token()}}'
//     },

//     dataType: "json",
//     success: function(result){
//         $('#mams').html('reussi');
//     }
//   });

$.ajax({
    dataType: "json",
    url: "/client/QRjson",
    type: "POST",
    data: {
        text: ValScan1,
        event: ValScan2,
        _token: '{{csrf_token()}}'
    },
    success: function (data) {
        var list_ticket = data.list_ticket;
var message = data.message;
        console.log(data);
        $('#mams').html(message);

            // Accédez aux variables retournées
var list_ticket = data.list_ticket;
var message = data.message;

// Mise à jour du tableau avec les nouvelles données
updateTable(list_ticket);

    },
   error: function(error) {
        console.log(error);


   }
});
  });


//   document.forms[1].submit();
 });
    }

    function EteintWebCam() {
        let scanner=new Instascan.Scanner({video: document.getElementById('preview')});
    Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
            let preview = document.getElementById('preview');

            // Ajouter l'attribut willReadFrequently au contexte du canvas
            if (preview.tagName.toLowerCase() === 'canvas') {
                let context = preview.getContext('2d');
                context.willReadFrequently = true;
            }

            scanner.stop();  // Arrête le scanner vidéo
            preview.style.visibility = 'hidden';  // Masque l'élément vidéo
        } else {
            alert('No cameras found');
        }
    }).catch(function (e) {
        console.error(e);
    });
}

// ...

function updateTable() {
    var num=document.getElementById('event').value;
// Supprime toutes les lignes actuelles du tableau
$('#ticketTable tbody').empty();

// Appel AJAX pour récupérer les tickets mis à jour
$.ajax({
dataType: "json",
url: "/client/scanner/"+num,
type: "GET",
success: function (data) {
    console.log(data);

    // Mise à jour du tableau avec les nouvelles données
    $.each(data.list_ticket, function (index, ticket) {
        var statusBadge = (ticket.statut == 0) ? '<span class="badge"style="background: green;">valide</span>' : '<span class="badge bg-danger"style="background: red;">Invalide</span>';
        var typeNom = ticket.event ? (ticket.event.Nom_Event || '') : '';

        var row = '<tr>' +
            '<td><a href="ticket-detail.html" class="fw-bold text-secondary">#' + ticket.Numero_Ticket + '</a></td>' +
            '<td>' +  ticket.nom + '</td>' +
            '<td><span class="fw-bold ms-1">' + ticket.prix + ' FCFA</span></td>' +
            '<td>' + statusBadge + '</td>' +
            '<td>' +
            '<div class="btn-group" role="group" aria-label="Basic outlined example">' +ticket.created_at +
            '</div>' +
            '</td>' +
            '</tr>';

        $('#ticketTable tbody').append(row);
    });
},
error: function (error) {
    console.log(error);
}
});
}

// Appel initial pour charger les tickets au chargement de la page
$(document).ready(function () {
updateTable();
});

// ...



</script>

  @endsection
  {{-- <script>
    let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });

    Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
            scanner.start(cameras[0]);
        } else {
            alert('No cameras found');
        }
    }).catch(function (e) {
        console.error(e);
    });

    scanner.addListener('scan', function (e) {
        var ValScan1 = document.getElementById('text').value = e;
        var ValScan2 = document.getElementById('event').value;

        $(document).ready(function () {
            $.ajax({
                dataType: "json",
                url: "/client/QRjson",
                type: "POST",
                data: {
                    text: ValScan1,
                    event: ValScan2,
                    _token: '{{ csrf_token() }}'
                },
                success: function (data) {
                    console.log(data);

                    // Mise à jour du tableau avec les nouvelles données
                    updateTable(ValScan2);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
    });

    function updateTable(ValScan2) {
        // Supprime toutes les lignes actuelles du tableau
        $('#ticketTable tbody').empty();

        // Ajoute les nouvelles lignes basées sur les données reçues
        $.each(ValScan2, function (index, ticket) {
            var statusBadge = (ticket.statut == 0) ? '<span class="badge bg-success">Valable</span>' : '<span class="badge bg-danger">In Progress</span>';

            var row = '<tr>' +
                '<td><a href="ticket-detail.html" class="fw-bold text-secondary">#' + ticket.numero_ticket + '</a></td>' +
                '<td>' + ticket.type + '</td>' +
                '<td><span class="fw-bold ms-1">' + ticket.prix + ' FCFA</span></td>' +
                '<td>' + statusBadge + '</td>' +
                '<td>' +
                '<div class="btn-group" role="group" aria-label="Basic outlined example">' +
                '<button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#edittickit"><i class="icofont-edit text-success"></i></button>' +
                '<button type="button" class="btn btn-outline-secondary deleterow"><i class="icofont-ui-delete text-danger"></i></button>' +
                '</div>' +
                '</td>' +
                '</tr>';

            $('#ticketTable tbody').append(row);
        });
    }
</script> --}}
