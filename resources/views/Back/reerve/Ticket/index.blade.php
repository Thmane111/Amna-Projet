<?php
use App\Models\Module;
use App\Models\Permission;
use App\Models\Acces;
use App\Models\Attribution;
use App\Models\Type_Ticket;
use App\Models\Ticket;
$categoryevent_comp=0; ?>
@extends('Espace-Admin.index')


@section('content')
<div class="body d-flex py-lg-3 py-md-2">
            <div class="container-xxl">
                <div class="row align-items-center">
                    <div class="border-0 mb-4">
                        <div class="card-header p-0 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h2>Liste des ticketss</h2>

                        </div>
                    </div>
                    <center><h2><strong style="color: #0e1d34;;"> NB : MERCI DE RECADRER VOTRE AFFICHE A 732px/400px </strong></h2></center>
                </div> <!-- Row end  -->
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12 flex-column">
                        <div class="tab-content mt-4">
                            <div class="tab-pane fade show active" id="All-list">
                                <div class="row g-3 gy-5 py-3 row-deck">
                                    @foreach($ticket as $tickets)
                                    <?php
                                      $nbr_ticket=Type_Ticket::all();

                                    ?>
                                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6" >
                                        <div class="card" style="background: #0e1d34;color:white;">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-center mt-5">
                                                    <div class="lesson_name">
                                                        <div class="project-block light-info-bg">
                                                            <i class="icofont-paint"></i>
                                                        </div>
                                                        <span class="small text-muted project_name fw-bold"> Ticket </span>
                                                        <center><h6 class="mb-0 fw-bold  fs-6  mb-2">{{$tickets->Nom_Event}}</h6></center>
                                                    </div>

                                                </div>

                                                <div class="row g-2 pt-4">
                                                    @foreach($nbr_ticket as $nbr_tickets)
                                                      <?php
                                                      $comp_ticket=Ticket::all()->where('type__ticket_id',$nbr_tickets->id)
                                                      ->where('event_id',$tickets->id)
                                                      ->count();
                                                      ?>
                                                    <div class="col-6">
                                                        <div class="d-flex align-items-center bg-white">
                                                            <i class="icofont-paper-clip"></i>
                                                            <span class="ms-2"></span>{{$nbr_tickets->nom." :"}}  {{$comp_ticket}}<br>

                                                        </div>
                                                    </div>
                                                    @endforeach

                                                </div>
                                                <div class="dividers-block"></div>
                                                <div class="d-flex align-items-center justify-content-between mb-2">

                                                    <a href="{{route('ticket.create2',$tickets->id)}}" class="small light-success-bg  p-1 rounded">Ajouter affiche</a>
                                                    <a href="{{route('ticket.getQRCode',$tickets->id)}}" class="small light-warning-bg  p-1 rounded">Generer le Qrcode</a>
                                                </div>
                                                <div class="progress" style="height: 8px;">
                                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 25%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                                    <div class="progress-bar bg-secondary ms-1" role="progressbar" style="width: 25%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                    <div class="progress-bar bg-secondary ms-1" role="progressbar" style="width: 50%" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
