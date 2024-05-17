@extends('Market-Place.index')
@section('content')


<br>
	    <!-- Start Product Details Section -->
        <div class="product-details-section mb-9" >
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6">
                    <div class="product-details-gallery-area" data-aos="fade-up" data-aos-delay="0">
                        <!-- Start Large Image -->
                        <div class="product-large-image product-large-image-horaizontal swiper-container">
                            <div class="swiper-wrapper">
                                <div class="product-image-large-image swiper-slide zoom-image-hover img-responsive" >
                                    <img src="@if($img->image_1=='') /image/vide.gif @elseif($img->image_1!=' ')
                /uploads/Annonce/{{$img->image_1}} @endif" alt=""  style="height:400px;">
                                </div>
                                <div class="product-image-large-image swiper-slide zoom-image-hover img-responsive" >
                                    <img src="@if($img->image_2=='') /image/vide.gif @elseif($img->image_2!=' ')
                /uploads/Annonce/{{$img->image_2}} @endif" alt=""  style="height:400px;">
                                </div>
                                <div class="product-image-large-image swiper-slide zoom-image-hover img-responsive">
                                    <img src="@if($img->image_3=='') /image/vide.gif @elseif($img->image_3!=' ')
                /uploads/Annonce/{{$img->image_3}} @endif" alt="" style="height:400px;">
                                </div>
                                <div class="product-image-large-image swiper-slide zoom-image-hover img-responsive">
                                    <img src="@if($img->image_4=='') /image/vide.gif @elseif($img->image_4!=' ')
                /uploads/Annonce/{{$img->image_4}} @endif" alt="" style="height:400px;">
                                </div>
                                <div class="product-image-large-image swiper-slide zoom-image-hover img-responsive">
                                    <img src="@if($img->image_2=='') /image/vide.gif @elseif($img->image_2!=' ')
                /uploads/Annonce/{{$img->image_2}} @endif" alt="" style="height:400px;">
                                </div>

                            </div>
                        </div>
                        <!-- End Large Image -->
                        <!-- Start Thumbnail Image -->
                        <div
                            class="product-image-thumb product-image-thumb-horizontal swiper-container pos-relative mt-5">
                            <div class="swiper-wrapper">
                                <div class="product-image-thumb-single swiper-slide">
                                    <img class="img-fluid" src="@if($img->image_1=='') /image/vide.gif @elseif($img->image_1!=' ')
                /uploads/Annonce/{{$img->image_1}} @endif"
                                        alt="" style="height:73px;width:73px;">
                                </div>

                                <div class="product-image-thumb-single swiper-slide">
                                    <img class="img-fluid" src="@if($img->image_2=='') /image/vide.gif @elseif($img->image_2!=' ')
                /uploads/Annonce/{{$img->image_2}} @endif"
                                        alt="" style="height:73px;width:73px;">
                                </div>
                                <div class="product-image-thumb-single swiper-slide">
                                    <img class="img-fluid" src="@if($img->image_3=='') /image/vide.gif @elseif($img->image_3!=' ')
                /uploads/Annonce/{{$img->image_3}} @endif"
                                        alt="" style="height:73px;width:73px;">
                                </div>
                                <div class="product-image-thumb-single swiper-slide">
                                    <img class="img-fluid" src="@if($img->image_4=='') /image/vide.gif @elseif($img->image_4!=' ')
                /uploads/Annonce/{{$img->image_4}} @endif"
                                        alt="" style="height:73px;width:73px;">
                                </div>

                            </div>
                            <!-- Add Arrows -->
                            <div class="gallery-thumb-arrow swiper-button-next"></div>
                            <div class="gallery-thumb-arrow swiper-button-prev"></div>
                        </div>
                        <!-- End Thumbnail Image -->
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6">
                    <div class="product-details-content-area product-details--golden" data-aos="fade-up"
                        data-aos-delay="200">
                        <!-- Start  Product Details Text Area-->
                        <div class="comment-wrapper">
                                                    <div class="comment-img">
                                                        <img src="/photo/profile/{{$voirs->User ? $voirs->User->image:''}}" alt="">
                                                    </div>
                                                    <div class="comment-content">
                                                        <div class="comment-content-top">
                                                            <div class="comment-content-left">
                                                                <h6 class="comment-name">{{ $voirs->User ? $voirs->User->prenom:'' }} {{ $voirs->User ? $voirs->User->name:'' }}</h6>
                                                                <ul class="review-star">
                                                                    <li class="fill">
                                                                    <p>Membre depuis:</p>

                                                                </ul>
                                                            </div>

                                                        </div>


                                                    </div>
                                                </div>
                        <div class="product-details-text">
                            <h4 class="title">{{$voirs->titre_prod}}</h4>


                            <div class="price">Prix : {{$voirs->prix_prod}} MRU</div>
                            <p>{{$voirs->description}}.</p>
                        </div> <!-- End  Product Details Text Area-->
                        <!-- Start Product Variable Area -->
                        <div class="product-details-variable">
                        <div class="product-details-meta mb-20">
                                <a href="wishlist.html" class="icon-space-right"><i class="icon-heart"></i>Add to
                                    Ville publié : Nouadhibou</a>
                                <a href="compare.html" class="icon-space-right"><i class="icon-refresh"></i>Publié depuis: {{$voirs->created_at}}</a>
                            </div> <!-- End  Product Details Meta Area-->

                            <!-- Product Variable Single Item -->
                            <div class="variable-single-item">
                            @if($voirs->livraison==1)
                                <div class="product-stock"> <span class="product-stock-in"><i class="fa fa-motorcycle" aria-hidden="true"></i></i></span> Livraison : Offert</div>
                                            @endif
                                <div class="product-stock"> <span class="product-stock-in"> <i class="fa fa-bookmark" aria-hidden="true"></i> </span> Type d'offre :
                                @if($voirs->type_offre==1)
                               <strong> Vente</strong>
                                @elseif($voirs->type_offre==0)
                                <strong> Vente</strong>
                                 @endif
                            </div>

                            </div>

                            <!-- Product Variable Single Item -->
                            <div class="d-flex align-items-center ">


                                <div class="product-add-to-cart-btn">
                                    <a href="#" class="btn btn-block btn-lg" style="background:red;"
                                    data-bs-toggle="modal"  data-bs-target="#modalAddcart"><img src="{{asset('image/tel.jpg')}}" width="20px;"height="20px;" style="border-radius:20px;">  Téléphone</a>
                                </div>
                                <div class="product-add-to-cart-btn">
                                    <a href="https://web.whatsapp.com/send?phone=+22246463096&text=Test%20Link%20WhatsApp" class="btn btn-block btn-lg"
                                    ><img src="{{asset('image/wt.png')}}" width="25px;"height="25px;">  watasapp</a>
                                </div>
                            </div>
                            <!-- Start  Product Details Meta Area-->

                        </div> <!-- End Product Variable Area -->

                        <!-- Start  Product Details Catagories Area-->
                        <div class="product-details-catagory mb-2">
                            <span class="title">Catégories:</span>
                            <ul>
                                <li><a href="#">{{$voirs->categorie ? $voirs->categorie->nom_cat:''}}</a></li>

                            </ul>
                        </div> <!-- End  Product Details Catagories Area-->
                        <!-- Start  Product Details Social Area-->
                        <div class="product-details-social">
                            <span class="title">Sous catégorie:</span>
                            <ul>
                                <li>{{$voirs->sous__categorie ? $voirs->sous__categorie->nom_type:''}}</li>

                            </ul>
                        </div> <!-- End  Product Details Social Area-->
                    </div>
                </div>

            </div>
        </div>
    </div> <!-- End Product Details Section -->
    <!--                                      -->
        <!-- Start Section Content Text Area -->

        <div class="product-wrapper" data-aos="fade-up" data-aos-delay="0">



            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product-slider-default-1row default-slider-nav-arrow">
                        <div class="row">
            <div class="col-12">

                        <h3 class="section-title" style="width: 200px;background:rgb(151, 7, 7);padding: 5px;color:white ;">Autre annonces</h3>



            </div>
        </div>
                            <!-- Slider main container -->
                            <div class="swiper-container product-default-slider-4grid-1row">

                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    <!-- End Product Default Single Item -->
                                    <!-- Start Product Default Single Item -->
                                    <?php    use App\Models\ImageProduct;?>
                                      @foreach($sous_prd as $sous_prds)
                                    <div class="product-default-single-item product-color--pink swiper-slide"
                                    style="box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 5px 0px, rgba(0, 0, 0, 0.1) 0px 0px 1px 0px;">
                                        <div class="image-box" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 5px 0px, rgba(0, 0, 0, 0.1) 0px 0px 1px 0px;" >
                                        <div class="tag" >
                                                <span style="background:rgb(151, 7, 7);">Nouveau</span>
                                            </div>
                                            <a href="{{route('Panel.detail',$sous_prds->id)}}" class="image-link"
                                                        >
                                                        <?php

                                                        $img=ImageProduct::all()->where('product_id','=',$sous_prds->id);
                                                        ?>

                                                        @foreach($img as $imgs)


                                                <img src="/uploads/Annonce/{{$imgs->image_1}}" alt="" style="width: 100%;height:270px;
                                                box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 5px 0px, rgba(0, 0, 0, 0.1) 0px 0px 1px 0px;
                                                ">
                                                        @endforeach



                                        </div>

                                        <div class="content"  >
                                        <div class="content-left" style="width:100%;">
                                                <h4 class="title" style="margin-left:15px;">
                                                   {{$sous_prds->prix_prod. " MRU"}}
                                                </h4>
                                                        <p  style="font-size:12px;color:black;margin-left:15px;">
                                                           <strong> {{$sous_prds->titre_prod}}</strong>

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







    @include('Front/custom/custom_contact');

	<script type="text/javascript">
		let thumbnails = document.getElementsByClassName('thumbnail')

		let activeImages = document.getElementsByClassName('active')

		for (var i=0; i < thumbnails.length; i++){

			thumbnails[i].addEventListener('mouseover', function(){
				console.log(activeImages)

				if (activeImages.length > 0){
					activeImages[0].classList.remove('active')
				}


				this.classList.add('active')
				document.getElementById('featured').src = this.src
			})
		}


		let buttonRight = document.getElementById('slideRight');
		let buttonLeft = document.getElementById('slideLeft');

		buttonLeft.addEventListener('click', function(){
			document.getElementById('slider').scrollLeft -= 180
		})

		buttonRight.addEventListener('click', function(){
			document.getElementById('slider').scrollLeft += 180
		})


	</script>

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

    .df{
    display: flex;


    }
    .dff{
    display: flex;
    justify-content: center;
    margin-top: 30px;;
    }
    #haut{
        margin-top:-0%;
    }
    #haut1{


    }
