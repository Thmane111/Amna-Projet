


<!DOCTYPE html>

<html lang="fr">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Expad-Rim</title>

    <!-- ::::::::::::::Favicon icon::::::::::::::-->
    <link rel="shortcut icon" href="{{asset('Market-Place/assets/images/favicon.ico')}}" type="image/png">

    <!-- ::::::::::::::All CSS Files here :::::::::::::: -->
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{asset('Market-Place/assets/css/vendor/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('Market-Place/assets/css/vendor/ionicons.css')}}">
    <link rel="stylesheet" href="{{asset('Market-Place/assets/css/vendor/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{asset('Market-Place/assets/css/vendor/jquery-ui.min.css')}}">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="{{asset('Market-Place/assets/css/plugins/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('Market-Place/assets/css/plugins/animate.min.css')}}">

    <link rel="stylesheet" href="{{asset('Market-Place/assets/css/plugins/venobox.min.css')}}">
    <link rel="stylesheet" href="{{asset('Market-Place/assets/css/plugins/jquery.lineProgressbar.css')}}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js')}}"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js')}}"></script>

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('Market-Place/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('Market-Place/assets/css/style_manual.css')}}">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <!-- <link rel="stylesheet" href="{{asset('Market-Place/assets/css/vendor/vendor.min.css')}}">
    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css"> -->

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
    <!-- End Mobile Header -->

    <!--  Start Offcanvas Mobile Menu Section -->
    @include('Market-Place/partials/nav_mobile')

    <!-- Start Offcanvas Mobile Menu Section -->
    @include('Market-Place/partials/menu_f')
    @include('Market-Place/partials/menu_profil')


<!--  -->

<div class="checkout-section" style="padding-top:3%">
        <div class="container">
        <div class="col-md-12">
                            @if(session()->has('message'))
                            <div class="alert alert-icon alert-success">
                               {{session('message')}}
                            </div>
                            @endif
                            @if($errors->any())

                             <div class="alert alert-icon alert-danger">
                               {{session('errors')}}
                            </div>

                             @endif
                             @if(session()->has('error'))
                            <div class="alert alert-icon alert-danger">
                               {{session('error')}}
                            </div>
                            @endif
                          </div>

                          <div class="container-fluid" id="grad1">
                            <div class="row justify-content-center mt-0">
                                <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
                                    <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                                        <h2><strong>Créer une annonce</strong></h2>
                                        <p>Fill all form field to go to next step</p>
                                        <div class="row">
                                            <div class="col-md-12 mx-0">
                                                <form id="msform" action="{{route('iss.AjoutProd')}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{Auth::user()->id}}">
                                                    <input type="hidden" name="cat" value="2">
                                                    <!-- progressbar -->
                                                    <ul id="progressbar">
                                                        <li class="active" id="account"><strong>Quelle type d'annonce</strong></li>
                                                        <li id="personal"><strong>Image du produit</strong></li>
                                                        <li id="payment"><strong>Information produit</strong></li>
                                                        <li id="confirm"><strong>Finish</strong></li>
                                                    </ul>
                                                    <!-- fieldsets -->
                                                    <fieldset>
                                                        <div class="form-card">
                                                            <h2 class="fs-title">Quelle type de catégorie voulez-vous annoncer ?</h2>


                                                                <div class="col-9">
                                                                    <label for="country">Categorie<span>*</span></label>
                                                        <select name="cat"  id="region" class="form-control" title="region">
                                                        <option value="">Selectionner un catégorie</option>
                                                          @foreach($countries as $countries)
                                                          <option value="{{ $countries->id }}">{{ $countries->nom_cat }}</option>
                                                          @endforeach

                                                           </select>

                                                                </div>
                                                                <div class="col-9">
                                                                    <label for="country">
                                                                        Sous Categorie<span>*</span>
                                                                    </label>
                                                                    <select name="sous_cat" id="country"  class="form-control"  title="country">
                                                    <option value="">Type de catégorie</option>
                                                    </select>

                                                                </div>

                                                        </div>
                                                        <input type="button" name="next" class="next action-button" value="Next Step"/>
                                                    </fieldset>
                                                    <fieldset>
                                                        <div class="container">
                                                            <h2 class="fs-title">Télécharger les images du produit</h2>
                                                            <fieldset class="form-group">
                                                                <a href="javascript:void(0)" onclick="$('#pro-image').click()">Upload Image</a>

                                                                <input type="file" id="pro-image" name="image[]" style="display: none;" class="form-control" multiple>
                                                            </fieldset>
                                                            <div class="preview-images-zone">
                                                                <div class="preview-image preview-show-1">
                                                                    <div class="image-cancel" data-no="1">x</div>
                                                                    <div class="image-zone"><img id="pro-img-1" src="https://www.codeproject.com/KB/GDI-plus/ImageProcessing2/flip.jpg"></div>
                                                                    <div class="tools-edit-image"><a href="javascript:void(0)" data-no="1" class="btn btn-light btn-edit-image">edit</a></div>
                                                                </div>
                                                                <div class="preview-image preview-show-2">
                                                                    <div class="image-cancel" data-no="2">x</div>
                                                                    <div class="image-zone"><img id="pro-img-2" src="https://www.codeproject.com/KB/GDI-plus/ImageProcessing2/flip.jpg"></div>
                                                                    <div class="tools-edit-image"><a href="javascript:void(0)" data-no="2" class="btn btn-light btn-edit-image">edit</a></div>
                                                                </div>
                                                                <div class="preview-image preview-show-3">
                                                                    <div class="image-cancel" data-no="3">x</div>
                                                                    <div class="image-zone"><img id="pro-img-3" src="http://i.stack.imgur.com/WCveg.jpg"></div>
                                                                    <div class="tools-edit-image"><a href="javascript:void(0)" data-no="3" class="btn btn-light btn-edit-image">edit</a></div>
                                                                </div>

                                                                <div class="preview-image preview-show-4">
                                                                    <div class="image-cancel" data-no="4">x</div>
                                                                    <div class="image-zone"><img id="pro-img-4" src="http://i.stack.imgur.com/WCveg.jpg"></div>
                                                                    <div class="tools-edit-image"><a href="javascript:void(0)" data-no="4" class="btn btn-light btn-edit-image">edit</a></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                                                        <input type="button" name="next" class="next action-button" value="Next Step"/>
                                                    </fieldset>
                                                    <fieldset>
                                                        <div class="form-card">
                                                            <h2 class="fs-title">Vos informations</h2>

                                                            <label class="pay">Titre produit*</label>
                                                            <input type="text"  name="titre" required placeholder="Choisissez un titre court et precis. NE mentionnez pas le prix!"/>


                                                                <textarea type="text"  name="detail" placeholder="Description du produit"></textarea>

                                                            <div class="row">
                                                                <div class="col-9">
                                                                    <label class="pay">Prix produit*</label>
                                                                    <input type="text"  name="prix" placeholder=" Indiquez le prix exact de l’article. Une annonce sans prix aura moins de vue"/>
                                                                </div>




                                                            <div class="row">
                                                                <div class="col-3">
                                                                    <label class="pay">Ville/region*</label>
                                                                </div>
                                                                <div class="col-9">
                                                                    <select class="list-dt" id="month" name="ville">
                                                                        <option selected>Dit où vous trouvez ?</option>
                                                                        <option>Nouadhibou</option>
                                                                        <option>Nouakchott</option>
                                                                        <option>Rosso</option>
                                                                    </select>

                                                                </div>
                                                            </div>
                                                               <br>
                                                            <div class="row">
                                                                <input type="radio" style="display: none;"  value="2" name="liv" checked>
                                                                <div class="col-3">
                                                                    <label class="pay">Livraison</label>
                                                                </div>
                                                                <div class="col-9">
                                                                    <label class=""
                                                                    >
                                                                     Oui
                                                                     <input type="radio" value="0" name="liv">


                                                                 </label>

                                                                 <label class=""
                                                                 >
                                                                 Non
                                                                  <input type="radio" value="0" name="liv">


                                                              </label>

                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-3">
                                                                    <label class="pay">Type d'oofre</label>
                                                                </div>
                                                                <div class="col-9">
                                                                    <label class=""
                                                                    >
                                                                     Vendre
                                                                     <input type="radio" value="1" name="offre">


                                                                 </label>

                                                                 <label class=""
                                                                 >
                                                                 Location
                                                                  <input type="radio" value="0" name="offre">


                                                              </label>

                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                            <div class="col-5">
                                                                <label class="pay">Numéro de téléphone*</label>
                                                                <input type="text" name="phone" value="{{Auth::user()->telephone}}"/>
                                                            </div>
                                                            <div class="col-5">
                                                                <label class="pay">Numéro Whatsapp*</label>
                                                                <input type="text" name="cardno" value="{{Auth::user()->telephone}}"/>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                                                        <input type="button" name="make_payment" class="next action-button" value="Confirm"/>
                                                    </fieldset>
                                                    <fieldset>
                                                        <div class="form-card">
                                                            <h2 class="fs-title text-center">Success !</h2>
                                                            <br><br>
                                                            <div class="row justify-content-center">
                                                                <div class="col-3">
                                                                    <input type="submit"  class="previous btn btn-danger" value="Publier l'annonce"/>
                                                                </div>
                                                            </div>
                                                            <br><br>
                                                            <div class="row justify-content-center">
                                                                <div class="col-7 text-center">
                                                                    <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            </div> <!-- Start User Details Checkout Form -->
        </div>
































    <!-- material-scrolltop button -->
    <button class="material-scrolltop" type="button"></button>

    <!-- Start Modal Add cart -->
    <div class="modal fade" id="modalAddcart" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col text-right">
                                <button type="button" class="close modal-close" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true"> <i class="fa fa-times"></i></span>
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="modal-add-cart-product-img">
                                            <img class="img-fluid"
                                                src="assets/images/product/default/home-1/default-1.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="modal-add-cart-info"><i class="fa fa-check-square"></i>Added to cart
                                            successfully!</div>
                                        <div class="modal-add-cart-product-cart-buttons">
                                            <a href="cart.html">Ousmane</a>
                                            <a href="checkout.html">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 modal-border">
                                <ul class="modal-add-cart-product-shipping-info">
                                    <li> <strong><i class="icon-shopping-cart"></i> There Are 5 Items In Your
                                            Cart.</strong></li>
                                    <li> <strong>TOTAL PRICE: </strong> <span>$187.00</span></li>
                                    <li class="modal-continue-button"><a href="#" data-bs-dismiss="modal">CONTINUE
                                            SHOPPING</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Modal Add cart -->




    <!-- Start Footer Section -->
    <footer class="footer-section footer-bg section-top-gap-100">
    <div class="footer-wrapper">
            <!-- Start Footer Top -->
            <div class="footer-top">
                <div class="container">
                    <div class="row mb-n6">
                        <div class="col-lg-3 col-sm-6 mb-6">
                            <!-- Start Footer Single Item -->
                            <div class="footer-widget-single-item footer-widget-color--aqua" data-aos="fade-up"
                                data-aos-delay="0">
                                <h5 class="title">INFORMATION</h5>
                                <ul class="footer-nav">
                                    <li><a href="#">Delivery Information</a></li>
                                    <li><a href="#">Terms & Conditions</a></li>
                                    <li><a href="contact-us.html">Contact</a></li>
                                    <li><a href="#">Returns</a></li>
                                </ul>
                            </div>
                            <!-- End Footer Single Item -->
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-6">
                            <!-- Start Footer Single Item -->
                            <div class="footer-widget-single-item footer-widget-color--aqua" data-aos="fade-up"
                                data-aos-delay="200">
                                <h5 class="title">MY ACCOUNT</h5>
                                <ul class="footer-nav">
                                    <li><a href="my-account.html">My account</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                    <li><a href="privacy-policy.html">Privacy Policy</a></li>
                                    <li><a href="faq.html">Frequently Questions</a></li>
                                    <li><a href="#">Order History</a></li>
                                </ul>
                            </div>
                            <!-- End Footer Single Item -->
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-6">
                            <!-- Start Footer Single Item -->
                            <div class="footer-widget-single-item footer-widget-color--aqua" data-aos="fade-up"
                                data-aos-delay="400">
                                <h5 class="title">CATEGORIES</h5>
                                <ul class="footer-nav">
                                    <li><a href="#">Decorative</a></li>
                                    <li><a href="#">Kitchen utensils</a></li>
                                    <li><a href="#">Chair & Bar stools</a></li>
                                    <li><a href="#">Sofas and Armchairs</a></li>
                                    <li><a href="#">Interior lighting</a></li>
                                </ul>
                            </div>
                            <!-- End Footer Single Item -->
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-6">
                            <!-- Start Footer Single Item -->
                            <div class="footer-widget-single-item footer-widget-color--aqua" data-aos="fade-up"
                                data-aos-delay="600">
                                <h5 class="title">ABOUT US</h5>
                                <div class="footer-about">
                                    <p>We are a team of designers and developers that create high quality Magento,
                                        Prestashop, Opencart.</p>

                                    <address>
                                        <span>Address: Your address goes here.</span>
                                        <span>Email: demo@example.com</span>
                                    </address>
                                </div>
                            </div>
                            <!-- End Footer Single Item -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Footer Top -->

            <!-- Start Footer Center -->
            <div class="footer-center">
                <div class="container">
                    <div class="row mb-n6">
                        <div class="col-xl-3 col-lg-4 col-md-6 mb-6">
                            <div class="footer-social" data-aos="fade-up" data-aos-delay="0">
                                <h4 class="title">FOLLOW US</h4>
                                <ul class="footer-social-link">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6 col-md-6 mb-6">
                            <div class="footer-newsletter" data-aos="fade-up" data-aos-delay="200">
                                <h4 class="title">DON'T MISS OUT ON THE LATEST</h4>
                                <div class="form-newsletter">
                                    <form action="#" method="post">
                                        <div class="form-fild-newsletter-single-item input-color--aqua">
                                            <input type="email" placeholder="Your email address..." required>
                                            <button type="submit">SUBSCRIBE!</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Start Footer Center -->

            <!-- Start Footer Bottom -->
            <div class="footer-bottom">
                <div class="container">
                    <div
                        class="row justify-content-between align-items-center align-items-center flex-column flex-md-row mb-n6">
                        <div class="col-auto mb-6">
                            <div class="footer-copyright">
                                <p class="copyright-text">&copy; 2021 <a href="index.html">therankme</a>. Made with <i
                                        class="fa fa-heart text-danger"></i> by <a href="https://therankme.com/"
                                        target="_blank">therankme</a> </p>

                            </div>
                        </div>
                        <div class="col-auto mb-6">
                            <div class="footer-payment">
                                <div class="image">
                                    <img src="assets/images/company-logo/payment.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Start Footer Bottom -->
        </div>
    </footer>
    <!-- End Footer Section -->

    <!-- material-scrolltop button -->
    <button class="material-scrolltop" type="button"></button>

    <!-- Start Modal Add cart -->
    <div class="modal fade" id="modalAddcart" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col text-right">
                                <button type="button" class="close modal-close" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true"> <i class="fa fa-times"></i></span>
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="modal-add-cart-product-img">
                                            <img class="img-fluid"
                                                src="assets/images/product/default/home-1/default-1.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="modal-add-cart-info"><i class="fa fa-check-square"></i>Added to cart
                                            successfully!</div>
                                        <div class="modal-add-cart-product-cart-buttons">
                                            <a href="cart.html">Ousmane</a>
                                            <a href="checkout.html">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 modal-border">
                                <ul class="modal-add-cart-product-shipping-info">
                                    <li> <strong><i class="icon-shopping-cart"></i> There Are 5 Items In Your
                                            Cart.</strong></li>
                                    <li> <strong>TOTAL PRICE: </strong> <span>$187.00</span></li>
                                    <li class="modal-continue-button"><a href="#" data-bs-dismiss="modal">CONTINUE
                                            SHOPPING</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Modal Add cart -->

    <!-- Start Modal Quickview cart -->
    <div class="modal fade" id="modalQuickview" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col text-right">
                                <button type="button" class="close modal-close" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true"> <i class="fa fa-times"></i></span>
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-details-gallery-area mb-7">
                                    <!-- Start Large Image -->
                                    <div class="product-large-image modal-product-image-large swiper-container">
                                        <div class="swiper-wrapper">
                                            <div class="product-image-large-image swiper-slide img-responsive">
                                                <img src="assets/images/product/default/home-1/default-1.jpg" alt="">
                                            </div>
                                            <div class="product-image-large-image swiper-slide img-responsive">
                                                <img src="assets/images/product/default/home-1/default-2.jpg" alt="">
                                            </div>
                                            <div class="product-image-large-image swiper-slide img-responsive">
                                                <img src="assets/images/product/default/home-1/default-3.jpg" alt="">
                                            </div>
                                            <div class="product-image-large-image swiper-slide img-responsive">
                                                <img src="assets/images/product/default/home-1/default-4.jpg" alt="">
                                            </div>
                                            <div class="product-image-large-image swiper-slide img-responsive">
                                                <img src="assets/images/product/default/home-1/default-5.jpg" alt="">
                                            </div>
                                            <div class="product-image-large-image swiper-slide img-responsive">
                                                <img src="assets/images/product/default/home-1/default-6.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Large Image -->
                                    <!-- Start Thumbnail Image -->
                                    <div
                                        class="product-image-thumb modal-product-image-thumb swiper-container pos-relative mt-5">
                                        <div class="swiper-wrapper">
                                            <div class="product-image-thumb-single swiper-slide">
                                                <img class="img-fluid"
                                                    src="assets/images/product/default/home-1/default-1.jpg" alt="">
                                            </div>
                                            <div class="product-image-thumb-single swiper-slide">
                                                <img class="img-fluid"
                                                    src="assets/images/product/default/home-1/default-2.jpg" alt="">
                                            </div>
                                            <div class="product-image-thumb-single swiper-slide">
                                                <img class="img-fluid"
                                                    src="assets/images/product/default/home-1/default-3.jpg" alt="">
                                            </div>
                                            <div class="product-image-thumb-single swiper-slide">
                                                <img class="img-fluid"
                                                    src="assets/images/product/default/home-1/default-4.jpg" alt="">
                                            </div>
                                            <div class="product-image-thumb-single swiper-slide">
                                                <img class="img-fluid"
                                                    src="assets/images/product/default/home-1/default-5.jpg" alt="">
                                            </div>
                                            <div class="product-image-thumb-single swiper-slide">
                                                <img class="img-fluid"
                                                    src="assets/images/product/default/home-1/default-6.jpg" alt="">
                                            </div>
                                        </div>
                                        <!-- Add Arrows -->
                                        <div class="gallery-thumb-arrow swiper-button-next"></div>
                                        <div class="gallery-thumb-arrow swiper-button-prev"></div>
                                    </div>
                                    <!-- End Thumbnail Image -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="modal-product-details-content-area">
                                <div class="pp" style="width: 100%;height:40px;display:flex;">
             <div class="rond-img" style="width:40px;height:40px;justify-content:left;background:teal;border-radius: 50px;">
                   <img src="./image/ss.jpg"  style="width:40px;height:40px;border-radius: 50px;">
             </div>
             <p style="color:black;font-size:14px;margin-left:20px ;"><strong>Thmane Mbaye seye diagne</strong><br>
                Mauritanie Nouadhibou
            </p>
            </div>

                                    <!-- Start Product Variable Area -->
                                    <div class="product-details-variable">
                                        <!-- Product Variable Single Item -->
                                        <div class="variable-single-item">
                                     <!-- Start  Product Details Text Area-->
                                     <div class="product-details-text">
                                        <h4 class="title">Nonstick Dishwasher PFOA</h4>
                                        <div class="price"><del>$70.00</del>$80.00</div>
                                    </div> <!-- End  Product Details Text Area-->
                                        </div>
                                        <!-- Product Variable Single Item -->
                                        <div class="d-flex align-items-center flex-wrap">
                                            <div class="variable-single-item ">
                                                <span>Quantity</span>
                                                <div class="product-variable-quantity">
                                                    <input min="1" max="100" value="1" type="number">
                                                </div>
                                            </div>

                                            <div class="product-add-to-cart-btn">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddcart" style="background:red;">Contactez</a>
                                            </div>
                                        </div>
                                    </div> <!-- End Product Variable Area -->
                                    <div class="modal-product-about-text">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste
                                            laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam
                                            in quos qui nemo ipsum numquam, reiciendis maiores quidem aperiam, rerum vel
                                            recusandae</p>
                                    </div>
                                    <!-- Start  Product Details Social Area-->
                                    <div class="modal-product-details-social">
                                        <span class="title">SHARE THIS PRODUCT</span>
                                        <ul>
                                            <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
                                            <li><a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                                            </li>
                                            <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>

                                    </div> <!-- End  Product Details Social Area-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Modal Quickview cart -->
    <button class="material-scrolltop" type="button" style="background-color:rgb(151, 7, 7);"></button>
    <button class="annonce" id=clickss type="button" id="clicks">
      <p style="color: white;text-align:center;display:flex;align-items:center;justify-content:center;">   Publié une annonce <i class="fa fa-bullhorn" aria-hidden="true" style="margin-left:5px;"></i></p>
    </button>
    <!-- ::::::::::::::All JS Files here :::::::::::::: -->
    <!-- Global Vendor, plugins JS -->
    <script src="{{asset('Market-Place/assets/js/vendor/modernizr-3.11.2.min.js')}}"></script>
    <script src="{{asset('Market-Place/assets/js/vendor/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('Market-Place/assets/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
    <script src="{{asset('Market-Place/assets/js/vendor/popper.min.js')}}"></script>
    <script src="{{asset('Market-Place/assets/js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{asset('Market-Place/assets/js/vendor/jquery-ui.min.js')}}"></script>
    <script src="{{asset('Market-Place/assets/js/plugins/material-scrolltop.js')}}"></script>
    <script src="{{asset('Market-Place/assets/js/diplzy_img.js')}}"></script>
    <script src="{{asset('Market-Place/assets/js/diplzy_img2.js')}}"></script>
    <script>
        $(document).ready(function(){
          $('#clicks').click(function(){
            $('.popup_box1').css("display", "block");
          });
          $('.btn111').click(function(){
            $('.popup_box1').css("display", "none");
          });
          $('.btn222').click(function(){
            $('.popup_box1').css("display", "none");
            alert("Account Permanently Deleted.");
          });
        });

      </script>
        <script>
            $(document).ready(function(){
              $('#clickss').click(function(){
                $('.popup_box1').css("display", "block");
              });
              $('.btn111').click(function(){
                $('.popup_box1').css("display", "none");
              });
              $('.btn222').click(function(){
                $('.popup_box1').css("display", "none");
                alert("Account Permanently Deleted.");
              });
            });

          </script>

    <script>
            $(document).ready(function(){
              $('#clickss_c').click(function(){
                $('.popup_box11').css("display", "block");
              });
              $('.btn111').click(function(){
                $('.popup_box11').css("display", "none");
              });
              $('.btn222').click(function(){
                $('.popup_box11').css("display", "none");
                alert("Account Permanently Deleted.");
              });
            });

          </script>

    <!--Plugins JS-->
    <script src="{{asset('Market-Place/assets/js/plugins/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('Market-Place/assets/js/plugins/material-scrolltop.js')}}"></script>

    <script src="{{asset('Market-Place/assets/js/plugins/jquery.zoom.min.js')}}"></script>
    <script src="{{asset('Market-Place/assets/js/plugins/venobox.min.js')}}"></script>
    <script src="{{asset('Market-Place/assets/js/plugins/jquery.waypoints.js')}}"></script>
    <script src="{{asset('Market-Place/assets/js/plugins/jquery.lineProgressbar.js')}}"></script>
    <script src="{{asset('Market-Place/assets/js/plugins/aos.min.js')}}"></script>
    <script src="{{asset('Market-Place/assets/js/plugins/jquery.instagramFeed.js')}}"></script>
    <script src="{{asset('Market-Place/assets/js/plugins/ajax-mail.js')}}"></script>

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <!-- <script src="{{asset('assets/js/vendor/vendor.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/plugins.min.js')}}"></script> -->

    <!-- Main JS -->
    <script src="{{asset('Market-Place/assets/js/main.js')}}"></script>
</body>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>



<style>
                            .image_container{
                              height:100px;
                              width:100px;
                              border-radius:6px;
                              overflow:hidden;
                              margin:10px;
                            }
                            .image_container img{
                              height:100%;
                              width:100%;
                              object-fit:cover;

                            }
                            .image_container span{
                              top:-6px;
                              right:13px;
                              color:red;
                              font-size:28px;
                              font-weight:normal;
                              cursor:pointer;
                            }
                          </style>

<script type="text/javascript">

$(document).ready(function () {
$('#region').change(function(){


    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
       });
    var id = $(this).val();




    $.ajax({
            dataType: "json",
            url: "/getCountry/"+id,
            type: "GET",
            success: function (data) {
                console.log(data);
               $('#country').html(data);

            },
           error: function(error) {
                console.log(error);


           }
        });

//call country on region selected


});



//call city on country selected


});

</script>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>



<style>


    @import url("https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap");

        #il{
        display: flex;
        }

        .popup_box1 h2{
          font-size:30px;
          color:white;

          margin: -10px 0 20px 0;
        }
        .popup_box1 h1{
          font-size: 30px;
          color: #1b2631;
          margin-bottom: 5px;
        }
        .popup_box1 label{
          font-size: 23px;
          color:white;
        }
        .popup_box1 .btns{
          margin: 40px 0 0 0;
        }
        .btns .btn111{
          background:#ff3333;;
          color: white;
          font-size: 14px;
          border-radius: 5px;
          border: 1px solid #808080;
          padding: 5px 8px;
        }
        .btns .btn222{
          margin-left: 20px;
          background: #ff3333;
          border: 1px solid #cc0000;
        }
        .btns .btn111:hover{
          transition: .5s;
          background:black;
        }
        .btns .btn222:hover{
          transition: .5s;
          background: #e60000;
        }
      .cus{
      display:flex ;
       align-items: center;
       width:700px;
       margin-left: 25%;
       margin-top: 5%;

       justify-content: center;;
      }
      .cus img{
      border-radius: 10px;
      }

        @media screen and (max-width:800px){
          .popup_box1{
          width:430px;
          left: 0;

          }
      .popup_box1 i{
      margin-left:-40px;

      }
      #il{
      display:block;
    }
    .dd{
    display: inline-block;
    }
      .btns .btn111{
      margin-left: -40px;
      background-color: #000;
      }
      .cus .custom_cat1{
      margin-left:30px;
      }
           .cus{
              display: none
          ;
          width:300px;
          margin-left:0;
          display: block;

          justify-content: center;

          }
      .custom1{
      margin-top: 10px;
      margin-left: -20px;
      }

        }





    #display-image .fa{
    font-size:90px;

    }
    .rek{
    display: inline-block;
    }
    #display-image{
    width:100px;
    justify-content: center;
    align-items:center;
    text-align:center;
    margin-top: 10px;
    height:100px;

    background-position: center;
    background-size: cover;
    }
    #display-image1{
        width:100px;
        justify-content: center;
        align-items:center;
    text-align:center;
        margin-top: 10px;
        height:100px;

        background-position: center;
        background-size: cover;
        }
    .fs{
    display: flex;
    width:auto;
    }

     input[type="file"]{
    display: none;
    }

    #card-map label{
    color:white;
    height:40px;
    width:200px;
    background-color: #f5af09;

    font-family:"Montserrat",sans-serif;
    font-size: 15px;
    display: flex;
    justify-content: center;
    align-items: center;
    }

    .dd{
    display: flex;
    }







        /*  */




        @media screen and (max-width:800px){

            .wrapper_cus .container1 {
      background-color: #25d366;
      display:block;
      width: 400px;


    }


        }




    .container1 {
      display: flex;
      flex-wrap: wrap;
    }

    #grad1 .option_item {
      display: block;
      position: relative;
      width: 105px;

      height: 105px;
      margin: 20px;

    }

    #grad1 .option_item .checkbox {
      position: absolute;
      top: 0;

      left: 0;
      z-index: 1;
      opacity: 0;
    }

    #grad1 .option_item .option_inner {
      width: 100%;
      height: 100%;
      background: #fff;
      border-radius: 5px;
      text-align: center;

      cursor: pointer;
      color: #585c68;
      display: block;
      border: 1px solid transparent;
      position: relative;
    }

    #display-image2{
        width:100px;
        justify-content: center;
      align-items:center;
    text-align:center;
        margin-top: 10px;
        height:100px;

        background-position: center;
        background-size: cover;
        }

        #display-image3{
        width:100px;
        justify-content: center;
        align-items:center;
    text-align:center;
        margin-top: 10px;
        height:100px;

        background-position: center;
        background-size: cover;
        }
    #grad1 .option_item .option_inner .icon .fab {
      font-size: 32px;
    }

    #grad1  .option_item .option_inner .name {
      user-select: none;
      text-align: center;
      width:100% ;
      align-items: center;
      justify-content: center;
    }
    #grad1 .option_item .option_inner p{
    text-align: center;
    justify-content: center;
    }

    #grad1 .option_item .checkbox:checked ~ .option_inner.facebook {
      border-color:rgb(97, 13, 13);
      color:white;
      background:rgb(97, 13, 13);;
      padding:0px;width:100px;;

    }











    .option_item .option_inner1 .tickmark {
      position: absolute;
      top: -1px;
      left: -1px;
      border: 20px solid;
      border-color: #000 transparent transparent #000;
      display: none;
    }

    #grad1 .option_item .option_inner1 .tickmark:before {
      content: "";
      position: absolute;
      top: -18px;
      left: -18px;
      width: 15px;
      height: 5px;
      border: 3px solid;
      border-color: transparent transparent #fff #fff;
      transform: rotate(-45deg);
    }

    #grad1 .option_item .checkbox:checked ~ .option_inner .tickmark {
      display: block;
    }

    #grad1 .option_item .option_inner.facebook .tickmark {
      border-color:rgb(97, 13, 13) transparent transparent rgb(97, 13, 13);
    }













    .form-card .option_item1 {
      display: block;
      position: relative;
      width: 100px;
      height: 40px;
      border-radius:10px;
    color: #000;

      margin: 10px;
    }

    .form-card  .option_item1 .checkbox1 {
      position: absolute;
      top: 0;
      left: 0;
      z-index: 1;
      border-radius: 3px;
      opacity: 0;
      height:20px ;
    }

    .option_item1 .option_inner1 {
      width: 100%;
      height: 100%;
      background: #fff;
      border-radius:10px;
      text-align: center;

      cursor: pointer;
      color: #585c68;
      display: block;
      border: 5px solid transparent;
      position: relative;
    }
    .option_item1 .option_inner1 .icon {
      margin-bottom: 10px;
    }

    .option_item1 .option_inner1 .name {
      user-select: none;
    }
    .option_item1 .checkbox1:checked ~ .option_inner1.reddit {
    background: orangered;
    color: white;
      height: 40px;
    }
    .checkbox1{
    height:40px ;
    }
    .option_item1  .option_inner1.reddit{
    height: 40px;
    }



      </style>














    <style>




























































        .preview-images-zone {
        width: 100%;
        border: 1px solid #ddd;
        min-height: 180px;
        /* display: flex; */
        padding: 5px 5px 0px 5px;
        position: relative;
        overflow:auto;
    }
    .preview-images-zone > .preview-image:first-child {
        height: 185px;
        width: 185px;
        position: relative;
        margin-right: 5px;
    }
    .preview-images-zone > .preview-image {
        height: 90px;
        width: 90px;
        position: relative;
        margin-right: 5px;
        float: left;
        margin-bottom: 5px;
    }
    .preview-images-zone > .preview-image > .image-zone {
        width: 100%;
        height: 100%;
    }
    .preview-images-zone > .preview-image > .image-zone > img {
        width: 100%;
        height: 100%;
    }
    .preview-images-zone > .preview-image > .tools-edit-image {
        position: absolute;
        z-index: 100;
        color: #fff;
        bottom: 0;
        width: 100%;
        text-align: center;
        margin-bottom: 10px;
        display: none;
    }
    .preview-images-zone > .preview-image > .image-cancel {
        font-size: 18px;
        position: absolute;
        top: 0;
        right: 0;
        font-weight: bold;
        margin-right: 10px;
        cursor: pointer;
        display: none;
        z-index: 100;
    }
    .preview-image:hover > .image-zone {
        cursor: move;
        opacity: .5;
    }
    .preview-image:hover > .tools-edit-image,
    .preview-image:hover > .image-cancel {
        display: block;
    }
    .ui-sortable-helper {
        width: 90px !important;
        height: 90px !important;
    }

    .container {
        padding-top: 50px;
    }










    </style>







































































    <style>
        /*Background color*/
    #grad1 {
        background-color: : #ad0a0a;;
        background-image: linear-gradient(120deg, #ad0a0a, white);
    }

    /*form styles*/
    #msform {
        text-align: center;
        position: relative;
        margin-top: 20px;
    }

    #msform fieldset .form-card {
        background: white;
        border: 0 none;
        border-radius: 0px;
        box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
        padding: 20px 40px 30px 40px;
        box-sizing: border-box;
        width: 94%;
        margin: 0 3% 20px 3%;

        /*stacking fieldsets above each other*/
        position: relative;
    }

    #msform fieldset {
        background: white;
        border: 0 none;
        border-radius: 0.5rem;
        box-sizing: border-box;
        width: 100%;
        margin: 0;
        padding-bottom: 20px;

        /*stacking fieldsets above each other*/
        position: relative;
    }

    /*Hide all except first fieldset*/
    #msform fieldset:not(:first-of-type) {
        display: none;
    }

    #msform fieldset .form-card {
        text-align: left;
        color: #9E9E9E;
    }

    #msform input, #msform textarea {
        padding: 0px 8px 4px 8px;
        border: none;
        border-bottom: 1px solid #ccc;
        border-radius: 0px;
        margin-bottom: 25px;
        margin-top: 2px;
        width: 100%;
        box-sizing: border-box;
        font-family: montserrat;
        color: #2C3E50;
        font-size: 16px;
        letter-spacing: 1px;
    }

    #msform input:focus, #msform textarea:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        border: none;
        font-weight: bold;
        border-bottom: 2px solid #ad0a0a;
        outline-width: 0;
    }

    /*Blue Buttons*/
    #msform .action-button {
        width: 100px;
        background: #ad0a0a;
        font-weight: bold;
        color: white;
        border: 0 none;
        border-radius: 0px;
        cursor: pointer;
        padding: 10px 5px;
        margin: 10px 5px;
    }

    #msform .action-button:hover, #msform .action-button:focus {
        box-shadow: 0 0 0 2px white, 0 0 0 3px #ad0a0a;
    }

    /*Previous Buttons*/
    #msform .action-button-previous {
        width: 100px;
        background: #616161;
        font-weight: bold;
        color: white;
        border: 0 none;
        border-radius: 0px;
        cursor: pointer;
        padding: 10px 5px;
        margin: 10px 5px;
    }

    #msform .action-button-previous:hover, #msform .action-button-previous:focus {
        box-shadow: 0 0 0 2px white, 0 0 0 3px #616161;
    }

    /*Dropdown List Exp Date*/
    select.list-dt {
        border: none;
        outline: 0;
        border-bottom: 1px solid #ccc;
        padding: 2px 5px 3px 5px;
        margin: 2px;
    }

    select.list-dt:focus {
        border-bottom: 2px solid #ad0a0a;
    }

    /*The background card*/
    .card {
        z-index: 0;
        border: none;
        border-radius: 0.5rem;
        position: relative;
    }

    /*FieldSet headings*/
    .fs-title {
        font-size: 25px;
        color: #2C3E50;
        margin-bottom: 10px;
        font-weight: bold;
        text-align: left;
    }

    /*progressbar*/
    #progressbar {
        margin-bottom: 30px;
        overflow: hidden;
        color: lightgrey;
    }

    #progressbar .active {
        color: #000000;
    }

    #progressbar li {
        list-style-type: none;
        font-size: 12px;
        width: 25%;
        float: left;
        position: relative;
    }

    /*Icons in the ProgressBar*/
    #progressbar #account:before {
        font-family: FontAwesome;
        content: "\f023";
    }

    #progressbar #personal:before {
        font-family: FontAwesome;
        content: "\f007";
    }

    #progressbar #payment:before {
        font-family: FontAwesome;
        content: "\f09d";
    }

    #progressbar #confirm:before {
        font-family: FontAwesome;
        content: "\f00c";
    }

    /*ProgressBar before any progress*/
    #progressbar li:before {
        width: 50px;
        height: 50px;
        line-height: 45px;
        display: block;
        font-size: 18px;
        color: #ffffff;
        background: lightgray;
        border-radius: 50%;
        margin: 0 auto 10px auto;
        padding: 2px;
    }

    /*ProgressBar connectors*/
    #progressbar li:after {
        content: '';
        width: 100%;
        height: 2px;
        background: lightgray;
        position: absolute;
        left: 0;
        top: 25px;
        z-index: -1;
    }

    /*Color number of the step and the connector before it*/
    #progressbar li.active:before, #progressbar li.active:after {
        background: #ad0a0a;
    }

    /*Imaged Radio Buttons*/
    .radio-group {
        position: relative;
        margin-bottom: 25px;
    }

    .radio {
        display:inline-block;
        width: 204;
        height: 104;
        border-radius: 0;
        background: lightblue;
        box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
        box-sizing: border-box;
        cursor:pointer;
        margin: 8px 2px;
    }

    .radio:hover {
        box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.3);
    }

    .radio.selected {
        box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1);
    }

    /*Fit image in bootstrap div*/
    .fit-image{
        width: 100%;
        object-fit: cover;
    }
    </style>

