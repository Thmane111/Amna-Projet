@extends('Market-Place.index')
@section('content')
    <!-- Start Hero Slider Section-->
    <div class="hero-slider-section">
        <!-- Slider main container -->
        <div class="hero-slider-active swiper-container">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper" style="height:200px;">
                <!-- Start Hero Single Slider Item -->
                <div class="hero-single-slider-item swiper-slide" >
                    <!-- Hero Slider Image -->
                    <div class="hero-slider-bg">
                        <img src="{{asset('Market-Place/image/za.jpg')}}" alt="">
                    </div>
                    <!-- Hero Slider Content -->
                    <div class="hero-slider-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="hero-slider-content">

                                        <h1 class="title" style="color:#A52A2A ;">Numéro 1 des petites annonces<br> en Mauritanie</h1>
                                        <p>Des bonnes affaires proches de chez vous</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Hero Single Slider Item -->
                <!-- Start Hero Single Slider Item -->
                <div class="hero-single-slider-item swiper-slide">
                    <!-- Hero Slider Image -->
                    <div class="hero-slider-bg">
                        <img src="{{asset('Market-Place/image/slide_2.jpg')}}" alt="">
                    </div>
                    <!-- Hero Slider Content -->
                    <div class="hero-slider-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="hero-slider-content">


                                        <h1 class="title">Numéro 1 des petites annonces<br> en Mauritanie</h1>
                                        <p>Des bonnes affaires proches de chez vous</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Hero Single Slider Item -->
            </div>

            <!-- If we need pagination -->
            <div class="swiper-pagination active-color-aqua" ></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev d-none d-lg-block" ></div>
            <div class="swiper-button-next d-none d-lg-block" ></div>
        </div>
    </div>
    <!-- End Hero Slider Section-->

