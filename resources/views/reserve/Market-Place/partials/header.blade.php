<div class="header-wrapper">
            <!-- Start Header Top -->
            <div class="header-top header-top-bg--white section-fluid">
                <div class="container-fluid">
                    <div class="col-12 d-flex align-items-center justify-content-between">
                        <div class="header-top-left">
                            <div
                                class="header-top-contact header-top-contact-color--black header-top-contact-hover-color--aqua">

                                 <button class="icon-space-right" id="clicks"  style="background:#ad0a0a;"><a href="#" style="color:white;" >Faire une annonce<?php echo "  " ?><i class="fa fa-bullhorn" aria-hidden="true"></i></a></button>



                            </div>
                        </div>
                        <div class="header-top-center" style="margin-left:-165px ;">
                            <!-- Start Header Logo -->
                            <div class="header-logo" style="width:250px;height:40px;">
                                <div class="logo" style="width:100%;height:100%">
                                    <a href="/"><img src="{{asset('Market-Place/image/logozss.png')}}" width="100%" height="100%" alt=""></a>
                                </div>
                            </div>

                        </div>
                        <div class="header-top-right">

                            <ul class="header-action-link action-color--black action-hover-color--aqua">

                                <li>
                                    @if(!Auth::user())
                                    <a href="{{route('app.login')}}">
                                        <i class="fa fa-user-circle" aria-hidden="true"></i>

                                    </a>
                                    @else
                                    <a href="/expad/annonceur">
                                        <i class="fa fa-user-circle" aria-hidden="true"></i>

                                    </a>
                                    @endif
                                </li>
                                <li>
                                    <a href="#search">

                                        <i class="icon-magnifier"></i>

                                    </a>
                                </li>

                                <li>
                                    <a href="#offcanvas-about" class="offacnvas offside-about offcanvas-toggle">
                                        <i class="icon-menu"></i>
                                    </a>
                                </li>
                            </ul>
                            <!-- End Header Action Link -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Header Top -->

            <!-- Start Header bottom -->
            <div class="header-bottom header-bottom-color--black section-fluid" style="background: rgb(138, 8, 8);">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <!-- Start Header Main Menu -->
                            <div class="main-menu main-menu-style-4 menu-color--white menu-hover-color--aqua">
                                <nav style="font-family:Arial;" >
                                    <ul>

                                        <li class="has-dropdown has-megaitem" >
                                            <a href="#">Vihicules & Immobilers <i
                                                    class="fa fa-angle-down"></i></a>
                                            <!-- Mega Menu -->
                                            <div class="mega-menu">
                                                <ul class="mega-menu-inner">
                                                    <!-- Mega Menu Sub Link -->
                                                    <li class="mega-menu-item">
                                                        <a href="{{route('Panel.show_cat',1)}}" class="mega-menu-item-title" style="color:rgb(138, 8, 8);"><strong><i class="fa fa-car" aria-hidden="true"></i> Vihicules</strong></a>
                                                        <ul class="mega-menu-sub">
                                                            <li><a href="{{route('Panel.show_cat',12)}}">Voitures
                                                                    </a></li>
                                                            <li><a href="{{route('Panel.show_cat',13)}}">Moto & Scooters
                                                                    </a></li>
                                                            <li><a href="{{route('Panel.show_cat',14)}}">Location de Vihicules</a></li>
                                                            <li><a href="{{route('Panel.show_cat',15)}}">Camions & Bus
                                                                    </a></li>
                                                            <li><a href="{{route('Panel.show_cat',16)}}">Pièces détaches
                                                                    </a></li>


                                                        </ul>
                                                    </li>
                                                    <!-- Mega Menu Sub Link -->
                                                    <li class="mega-menu-item">
                                                        <a href="#" class="mega-menu-item-title"></a>
                                                        <br>
                                                        <ul class="mega-menu-sub">
                                                            <li><a href="{{route('Panel.show_cat',17)}}">Bateaux</a></li>


                                                        </ul>
                                                    </li>
                                                    <!-- Mega Menu Sub Link -->
                                                    <li class="mega-menu-item">
                                                        <a href="{{route('Panel.show_imm',1)}}" class="mega-menu-item-title" style="color:rgb(138, 8, 8);"><strong><i class="fa fa-building" aria-hidden="true"></i> Immobilers</strong></a>
                                                        <ul class="mega-menu-sub">
                                                            <li><a href="{{route('Panel.show_imm',12)}}">Villas</a></li>
                                                            <li><a href="{{route('Panel.show_imm',13)}}">Terrains</a></li>
                                                            <li><a href="{{route('Panel.show_imm',14)}}">Appartements</a></li>
                                                            <li><a href="{{route('Panel.show_imm',15)}}">Chambres</a>
                                                            </li>
                                                            <li><a href="#">Immeubles</a></li>

                                                        </ul>
                                                    </li>
                                                    <!-- Mega Menu Sub Link -->
                                                    <li class="mega-menu-item">
                                                        <a href="#" class="mega-menu-item-title"></a>
                                                        <br>
                                                        <ul class="mega-menu-sub">



                                                            <li><a href="#">Terrains agricole</a></li>
                                                            <li><a href="{{route('Panel.show_imm',17)}}">Maison</a></li>
                                                            <li><a href="{{route('Panel.show_cat',18)}}">Appartements Meubles</a></li>

                                                        </ul>
                                                    </li>
                                                </ul>

                                            </div>
                                        </li>


                                        <li class="has-dropdown has-megaitem">
                                            <a href="product-details-default.html">Electronique & Electromenager <i
                                                    class="fa fa-angle-down"></i></a>
                                            <!-- Mega Menu -->
                                            <div class="mega-menu">
                                                <ul class="mega-menu-inner">
                                                    <!-- Mega Menu Sub Link -->
                                                    <li class="mega-menu-item">
                                                        <a href="{{route('Panel.show_electro',1)}}" class="mega-menu-item-title" style="color:rgb(138, 8, 8);"><strong><i class="fa fa-laptop" aria-hidden="true"></i> Electronique</strong></a>
                                                        <ul class="mega-menu-sub">
                                                            <li><a href="{{route('Panel.show_electro',12)}}">Téléphones & Tablettes
                                                                    </a></li>
                                                            <li><a href="{{route('Panel.show_electro',13)}}">Ordinateurs
                                                                    </a></li>

                                                            <li><a href="{{route('Panel.show_electro',15)}}">Accessoires Informatique
                                                                    </a></li>
                                                            <li><a href="{{route('Panel.show_electro',16)}}">Jeux video & Console
                                                                    </a></li>
                                                                    <li><a href="{{route('Panel.show_electro',17)}}">Accessoires Téléphones</a></li>

                                                        </ul>
                                                    </li>
                                                    <!-- Mega Menu Sub Link -->
                                                    <li class="mega-menu-item">
                                                        <a href="#" class="mega-menu-item-title"></a>
                                                        <br>
                                                        <ul class="mega-menu-sub">

                                                            <li><a href="#">Tv box & video projecteurs</a></li>
                                                            <li><a href="{{route('Panel.show_electro',18)}}">Appareil photo Et Camera</a></li>
                                                            <li><a href="{{route('Panel.show_electro',19)}}">Montres Connecter & GPS</a></li>
                                                            <li><a href="{{route('Panel.show_electro',20)}}">Imprimantes & Photocopieur</a></li>
                                                            <li><a href="#">Autres electronique</a></li>


                                                        </ul>
                                                    </li>
                                                    <!-- Mega Menu Sub Link -->
                                                    <li class="mega-menu-item">
                                                        <a href="#" class="mega-menu-item-title" style="color:rgb(138, 8, 8);"><strong><i class="fa fa-building-o" aria-hidden="true"></i> Electromenager</strong></a>
                                                        <ul class="mega-menu-sub">
                                                            <li><a href="#">Cuisiniers Gaziniers & Fours</a></li>
                                                            <li><a href="#">Refrigerateurs & Congelateurs</a></li>
                                                            <li><a href="#">Climatisuers & Ventilateurs</a></li>
                                                            <li><a href="#">Machines & laver vaiselle & linges</a>
                                                            </li>
                                                            <li><a href="#">petit electromenager</a></li>

                                                        </ul>
                                                    </li>
                                                    <!-- Mega Menu Sub Link -->
                                                    <li class="mega-menu-item">
                                                        <a href="#" class="mega-menu-item-title"></a>
                                                        <br>
                                                        <ul class="mega-menu-sub">
                                                            <li><a href="#">autres electromenager</a></li>

                                                        </ul>
                                                    </li>
                                                </ul>

                                            </div>
                                        </li>







                                        <li class="has-dropdown has-megaitem">
                                            <a href="product-details-default.html">Services & Emplois<i
                                                    class="fa fa-angle-down"></i></a>
                                            <!-- Mega Menu -->
                                            <div class="mega-menu">
                                                <ul class="mega-menu-inner">
                                                    <!-- Mega Menu Sub Link -->
                                                    <li class="mega-menu-item">
                                                        <a href="#" class="mega-menu-item-title" style="color:rgb(138, 8, 8);"><strong> <i class="fa fa-handshake-o" aria-hidden="true"></i> Services</strong></a>
                                                        <ul class="mega-menu-sub">
                                                            <li><a href="#">Covoiturage
                                                                    </a></li>
                                                            <li><a href="#">Cours particuliers
                                                                    </a></li>
                                                            <li><a href="#">Ménage & Cuisine</a></li>
                                                            <li><a href="#">Courses livraison & déménagement
                                                                    </a></li>


                                                        </ul>
                                                    </li>

                                                    <!-- Mega Menu Sub Link -->
                                                    <li class="mega-menu-item">
                                                        <a href="#" class="mega-menu-item-title" style="color:rgb(138, 8, 8);"><strong> <i class="fa fa-briefcase" aria-hidden="true"></i> Emplois</strong> </a>
                                                        <ul class="mega-menu-sub">
                                                            <li><a href="#">Offres Emploi</a></li>
                                                            <li><a href="#">Demandes emploi</a></li>
                                                            <li><a href="#">Formations</a></li>


                                                        </ul>
                                                    </li>
                                                    <!-- Mega Menu Sub Link -->

                                                </ul>

                                            </div>
                                        </li>

                                    </ul>
                                </nav>
                            </div>
                            <!-- End Header Main Menu Start -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Header Bottom -->

            <!-- Start Sticky Header Seperately -->
            <div class="sticky-header sticky-color--white section-fluid seperate-sticky-bar" >
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 d-flex align-items-center justify-content-between">
                            <!-- Start Header Logo -->
                            <div class="header-logo" style="width: 250px;height: 40px; ;">
                                <div class="logo" style="width: 100%;height:40px;font-size:25px;">
                                    <a href="/"><img src="{{asset('Market-Place/image/logozss.png')}}" style="width:100%;height:100% ;"height="40px" alt=""></a>
                                </div>
                            </div>
                            <!-- End Header Logo -->
                              <style>

                              </style>
                            <!-- Start Header Main Menu -->
                            <div class="main-menu menu-color--black menu-hover-color--aqua">
                                <nav>
                                    <ul >
                                        <li class="has-dropdown has-megaitem">
                                            <a href="product-details-default.html"  ><strong> Vihicules & Immobilliers <i
                                                    class="fa fa-angle-down"></i> </strong></a>
                                            <!-- Mega Menu -->
                                            <div class="mega-menu" >
                                                <ul class="mega-menu-inner">
                                                    <!-- Mega Menu Sub Link -->
                                                    <li class="mega-menu-item">
                                                        <a href="{{route('Panel.show_cat',1)}}"  class="mega-menu-item-title" style="color:rgb(138, 8, 8);"><strong><i class="fa fa-car" aria-hidden="true"></i> Vihicules</strong></a>
                                                        <ul class="mega-menu-sub">
                                                            <li><a href="{{route('Panel.show_imm',12)}}">Voitures
                                                                    </a></li>
                                                            <li><a href="{{route('Panel.show_imm',13)}}">Moto & Scooters
                                                                    </a></li>
                                                            <li><a href="{{route('Panel.show_imm',14)}}">Location de Vihicules</a></li>
                                                            <li><a href="{{route('Panel.show_imm',15)}}">Camions & Bus
                                                                    </a></li>
                                                            <li><a href="{{route('Panel.show_imm',16)}}">Pièces détaches
                                                                    </a></li>


                                                        </ul>
                                                    </li>
                                                    <!-- Mega Menu Sub Link -->
                                                    <li class="mega-menu-item">
                                                        <a href="#" class="mega-menu-item-title"></a>
                                                        <br>
                                                        <ul class="mega-menu-sub">
                                                            <li><a href="{{route('Panel.show_imm',17)}}">Bateaux</a></li>


                                                        </ul>
                                                    </li>
                                                    <!-- Mega Menu Sub Link -->
                                                    <li class="mega-menu-item">
                                                        <a href="{{route('Panel.show_imm',1)}}" class="mega-menu-item-title" style="color:rgb(138, 8, 8);"><strong><i class="fa fa-building" aria-hidden="true"></i> Immobilers</strong></a>
                                                        <ul class="mega-menu-sub">
                                                            <li><a href="{{route('Panel.show_imm',12)}}">Villas</a></li>
                                                            <li><a href="{{route('Panel.show_imm',13)}}">Terrains</a></li>
                                                            <li><a href="{{route('Panel.show_imm',14)}}">Appartements</a></li>
                                                            <li><a href="{{route('Panel.show_imm',15)}}">Chambres</a>
                                                            </li>
                                                            <li><a href="#">Immeubles</a></li>

                                                        </ul>
                                                    </li>
                                                    <!-- Mega Menu Sub Link -->
                                                    <li class="mega-menu-item">
                                                        <a href="#" class="mega-menu-item-title"></a>
                                                        <br>
                                                        <ul class="mega-menu-sub">



                                                            <li><a href="#">Terrains agricole</a></li>
                                                            <li><a href="{{route('Panel.show_imm',17)}}">Maison</a></li>
                                                            <li><a href="{{route('Panel.show_cat',18)}}">Appartements Meubles</a></li>

                                                        </ul>
                                                    </li>
                                                </ul>

                                            </div>
                                        </li>


                                        <li class="has-dropdown has-megaitem">
                                            <a href="product-details-default.html" style="font-size: 13px;"><strong> Electronique & Electromenager <i
                                                    class="fa fa-angle-down"></i></strong></a>
                                            <!-- Mega Menu -->
                                            <div class="mega-menu">
                                                <ul class="mega-menu-inner">
                                                    <!-- Mega Menu Sub Link -->
                                                    <li class="mega-menu-item">
                                                        <a href="{{route('Panel.show_electro',1)}}" class="mega-menu-item-title" style="color:rgb(138, 8, 8);"><i class="fa fa-laptop" aria-hidden="true"></i> Electronique</a>
                                                        <ul class="mega-menu-sub">
                                                            <li><a href="{{route('Panel.show_electro',12)}}">Téléphones & Tablettes
                                                                    </a></li>
                                                            <li><a href="{{route('Panel.show_electro',13)}}">Ordinateurs
                                                                    </a></li>

                                                            <li><a href="{{route('Panel.show_electro',15)}}">Accessoires Informatique
                                                                    </a></li>
                                                            <li><a href="{{route('Panel.show_electro',16)}}">Jeux video & Console
                                                                    </a></li>
                                                                    <li><a href="{{route('Panel.show_electro',17)}}">Accessoires Téléphones</a></li>

                                                        </ul>
                                                    </li>
                                                    <!-- Mega Menu Sub Link -->
                                                    <li class="mega-menu-item">
                                                        <a href="#" class="mega-menu-item-title"></a>
                                                        <br>
                                                        <ul class="mega-menu-sub">

                                                            <li><a href="#">Tv box & video projecteurs</a></li>
                                                            <li><a href="{{route('Panel.show_electro',18)}}">Appareil photo Et Camera</a></li>
                                                            <li><a href="{{route('Panel.show_electro',19)}}">Montres Connecter & GPS</a></li>
                                                            <li><a href="{{route('Panel.show_electro',20)}}">Imprimantes & Photocopieur</a></li>
                                                            <li><a href="#">Autres electronique</a></li>


                                                        </ul>
                                                    </li>
                                                    <!-- Mega Menu Sub Link -->
                                                    <li class="mega-menu-item">
                                                        <a href="#" class="mega-menu-item-title" style="color:rgb(138, 8, 8);"><strong><i class="fa fa-shower" aria-hidden="true"></i> Electromenager</strong></a>
                                                        <ul class="mega-menu-sub">
                                                            <li><a href="#">Cuisiniers Gaziniers & Fours</a></li>
                                                            <li><a href="#">Refrigerateurs & Congelateurs</a></li>
                                                            <li><a href="#">Climatisuers & Ventilateurs</a></li>
                                                            <li><a href="#">Machines & laver vaiselle & linges</a>
                                                            </li>
                                                            <li><a href="#">petit electromenager</a></li>

                                                        </ul>
                                                    </li>
                                                    <!-- Mega Menu Sub Link -->
                                                    <li class="mega-menu-item">
                                                        <a href="#" class="mega-menu-item-title"></a>
                                                        <br>
                                                        <ul class="mega-menu-sub">
                                                            <li><a href="#">autres electromenager</a></li>

                                                        </ul>
                                                    </li>
                                                </ul>

                                            </div>
                                        </li>

                                        <li class="has-dropdown has-megaitem">
                                            <a href="#"  style="font-size: 13px;"><strong> Services & Emplois <i class="fa fa-angle-down"></i></strong></a>
                                            <!-- Mega Menu -->
                                            <div class="mega-menu">
                                                <ul class="mega-menu-inner">
                                                    <!-- Mega Menu Sub Link -->
                                                    <li class="mega-menu-item">
                                                        <a href="#" class="mega-menu-item-title" style="color:rgb(138, 8, 8); "><strong><i class="fa fa-handshake-o" aria-hidden="true"></i> Services</strong></a>
                                                        <ul class="mega-menu-sub">
                                                            <li><a href="#">Covoiturage
                                                                    </a></li>
                                                            <li><a href="#">Cours particuliers
                                                                    </a></li>
                                                            <li><a href="#">Ménage & Cuisine</a></li>
                                                            <li><a href="#">Courses livraison & déménagement
                                                                    </a></li>


                                                        </ul>
                                                    </li>

                                                    <!-- Mega Menu Sub Link -->
                                                    <li class="mega-menu-item">
                                                        <a href="#" class="mega-menu-item-title" style="color:rgb(138, 8, 8); "><strong> <i class="fa fa-briefcase" aria-hidden="true"></i> Emplois</strong></a>
                                                        <ul class="mega-menu-sub">
                                                            <li><a href="#">Offres Emploi</a></li>
                                                            <li><a href="#">Demandes emploi</a></li>
                                                            <li><a href="#">Formations</a></li>


                                                        </ul>
                                                    </li>
                                                    <!-- Mega Menu Sub Link -->

                                                </ul>

                                            </div>
                                        </li>
                                        <style>
                                            .mega-menu-item ul li a:hover{
                                                            color: rgb(138, 8, 8);
                                            }
                                        </style>


                                    </ul>
                                </nav>
                            </div>
                            <!-- End Header Main Menu Start -->

                            <!-- Start Header Action Link -->
                            <ul class="header-action-link action-color--black action-hover-color--aqua">

                                <li>
                                    <a href="./?page=dashbord" >
                                        <i class="fa fa-user-circle" aria-hidden="true"></i>

                                    </a>
                                </li>
                                <li>
                                    <a href="#search">
                                        <i class="icon-magnifier"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#offcanvas-about" class="offacnvas offside-about offcanvas-toggle">
                                        <i class="icon-menu"></i>
                                    </a>
                                </li>
                            </ul>
                            <!-- End Header Action Link -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Sticky Header Seperately -->
        </div>
