<div id="mobile-menu-offcanvas" class="offcanvas offcanvas-rightside offcanvas-mobile-menu-section" style="background: white;">
        <!-- Start Offcanvas Header -->
        <style>
            .offcanvas-mobile-menu-section,
.offcanvas-mobile-about-section {
    background: white !important;
}
.offcanvas-menu li a {
    display: block;
    color: black;
    text-decoration: none;
    text-transform: none;
}
.offcanvas-menu-expand::after {
    content: "";
    position: absolute;
    font-family: "simple-line-icons";
    right: 0;
    transition: all 0.3s ease;
    color: black;
}
.offcanvas-menu li a:hover {
    color: rgb(151, 7, 7);;
}
        </style>
        <div class="offcanvas-header text-right">
            <button class="offcanvas-close"><i class="ion-android-close" style="color: black;"></i></button>
        </div> <!-- End Offcanvas Header -->
        <!-- Start Offcanvas Mobile Menu Wrapper -->
        <div class="offcanvas-mobile-menu-wrapper" style="background: white;">
            <!-- Start Mobile Menu  -->
            <div class="mobile-menu-bottom">
                <!-- Start Mobile Menu Nav -->
                <div class="offcanvas-menu">
                    <ul>


                        <li>
                            <a href="#"><span>Vihicules & Immobilers</span></a>
                            <ul class="mobile-sub-menu">
                                <li>
                                    <a href="#" style="color:rgb(138, 8, 8);"><strong><i class="fa fa-car" aria-hidden="true"></i> Vihicules </strong></a>
                            <ul class="mobile-sub-menu">
                                <li><a href="{{route('Panel.show_cat',12)}}">Voitures</a></li>
                                <li><a href="{{route('Panel.show_cat',13)}}">Moto & Scooters</a></li>
                                <li><a href="{{route('Panel.show_cat',14)}}">Location de Vihicules</a></li>
                                <li><a href="{{route('Panel.show_cat',15)}}">Camions & Bus</a></li>
                                <li><a href="{{route('Panel.show_cat',16)}}">Pièces détaches</a></li>
                                <li><a href="{{route('Panel.show_cat',17)}}">Bateaux</a></li>
                            </ul>
                                </li>

                                <li>
                                    <a href="#" style="color:rgb(138, 8, 8);"><strong><i class="fa fa-building" aria-hidden="true"></i> Immobiliers</strong></a>
                                    <ul class="mobile-sub-menu">
                                        <li><a href="{{route('Panel.show_imm',12)}}">Villas</a></li>
                                        <li><a href="{{route('Panel.show_imm',13)}}">Terrains</a></li>
                                        <li><a href="{{route('Panel.show_imm',17)}}">Maison</a></li>
                                        <li><a href="{{route('Panel.show_imm',14)}}">Appartements</a></li>
                                        <li><a href="{{route('Panel.show_imm',15)}}">Chambres</a>
                                        </li>
                                        <li><a href="#">Immeubles</a></li>
                                        <li><a href="#">Terrains agricole</a></li>
                                                            <li><a href="{{route('Panel.show_imm',18)}}">Appartements Meubles</a></li>
                                    </ul>
                                </li>


                            </ul>
                        </li>


                        <li>
                            <a href="#"><span>Electronique & Electromenager </span></a>
                            <ul class="mobile-sub-menu">
                                <li>
                                    <a href="#" style="color:rgb(138, 8, 8);"><strong><i class="fa fa-laptop" aria-hidden="true"></i> Electronique</strong></a>
                                    <ul class="mobile-sub-menu">

                                        <li><a href="{{route('Panel.show_electro',12)}}">Téléphones & Tablettes
                                        </a></li>
                                <li><a href="{{route('Panel.show_electro',13)}}">Ordinateurs
                                        </a></li>

                                <li><a href="{{route('Panel.show_electro',15)}}">Accessoires Informatique
                                        </a></li>
                                <li><a href="{{route('Panel.show_electro',16)}}">Jeux video & Console
                                        </a></li>
                                        <li><a href="{{route('Panel.show_electro',17)}}">Accessoires Téléphones</a></li>
                                        <li><a href="#">Tv box & video projecteurs</a></li>
                                                            <li><a href="{{route('Panel.show_electro',18)}}">Appareil photo Et Camera</a></li>
                                                            <li><a href="{{route('Panel.show_electro',19)}}">Montres Connecter & GPS</a></li>
                                                            <li><a href="{{route('Panel.show_electro',20)}}">Imprimantes & Photocopieur</a></li>
                                                            <li><a href="#">Autres electronique</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="#" style="color:rgb(138, 8, 8);"><strong><i class="fa fa-building-o" aria-hidden="true"></i> Electromenager</strong></a>
                                    <ul class="mobile-sub-menu">
                                        <li><a href="#">Cuisiniers Gaziniers & Fours</a></li>
                                        <li><a href="#">Refrigerateurs & Congelateurs</a></li>
                                        <li><a href="#">Climatisuers & Ventilateurs</a></li>
                                        <li><a href="#">Machines & laver vaiselle & linges</a>
                                        </li>
                                        <li><a href="#">petit electromenager</a></li>
                                        <li><a href="#">autres electromenager</a></li>
                                    </ul>
                                </li>


                            </ul>
                        </li>



                        <li>
                            <a href="#"><span>Services & Emplois </span></a>
                            <ul class="mobile-sub-menu">
                                <li>
                                    <a href="#" style="color:rgb(138, 8, 8);"><strong><i class="fa fa-handshake-o" aria-hidden="true"></i> Services </strong></a>
                                    <ul class="mobile-sub-menu">

                                        <li><a href="#">Covoiturage
                                        </a></li>
                                <li><a href="#">Cours particuliers
                                        </a></li>
                                <li><a href="#">Ménage & Cuisine</a></li>
                                <li><a href="#">Courses livraison & déménagement
                                        </a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="#" style="color:rgb(138, 8, 8);"><strong><i class="fa fa-briefcase" aria-hidden="true"></i> Emplois</strong></a>
                                    <ul class="mobile-sub-menu">
                                        <li><a href="#">Offres Emploi</a></li>
                                        <li><a href="#">Demandes emploi</a></li>
                                        <li><a href="#">Formations</a></li>
                                    </ul>
                                </li>


                            </ul>
                        </li>


                    </ul>
                </div> <!-- End Mobile Menu Nav -->
            </div> <!-- End Mobile Menu -->

            <!-- Start Mobile contact Info -->

            <!-- End Mobile contact Info -->

        </div> <!-- End Offcanvas Mobile Menu Wrapper -->
    </div> <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->