<!-- sliders -->


    <!-- Start Product Default Slider Section -->
    <div class="product-default-slider-section section-fluid section-inner-bg" style="background:white;align-items:center;margin-top:-6%;">




        <!-- Start Section Content Text Area -->
        <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0" >



      <div class="row">
                    <div class="col-12">

                                <h3 class="section-title" style="width: 200px;background:rgb(151, 7, 7);padding: 5px;color:white ;">Plus Recents</h3>



                    </div>
                </div>
        </div>


        <!-- Start Section Content Text Area -->
        <div class="product-wrapper" data-aos="fade-up" data-aos-delay="0">



            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product-slider-default-1row default-slider-nav-arrow">
                            <!-- Slider main container -->
                            <div class="swiper-container product-default-slider-4grid-1row">

                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    <!-- End Product Default Single Item -->
                                    <!-- Start Product Default Single Item -->
                                    <?php    use App\Models\ImageProduct;?>
                                    @foreach($oo as $oos)
                                    <div class="product-default-single-item product-color--pink swiper-slide"
                                    style="box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 5px 0px, rgba(0, 0, 0, 0.1) 0px 0px 1px 0px;">
                                        <div class="image-box" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 5px 0px, rgba(0, 0, 0, 0.1) 0px 0px 1px 0px;" >
                                        <div class="tag" >
                                                <span style="background:rgb(151, 7, 7);">Nouveau</span>
                                            </div>
                                            <a href="{{route('Panel.show',$oos->id)}}" class="image-link">
                                                        <?php
                                                        $img=ImageProduct::all()->where('product_id','=',$oos->id)->first();
                                                        ?>


                                                <img src="/uploads/Annonce/{{$img->image}}" alt="" style="width: 100%;height:270px;
                                                box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 5px 0px, rgba(0, 0, 0, 0.1) 0px 0px 1px 0px;
                                                ">

                                        </div>
                                        <div class="content"  >
                                        <div class="content-left" style="width:100%;">
                                                <h4 class="title" style="margin-left:15px;">
                                                   {{$oos->prix_prod. " MRU"}}
                                                </h4>

                                                        <p  style="font-size:12px;color:black;margin-left:15px;">
                                                           <strong> {{$oos->titre_prod}}</strong>

                                               </p>
                                               <span style="padding:15px;">{{($oos->created_at)->diffforHumans()}}</span>
                                                <ul class="review-star" style="background:rgb(151, 7, 7);text-align:center;display:flex;align-items:center;
                                                 justify-content:center;
                                                ">
                                                    <li class="fill"><h5
                                                     style="color: white;"
                                                    >Contacter</h5></li>
                                                </a>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                    <!-- End Product Default Single Item -->



                                    <!-- End Product Default Single Item -->





















                                </div>
                            </div>
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>


    <div id="pub" class="section-title-wrapper">

        <div class="container">
            <div class="row">
                <div class="col-12">

                    <div class="section-content-gap">
                        <div class="secton-content">
               <img src="{{asset('image/pub.jpg')}}" style="height:120px; width:700px;">

                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- End Product Default Slider Section -->

    <div class="product-default-slider-section section-top-gap-100 section-fluid">
        <div class="row">
            <div class="col-12">

                        <h3 class="section-title" style="width: 200px;background:rgb(151, 7, 7);padding: 5px;color:white ;">Autre annonces</h3>



            </div>
        </div>
        <!-- Start Section Content Text Area -->
        <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-content-gap">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Section Content Text Area -->
        <div class="product-wrapper" data-aos="fade-up" data-aos-delay="200">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product-slider-default-2rows default-slider-nav-arrow">
                            <!-- Slider main container -->
                            <div class="swiper-container product-default-slider-4grid-2row">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    <!-- Start Product Default Single Item -->




                                    <!-- End Product Default Single Item -->
                                    <!-- Start Product Default Single Item -->


                                    @foreach($globe as $globes)
                                    <div class="product-default-single-item product-color--golden swiper-slide"
                                    style="box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 5px 0px, rgba(0, 0, 0, 0.1) 0px 0px 1px 0px;">
                                        <div class="image-box" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 5px 0px, rgba(0, 0, 0, 0.1) 0px 0px 1px 0px;" >

                                            <a href="{{route('Panel.show',$globes->id)}}" class="image-link">
                                                        <?php

                                                     $img=ImageProduct::all()->where('product_id','=',$globes->id)->first();
                                                     ?>

                                                <img src="/uploads/Annonce/{{$img->image}}" alt="" style="width: 100%;height:270px;
                                                box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 5px 0px, rgba(0, 0, 0, 0.1) 0px 0px 1px 0px;
                                                ">





                                        </div>

                                        <div class="content"  >
                                        <div class="content-left" style="width:100%;">
                                                <h4 class="title" style="margin-left:15px;">
                                                   {{$globes->prix_prod. " MRU"}}
                                                </h4>
                                                        <p  style="font-size:14px;color:black;margin-left:15px;">
                                                            {{$globes->titre_prod}}
                                               </p>
                                                <ul class="review-star" style="background:rgb(151, 7, 7);text-align:center;display:flex;align-items:center;
                                                 justify-content:center;
                                                ">
                                                    <li class="fill"><h5
                                                     style="color: white;"
                                                    >Contacter</h5></li>
                                                </a>
                                                </ul>
                                            </div>







                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



