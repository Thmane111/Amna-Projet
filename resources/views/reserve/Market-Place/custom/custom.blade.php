<div class="popup_box1  align-items-center">
        <h2 style="margin-top:4%;font-family:Blippo, fantasy;font-size:53px;">Que vendez-vous ?</h2>
        <div class="container">
         <div class="col-12"  id="hover1" style="justify-content: center;align-items:center;background:white;color:black;border-radius:20px;">
            <a href="{{route('iss.form_annonce')}}"><img src="{{asset('Market-Place/image/nn.jpg')}}" width="100%" height="100px;" style="border-radius:20px;">
            <center><p style="font-size:20px;">electromenager,electronique,service,etc..</p></center>
          </a>

         </div>
         <div class="col-12 d-flex"  style="justify-content: center;align-items:center;color:black;border-radius:20px;" >
         <div class="col-6" id="hover2" style="justify-content: center;align-items:center;background:white;color:black;border-radius:20px;">
         <a href="{{route('iss.immo_form')}}"> <img src="{{asset('Market-Place/image/nnn.jpg')}}" width="100%" style="border-radius:20px;" height="100px;">
         <center> <p  style="font-size:20px;">Immobilliers</p>  </center>
        </a>

         </div>
         <div class="col-6"id="hover3" style="margin-left:20px;background:white;color:black;border-radius:20px;">
         <a href="{{route('iss.vih_annonce')}}"> <img src="{{asset('Market-Place/image/nnnn.jpg')}}" style="border-radius:20px;" width="100%;
         " height="100px;">
         <center><p  style="font-size:20px;">Vihicule</p></center>
        </a>

         </div>
         </div>
        </div>
    <br>
        <label >    <center><h2
        style="font-family:Blippo, fantasy;font-size:53px;text-align:center;justify-content:center;"
        >Vous êtes un vendeurs<br>professionnel?</h2></center>

        </label>

        <div class="btns" style="margin-top:-10px;">
          <a href="#" class="btn111">Fermer</a>

        </div>
      </div>

      <style>

          .popup_box1{

background:rgba(136, 0, 0, 0.74);;
text-align: center;
position:fixed;
color: white;
justify-content:center;
display: none;
align-items: center;

border-radius: 5px;




 top: 0;
left: 0;
z-index: 1050;

width: 100%;
height: 100%;
overflow: hidden;
outline: 0;

}
body .popup_box1 .container .col-12 a:hover {
    background:red;
   }
           @media screen and (max-width:800px)  {
  body   .cus{

    }

  body .popup_box1 label {




   }
   body .popup_box1 .custom_cat1 {
    width:300px;
   }
   body .popup_box1 .container .col-12:hover {
    background:red;
   }
   body .popup_box1 .custom_cat1 img{
    width:100%;
   }
   body .popup_box1 label h2{

      font-size:12px;;



   }
    .popup_box1 .ovr_1{
      font-size: 19px;
      color: white;
   margin-left: -35px;
   }
  }
      </style>
