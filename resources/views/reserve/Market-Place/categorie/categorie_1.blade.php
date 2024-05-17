@extends('Front.index')
@section('content')
    <!-- ...:::: Start Shop Section:::... -->
    <div class="shop-section" style="margin-top:30px;">
        <div class="container">
            <div class="row flex-column-reverse flex-lg-row">
                <div class="col-lg-3">
                    <!-- Start Sidebar Area -->
                    <div class="siderbar-section" data-aos="fade-up" data-aos-delay="0">




                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">

                            <div class="sidebar-content">
                                <div class="filter-type-select">
                                <form method="GET" action="{{route('Panel.show_cat',00)}}"  enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" name="filtre" value="0">
                                <ul>
                                <h6 class="sidebar-title">CATEGORIES</h6>

                                        <li>
                                            <label class="checkbox-default" for="brakeParts">
                                                <input type="checkbox" id="brakeParts" name="gorie_1" value="7" >
                                                <span>Voitures(6)</span>
                                            </label>
                                        </li>

                                        <li>
                                            <label class="checkbox-default" for="accessories">
                                                <input type="checkbox" id="accessories" name="gorie_2"  value="9">
                                                <span>Moto(10)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="EngineParts">
                                                <input type="checkbox" id="EngineParts" name="gorie_3"  value="8">
                                                <span>Scooters (4)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="hermes">
                                                <input type="checkbox" id="hermes" name="gorie_4">
                                                <span>Location de Voitures (10)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="tommyHilfiger">
                                                <input type="checkbox" id="tommyHilfiger" name="gorie_5"  value="11">
                                                <span>Bus</span>
                                            </label>
                                        </li>
                                    </ul>
                                    <ul>
                                    <h6 class="sidebar-title">Ville/Region</h6>
                                        <li>
                                            <label class="checkbox-default" for="brakeParts">
                                                <input type="checkbox" id="brakeParts" name="ville_gorie_1"  value="Nouakchott">
                                                <span>Nouakchott</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="accessories">
                                                <input type="checkbox" id="accessories" value="Nouadhibou" name="ville_gorie_2">
                                                <span>Nouadhibou (10)</span>
                                            </label>
                                        </li>

                                        <li>
                                            <label class="checkbox-default" for="hermes">
                                                <input type="checkbox" id="hermes" value="Zoueratt" name="ville_gorie_3">
                                                <span>Rosso (10)</span>
                                            </label>
                                        </li>

                                        <li>
                                            <br>
                                                <button type="submit" id="hermes" class="btn " style="background:rgb(151, 7, 7);color:white;"  name="valider_filtre">Rechercher</button>

                                            </label>
                                        </li>

                                    </ul>
</form>
                                </div>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->
                        <style>
    .checkbox-default input:checked::after {

    background: rgb(151, 7, 7);

    color: #FFF;
}
                        </style>




                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <div class="sidebar-content">
                                <a href="product-details-default.html" class="sidebar-banner img-hover-zoom">
                                    <img class="img-fluid" src="./image/slide_3.jpg" alt="">
                                </a>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->

                    </div> <!-- End Sidebar Area -->
                </div>
                <div class="col-lg-9">
                <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="/">Acceuil</a></li>
                                <li><a href="active">Annonce</a></li>

                            </ul>
                        </nav>
                    </div>

                    <!-- Start Tab Wrapper -->
                    <div class="sort-product-tab-wrapper">
                        <div class="container">
                            <div class="row">

                                <div class="col-12">


                                    <div class="tab-content tab-animate-zoom">
                                        <!-- Start Grid View Product -->
                                        <div class="tab-pane active show sort-layout-single" id="layout-3-grid">
                                            <div class="row">
                                            <?php    use App\Models\ImageProduct;?>
                                               @foreach($globe_cat as $globe_cats)

                                                <div class="col-xl-4 col-sm-6 col-12">
                                                    <!-- Start Product Default Single Item -->
                                                    <div class="product-default-single-item product-color--pink swiper-slide"
                                    style="border:solid 1px rgb(151, 7, 7);
                                               box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 5px 0px, rgba(0, 0, 0, 0.1) 0px 0px 1px 0px;
                                    ">
                                        <div class="image-box" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 5px 0px, rgba(0, 0, 0, 0.1) 0px 0px 1px 0px;" >
                                        <?php
                                                     
                                                     $img=ImageProduct::all()->where('product_id','=',$globe_cats->id);
                                                     ?>
                                                       @foreach($img as $imgs)
                                            <a href="{{route('Panel.detail',$globe_cats->id)}}" class="image-link">
                                                <img src="/uploads/Annonce/{{$imgs->image_1}}" alt="" style="width: 100%;height:270px;
                                                           box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 5px 0px, rgba(0, 0, 0, 0.1) 0px 0px 1px 0px;
                                                ">

                                                    @endforeach


                                        </div>

                                        <div class="content"  >
                                        <div class="content-left" style="width:100%;">
                                                <h4 class="title" style="margin-left:15px;">
                                                    {{$globe_cats->prix_prod. "MRU"}}
                                                      </h4>
                                                        <p  style="font-size:14px;color:black;margin-left:15px;">
                                                            {{$globe_cats->titre_prod}}
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
                                                    <!-- End Product Default Single Item -->
                                                </div>

                                               @endforeach

                                        </div> <!-- End Grid View Product -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Tab Wrapper -->

                    <!-- Start Pagination -->
                    <div class="page-pagination text-center" data-aos="fade-up" data-aos-delay="0">
                        <ul>

                            <li><a class="active" href="#" style="background:rgb(131, 40, 40);" >1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#"><i class="ion-ios-skipforward"></i></a></li>
                        </ul>
                    </div> <!-- End Pagination -->
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Shop Section:::... -->

    <!-- Start Footer Section -->
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
                                .product-default-single-item img{
                                    border-top-right-radius:20px;
                                    border-top-left-radius:20px;
                                }
                                .product-default-single-item{
                                    border-top-left-radius:20px;
                                    border-top-right-radius:20px;
                                    border-bottom-left-radius:20px;
                                    border: solid 2px rgb(151, 7, 7);
                                    border-bottom-right-radius:20px;
                                    background:white;
                                }
                                .product-wrapper{
                                    background:white;
                                    padding-top:20px;
                                    padding-bottom:20px;
                                }
                                .content-right .price{
                                    color:red;
                                    margin-left:25px;
                                    justify-content:center;
                                }
                                .content-right {
                                    padding-top: 9px;
                                    font-size:16px;

                                    border-bottom-left-radius:17px;
                                    border-bottom-right-radius:17px;
                                    width:100%;
                                    background:rgb(151, 7, 7);;
                                    align-items:center;
                                    text-align:center;
                                }

                                </style>

@endsection