<script>
    $(document).ready(function(){

    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;

    $(".next").click(function(){

        current_fs = $(this).parent();
        next_fs = $(this).parent().next();

        //Add Class Active
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function(now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                next_fs.css({'opacity': opacity});
            },
            duration: 600
        });
    });

    $(".previous").click(function(){

        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();

        //Remove class active
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

        //show the previous fieldset
        previous_fs.show();

        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function(now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                previous_fs.css({'opacity': opacity});
            },
            duration: 600
        });
    });

    $('.radio-group .radio').click(function(){
        $(this).parent().find('.radio').removeClass('selected');
        $(this).addClass('selected');
    });

    $(".submit").click(function(){
        return false;
    })

    });
</script>

<script>
    $(document).ready(function() {
    document.getElementById('pro-image').addEventListener('change', readImage, false);

    $( ".preview-images-zone" ).sortable();

    $(document).on('click', '.image-cancel', function() {
        let no = $(this).data('no');
        $(".preview-image.preview-show-"+no).remove();
    });
});



var num = 4;
function readImage() {
    if (window.File && window.FileList && window.FileReader) {
        var files = event.target.files; //FileList object
        var output = $(".preview-images-zone");

        for (let i = 0; i < files.length; i++) {
            var file = files[i];
            if (!file.type.match('image')) continue;

            var picReader = new FileReader();

            picReader.addEventListener('load', function (event) {
                var picFile = event.target;
                var html =  '<div class="preview-image preview-show-' + num + '">' +
                            '<div class="image-cancel" data-no="' + num + '">x</div>' +
                            '<div class="image-zone"><img id="pro-img-' + num + '" src="' + picFile.result + '"></div>' +
                            '<div class="tools-edit-image"><a href="javascript:void(0)" data-no="' + num + '" class="btn btn-light btn-edit-image">edit</a></div>' +
                            '</div>';

                output.append(html);
                num = num + 1;
            });

            picReader.readAsDataURL(file);
        }

    } else {
        console.log('Browser not support');
    }
}


</script>
