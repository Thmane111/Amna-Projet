<!DOCTYPE html>
<html lang="en">
    <!-- START: Head-->
    <head>
     @include('Back.partials.head')
    </head>
    <!-- END Head-->

    <!-- START: Body-->
    <body id="main-container" class="default">

        <!-- START: Pre Loader-->
        <div class="se-pre-con">
            <div class="loader"></div>
        </div>
        <!-- END: Pre Loader-->

        <!-- START: Header-->
        <div id="header-fix" class="header fixed-top">
         @include('Back.partials.header')
        </div>
        <!-- END: Header-->

        <!-- START: Main Menu-->
        <div class="sidebar">
           @include('Back.partials.nav')
        </div>
        <!-- END: Main Menu-->

        <!-- START: Main Content-->
        <main>
         @yield('content')
        </main>
        <!-- END: Content-->
        <!-- START: Footer-->
        <footer class="site-footer">
            2020 © PICK
        </footer>
        <!-- END: Footer-->

        <!-- START: Back to top-->
        <a href="#" class="scrollup text-center">
            <i class="icon-arrow-up"></i>
        </a>
        <!-- END: Back to top-->



    @include('Back.partials.js')
        <!-- END: Page JS-->
    </body>
    <!-- END: Body-->
</html>
