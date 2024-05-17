<?php
  if(isset($_GET['filtre'])){
    $filtre=$_GET['filtre'];

    switch($filtre){
        case 'cat_globale3': $req_filtre="SELECT * FROM produit where categorie=3 and etat='1'"; break;
        case 'cat_1': $req_filtre="SELECT * FROM produit where sous_cat='Téléphones' and etat='1'"; break;
        case 'cat_2': $req_filtre="SELECT * FROM produit where sous_cat='Ordinateurs'  and etat='1'"; break;
        case 'cat_3': $req_filtre="SELECT * FROM produit where sous_cat='Accessoires informatiques' and etat='1'"; break;
        case 'cat_4': $req_filtre="SELECT * FROM produit where sous_cat='Accessoires téléphone' and etat='1'"; break;
        case 'cat_5': $req_filtre="SELECT * FROM produit where sous_cat='tv' and etat='1'"; break;

    }
  }

?>
  
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
                                <form method="POST">
                                <ul>
                                <h6 class="sidebar-title">CATEGORIES</h6>
                              
                                        <li>
                                            <label class="checkbox-default" for="brakeParts">
                                                <input type="checkbox" id="brakeParts" name="gorie_1" value="Téléphones">
                                                <span>Téléphone(6)</span>
                                            </label>
                                        </li>
                                     
                                        <li>
                                            <label class="checkbox-default" for="accessories">
                                                <input type="checkbox" id="accessories" name="gorie_2"  value="Ordinateurs">
                                                <span>Ordinateurs(10)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="EngineParts">
                                                <input type="checkbox" id="EngineParts" name="gorie_3"  value="Accessoires informatiques">
                                                <span>Accessoires informatiques (4)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="hermes">
                                                <input type="checkbox" id="hermes" name="gorie_4" value="Accessoires téléphone">
                                                <span>Accessoires Téléphones (10)</span>
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
                                                <input type="submit" id="hermes" class="btn " style="background:rgb(151, 7, 7);color:white;"  name="valider_filtre">
                                              
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
                   

                    <!-- Start Tab Wrapper -->
                    <div class="sort-product-tab-wrapper">
                        <div class="container">
                            <div class="row">
                            <style>
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
                                <div class="col-12">

                             
                                    <div class="tab-content tab-animate-zoom">
                                        <!-- Start Grid View Product -->
                                        <div class="tab-pane active show sort-layout-single" id="layout-3-grid">
                                            <div class="row">
                                                <?php 

                                                if(isset($_POST['valider_filtre'])){
                                                    if(!isset($_POST['gorie_1']) ){
                                                        $gorie_1=0;
                                                    }else if(isset($_POST['gorie_1']) && $_POST['gorie_1']!=""){
                                                        $gorie_1=$_POST['gorie_1'];
                                                    }

                                                    if(!isset($_POST['gorie_2'])){
                                                        $gorie_2=0;
                                                    }else if(isset($_POST['gorie_2']) && $_POST['gorie_2']!=""){
                                                        $gorie_2=$_POST['gorie_2'];
                                                    }

                                                    if(!isset($_POST['gorie_3'])){
                                                        $gorie_3=0;
                                                    }else if(isset($_POST['gorie_3']) && $_POST['gorie_3']!=""){
                                                        $gorie_3=$_POST['gorie_3'];
                                                    }

                                                    if(!isset($_POST['gorie_4'])){
                                                        $gorie_4=0;
                                                    }else if(isset($_POST['gorie_4']) && $_POST['gorie_4']!=""){
                                                        $gorie_4=$_POST['gorie_4'];
                                                    }

                                                  

                                                    if(!isset($_POST['ville_gorie_1'])){
                                                       $ville_gorie_1="";
                                                    }else if(isset($_POST['ville_gorie_1']) && $_POST['ville_gorie_1']!=""){
                                                        $ville_gorie_1=$_POST['ville_gorie_1'];
                                                    }

                                                    if(!isset($_POST['ville_gorie_2'])){
                                                        $ville_gorie_2="";
                                                     }else if(isset($_POST['ville_gorie_2']) && $_POST['ville_gorie_2']!=""){
                                                         $ville_gorie_2=$_POST['ville_gorie_2'];
                                                     }

                                                     if(!isset($_POST['ville_gorie_3'])){
                                                        $ville_gorie_3="";
                                                     }else if(isset($_POST['ville_gorie_3']) && $_POST['ville_gorie_3']!=""){
                                                         $ville_gorie_3=$_POST['ville_gorie_3'];
                                                     }
                                                     
                                                   
                                                 
                                               
                                                   
                                                

                                                 $req_search="SELECT * FROM produit where sous_cat='".$gorie_1."' and  ville IN ('".$ville_gorie_1."','".$ville_gorie_2."','".$ville_gorie_3."')
                                                  OR sous_cat='".$gorie_2."' and  ville IN ('".$ville_gorie_1."','".$ville_gorie_2."','".$ville_gorie_3."') 
                                                  OR sous_cat='".$gorie_3."' and  ville IN ('".$ville_gorie_1."','".$ville_gorie_2."','".$ville_gorie_3."')
                                                  OR sous_cat='".$gorie_4."' and  ville IN ('".$ville_gorie_1."','".$ville_gorie_2."','".$ville_gorie_3."')
                                                 "; 


                                      
                                               
                                                }
                                                if(isset($_POST['valider_filtre'])){
                                                    $exe_filtre=$bdd->query($req_search);
                                                }else{
                                                    $exe_filtre=$bdd->query($req_filtre);

                                                }
                                             
                                                  $row_filtre=$exe_filtre->rowcount();
                                                  if($row_filtre!=0){
                                                    while($line_filtre=$exe_filtre->fetch(PDO::FETCH_ASSOC)){

                                                    
                                                  
                                                ?>
                                                <div class="col-xl-4 col-sm-6 col-12">
                                                    <!-- Start Product Default Single Item -->
                                                    <div class="product-default-single-item product-color--pink swiper-slide" 
                                    style="border:solid 1px rgb(151, 7, 7);
                                               box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 5px 0px, rgba(0, 0, 0, 0.1) 0px 0px 1px 0px;
                                    ">
                                        <div class="image-box" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 5px 0px, rgba(0, 0, 0, 0.1) 0px 0px 1px 0px;" >
                                        
                                            <a href="./?page=cus_c&id_pp=<?php echo $line_filtre['id'] ?>" class="image-link" 
                                                        >
                                                <img src="./compte/dist/annonce/<?php echo $line_filtre['image_1'] ?>" alt="" style="width: 100%;height:270px;
                                                           box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 5px 0px, rgba(0, 0, 0, 0.1) 0px 0px 1px 0px;
                                                ">
                                            
                                            </a>
                                           
                                  
                                        </div>
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
                                        <div class="content"  >
                                        <div class="content-left" style="width:100%;text-align:left;" >
                                                <h4 class="title" ><a href="product-details-default.html" style="margin-left: 10px;">
                                                        <?php echo $line_filtre['prix_prod']." MRU";?></a></h4>
                                                        <p  style="font-size:14px;height:40px;width:100%;color:white;display:flex;"><a href="product-details-default.html"style="margin-left: 10px;">
                                                        <?php echo $line_filtre['titre_prod'];?> </a></p>
                                                <ul class="review-star" style="background:rgb(151, 7, 7);text-align:center;display:flex;align-items:center;
                                                 justify-content:center;
                                                ">
                                                    <li class="fill"><h5
                                                     style="color: white;"
                                                    >Contacter</h5></li>
                                                   
                                                </ul>
                                            </div>
                                            
                                                
                                           
                                            
                                            
                                           

                                        </div>
                                    </div>
                                                    <!-- End Product Default Single Item -->
                                                </div>
                                                <?php }}?>
           
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
   