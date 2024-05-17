@extends('Market-Place.index')
@section('content')
 <!-- Start Product Details Section -->
 <br>
 <div class="product-details-section mb-9" >
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6">
                    <div class="product-details-gallery-area" data-aos="fade-up" data-aos-delay="0">
                        <!-- Start Large Image -->
                        <div class="product-large-image product-large-image-horaizontal swiper-container">
                            <div class="swiper-wrapper">
                                @foreach($img as $imgs)
                                <div class="product-image-large-image swiper-slide zoom-image-hover img-responsive" >
                                    <img src="@if($imgs->image=='') /image/vide.gif @elseif($imgs->image!=' ')
                /uploads/Annonce/{{$imgs->image}} @endif" alt=""  style="height:400px;">
                                </div>

                               @endforeach
                            </div>
                        </div>
                        <!-- End Large Image -->
                        <!-- Start Thumbnail Image -->
                        <div
                            class="product-image-thumb product-image-thumb-horizontal swiper-container pos-relative mt-5">

                            <div class="swiper-wrapper">
                                @foreach($img as $imgs)
                                <div class="product-image-thumb-single swiper-slide">

                                    <img class="img-fluid" src="
                /uploads/Annonce/{{$imgs->image}} "
                                        alt="" style="height:73px;width:73px;">
                                </div>


                                @endforeach
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
                                                                <h6 class="comment-name">{{ Auth::user()->prenom }}   {{ Auth::user()->name }}</h6>
                                                                <ul class="review-star">
                                                                    <li class="fill">
                                                                    <p>{{ Auth::user()->email }}</p>

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
                                    <a href="#" class="btn btn-block  delete" style="background:red;"
                              ><i class="fa fa-trash" aria-hidden="true"></i>Supprimer</a>
                                </div>
                                <div class="product-add-to-cart-btn">
                                    <a href="{{route('iss.edit',$voirs->id)}}" class="btn btn-block btn-lg"
                                    ><i class="fa fa-edit" aria-hidden="true"></i>  Modifier</a>
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

    <?php
      @include('Front/custom/custom_contact.php');
    ?>

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














  			<!-- [ vertically-modal ] start -->

        <div class="card-body">
						<div id="exampleModalCenter" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">

									<div class="modal-body" style="text-align:center;justify-content:center;">
                  <form method="POST"  id="destroy{{$voirs->id}}" action="{{route('iss.veuille',$voirs->id)}}">
                    @csrf
                    @method('POST')

                  <input type="hidden" name="id_up"  value="">
										<h5 class="mb-0">Voulez-vous supprimer</h5>
									</div>
									<div class="modal-footer" style="text-align:center;justify-content:center;">
										<button type="button"  class="btn  btn-primary " id="modal-close" data-bs-dismiss="modal">Non</button>
										<button type="submit" name="val_del" class="btn  btn-primary">Oui</button>
									</div>
                          </form>
								</div>
							</div>
						</div>

					</div>




          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>



<!-- delete -->
<script>
              $(document).ready(function(){
	$(document).on('click', '.delete', function(){
		var id=$(this).val();


		$('#exampleModalCenter').modal('show');


    $tr= $(this).closest('tr');

    var data= $tr.children("td").map(function() {
       return $(this).text();
    }).get();

    console.log(data);

    $('#id_up').val(data[0]);


	});
});
            </script>

<!-- ----------------------------------- -->








































































































<style>

#content-wrapper{
	display: flex;
	flex-wrap: wrap;
	justify-content: center;
	align-items: center;
}
#haut{
        margin-top:-0%;
    }
.column{
	width: 600px;
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

body .column{
width:100% ;
}
#haut{
    margin-top:0%;
    padding: 10px;
    width: 300px;

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
