@php
$about=App\Models\propos::all()->first();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
@include('site-web.partials.head')
</head>
<style>
    .page-header{

      background:#0e1d34;background-size: cover;
   background-position: center;
      background-image: url({{asset('Site-web/assets/img/hero-bg.png')}});


  }
  </style>
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
  @include('site-web.partials.header')
  </header><!-- End Header -->
  <!-- End Header -->



  <main id="main">


 <div class="breadcrumbs">
    <div class="page-header d-flex align-items-center" style="background-image: url('{{ asset("Site-web/assets/img/hero-bg.png") }}');">
      <div class="container position-relative" data-aos="zoom-out">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 text-center">
            <h2>About</h2>
            <img src="{{asset('Site-web/assets/img/hero-img.svg')}}" class="img-fluid mb-3 mb-lg-0" style="100px;height:100px;" alt="">
          </div>
        </div>
      </div>
    </div>
    <nav>
      <div class="container">
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>About</li>
        </ol>
      </div>
    </nav>
  </div>

  <!-- End Breadcrumbs -->
<section id="about" class="about pt-0" style="margin-top: 5%;">
    <div class="container" data-aos="fade-up">

      <div class="row gy-4">
        <div class="col-lg-6 position-relative align-self-start order-lg-last order-first">
          <img src="/photo/propos/{{$about->image}}" class="img-fluid" alt=""  width="100%" height="100%">

        </div>
        <div class="col-lg-6 content order-last  order-lg-first" data-aos="zoom-out">
          <h3>{{$about->titre}}</h3>
          <p>
           {!!$about->LeTexte!!}
          </p>

        </div>
      </div>

      <div class="row gy-4 pricing-item mt-4" data-aos="fade-up" id="" data-aos-delay="300" style="    background:#0e1d34;">
        <h4 style="color: white;">Nos Valeurs</h4>
        <p style="color: white;">
            Nos valeurs fondamentales sont au cœur de PULSE. Elles sont le moteur de la culture de notre entreprise et façonnent la manière dont nous travaillons et interagissons avec les gens chaque jour, tant au niveau des clients que des carrières. Notre objectif est que tout ce que nous développons et cultivons – qu’il s’agisse de stratégies digitales, d’externalisation des talents ou de culture d’entreprise – respecte ces cinq credos.
        </p>
        <div class="container" data-aos="fade-up" style="    background:#0e1d34;">

            <div class="section-header">
              <span>Frequently Asked Questions</span>
              <h2>Nos Valeurs</h2>

            </div>

            <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="200" >
              <div class="col-lg-10" >

                <div class="accordion accordion-flush" id="faqlist" >

                  <div class="accordion-item"style="    background:#0e1d34;" >
              <h3 class="accordion-header"  style="    background:#0e1d34;">
                <center>
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1" style="    background:#0e1d34;">

                      <h2  style="color: white;">1. Passion</h2>
                      </button></center>
                    </h3>
                    <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                      <div class="accordion-body">
                        <h3  style="color: white;">La passion est bien plus qu’un simple mot</h3>
                       <span style="color: white;">elle est l’énergie qui alimente notre quête d’excellence et la conviction profonde qui stimule notre enthousiasme chaque jour.</span>
                    </div>
                  </div><!-- # Faq item-->

                  <div class="accordion-item" style="    background:#0e1d34;">
                    <h3 class="accordion-header" style="    background:#0e1d34;">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2" style="    background:#0e1d34;">

                        <h2 style="color: white;">2. Collaboration</h2>
                      </button>
                    </h3>
                    <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                        <div class="accordion-body">
                            <h3  style="color: white;">La passion est bien plus qu’un simple mot</h3>
                           <span style="color: white;">elle est l’énergie qui alimente notre quête d’excellence et la conviction profonde qui stimule notre enthousiasme chaque jour.</span>
                        </div>
                    </div>
                  </div><!-- # Faq item-->

                  <div class="accordion-item" style="    background:#0e1d34;">
                    <h3 class="accordion-header" style="    background:#0e1d34;">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3" style="    background:#0e1d34;">

                        <h2 style="color: white;">3. Fiabilité</h2>
                      </button>
                    </h3>
                    <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                        <div class="accordion-body">
                            <h3  style="color: white;">La passion est bien plus qu’un simple mot</h3>
                           <span style="color: white;">elle est l’énergie qui alimente notre quête d’excellence et la conviction profonde qui stimule notre enthousiasme chaque jour.</span>
                        </div>
                    </div>
                  </div><!-- # Faq item-->

                  <div class="accordion-item" style="    background:#0e1d34;">
                    <h3 class="accordion-header" style="    background:#0e1d34;">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-4" style="    background:#0e1d34;">

                        <h2 style="color: white;">4. Transparent</h2>
                      </button>
                    </h3>
                    <div id="faq-content-4" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                        <div class="accordion-body">
                            <h3  style="color: white;">La passion est bien plus qu’un simple mot</h3>
                           <span style="color: white;">elle est l’énergie qui alimente notre quête d’excellence et la conviction profonde qui stimule notre enthousiasme chaque jour.</span>
                        </div>
                    </div>
                  </div><!-- # Faq item-->



                </div>

              </div>
            </div>

          </div>
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
