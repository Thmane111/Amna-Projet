@extends('Espace.index')
   @section('content')
 
   <div class="col-lg-12"  style="padding:10px;">
          
          
   
  
  <div class="untree_co-section"  >
    
    <div class="container my-5" >

      
      <div class="row justify-content-center">
       
     
        <div class="col-lg-4" style="margin-top:-13%;">
          
          <div class="custom-block" data-aos="fade-up" data-aos-delay="100">
            <div class="col-md-12" style="border-bottom: solid 4px <?php
              if($liste[0]['note']>=10){
                echo "green";
              }elseif($liste['0']['note']>=9){
                echo "orange";
              }else{
                echo "red";
              }
            ?>;">
              <center> <strong class="section-title" style="font-size: 25px;border: solid 0px none;"><?php echo $liste[0]['prenom']." ".$liste[0]['nom'] ?></strong>
                <p style="margin-top: -7%;font-size: 11px;border:solid 0px none;"><?php echo $liste[0]['matricule'] ?> |BAC - <?php echo $liste[0]['serie'] ?></p>
                 
              </center>
            </div>
            
            <center>Decison</center>
            <center><div class="col-lg-12"> <strong style="font-size: 20px;">
            <?php
              if($liste[0]['note']>=10 && $liste[0]['major']==true){
                echo '<img src="' . asset('espace/dist/images/medal.png') . '" style="width: 40px;height: 40px;" /> ';

              }else{
                echo "";
              }
            
            ?>
            <?php
              if($liste[0]['note']>=10){
                echo '<img src="' . asset('espace/dist/images/mortarboard.png') . '" style="width: 40px;height: 40px;" />';
              }
            ?>
            <?php
              if($liste[0]['note']>=10){
                echo "Admis";
              }elseif($liste[0]['note']>=9){
                echo "Session";
              }else{
                echo "Ajourné";
              }
            
            ?>
          </strong> <?php
              if($liste[0]['note']>=10 && $liste['0']['major']==true){
                echo '<img src="' . asset('espace/dist/images/medal.png') . '" style="width: 40px;height: 40px;" /> ';

              }else{
                echo "";
              }
            
            ?>
             <?php
              if($liste[0]['note']>=10){
                echo '<img src="' . asset('espace/dist/images/mortarboard.png') . '" style="width: 40px;height: 40px;" />';
              }
            ?>
            </div></center>
            <center><?php if($liste[0]['major']==true){
              echo "Le Major Orange Money vous felicite";
            }else{
              if($liste[0]['note']>=10){
                echo "Orange Money vous felicite";
              }
            }
            
            ?> </center>
          
           
              <div class="row">
                <div class="col-md-12" style="background-image: url({{ asset('espace/dist/images/orange.jpg') }}); background-repeat: no-repeat; height: 130px;padding-left: 10px;padding-right: 10px;border-radius: 20px;">
                 
                
              </div>

              <div class="col-md-12" style="background-image: url({{ asset('espace/dist/images/vidéo\ Accueil.png') }}); background-repeat: no-repeat;   height: 130px;margin-top: 2%;padding-left: 10px;padding-right: 10px;border-radius: 20px;">
                <div class="form-group">
                  
                  <div style="width: 100%;padding: 10px;">BAC 2023</button></div>
                </div>
              
            </div>


            <div class="col-md-12  shadow-sm p-1 mb-5 bg-white rounded" style="   background: yellow;height: 360px;margin-top: 5%;padding-left: 10px;padding-right: 10px;border-radius: 20px;">
              <table class="table custom-table">
                <thead >
                  
                </thead>
                <tbody id="UpdateTable">
                
               
              
                
                  <tr style="border-top:solid 0px transparent;">     
                    <td colspan="2" style="border-top:solid 0px transparent;height:10px;border-bottom:solid 0.01px black;">
                     <p>Moyenne<br><strong><?php echo $liste[0]['note']; ?></strong></p>
                    
                      <td  style="border-top:solid 0px transparent;font-size:12px;border-bottom:solid 0.01px black;"></td>
                        <td  style="border-top:solid 0px transparent;border-bottom:solid 0.01px black;">Les notes des Matiers<br><a href="#" style="color: blue;"><span class="icon-facebook"></span> Sur le site du ministère</a></td>
                    </td>
                  </tr>
                  <tr style="border-top:solid 0px transparent;">     
                    <td colspan="2" style="border-top:solid 0px transparent;height:10px;font-size:12px;border-bottom:solid 0.01px black;">
                     <p style="color: blue;font-size;10px;">Ecole<br><?php echo $liste[0]['centre']; ?></p>
                    
                      <td  style="border-top:solid 0px transparent;font-size:12px;border-bottom:solid 0.01px black;"></td>
                        <td  style="border-top:solid 0px transparent;font-size;10px;border-bottom:solid 0.01px black;">Wilaya<br><a href="#" style="color: blue;font-size:12px;"><?php echo $liste[0]['region']; ?></a></td>
                    </td>
                  </tr>
                
                  <tr style="border-top:solid 0px transparent;">     
                    <td colspan="2" style="border-top:solid 0px transparent;height:10px;">
                      Classement<br><br>
                      <?php
                        if($liste[0]['major']==true){
                          echo '<strong>Le Major</strong><br><p>Ecole</p>';
                        }
                      ?>

                     
                     <p><?php echo $liste[0]['rang_national']; ?><br>National</p>
                    
                      <td  style="border-top:solid 0px transparent;"></td>
                        <td  style="border-top:solid 0px transparent;"><br><br><?php 
                        if($liste[0]['major']==true){
                          echo '<strong> Le Major</strong><br><a href="#">Region</a>';
                        }else{
                          echo '<p>  '.$liste[0]['rang_regional'].' <br>Region</p>';
                        }
                        ?></td>
                    </td>
                  </tr>
               
                  
            
                  
                  
            
                  
                  
                </tbody>
              </table>
            
          </div>
             
              
            
        
             
         
            <div class="col-lg-12">
              <div class="row">
                <a href="" class="col-12" style="padding-top: 10px;width: 100%;">
                  <div class="form-group">
                    
                    <div style="width: 100%;background-color: aqua;padding: 10px;"><img src="{{asset('espace/dist/images/photo-camera.png')}}" style="width: 40px;height: 40px;;" />  Telecharger l'image
                   
                  </div>
                </div>
                
      </a>
      <a href="" class="col-12" style="padding-top: 10px;width: 100%;">
        <div class="form-group">
          
          <div style="width: 100%;background-color: aqua;padding: 10px;"><img src="{{asset('espace/dist/images/photo-camera.png')}}" style="width: 40px;height: 40px;;" />Copier le lien
         
        </div>
      </div>
      
