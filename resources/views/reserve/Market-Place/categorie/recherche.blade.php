@extends('Front.index')
@section('content')

     <!-- ...:::: Start Shop Section:::... -->
     <div class="shop-section">
        
        <div class="container">
            <div class="row flex-column-reverse flex-lg-row">
                <div class="col-lg-3" style="background:rgb(138, 8, 8);margin-top:5px;">
                    <!-- Start Sidebar Area -->
                    <div class="siderbar-section" data-aos="fade-up" data-aos-delay="0" >

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget" style="margin-top:5px;">
                            <h6 class="sidebar-title">CATEGORIES</h6>
                            <div class="sidebar-content">
                                <ul class="sidebar-menu">
                                    <li>
                                        <ul class="sidebar-menu-collapse">
                                            <!-- Start Single Menu Collapse List -->
                                            <li class="form-fild-newsletter-single-item">
                                            <label class="form-fild-newsletter-single-item" for="brakeParts">
                                                <form action="{{route('Product.search')}}">
                                                    <div class="form-fild-newsletter-single-item" id="search">
                                                        <input type="search" placeholder="Veuillez affiner le resultat de la recherche " name="search" value="{{request()->search ?? ''}}" style="color:black;width:100%;"  required>
                                                        <button type="submit" style="width:50px;height:100%;">  <i class="icon-magnifier"></i></button>
                                                    </div>
                                                </form>
                                            </label>
                                        </li>
                                        <style>
    .checkbox-default input:checked::after {

    background: rgb(151, 7, 7);

    color: #FFF;
}
                        </style>
                                            <li class="sidebar-menu-collapse-list">
                                                <div class="accordion">
                                                    <a href="#" class="accordion-title collapsed"
                                                        data-bs-toggle="collapse" data-bs-target="#men-fashion"
                                                        aria-expanded="false">Men <i
                                                            class="ion-ios-arrow-right"></i></a>
                                                    <div id="men-fashion" class="collapse">
                                                        <ul class="accordion-category-list">
                                                            <li><a href="#">Dresses</a></li>
                                                            <li><a href="#">Jackets &amp; Coats</a></li>
                                                            <li><a href="#">Sweaters</a></li>
                                                            <li><a href="#">Jeans</a></li>
                                                            <li><a href="#">Blouses &amp; Shirts</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li> <!-- End Single Menu Collapse List -->
                                        </ul>
                                    </li>
                                    <li><a href="#">Football</a></li>
                                    <li><a href="#"> Men's</a></li>
                                    <li><a href="#"> Portable Audio</a></li>
                                    <li><a href="#"> Smart Watches</a></li>
                                    <li><a href="#">Tennis</a></li>
                                    <li><a href="#"> Uncategorized</a></li>
                                    <li><a href="#"> Video Games</a></li>
                                    <li><a href="#">Women's</a></li>
                                </ul>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <h6 class="sidebar-title">FILTER BY PRICE</h6>
                            <div class="sidebar-content">
                                <div id="slider-range"></div>
                                <div class="filter-type-price">
                                    <label for="amount">Price range:</label>
                                    <input type="text" id="amount">
                                </div>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->

                       
                        


                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <div class="sidebar-content">
                                <a href="product-details-default.html" class="sidebar-banner img-hover-zoom">
                                    <img class="img-fluid" src="assets/images/banner/side-banner.jpg" alt="">
                                </a>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->

                    </div> <!-- End Sidebar Area -->
                </div>
                <div class="col-lg-9">
                <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden" 
                style="background:rgb(138, 8, 8);color:white;padding:5px;margin-top:5px;"
                >
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
                                    
                                     
                         
                                            @if($compte==0)
                                            <div class="col-12">
                                                
                         <div class="product-list-single product-color--golden"
                         data-aos="fade-up" data-aos-delay="0"  style="background:rgb(156, 154, 154)">
                         <div class="product-list-content">
                         <h3 class="product-list-link" style="color:white;">
                            <br>
                            Nous sommes désolés.        <center>  <i class="fa fa-frown-o" style="font-size:58px;"></i></center>
                        </h3>
                        <br>

                         <p style="font-size:15px;color:white;text-align:center;">
                            Nous n'avons pas trouvé de correspondance pour votre requête de recherche aujourd'hui.

                           Vous pouvez créer une alerte par e-mail pour être averti dès qu’une est disponible.
                         </p>
                         <div class="col-4" style="justify-content: center;text-align:center;ali">

                         </div>
                         </div>
                     </div> <!-- End Product Defautlt Single -->
                                             </div>
                                             @endif
                                             <?php    use App\Models\ImageProduct; ?>
                                             @foreach($recherche as $recherches)
                                                <div class="col-12">
                                                    
                                                    <!-- Start Product Defautlt Single -->
                                                    <div class="product-list-single product-color--golden">
                                                        <a href="#"
                                                            class="product-list-img-link">
                                                            <?php
                                                     
                                                     $img=ImageProduct::all()->where('product_id','=',$recherches->id);
                                                     ?>
                                                        @foreach($img as $imgs)
                                                            <img class="img-fluid"  style="width:200px;height:100px;"
                                                                src="/uploads/Annonce/{{$imgs->image_1}}"
                                                                alt="">
                                                           
                                                                @endforeach
                                                      
                                                        <div class="product-list-content">
                                                        <p  style="font-size:16px;color:rgb(138, 8, 8);">
                                                        <strong>
                                                            {{$recherches->titre_prod}}
</strong>
                                                        </p>
                                                           
                                                            <span class="product-list-price"><p style="float:right;"><a href="{{route('Panel.detail',$recherches->id)}}" 
                                                                    
                                                                    class="btn btn-lg "style="background:rgb(151, 7, 7);color:white;">Contacter</a></p>
                                                            {{$recherches->prix_prod}} Fcfa</span>
                                                            <p> {{$recherches->description}}</p>
                                                            <div class="product-action-icon-link-list">
                                                                
                                                              
                                                        </div>
                                                        </a>
                                                    </div> <!-- End Product Defautlt Single -->
                                               
                                                </div>
                                                @endforeach
                                            </div>
                                        </div> <!-- End List View Product -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Tab Wrapper -->

                    <!-- Start Pagination -->
                    <div class="page-pagination text-center" data-aos="fade-up" data-aos-delay="0">
                        <ul>
                            <li><a class="active" href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#"><i class="ion-ios-skipforward"></i></a></li>
                        </ul>
                    </div> <!-- End Pagination -->
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Shop Section:::... -->




































































































@endsection
