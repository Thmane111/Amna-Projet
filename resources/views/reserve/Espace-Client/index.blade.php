<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('Espace-user/assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('Espace-user/assets/img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Get Shit Done Bootstrap Wizard by Creative Tim</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />



    <!-- CSS Files -->

    <link href="{{asset('Espace-user/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('Espace-user/assets/css/gsdk-bootstrap-wizard.css')}}" rel="stylesheet" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{asset('Espace-user/assets/css/demo.css')}}" rel="stylesheet" />

    <link rel="stylesheet" href="css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="{{asset('Espace-user/assets/css/my-task.style.min.css')}}"> --}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/schmich/instascan-builds@master/instascan.min.js
    "></script>

</head>

<body>
<div class="image-container set-full-height" style="background-image: url('{{asset('Espace-user/assets/img/wizard.jpg')}}');background:#0e1d34;">
    <!--   Creative Tim Branding   -->
    <a href="http://creative-tim.com">
         <div class="logo-container">
            <div class="logo">
                <img src="{{asset('Espace-user/assets/img/new_logo.png')}}">
            </div>
            <div class="brand">
                {{Auth::user()->name}}{{' '}}{{Auth::user()->prenom}}
            </div>
        </div>
    </a>

	<!--  Made With Get Shit Done Kit  -->
    <form method="POST" action="{{route('app.logout')}}">
        @csrf
		<a href="{{route('app.logout')}}" onclick="event.preventDefault(), this.closest('form').submit();" class="made-with-mk">
			<div class="brand">lo</div>
			<div class="made-with"><strong>Deconnecté</strong></div>
		</a>
    </form>
    <!--   Big container   -->
    <div class="container">
        <div class="row">
        <div class="col-sm-8 col-sm-offset-2">

            <!--      Wizard container        -->
            <div class="wizard-container">

                <div class="card wizard-card" data-color="orange" id="wizardProfile">
                    <form action="" method="">
                <!--        You can switch ' data-color="orange" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->

                    	<div class="wizard-header">
                        	<h3>
                        	   <b style="background: #0e1d34;padding:10px;color:white;">D-Event</b> <br>
                        	   <small>This information will let us know more about you.</small>
                        	</h3>
                    	</div>

						<div class="wizard-navigation">
							<ul>
	                            <li><a href="#about" data-toggle="tab">About</a></li>
	                            <li><a href="#account" data-toggle="tab">Account</a></li>
	                            <li><a href="#address" data-toggle="tab">Address</a></li>
	                        </ul>

						</div>

                        <div class="tab-content">
                             @yield('content')
                        </div>
                        <div class="wizard-footer height-wizard">
                           @include('Espace-Client.partials.footer')
                        </div>

                    </form>
                </div>
            </div> <!-- wizard container -->
        </div>
        </div><!-- end row -->
    </div> <!--  big container -->

    <div class="footer">
        <div class="container">
             Made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Creative Tim</a>. Free download <a href="http://www.creative-tim.com/product/bootstrap-wizard">here.</a>
        </div>
    </div>

</div>

</body>

	<!--   Core JS Files   -->
	<script src="{{asset('Espace-user/assets/js/jquery-2.2.4.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('Espace-user/assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('Espace-user/assets/js/jquery.bootstrap.wizard.js')}}" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="{{asset('Espace-user/assets/js/gsdk-bootstrap-wizard.js')}}"></script>

	<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="{{asset('Espace-user/assets/js/jquery.validate.min.js')}}"></script>

    {{-- <script src="{{asset('Espace-user/libscripts.bundle.js')}}"></script> --}}



    <style>
        .custom-alert {
          position: relative;
          padding: 15px;
          margin-bottom: 20px;
          border: 1px solid transparent;
          border-radius: 4px;
          font-size: 14px;
        }

        .alert-danger {
          color: #721c24;
          background-color: #f8d7da;
          border-color: #f5c6cb;
        }
        .alert-success {
          color: #1c722f;
          background-color: #74bb6b;
          border-color: #f5c6cb;
        }

        .close-btn {
          position: absolute;
          top: 5px;
          right: 10px;
          cursor: pointer;
          background: none;
          border: none;
          font-size: 20px;
          color: #721c24;
        }

        .close-btn:hover {
          color: #721c24;
        }
      </style>

      <script>
        function closeAlert(element) {
          element.parentElement.style.display = 'none';
        }
      </script>


</html>
