@extends('Back.index')
    @section('content')

    <div class="container-fluid site-width">
                <!-- START: Breadcrumbs-->
                <div class="row ">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Form Validation</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item">Form</li>
                                <li class="breadcrumb-item active"><a href="#">Validation</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- END: Breadcrumbs-->

                <!-- START: Card Data-->
                <div class="row">


                    <div class="col-12 mt-3">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Supported elements</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
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
                                            <form class="was-validated" action="{{route('app.storeA')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                            <input type="hidden" name="id" value="1">

                                            <div class="form-group">
                                                    <select class="custom-select" id="select_cat" name="cat" required>
                                                    <option value="">Categorie</option>
                                                        @foreach($cat as $cats)

                                                        <option value="{{$cats->id}}">{{$cats->nom_cat}}</option>

                                                        @endforeach
                                                    </select>
                                                    <div class="invalid-feedback">Example invalid custom select feedback</div>
                                                </div>
                                                <div class="form-group">
                                                    <select class="custom-select" name="sous_cat" id="select_sou_cat" required>


                                                    </select>
                                                    <div class="invalid-feedback">Example invalid custom select feedback</div>
                                                </div>
                                                <div class="form-group">
                                                <input type="text" placeholder="Titre" name="titre" class="form-control" id="customControlValidation1" required >
                                                    <div class="invalid-feedback">Choissisez un titre court et precis. Ne mentionnez pas le prix</div>
                                                </div>
                                                <div class="form-group">
                                                <textarea  class="form-control" name="detail">
                                                </textarea>

                                               </div>
                                               <div class="form-group">
                                                <input type="text" name="prix" placeholder="Prix du produit" class="form-control" id="customControlValidation1" required >
                                                    <div class="invalid-feedback">Indiquez le prix exacte de l'article</div>
                                                </div>
                                                <div class="form-group">
                                                    <select class="custom-select" name="ville" required>
                                                    <option value="">Ville/region</option>
                                                       <option>Nouakchott</option>
                                                       <option>Nouadhibou</option>
                                                       <option>Rosso</option>
                                                    </select>
                                                    <div class="invalid-feedback">Veuillez choisir la ville ou region</div>
                                                </div>

                                              <div class="d-flex">
                                              <input type="radio" style="display: none;"  value="2" name="liv" checked>
                                              <label >Livraison              </label>
                                              <div class="custom-control custom-radio mb-3" style="margin-left:5px;">

                                                    <input type="radio" class="custom-control-input" value="1" name="liv" id="customControlValidation3" required>
                                                    <label class="custom-control-label" for="customControlValidation3">Oui</label>

                                                </div>
                                                <div class="custom-control custom-radio mb-3" style="margin-left:5px;">

                                                    <input type="radio" class="custom-control-input"  value="0" name="liv" id="customControlValidation3" required>
                                                    <label class="custom-control-label" for="customControlValidation3">Non</label>

                                                </div>
                                                <div class="invalid-feedback">Livraison</div>
                                             </div>

                                             <div class="d-flex">
                                              <label >Type d'offre</label>
                                              <div class="custom-control custom-radio mb-3" style="margin-left:5px;">

                                                    <input type="radio" class="custom-control-input" id="customControlValidation4" value="1" name="offre" required>
                                                    <label class="custom-control-label" for="customControlValidation4">location</label>

                                                </div>
                                                <div class="custom-control custom-radio mb-3" style="margin-left:5px;">

                                                    <input type="radio" class="custom-control-input" id="customControlValidation5" value="0" name="offre" required>
                                                    <label class="custom-control-label" for="customControlValidation5">vendre</label>

                                                </div>
                                                <div class="invalid-feedback">Livraison</div>
                                             </div>

                                             <div class="d-flex col-12">

                                              <div class="custom-control  mb-3" style="margin-left:5px;">

                                                    <input type="text" class="form-control" id="customControlValidation3" name="phone" value="00 221 77 587 64 91" required>
                                                    <label>Téléphone</label>

                                                </div>
                                                <div class="custom-control  mb-3" style="margin-left:5px;">

                                                    <input type="text" class="form-control" id="customControlValidation3" name="phone" value="00 221 77 587 64 91" required>
                                                    <label>Whatsapp</label>

                                                </div>

                                             </div>
                                             <div class="col-12 col-md-6 mt-3">
                                <div class="card">
                                <div class="container">


                                                            <fieldset class="form-group">
                                                                <a href="javascript:void(0)" onclick="$('#pro-image').click()" onclick="ee()" class="btn btn-warning">Upload image</a>

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
                                </div>
                            </div>

                                                <div class="form-group">
                                                <input type="submit" value="validé"  class="form-control">

                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- END: Card DATA-->
            </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



<script type="text/javascript">

    $(document).ready(function () {
    $('#select_cat').change(function(){


        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                }
           });
        var id = $(this).val();




        $.ajax({
                dataType: "json",
                url: "/bagwelle/getProduit/"+id,
                type: "GET",
                success: function (data) {
                    console.log(data);
                   $('#select_sou_cat').html(data);

                },
               error: function(error) {
                    console.log(error);


               }
            });








        });



//call city on country selected


});

</script>
































































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

    @endsection
