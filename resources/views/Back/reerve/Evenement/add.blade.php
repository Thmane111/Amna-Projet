
@extends('Espace-Admin.index')


@section('content')



<div class="container-fluid">
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">Liste des groupes</a></li>
        </ol>
    </div>
<form action="{{route('event.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row" style="background: #0e1d34;">

        <div class="col-xl-6" style="background: #0e1d34;">
            <!-- HTML5 Inputs -->
            <div class="card mb-4" style="box-shadow: none;background: #0e1d34;color:white;border:solid  0px;">
              <h5 class="card-header">Gestion des évenements</h5>
              <div class="card-body">
                <div class="mb-3 row">
                  <label for="html5-text-input" class="col-md-2 col-form-label">Nom event</label>
                  <div class="col-md-10">
                    <input class="form-control" type="text" name="nom_event" id="html5-text-input" />
                  </div>
                </div>
                <div class="mb-3 row">
                    <label for="html5-text-input" class="col-md-2 col-form-label">Lieu event</label>
                    <div class="col-md-10">
                      <input class="form-control" type="text" name="lieu_event" id="html5-text-input" />
                    </div>
                  </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-message">Detail event</label>
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-message2" class="input-group-text"
                        ><i class="bx bx-comment"></i
                      ></span>
                      <textarea
                        id="basic-icon-default-message"
                        name="detail_event"
                        class="form-control"
                        placeholder="Hi, Do you have a moment to talk Joe?"
                        aria-label="Hi, Do you have a moment to talk Joe?"
                        aria-describedby="basic-icon-default-message2"></textarea>
                    </div>
                  </div>


                <div class="mb-3 row">
                  <label for="html5-date-input" class="col-md-2 col-form-label">Date</label>
                  <div class="col-md-10">
                    <input class="form-control" type="date" name="date_event" placeholder="date de l'evenement" id="html5-date-input" />
                  </div>
                </div>

                <div class="mb-3 row">
                  <label for="html5-time-input" class="col-md-2 col-form-label">Time</label>
                  <div class="col-md-10">
                    <input class="form-control" type="time" name="time_event" id="html5-time-input" />
                  </div>
                </div>
                <div class="mb-3">
                    <label for="defaultSelect" class="form-label">Default select</label>
                    <select id="defaultSelect" class="form-select">
                      <option>Default select</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
                <div class="mb-3 row">
                    <label for="html5-time-input" class="col-md-2 col-form-label">Nombre ticket</label>
                    <div class="col-md-10">
                      <input class="form-control" type="number" name="nombre_event"  id="html5-time-input" />
                    </div>
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-email">Email</label>
                    <div class="input-group input-group-merge">
                      <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                      <input
                        type="email"
                        name="email"
                        id="parent_p"
                        class="form-control"
                        placeholder="john.doe"
                        aria-label="john.doe"
                        aria-describedby="basic-icon-default-email2" />
                      <span id="basic-icon-default-email2" class="input-group-text">@example.com</span>
                    </div>
                    <div class="form-text">You can use letters, numbers & periods</div>
                  </div>


                  <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-email">Adresse</label>
                    <div class="input-group input-group-merge">
                      <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                      <input
                        type="text"
                        name="adresse"
                       id="adresse"
                        class="form-control"
                        placeholder="john.doe"
                        aria-label="john.doe"
                        />

                    </div>

                  </div>
              </div>
            </div>

            <!-- File input -->

          </div>
        <div class="col-xl">
          <div class="card mb-4" style="box-shadow: none;background: #0e1d34;color:white;border:solid 0px;">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h5 class="mb-0">Session des tickets</h5>

            </div>
            <div class="card-body">

                <div class="mb-3">

                  <div class="c2" style="align-items: center;justify-content:center;border-radius:40px;width:150px;">
                    <input type="file" id="image-input" name="image"  accept="image/png, image/jpg">
                    <label for="image-input" class="btn btn-primary">
                      <i class="fas fa-picture-o" aria-hidden="true" style="color: red;"></i>
                      telecharge l'image
                       </i>&nbsp;
                    </label>
                    <div id="display-image" style="align-items: center;justify-content:center;text-align:center;border:solid 1px black;width:400px;height:200px">
                      <img src="" width="100%" height="100%">
                    </div>
                </div>
                </div>

                <div class="card mb-4">
                    <h5 class="card-header">Type Ticket</h5>
                    <div class="card-body">
                        @foreach($type_T as $type_Ts)
                      <div class="form-check form-switch mb-2">
                        <input class="form-check-input" value="{{$type_Ts->id}}" name="{{'NameOS'.$type_Ts->id}}" type="checkbox" id={{'checkOS'.$type_Ts->id}}  />
                        <label class="form-check-label" for="flexSwitchCheckDefault" style="color: black;"
                          >{{'Ticket '.$type_Ts->nom}}</label
                        >
                      </div>
                      @endforeach



                    </div>*
                  </div>
                  @foreach($type_T as $type_Ts)
                  <div class="mb-3" id="{{'divCheck'.$type_Ts->id}}">
                    {{-- <div class="col-md">
                        <small class="text-light fw-medium d-block">Ticket VIP</small>
                        <div class="form-check form-check-inline mt-3">
                          <input class="form-check-input" type="number"  name="ticket_vip" style="width: 100px;" />
                          <label class="form-check-label" for="inlineCheckbox1"  style="margin-left: 5px;">nombre</label>
                        </div>
                        <div class="form-check form-check-inline" >
                          <input class="form-check-input" type="text" name="prix_vip" style="width: 100px;"  />
                          <label class="form-check-label" for="inlineCheckbox2" style="margin-left: 5px;">Prix</label>
                        </div>

                      </div> --}}
                </div>
                @endforeach
                {{-- <div class="mb-3">
                    <div class="col-md">
                        <small class="text-light fw-medium d-block">Ticket Simple</small>
                        <div class="form-check form-check-inline mt-3">
                          <input class="form-check-input" type="number" name="ticket_simple" style="width: 100px;" />
                          <label class="form-check-label" for="inlineCheckbox1" style="margin-left: 5px;">nombre</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="text" name="prix_simple" style="width: 100px;"  />
                          <label class="form-check-label" for="inlineCheckbox2"  style="margin-left: 5px;">Prix</label>
                        </div>

                      </div>
                </div> --}}
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-email">Nom complet</label>
                    <div class="input-group input-group-merge">
                      <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                      <input
                        type="text"
                        name="nom_complet"
                        id="prenom"
                        class="form-control"
                        placeholder="john.doe"
                        aria-label="john.doe"
                        aria-describedby="basic-icon-default-email2" />

                    </div>
                    <div class="form-text">You can use letters, numbers & periods</div>
                  </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-icon-default-phone">Phone No</label>
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-phone2" class="input-group-text"
                      ><i class="bx bx-phone"></i
                    ></span>
                    <input
                      type="text"
                      name="phone"
                      id="tel"
                      class="form-control phone-mask"
                      placeholder="658 799 8941"
                      aria-label="658 799 8941"
                      aria-describedby="basic-icon-default-phone2" />
                  </div>
                </div>
                <div class="mb-3" style="align-items: center;justify-content:center;text-align:center;">

                    <div class="c2" style="align-items: center;justify-content:center;border-radius:40px;width:150px;">


                      <div id="display-image" style="align-items: center;justify-content:center;text-align:center;border:solid 1px black;width:400px;height:200px">
                        <img src="{{asset('Affiche_Event/ss.jpg')}}" width="100%" height="100%">
                      </div>
                  </div>
                  </div>


            </div>
          </div>
        </div>

      </div>
      <div class="report-btn">
        <button  type="submit"  class="btn" name="envoyer">
        <img src="{{asset('Back/assets/img/icons/invoices-icon5.png')}}" alt="" class="me-2"> Enregister l'élève
                      </button>
        </div>
    </form>