</a>

              </div>
            </div>


             
            
          </div>

         


        </div>
      </div>

   

    </div>
  </div>
      </div>





































      

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


<script type="text/javascript">

$(document).ready(function () {
$('#serie').change(function(){


    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
       });
    var id = $(this).val();




$.ajax({
dataType: "json",
url: "/getRegionEspace/"+id,
type: "GET",
success: function (data) {
    console.log(data);
    $('#region').html(data);

             // Attacher l'événement change à l'élément <select> une fois que le contenu est chargé
             $('#region2').change(function(){
                var id = $(this).val();
                console.log(id);

                $.ajax({
                    dataType: "json",
                    url: "/getCentreEspace/" + id,
                    type: "GET",
                    success: function (data) {
                        console.log(data);
                        $('#centre').html(data);

                               // Attacher l'événement change à l'élément <select> une fois que le contenu est chargé
             $('#ecole2').change(function(){
                var id = $(this).val();
                console.log(id);

                $.ajax({
                    dataType: "json",
                    url: "/getEcoleEspace/" + id,
                    type: "GET",
                    success: function (data) {
                        console.log(data);
                        $('#ecole').html(data);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });

},
error: function(error) {
    console.log(error);


}
});

//call country on region selected


});



//call city on country selected


});

</script>
































<script>





// ...

function updateTableSerie() {
    var var_serie=document.getElementById('serie').value;
// Supprime toutes les lignes actuelles du tableau
$('#UpdateTable tbody').empty();

// Appel AJAX pour récupérer les tickets mis à jour
$.ajax({
dataType: "json",
url: "/filtre/serie/"+var_serie,
type: "GET",
success: function (data) {
    console.log(data);
    $('#UpdateTable').html(data);

      // Attacher l'événement change à l'élément <select> une fois que le contenu est chargé
      $('#region2').change(function(){
      var var_region = $(this).val();
      console.log(var_region);
    

      $.ajax({
          dataType: "json",
          url: "/filtre/region/" + var_region,
          type: "GET",
          success: function (data) {
            $('#UpdateTable tbody').empty();
              console.log(data);
              $('#UpdateTable').html(data);



              // Attacher l'événement change à l'élément <select> une fois que le contenu est chargé
      $('#ecole2').change(function(){
      var var_centre = $(this).val();
      console.log(var_centre);
    

      $.ajax({
          dataType: "json",
          url: "/filtre/centre/" + var_centre,
          type: "GET",
          success: function (data) {
            $('#UpdateTable tbody').empty();
              console.log(data);
              $('#UpdateTable').html(data);










                          // Attacher l'événement change à l'élément <select> une fois que le contenu est chargé
      $('#ecole3').change(function(){
      var var_ecole = $(this).val();
      console.log(var_ecole);
    

      $.ajax({
          dataType: "json",
          url: "/filtre/ecole/" + var_ecole,
          type: "GET",
          success: function (data) {
            $('#UpdateTable tbody').empty();
              console.log(data);
              $('#UpdateTable').html(data);
          },
          error: function(error) {
              console.log(error);
          }
      });
  });
          },
          error: function(error) {
              console.log(error);
          }
      });
  });
          },
          error: function(error) {
              console.log(error);
          }
      });
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

<!-- 


<script type="text/javascript">

$(document).ready(function () {
$('#region2').change(function(){


    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
       });
    var id = $(this).val();

    console.log(id);


$.ajax({
dataType: "json",
url: "/getCentreEspace/"+id,
type: "GET",
success: function (data) {
    console.log(data);
    $('#centre').html(data);

},
error: function(error) {
    console.log(error);


}
});

//call country on region selected


});



//call city on country selected


});

</script> -->



<!-- // Mise à jour du tableau avec les nouvelles données
    $.each(data.list_ticket, function (index, ticket) {
        var statusBadge = (ticket.statut == 0) ? '<span class="badge"style="background: green;">valide</span>' : '<span class="badge bg-danger"style="background: red;">Invalide</span>';
        var typeNom = ticket.event ? (ticket.event.Nom_Event || '') : '';
var row = '<tr>' +
            '<td><a href="ticket-detail.html" class="fw-bold text-secondary">#' + ticket.CIN + '</a></td>' +
            '<td>' +  ticket.Numero_Candidat + '</td>' +
            '<td><span class="fw-bold ms-1">' + ticket.Prenom +' '+ticket.Nom +'</span></td>' +
            '<td>' + ticket.Date_Naissance + '</td>' +
            '<td>' +
            '<div class="btn-group" role="group" aria-label="Basic outlined example">' + ticket.Lieu_Naissance +
            '</div>' +
            '</td>' +
            '<td>';

if(ticket.etat == 0) {
    row += '<div class="btn-group bg-warning" role="group" aria-label="Basic outlined example">Non valide</div>';
} else {
    row += '<div class="btn-group bg-success" role="group" aria-label="Basic outlined example">Valide</div>';
}

row += '</td>' +
       '</tr>';


        $('#example tbody').append(row);
    });
    $('#example').DataTable(); -->


    <script src="{{asset('espace/dist/confit/confetti.js')}}"></script>
        <!-- Confetti  JS-->
@if($liste[0]['note']>=10)

<script>

// start

const start = () => {
    setTimeout(function() {
        confetti.start()
    }, 1000); // 1000 is time that after 1 second start the confetti ( 1000 = 1 sec)
};

//  Stop

const stop = () => {
    setTimeout(function() {
        confetti.stop()
    }, 5000); // 5000 is time that after 5 second stop the confetti ( 5000 = 5 sec)
};

start();
stop();

// Exécutez start() toutes les 30 secondes
setInterval(() => {
    start();
    setTimeout(stop, 5000); // Arrêtez le confetti après 5 secondes
}, 30000); // 30000 millisecondes = 30 secondes
</script>
@endif

      @endsection