</style>
<style>

#content-wrapper{
	display: flex;
	flex-wrap: wrap;
	justify-content: center;
	align-items: center;
}
#lag{
width: 450px;
}

.column{
	width: 500px;
	padding: 10px;


}
.btn33
{
    font-size: 18px;
    padding: 7px;
    border: solid 2px #ad0a0a;
}

#featured{
	max-width: 500px;
	max-height: 600px;
	object-fit: cover;
	cursor: pointer;
	border: 2px solid #ad0a0a;
    border-radius: 20px;

}

.thumbnail{
	object-fit: cover;
	max-width: 180px;
	max-height: 100px;
	cursor: pointer;
	opacity: 0.5;
	margin: 5px;
	border: 2px solid black;

}

.thumbnail:hover{
	opacity:1;
}

.active{
	opacity: 1;
}

#slide-wrapper{
	max-width: 500px;
	display: flex;
	min-height: 100px;
	align-items: center;
}

#slider{
	width: 440px;
	display: flex;
	flex-wrap: nowrap;
	overflow-x: auto;

}

#slider::-webkit-scrollbar {
		width: 8px;

}

#slider::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);

}

#slider::-webkit-scrollbar-thumb {
  background-color:#ad0a0a;
  outline: 1px solid slategrey;
   border-radius: 100px;

}

