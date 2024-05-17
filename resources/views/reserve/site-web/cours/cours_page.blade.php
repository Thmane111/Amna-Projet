@php
$service=App\Models\ServiceCategory::all();
use Illuminate\Support\Str;
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
@include('site-web.partials.head')
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
  @include('site-web.partials.header')
  </header><!-- End Header -->
  <!-- End Header -->

<style>
  .page-header{
    background-color: #9b3f3f;;
    background:#0e1d34;background-size: cover;
 background-position: center;
    background-image: url({{asset('Site-web/assets/img/hero-bg.png')}});


}
</style>
  <main id="main">


 <div class="breadcrumbs">
    <div class="page-header d-flex align-items-center" style="background-image: url('{{ asset("Site-web/assets/img/hero-bg.png") }}');"
    >
      <div class="container position-relative" data-aos="zoom-out">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 text-center">
            <h2>Des cours 100% pratique</h2>
            <button type="submit" class="btn btn-primary">Choissisez votre formation</button>
          </div>
        </div>
      </div>
    </div>
    <nav>
      <div class="container">
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>service</li>
        </ol>
      </div>
    </nav>
  </div>

  <!-- End Breadcrumbs -->
  <section id="service" class="services pt-0" style="background:  #0e1d34;">
    <div class="container" data-aos="fade-up" style="justify-content: center;align-items:center;text-align:center;">

        <div class="section-header">
          <span>Our Services</span>
          <h2>Votre avenir commence ici</h2>
          <p style="color:white;">S'inscrire chez nous est la première étape d'un parcours stimulant, mais aussi la meilleure décision que vous puissiez prendre.</p>

        </div>

        <div class="row gy-4" >
            @foreach($service as $services)

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100" style="border-radius:10px;">
        <div class="card" style="border-radius:10px;width:100%;">
          <div class="col-lg-4 card-img" style="height:150px;width:100%;">
            <img src="/photo/service-categorie/{{$services->image}}" alt="" style="border-radius:10px;" style="height:150%;width:100%;" class="img-fluid">
          </div>
          <h3><a href="service-details.html"  class="stretched-link">{{$services->service_category}}</a></h3>
          <p>{{$services->Description}}</p>
        </div>
      </div><!-- End Card Item -->
      @endforeach
        </div>

      </div>

  </section>




</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

@include('site-web.partials.footer')

</footer><!-- End Footer -->
<!-- End Footer -->

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<div id="preloader"></div>

@include('site-web.partials.js')

</body>

</html>