</div>




<script src="{{asset('Back/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('Back/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('Back/assets/js/moment.js')}}"></script>


<link rel="stylesheet" href="assets/css/plugins/jquery.lineProgressbar.css">
                                <script>
                                  const image_input = document.querySelector("#image-input");

image_input.addEventListener("change", function() {
  const reader = new FileReader();
  reader.addEventListener("load", () => {
    const uploaded_image = reader.result;
    document.querySelector("#display-image").style.backgroundImage = `url(${uploaded_image})`;
    document.querySelector("#display-image img").style.display = `none`;

  });
  reader.readAsDataURL(this.files[0]);
});
</script>






<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



<script type="text/javascript">

    $(document).ready(function () {
    $('#parent_p').change(function(){


        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                }
           });
        var id = $(this).val();




        $.ajax({
                dataType: "json",
                url: "/admin/getPrenom/"+id,
                type: "GET",
                success: function (data) {
                    console.log(data);
                   $('#prenom').val(data);

                },
               error: function(error) {
                    console.log(error);


               }
            });

            $.ajax({
                dataType: "json",
                url: "/admin/getNom/"+id,
                type: "GET",
                success: function (data) {
                    console.log(data);
                   $('#nom').val(data);

                },
               error: function(error) {
                    console.log(error);


               }
            });


            $.ajax({
                dataType: "json",
                url: "/admin/getTel/"+id,
                type: "GET",
                success: function (data) {
                    console.log(data);
                   $('#tel').val(data);

                },
               error: function(error) {
                    console.log(error);


               }
            });

            $.ajax({
                dataType: "json",
                url: "/admin/getAdresse/"+id,
                type: "GET",
                success: function (data) {
                    console.log(data);
                   $('#adresse').val(data);

                },
               error: function(error) {
                    console.log(error);


               }
            });



            $.ajax({
                dataType: "json",
                url: "/admin/getFonction/"+id,
                type: "GET",
                success: function (data) {
                    console.log(data);
                   $('#fonction').val(data);

                },
               error: function(error) {
                    console.log(error);


               }
            });


        });



