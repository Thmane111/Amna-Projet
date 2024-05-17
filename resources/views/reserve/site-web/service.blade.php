@php
$service=App\Models\ServiceCategory::all();

@endphp

<div class="container" data-aos="fade-up">

    <div class="section-header">
      <span>Our Services</span>
      <h2>Our Services</h2>

    </div>

    <div class="row gy-4">
      @foreach($service as $services)

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100" style="border-radius:10px;backgroun:red;">
        <div class="card" style="border-radius:10px;width:100%;backgroun:red;">
          <div class="col-lg-4 card-img" style="height:150px;width:100%;backgroun:red;" >
            <img src="/photo/service-categorie/{{$services->image}}" alt="" style="border-radius:10px;" style="height:150%;width:100%;" class="img-fluid">
          </div>
          <h3><a href="service-details.html"  class="stretched-link">{{$services->service_category}}</a></h3>
          <p>{{$services->Description}}</p>
        </div>
      </div><!-- End Card Item -->
      @endforeach
    </div>

  </div>
