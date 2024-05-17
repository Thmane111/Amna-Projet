@php
$service=App\Models\service::all();
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

         <!-- ======= Features Section ======= -->
      <section id="features" class="features" style="background:rgb(218, 206, 206)">
        <div class="container" style="background:white;">

          <div class="row gy-4 align-items-center features-item" data-aos="fade-up">

            <div class="col-md-7">
              <img src="{{asset('Site-web/assets/img/az.jpg')}}" style="width: 100%;height:100%;" class="img-fluid" alt="">
            </div>
            <div class="col-md-4" data-aos="zoom-out">
              <h3>Devenez autonome et changez votre carrière</h3>
              <p class="">
                Nous pensons que chacun a droit à une carrière épanouissante et nous voulons vous aider à l'obtenir. C'est pourquoi nous proposons


              </p>

            </div>
          </div><!-- Features Item -->
          <section id="horizontal-pricing" class="horizontal-pricing pt-0" >
            <div class="container" data-aos="fade-up" >
          <div class="row gy-4 pricing-item" data-aos="fade-up" data-aos-delay="100">
            <hr>
            <h2><strong> 20 000 fcfa</strong></h2>

            <div class="col-lg-6 d-block align-items-center justify-content-center">
              <h3>Presentation</h3><br>
              <p>Dans ce cours vous allez apprendre les bases de Typescript en Wolof</p>
              <ul>
                <li><i class="bi bi-check" ></i> Formation pratique</li>
                <li><i class="bi bi-check"></i> Un Paiement Échelonné</li>
                <li><i class="bi bi-check"></i>Un Mentor</li>
              </ul>

            </div>
            <button type="submit" class="btn btn-primary">S'inscrire</button>

          </div><!-- End Pricing Item -->
            </div>
          </section>








        </div>
      </section><!-- End Features Section -->
</main><!-- End #main -->


<!-- End Footer -->

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<div id="preloader"></div>

@include('site-web.partials.js')

</body>

</html>