//call city on country selected


});

</script>















<script>
    var checkbox=document.getElementById('checkOS1');
    var value= 0;
    checkbox.addEventListener('input',
      function(){
           if(checkbox.checked){
            value=1
           }else{
            value=0;
           }

        $(document).ready(function () {
    $('#checkOS1').change(function(){


        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                }
           });
        var id1 = value;
        var id2=$(this).val();


        console.log(id1,id2);



        $.ajax({
                dataType: "json",
                url: "/admin/getChamp1/"+id1+'/'+id2,
                type: "GET",
                success: function (data) {
                    console.log(data);
                   $('#divCheck1').html(data);


                },
               error: function(error) {
                    console.log(error);


               }
            });



        });






});

      }
    )
</script>





<script>
    var checkbox1=document.getElementById('checkOS2');
    var value1= 0;
    checkbox1.addEventListener('input',
      function(){
           if(checkbox1.checked){
            value1=1
           }else{
            value1=0;
           }

        $(document).ready(function () {
    $('#checkOS2').change(function(){


        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                }
           });
        var id1 = value1;
        var id2=$(this).val();


        console.log(id1,id2);



        $.ajax({
                dataType: "json",
                url: "/admin/getChamp2/"+id1+'/'+id2,
                type: "GET",
                success: function (data) {
                    console.log(data);
                   $('#divCheck2').html(data);


                },
               error: function(error) {
                    console.log(error);


               }
            });



        });






});

      }
    )
</script>





<script type="text/javascript">



</script>














































































<style
yle>



    #display-image .fa{
    font-size:90px;
    background: red;

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
    box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 5px 0px, rgba(0, 0, 0, 0.1) 0px 0px 1px 0px;

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

    .c2 label{
    color:white;
    height:40px;
    width:150px;
    background-color: rgb(79, 79, 136);

    font-family:"Montserrat",sans-serif;
    font-size: 15px;
    display: flex;
    justify-content: center;
    align-items: center;
    }

    .dd{
    display: flex;
    }



                   </style>

@endsection
