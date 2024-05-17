   @extends('Espace.index')
   @section('content')
   <?php 
   use App\Models\Niveau;
   $niveau=Niveau::all();
   ?>
   <div class="col-lg-4">
          
          <div class="custom-block" data-aos="fade-up" data-aos-delay="100">
            <h2 class="section-title">Resultat des exemans nationaux</h2>
           
              <div class="row">
                @foreach($niveau as $niveaus)
                <a href="/resulat/serie/{{$niveaus->id}}" class="col-md-12">
                  <div class="form-group">
                    
                    <div style="width: 100%;background-color: aqua;padding: 10px;">{{$niveaus->Design}}</button>
                  </div>
                </div>
                
  </a>
              @endforeach
             
             
           
         
             
              
              
             
            
          </div>

          


        </div>
      </div>

      @endsection
