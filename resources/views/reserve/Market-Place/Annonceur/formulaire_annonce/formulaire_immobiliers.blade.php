@extends('Market-Place.index')
@section('content')


















































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
       <!-- MultiStep Form -->
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
                                    <div class="order_table table-responsive">
                                    <tbody>
                                        <tr style="border:solid 0px;">


                                            <td style="border:solid 0px;">

                                              <div class="container1">
                                                <div class="row" style="justify-content:center;text-align:center;align-items:center;">
                                    @foreach($cat_imm as $cat_imms)


                                          <label class="option_item" style="width: 100px;">

                                            <input type="radio" style="width: 100px;" name="sous_cat" value="{{$cat_imms->id}}"  class="checkbox" checked>
                                            <div class="option_inner facebook" style="width: 100px;border:solid 1px #A52A2A;">

                                              <div class="icon" style="width:100px;padding-top:10px;">
                                              <i class="{{$cat_imms->icon ? $cat_imms->icon->nom_icon:''}}" style="font-size:25px;" aria-hidden="true"></i>
                                           </div>
                                              <div class="name" style="width:100px;"><p>{{$cat_imms->nom_type}}</p></div>
                                            </div>
                                          </label>

                                    @endforeach
                                                </div>
                                              </div>
                                            </td>
                                        </tr>

                                    </tbody>
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



  @endsection
