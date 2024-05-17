

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

    #call-to-actions{
        background-color: #9b3f3f;;
        background:#0e1d34;background-size: cover;
     background-position: center;
        background-image: url({{asset('Site-web/assets/img/az3.png')}});


    }
    #call-to-actionss{
        background-color: #0e1d34;;
        background-image: url({{asset('Site-web/assets/img/az4.png')}});

    }
</style>

  <main id="main">
     <!-- ======= Call To Action Section ======= -->
     <section id="call-to-actions" class="call-to-actions" style="height: 600px;" style="background:#0e1d34;background-size: cover;
     background-position: center;background-image: url({{asset('Site-web/assets/img/az3.png')}});">
        <div class="container" data-aos="zoom-out">

          <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
              <h3>Call To Action</h3>
              <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              <a class="cta-btn" href="#">Call To Action</a>
            </div>
          </div>

        </div>
      </section><!-- End Call To Action Section -->




    </section><!-- End Horizontal Pricing Section -->
       <!-- ======= Call To Action Section ======= -->
       <section id="call-to-actionss" class="call-to-action" style="height: 600px;">
        <div class="container" data-aos="zoom-out">

          <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
              <h3>Call To Action</h3>
              <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              <a class="cta-btn" href="#">Call To Action</a>
            </div>
          </div>

        </div>
      </section><!-- End Call To Action Section -->




    </section><!-- End Horizontal Pricing Section -->
       <!-- ======= Call To Action Section ======= -->
       <section id="call-to-action" class="call-to-action" style="height: 600px;">
        <div class="container" data-aos="zoom-out">

          <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
              <h3>Call To Action</h3>
              <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              <a class="cta-btn" href="#">Call To Action</a>
            </div>
          </div>

        </div>
      </section><!-- End Call To Action Section -->




    </section><!-- End Horizontal Pricing Section -->
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

