@extends('Back.index')
   @section('content')
   <div class="container-fluid site-width">
    <!-- START: Breadcrumbs-->
    <div class="row">
        <div class="col-12  align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto"><h4 class="mb-0">Dashboard</h4> <p>Welcome to liner admin panel</p></div>

                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END: Breadcrumbs-->

    <!-- START: Card Data-->
    <div class="row">
        <div class="col-12 col-sm-6 col-xl-3 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class='d-flex px-0 px-lg-2 py-2 align-self-center'>
                        <i class="icon-plus icons card-liner-icon mt-2"></i>
                        <div class='card-liner-content'>
                            <h2 class="card-liner-title">Bac session normal 2023</h2>
                            <h6 class="card-liner-subtitle">11 000 Candidat</h6>
                        </div>
                    </div>
                     <center> <a href="/admin/deliberation-sn/1" class="bg-success" style="font-size:20px;padding:5px;">Ajouter les resultat</a></center>
                </div>
            </div>
        </div>
    
   
        <div class="col-12 col-sm-6 col-xl-3 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class='d-flex px-0 px-lg-2 py-2 align-self-center'>
                        <i class="icon-plus icons card-liner-icon mt-2"></i>
                        <div class='card-liner-content'>
                            <h2 class="card-liner-title">Bac session complementaire 2023</h2>
                            <h6 class="card-liner-subtitle">6 000 Candidat</h6>
                        </div>
                    </div>
                     <center> <a href="" class="bg-success" style="font-size:20px;padding:5px;">Ajouter les resultat</a></center>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-3 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class='d-flex px-0 px-lg-2 py-2 align-self-center'>
                        <i class="icon-plus icons card-liner-icon mt-2"></i>
                        <div class='card-liner-content'>
                            <h2 class="card-liner-title">BEFEM 2023</h2>
                            <h6 class="card-liner-subtitle">22 000 Candidat</h6>
                        </div>
                    </div>
                  <center> <a href="" class="bg-success" style="font-size:20px;padding:5px;">Ajouter les resultat</a></center>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-3 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class='d-flex px-0 px-lg-2 py-2 align-self-center'>
                        <i class="icon-plus icons card-liner-icon mt-2"></i>
                        <div class='card-liner-content'>
                            <h2 class="card-liner-title">Concours 2023</h2>
                            <h6 class="card-liner-subtitle">34 000 Candidat</h6>
                        </div>
                    </div>
                  <center> <a href="" class="bg-success" style="font-size:20px;padding:5px;">Ajouter les resultat</a></center>
                </div>
            </div>
        </div>
 

      @endsection