<!-- End Banner Section -->
    <!-- Start Company Logo Section -->

    <div class="company-logo-section section-top-gap-100 section-fluid" style="height:90px;">
    <span ><center><h1 style="margin-top:10px;">Nos Partenaires</h1></center></span>
        <div class="company-logo-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="company-logo-slider default-slider-nav-arrow">
                            <!-- Slider main container -->
                            <div class="swiper-container company-logo-slider">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    <!-- Start Company Logo Single Item -->
                                    <div class="company-logo-single-item swiper-slide">
                                        <div class="image"><img class="img-fluid"
                                                src="{{asset('Market-Place/image/ml.jpg')}}" alt=""></div>
                                    </div>
                                    <!-- End Company Logo Single Item -->
                                    <!-- Start Company Logo Single Item -->
                                    <div class="company-logo-single-item swiper-slide">
                                        <div class="image"><img class="img-fluid"
                                                src="{{asset('Market-Place/image/ml.jpg')}}" alt=""></div>
                                    </div>
                                    <!-- End Company Logo Single Item -->
                                    <!-- Start Company Logo Single Item -->
                                    <div class="company-logo-single-item swiper-slide">
                                        <div class="image"><img class="img-fluid"
                                                src="{{asset('Market-Place/image/ml.jpg')}}" alt=""></div>
                                    </div>
                                    <!-- End Company Logo Single Item -->
                                    <!-- Start Company Logo Single Item -->
                                    <div class="company-logo-single-item swiper-slide">
                                        <div class="image"><img class="img-fluid"
                                                src="{{asset('Market-Place/image/ml.jpg')}}" alt=""></div>
                                    </div>
                                    <!-- End Company Logo Single Item -->
                                    <!-- Start Company Logo Single Item -->
                                    <div class="company-logo-single-item swiper-slide">
                                        <div class="image"><img class="img-fluid"
                                                src="{{asset('Market-Place/image/ml.jpg')}}" alt=""></div>
                                    </div>
                                    <!-- End Company Logo Single Item -->
                                    <!-- Start Company Logo Single Item -->
                                    <div class="company-logo-single-item swiper-slide">
                                        <div class="image"><img class="img-fluid"
                                                src="{{asset('Market-Place/image/ml.jpg')}}" alt=""></div>
                                    </div>
                                    <!-- End Company Logo Single Item -->
                                    <!-- Start Company Logo Single Item -->
                                    <div class="company-logo-single-item swiper-slide">
                                        <div class="image"><img class="img-fluid"
                                                src="{{asset('Market-Place/image/ml.jpg')}}" alt=""></div>
                                    </div>
                                    <!-- End Company Logo Single Item -->
                                    <!-- Start Company Logo Single Item -->
                                    <div class="company-logo-single-item swiper-slide">
                                        <div class="image"><img class="img-fluid"
                                                src="{{asset('Market-Place/image/ml.jpg')}}" alt=""></div>
                                    </div>
                                    <!-- End Company Logo Single Item -->
                                </div>
                            </div>
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev d-none d-md-block"></div>
                            <div class="swiper-button-next d-none d-md-block"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Company Logo Section -->

























        <!-- Start Banner Section -->
        <div class="banner-section section-top-gap-100">
        <div class="banner-wrapper clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Start Banner Single Item -->
                        <div class="banner-single-item banner-style-13 banner-color--green" data-aos="fade-up"
                            data-aos-delay="0">
                            <div class="image">
                                <img src="{{asset('image/plus.jpg')}}" alt="">
                                <div class="content">
                                    <div class="text">
                                        <p style="justify-content:center;">
                                        Nous vous offrons des solutions adaptées à vos besoins pour vous permettre d’accélérer votre business.
</p>
                                        <h3>
                                        Développez votre business. Commencez à vendre dès aujourd'hui avec Expat-Rim !
</h3>

                                        <a href="product-details-default.html"
                                            class="btn btn-lg btn-green icon-space-left"><span
                                                class="d-flex align-items-center">Shop Now <i
                                                    class="ion-ios-arrow-thin-right"></i></span></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- End Banner Single Item -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner Section -->
    <style>
        .product-default-single-item .content {
         padding-top: 5px;
       display: flex;
          justify-content: space-between;
         align-items: flex-end;
        }
        .product-default-single-item  .content .title{
            color:rgb(151, 7, 7);
        }
        .product-default-single-item ,.image-box{
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
        }
        .product-default-single-item,.review-star{
            border-bottom-left-radius: 20px;
        border-bottom-right-radius: 20px;
        }




    </style>
         <style>
            #pub{
                display:flex;align-items:center;justify-content:center;text-align:center;
             margin-top:-60px;height:120px;
            }
                  @media screen and (max-width:800px)  {
                 body #pub{
  display: none;
}
                  }
            </style>
    @endsection

