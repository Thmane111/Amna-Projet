<script src="{{asset('Market-Place/assets/js/vendor/modernizr-3.11.2.min.js')}}"></script>
    <script src="{{asset('Market-Place/assets/js/vendor/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('Market-Place/assets/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
    <script src="{{asset('Market-Place/assets/js/vendor/popper.min.js')}}"></script>
    <script src="{{asset('Market-Place/assets/js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{asset('Market-Place/assets/js/vendor/jquery-ui.min.js')}}"></script>
    <script src="{{asset('Market-Place/assets/js/diplzy_img.js')}}"></script>
    <script src="{{asset('Market-Place/assets/js/diplzy_img2.js')}}"></script>
    <script>
        $(document).ready(function(){
          $('#clicks').click(function(){
            $('.popup_box1').css("display", "block");
          });
          $('.btn111').click(function(){
            $('.popup_box1').css("display", "none");
          });
          $('.btn222').click(function(){
            $('.popup_box1').css("display", "none");
            alert("Account Permanently Deleted.");
          });
        });

      </script>
    <!--Plugins JS-->
    <script>
        $(document).ready(function(){
          $('#clickss').click(function(){
            $('.popup_box1').css("display", "block");
          });
          $('.btn111').click(function(){
            $('.popup_box1').css("display", "none");
          });
          $('.btn222').click(function(){
            $('.popup_box1').css("display", "none");
            alert("Account Permanently Deleted.");
          });
        });

      </script>

<script>
        $(document).ready(function(){
          $('#clickss_c').click(function(){
            $('.popup_box11').css("display", "block");
          });
          $('.btn111').click(function(){
            $('.popup_box11').css("display", "none");
          });
          $('.btn222').click(function(){
            $('.popup_box11').css("display", "none");
            alert("Account Permanently Deleted.");
          });
        });

      </script>

    <script src="{{asset('Market-Place/assets/js/plugins/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('Market-Place/assets/js/plugins/material-scrolltop.js')}}"></script>
    <script src="{{asset('Market-Place/assets/js/plugins/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('Market-Place/assets/js/plugins/jquery.zoom.min.js')}}"></script>
    <script src="{{asset('Market-Place/assets/js/plugins/venobox.min.js')}}"></script>
    <script src="{{asset('Market-Place/assets/js/plugins/jquery.waypoints.js')}}"></script>
    <script src="{{asset('Market-Place/assets/js/plugins/jquery.lineProgressbar.js')}}"></script>
    <script src="{{asset('Market-Place/assets/js/plugins/aos.min.js')}}"></script>
    <script src="{{asset('Market-Place/assets/js/plugins/jquery.instagramFeed.js')}}"></script>
    <script src="{{asset('Market-Place/assets/js/plugins/ajax-mail.js')}}"></script>

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <!-- <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script> -->

    <!-- Main JS -->
    <script src="{{asset('Market-Place/assets/js/main.js')}}"></script>
    <script src="{{asset('Market-Place/assets/js/product-details.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@if(session()->has('message'))
        <script>
          toastr.success("{{Session::get('message')}}");
        </script>
        @endif



        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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








