<?php
use App\Models\Module;
use App\Models\Permission;
use App\Models\Acces;
use App\Models\Attribution;
$categoryevent_comp=0; ?>
@extends('Espace-Admin.index')


@section('content')
<div class="body d-flex py-lg-3 py-md-2">
            <div class="container-xxl">
                <div class="row align-items-center">
                    <div class="border-0 mb-4">
                        <div class="card-header p-0 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h2>Liste des evenements</h2>
                           
                        </div>
                    </div>
                </div> <!-- Row end  -->
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12 flex-column">
                        <div class="tab-content mt-4">
                            <div class="tab-pane fade show active" id="All-list">
                                <div class="row g-3 gy-5 py-3 row-deck">
                                    @foreach($event as $events)
                                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-between mt-5">
                                                    <div class="lesson_name">
                                                        <div class="project-block light-info-bg">
                                                            <i class="icofont-paint"></i>
                                                        </div>
                                                        <span class="small text-muted project_name fw-bold"> Sunburst </span>
                                                        <h6 class="mb-0 fw-bold  fs-6  mb-2">{{$events->Nom_Event}}</h6>
                                                    </div>
                                                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                       
                                                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#deleteproject"><i class="icofont-ui-delete text-danger"></i></button>
                                                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#deleteproject">detail</button>
                                                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#deleteproject"><i class="icofont-ui-edit text-danger"></i></button>
                                                    </div>
                                                </div>
                                                
                                                <div class="row g-2 pt-4">
                                                    <div class="col-6">
                                                        <div class="d-flex align-items-center">
                                                            <i class="icofont-paper-clip"></i>
                                                            <span class="ms-2"></span>{{$events->Lieu_Event}}
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="d-flex align-items-center">
                                                            <i class="icofont-sand-clock"></i>
                                                            <span class="ms-2 text-success">12/05/2023</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="d-flex align-items-center">
                                                            <i class="icofont-group-students "></i>
                                                            <span class="ms-2">25 Tickets</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="d-flex align-items-center">
                                                            <i class="icofont-ui-text-chat"></i>
                                                            <span class="ms-2">12:30</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="dividers-block"></div>
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <h4 class="small fw-bold mb-0">Progress</h4>
                                                    <span class="small light-success-bg  p-1 rounded"><i class="icofont-ui-clock"></i> A venir</span>
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
