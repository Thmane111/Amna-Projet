@extends('Espace.index')
   @section('content')
   <?php 
   use App\Models\Niveau;
   use App\Models\Eleve;
   use App\Models\Resultat;
   use App\Models\Ecole;
   use App\Models\Region;
   use App\Models\Centre;
   $niveau=Niveau::all();
   $liste=[];
   $compteur=0;
   $compteur1=0;
   $liste_top_10=[];
   $liste_eleve_serie=Eleve::all()->where('serie_id',$id);


  
   foreach($liste_eleve_serie as $liste_eleve_series){
    $liste_eleve_count=Resultat::all()->where('eleve_id',$liste_eleve_series->id)->count();
    if($liste_eleve_count!=0){
      $liste_eleve=Resultat::all()->where('eleve_id',$liste_eleve_series->id)->first();
    
      $recup_ecole=Eleve::where('id',$liste_eleve->eleve_id)->first();
      $recup_ecole2=Centre::where('id',$recup_ecole->centre->id)->first();
      $recup_region=Region::where('id',$recup_ecole2->region_id)->first();
    
    // Ajout des informations de l'élève dans le tableau $liste
    $liste[$compteur] = [
      'id'=> $liste_eleve->eleve->id,
      'nom' => $liste_eleve->eleve->Nom,
      'prenom' => $liste_eleve->eleve->Prenom,
      'note'=>$liste_eleve->note,
      'centre'=>$recup_ecole2->Nom_Centre,
      'region'=>$recup_region->Nom_Region,
  ];
    $compteur++;
}else{
  continue;
}
  } 
// Tri du tableau par note en ordre décroissant
usort($liste, function($a, $b) {
  return $b['note'] - $a['note'];
});

// Tableau pour stocker les 10 meilleurs élèves
$liste_top_10 = array_slice($liste, 0, 10);


  
   ?>
   <div class="col-lg-6" >
          
          <div class="custom-block" data-aos="fade-up" data-aos-delay="100">
            <h2 class="section-title">Resultat BAC 2023</h2>
           
            <div class="untree_co-section" >
    <div class="container" style="padding-right:5px;padding-right:5px;">
      <div class="row" style="justify-content:center;align:center;text-align;center;">
        <div class="row" >
          <form class="contact-form" action="/resulat/detail/resultats" method="POST" data-aos="fade-up" data-aos-delay="200">
            @csrf
            <div class="row">
    <div class="col-8">
        <div class="form-group">
            <input type="text" class="form-control" style="height: 30px;" name="candidat" id="fname" placeholder="Numero candidat">
        </div>
    </div>
    <div class="col-4 d-flex align-items-end justify-content-end" style="padding-top:0px;margin-top:0px;">
        <button type="submit" class="form-group bg-success" style="height: 30px;padding-top:0px;margin-top:0px;border:solid 0px transparent;color:white">Rechercher</button>
    </div>
</div>

            <div class="col-12" style="width:100%;padding-left:0px;padding-right:0px;" >
                <div class="form-group">
                  <select class="form-group" style="width:100%; height:35px;background-color: aqua;color:black;" id="serie" name="serie_id" onclick="return updateTableSerie()" >
                  <option style="height:30px;font-size:14px;">toute les series</option>
                  @foreach($serie as $series)
                  <?php
                  $nombre_candidat=Eleve::all()->where('serie_id',$series->id)->count();
                  
                  ?>
                  <option value="{{$series->id}}">{{$series->serie}} <?php echo "".$nombre_candidat?></option>
                  @endforeach
                 
                </select>
                  
                </div>
              </div>
              <div class="col-12" style="width:100%;padding-left:0px;padding-right:0px;" id="region">
             
              </div>
            <div class="row">
              <div class="col-6" id="centre">
               
              </div>
              <div class="col-6" id="jury">
               
              </div>
            </div>
            

           
            
          </form>
        </div>
        
      </div>
    </div>
    <div class="inner first" >
    

<div class="table-responsive shadow-sm p-1 mb-5 bg-white rounded" >

  <table class="table custom-table" style="margin-top:-40%;">
    <thead >
      
    </thead>
    <tbody id="UpdateTable">
    <p>Top 10</p>
    <?php $i=1; ?>
    <p>Liste des etudiants admis es session</p>
      @foreach($liste_top_10 as $liste_top_10s)
      <tr style="border-top:solid 0px transparent;">
      
      <td style="border-top:solid 0px transparent;"><?php  echo $i++ ; ?> </td>
       
        <td colspan="4" style="border-top:solid 0px transparent;margin-top-10%;height:10px;">
         <strong><a href="/resulat/detail/resultat/{{$liste_top_10s['id']}}"><?php  echo $liste_top_10s['prenom']." ".$liste_top_10s['nom']?></a></strong><br>
          <tr>
          <td style="border-top:solid 0px transparent;"></td>
            <td colspan="3" style="border-top:solid 0px transparent;border-bottom:solid 0.01px black;">Moyenne<br><?php  echo $liste_top_10s['note']?></td>
            <td style="border-top:solid 0px transparent;border-bottom:solid 0.01px black;">Centre<br><span style="color:blue;"><?php  echo $liste_top_10s['centre']?></span></td>
            <td style="border-top:solid 0px transparent;border-bottom:solid 0.01px black;">Region<br><span style="color:blue;"><?php  echo $liste_top_10s['region']?></span></td>
          </tr>
         
        </td><br>
       
        
      
      </tr>
     @endforeach
      

      
      

      
      
    </tbody>
  </table>
</div>
      </div>
    </div>
  </div>

          <div class="custom-block" data-aos="fade-up">
            <h2 class="section-title">Social Icons</h2>
            <ul class="list-unstyled social-icons light">
              <li><a href="#"><span class="icon-facebook"></span></a></li>
              <li><a href="#"><span class="icon-twitter"></span></a></li>
              <li><a href="#"><span class="icon-linkedin"></span></a></li>
              <li><a href="#"><span class="icon-google"></span></a></li>
              <li><a href="#"><span class="icon-play"></span></a></li>
            </ul>
          </div> <!-- END .custom-block -->

          <div class="custom-block" data-aos="fade-up" data-aos-delay="100">
            <div class="text-center">
              <h2 class="section-title text-center">Slider</h2>
            </div>
            <div class="owl-single owl-carousel no-nav">
              <div class="testimonial mx-auto">
                <figure class="img-wrap">
                  <img src="images/person_2.jpg" alt="Image" class="img-fluid">
                </figure>
                <h3 class="name">Adam Aderson</h3>
                <blockquote>
                  <p>&ldquo;There live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
                </blockquote>
              </div>

              <div class="testimonial mx-auto">
                <figure class="img-wrap">
                  <img src="images/person_3.jpg" alt="Image" class="img-fluid">
                </figure>
                <h3 class="name">Lukas Devlin</h3>
                <blockquote>
                  <p>&ldquo;There live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
                </blockquote>
              </div>

              <div class="testimonial mx-auto">
                <figure class="img-wrap">
                  <img src="images/person_4.jpg" alt="Image" class="img-fluid">
                </figure>
                <h3 class="name">Kayla Bryant</h3>
                <blockquote>
                  <p>&ldquo;There live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
                </blockquote>
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
                        $('#jury').html(data);
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
      @endsection
