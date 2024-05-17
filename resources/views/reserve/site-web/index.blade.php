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

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">
 @include('site-web.partials.section1')
  </section><!-- End Hero Section -->

  <main id="main">


  @yield('content')

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