#slider::-webkit-scrollbar-thumb:hover{
    background-color:#ad0a0a;
}

.arrow{
	width: 30px;
	height: 30px;
	cursor: pointer;
	transition: .3s;
}

.arrow:hover{
	opacity: .5;
	width: 35px;
	height: 35px;
}
@media screen and (max-width:800px){
body #featured{
width:100% ;
}
#haut{
    margin-top:0%;
    padding: 10px;
    width: 300px;

}

.column{
	width:100%;
	padding: 10px;


}
#haut1{
    margin-left:20%;
}

#lag{
width: 350px;
}

}

</style>


















<style>
                                .rows{
                                display:flex;
                                 ;align-items:center;
                                 ;flex-wrap: wrap;
                                 justify-content: space-around
                                 ;
                                }
                                .row1{
                                  max-width: 1000px;
                                  margin: auto;
                                  padding-right:25px ;
                                  padding-left:25px ;
                                }
                                .single-product{
                                margin-top: 80px;
                                }
                                .small-img-row{
                                    display: flex;
                                    justify-content: space-around;
                                }

                                .rows img{
                                max-width:100%;
                                ;padding:10px 0 ;
                                }

                                .small-img-col{
                                flex-basis: 24%;
                                cursor: pointer;
                                }
                                .row1 .col-2 img{
                                    max-width: 100%;
                                    padding: 50px 0;
                                    margin: 25px 0;
                                }.single-product .col-2 img{
padding: 0;
}
.single-product .col-2{
padding: 20px;
  }
  .df p a{
                                            background:red;
                                            font-size:17px;
                                            color: white;
                                            padding-top:4px;
                                            padding-left:10px;
                                            padding-right:10px;
                                            padding-bottom:4px;
                                        }
                                        .dff{
                                        display:flex ;
                                        }
                            </style>


@endsection
