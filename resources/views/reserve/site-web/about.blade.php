@php
$about=App\Models\propos::all()->first();
@endphp


    <div class="container" data-aos="fade-up">

      <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-6 position-relative align-self-start order-lg-last order-first" >
          <img src="/photo/propos/{{$about->image}}" class="img-fluid" alt="" width="100%" height="100%">

        </div>
        <div class="col-lg-6 content order-last  order-lg-first" data-aos="zoom-out">
          <h3>{{$about->titre}}</h3>
          <p>
           {!!$about->LeTexte!!}
          </p>

        </div>
      </div>

    </div>





