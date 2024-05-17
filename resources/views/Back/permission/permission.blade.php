
@extends('Back.index')


@section('content')
<div class="container-fluid"style="justify-content:center;text-align:center;align-items:center;">
    <div class="row"style="justify-content: center;text-align:center;align-items:center;">
                        <div class="col-xl-6"style="justify-content: center;text-align:center;align-items:center;">
                            <div class="row"style="justify-content:center;text-align:center;align-items:center;">
    <div class="col-xl-12 col-lg-12" style="justify-content:center;text-align:center;align-items:center;">
                                            <div class="row"style="justify-content:center;text-align:center;align-items:center;">
                                                <div class="col-xl-6 col-xxl-12 col-sm-6" >
                                                    @if($errors->any())
                                                    @foreach($errors->All() as $error)
                                                    <div class="alert alert-icon alert-danger">
                                                      {{session('errors')}}
                                                   </div>
                                                    @endforeach
                                                    @endif
                                                    @if(Session::has('error'))
                                                 <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                      <strong>{{session::get('error')}}</strong>
                                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                 </div>
                                                 @endif
                                                 @if(Session::has('message'))
                                                 <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                      <strong>{{session::get('message')}}</strong>
                                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                 </div>
                                                 @endif
                                                    <div class="card">
                                                        <div class="card-header border-0"style="justify-content:center;text-align:center;align-items:center;">
                                                            <div>
                                                                <center><h4 class="fs-20 font-w700">Gestion des permission</h4></center>
                                                                <span class="fs-14 font-w400 d-block"></span>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">

                                                            <div id="emailchart"> </div>
                                                            <div class="mb-3 mt-4">

                                                            </div>

                                                            <div>
                                                                <form action="{{route('permission.store')}}"  method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                <input type="hidden" name="count" value="{{$count_voirs}}">
                                                                <?php $indice=-1;

                                                                ?>
                                                                @foreach($voirs as $voirss)
                                                                <?php $indice++; ?>

                                                                <div class="d-flex align-items-center justify-content-between mb-4">
                                                                    <span class="fs-18 font-w500">
                                                                        <svg class="me-3" width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <rect width="20" height="20" rx="6" fill="#886CC0"></rect>
                                                                        </svg>
                                                                        <input type="hidden" name="groupe_id" value="{{$groupe->id}}">

                                                                        <input type="hidden" name="tache[]" value="{{$voirss->tache}}">
                                                                        <input type="hidden" name="module_id" value="{{$voirss->module_id}}">
                                                                        {{$voirss->tache}}
                                                                    </span>
                                                                    <span class="fs-18 font-w600">
                                                                        <div class="form-check form-switch">
                                                                        <input type="checkbox" name="etat[{{$indice}}]"  data-toggle="toggle" data-size="xs" role="switch"    id="switchCheckDefault"                                                          @if($vq!=0)
                                                                            @foreach($vq2 as $vq22)


                                                                             @if($voirss->tache==$vq22->permission)
                                                                                @if($vq22->etat==1)
                                                                                    {{"checked"}}
                                                                                @else
                                                                                    {{" "}}
                                                                                 @endif


                                                                              @endif


                                                                             @endforeach
                                                                             @endif>
                                                                            

                                                                          </div>
                                                                    </span>
                                                                </div>
                                                                @endforeach




                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        </div>
                                            </div>
                                        </div>
                                        </div>

@endsection
