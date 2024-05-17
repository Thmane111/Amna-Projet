@extends('Market-Place.index')
@section('content')
    <!-- ...::::Start Contact Section:::... -->
    <div class="contact-section" style="justify-content: center;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <!-- Start Contact Details -->
                    <div class="contact-details-wrapper section-top-gap-100" data-aos="fade-up" data-aos-delay="0">
                        <div class="contact-details">
                            <!-- Start Contact Details Single Item -->
                            <div class="contact-details-single-item">
                               <h1>
                                4 règles pour Modifier votre annonce
                               </h1>
                            </div> <!-- End Contact Details Single Item -->
                            <!-- Start Contact Details Single Item -->
                            <div class="contact-details-single-item">

                                <div class="contact-details-content contact-phone">
                                    <p><i class="fa fa-circle" aria-hidden="true"></i> N'écrivez pas le prix dans le titre</p>
                                    <p><i class="fa fa-circle" aria-hidden="true"></i> N'indiquez pas vos coordonnées (téléphone, e-mail...) dans la description</p>
                                    <p><i class="fa fa-circle" aria-hidden="true"></i> Ne publiez pas la même annonce plusieurs fois</p>
                                    <p><i class="fa fa-circle" aria-hidden="true"></i> Ne vendez pas d'objets ou de services illégaux</p>
                                </div>
                            </div> <!-- End Contact Details Single Item -->

                        </div>

                    </div> <!-- End Contact Details -->
                </div>
                <div class="col-lg-8" >
                    <div class="contact-form section-top-gap-100" data-aos="fade-up" data-aos-delay="200" style="background:#ad0a0a;color:white;">
                        <h3 style="color:white;">Modifier votre annonce</h3>
                        <div class="col-md-12">
                            @if(session()->has('message'))
                            <div class="alert alert-icon alert-success">
                               {{session('message')}}
                            </div>
                            @endif
                            @if($errors->any())
                             @foreach($errors->All() as $error)
                             <div class="alert alert-icon alert-danger">
                               {{session('errors')}}
                            </div>
                             @endforeach
                             @endif
                          </div>
                        <form   method="POST" action="{{route('iss.update_prod',$modif->id)}}" enctype="multipart/form-data">
                            @csrf
                    @method('PUT')


                                <!-- custom -->


   <br>
   <br>
   <style>
    .container1 .fa{
font-size: 22px;
    }
   </style>



<style>
#disp_in{
display: flex;
}
</style>

                                <!-- end custom -->
                                <div class="col-lg-12">
                              <div class="default-form-box mb-20" >
                              <label for="contact-name">Choisissez un titre court et precis. NE mentionnez pas le prix!</label>
                                        <input name="titre" style="background:white;" value="{{$modif->titre_prod}}" type="text" id="contact-name" placeholder="saissisez le titre">

                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="default-form-box mb-20">
                                    <label for="contact-email">Indiquez le prix exact de l’article. Une annonce sans prix aura moins de vue</label>
                                        <input name="prix" style="background:white;" type="number" value="{{$modif->prix_prod}}" id="contact-email" placeholder="Prix">

                                    </div>
                                </div>

                                <br>


                                <div class="col-lg-12">
                                    <input type="hidden"  style="background:white;" name="v_ville" value="{{$modif->ville}}">
                                    <div class="form-group">
              <label for="pwd">Ville/region</label>
              <select name="ville"  class="form-control" >
                <option>Nouadhibou</option>
                <option>Nouakchott</option>
                <option>Rosso</option>
              </select>
            </div>
                                    </div>


                            <br>
                                <div class="col-lg-14">
                                    <div class="default-form-box mb-20">
                                        <input type="hidden" name="v_detail" value="{{$modif->description}}">
                                    <label for="contact-message">
                                            Donnez une description détaillée de votre article. N’indiquez pas vos coordonnées (e-mail, téléphones, …) dans la description

                                        </label>
                                        <textarea name="message" name="detail" style="background:white;" id="contact-message" cols="20" rows="50" ></textarea>

                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <input type="submit" name="imprime" value="Validate" class="btn btn" style="background:white;color:#ad0a0a;">

                                    </div>




                        </form>
                    </div>
            </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ...::::ENd Contact Section:::... -->



























































































































































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
width:95px;
justify-content: center;
margin-left: 50px;
margin-top: 10px;
height:100px;

background-position: center;
background-size: cover;
}
#display-image1{
	width:95px;
	justify-content: center;
	margin-left: 50px;
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

.container1 .option_item {
  display: block;
  position: relative;
  width: 105px;
  height: 105px;
  margin: 20px;

}

.container1 .option_item .checkbox {
  position: absolute;
  top: 0;
  left: 0;
  z-index: 1;
  opacity: 0;
}

.option_item .option_inner {
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
	width:95px;
	justify-content: center;
	margin-left: 50px;
	margin-top: 10px;
	height:100px;

	background-position: center;
	background-size: cover;
	}

    #display-image3{
	width:95px;
	justify-content: center;
	margin-left: 50px;
	margin-top: 10px;
	height:100px;

	background-position: center;
	background-size: cover;
	}
.option_item .option_inner .icon .fab {
  font-size: 32px;
}

.option_item .option_inner .name {
  user-select: none;
  text-align: center;
  width:100% ;
  align-items: center;
  justify-content: center;
}
.option_item .option_inner p{
text-align: center;
justify-content: center;
}

.option_item .checkbox:checked ~ .option_inner.facebook {
  border-color:rgb(97, 13, 13);
  color:rgb(97, 13, 13);
}











.option_item .option_inner .tickmark {
  position: absolute;
  top: -1px;
  left: -1px;
  border: 20px solid;
  border-color: #000 transparent transparent #000;
  display: none;
}

.option_item .option_inner .tickmark:before {
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

.option_item .checkbox:checked ~ .option_inner .tickmark {
  display: block;
}

.option_item .option_inner.facebook .tickmark {
  border-color:rgb(97, 13, 13) transparent transparent rgb(97, 13, 13);
}













.container1 .option_item1 {
  display: block;
  position: relative;
  width: 100px;
  height: 40px;
  border-radius:10px;
color: #000;

  margin: 10px;
}

.container1 .option_item1 .checkbox1 {
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


@endsection
