
<!DOCTYPE html>



<html lang="fr">



<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
    @include('Market-Place/partials/head')

</head>

<body>

    <!-- Start Header Area -->
    <header class="header-section d-none d-xl-block">
    @include('Market-Place/partials/header')
    </header>
    <!-- Start Header Area -->
    @include('Market-Place/custom/custom')
    <!-- Start Mobile Header -->
    @include('Market-Place/partials/header_mobile')
    <!--  Start Offcanvas Mobile Menu Section -->
    @include('Market-Place/partials/nav_mobile')
    <!-- Start Offcanvas Mobile Menu Section -->
    @include('Market-Place/partials/menu_f')

    <!-- Start Offcanvas Addcart Section -->
    @include('Market-Place/partials/menu_profil')
    <!-- Start Offcanvas Mobile Menu Section -->




   @yield('content')

    <!-- Start Footer Section -->
    <footer class="footer-section footer-bg section-top-gap-100">
    @include('Market-Place/partials/footer')
    </footer>
    <!-- End Footer Section -->

    <!-- material-scrolltop button -->
    <button class="material-scrolltop" type="button" style="background-color:rgb(151, 7, 7);"></button>
    <button class="annonce" id=clickss type="button" id="clicks">
      <p style="color: white;text-align:center;display:flex;align-items:center;justify-content:center;">   Publié une annonce <i class="fa fa-bullhorn" aria-hidden="true" style="margin-left:5px;"></i></p>
    </button>






    <!-- Start Modal Quickview cart -->

    <!-- ::::::::::::::All JS Files here :::::::::::::: -->
    <!-- Global Vendor, plugins JS -->
    @include('Market-Place/partials/js')
</body>


</html>

<style>
  @media screen and (max-width:800px)  {
  body   .annonce{
  display: flex;
    }
  body .column  .dff{
  display: block;
  }
  body .fade{
  height:100%;

  ;
  }
body .default-form-box{
  display: block;
}
#disp_in{
display: block;
}

  }
  .annonce {
    z-index: 999;
    display: block;
    position: fixed;
    width:auto;
    display: none;
  text-align: center;
   height:30px ;
    align-items: center;
    justify-content: center;
 padding-top: 15px;
    bottom: 13px;
    right:30%;
font-size: 16px;
    overflow: hidden;
    outline: none;
    border: none;
    border-radius: 2px;
   border-bottom-left-radius:30px ;
   border-bottom-right-radius:30px ;
   border-top-left-radius:30px ;
   border-top-right-radius:30px ;
    cursor: hand;

    background:rgb(151, 7, 7);;
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    transition: all 0.3s cubic-bezier(0.25, 0.25, 0, 1);
}

</style>
