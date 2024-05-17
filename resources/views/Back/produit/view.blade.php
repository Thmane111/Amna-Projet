
@extends('Back.index')


@section('content')
<div class="container-fluid site-width">
                <!-- START: Breadcrumbs-->
                <div class="row">
                    <div class="col-12 align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Product Detail</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item">Product</li>
                                <li class="breadcrumb-item active"><a href="#">Product Detail</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- END: Breadcrumbs-->

                <!-- START: Card Data-->
                <div class="row">
                    <div class="col-12 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-12 col-lg-7">
                                        <div class="card-body border bg-danger brd-gray border-top-0 border-right-0 border-left-0">
                                            <h3 class="mb-0"><a href="#" class="f-weight-500 text-primary">{{$voirs->user->prenom." ".$voirs->user->name}}</a>

                                            </h3>
                                            <p>Annonceur</p>
                                        </div>
                                        <div class="card-body brd-gray border-top-0 border-right-0 border-left-0">
                                            <h5>Titre </h5>
                                            <p class="mb-0" lang="ca">{{$voirs->titre_prod}}</p>
                                        </div>
                                        <div class="card-body brd-gray border-top-0 border-right-0 border-left-0">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="float-left">
                                                        <h4 class="lato-font body-color mb-0">Prix</h4>
                                                    </div>
                                                    <div class="float-left ml-2">
                                                        <h4 class="lato-font mb-0 text-danger">{{$voirs->prix_prod." Fcfa"}}</h4>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="card-body brd-gray border-top-0 border-right-0 border-left-0">
                                            <h5>Description</h5>
                                            <p class="mb-0" lang="ca">{{$voirs->description}}</p>
                                        </div>
                                      <div class="d-flex">
                                        <div class="card-body border brd-gray border-top-0 border-right-0 border-left-0">
                                            <div class="d-inline-block mr-3">
                                                <p class="dark-color f-weight-600"><i class="fa fa-user"></i> Livraison: </p>
                                            </div>
                                            <div class="d-inline-block mr-3">
                                                <div class="form-group">
                                                   @if($voirs->livraison==1)
                                                   {{"Oui"}}
                                                   @else
                                                   {{"Non"}}
                                                   @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-body border brd-gray border-top-0 border-right-0 border-left-0">
                                            <div class="d-inline-block mr-3">
                                                <p class="dark-color f-weight-600"><i class="fa fa-user"></i> Type offre: </p>
                                            </div>
                                            <div class="d-inline-block mr-3">
                                                <div class="form-group">
                                                   @if($voirs->type_offre==0)
                                                   {{"Location"}}
                                                   @else
                                                   {{"Vente"}}
                                                   @endif
                                                </div>
                                            </div>
                                        </div>


                                      </div>




                                        </div>
                                        <div class="card-body">
                                            <ul class="list-unstyled">
                                                <li class="font-weight-bold dark-color mb-2">Ville/région: <span class="body-color font-weight-normal">{{$voirs->ville}}</span></li>
                                                <li class="font-weight-bold dark-color mb-2">Category: <span class="body-color font-weight-normal">{{$voirs->category->nom_cat}}</span></li>
                                                <li class="font-weight-bold dark-color mb-2">Sous catégorie: <span class="body-color font-weight-normal">{{$voirs->sous__categorie->nom_type}}</span></li>
                                                <li class="font-weight-bold dark-color mb-2">date publication:
                                                    {{$voirs->created_at}}
                                                </li>
                                            </ul>
                                            <div class="card-body  brd-gray border-top-0 border-right-0 border-left-0">

                                                <div class="d-inline-block mr-3">
                                                    <a href="{{route('produit.edit',$voirs->id)}}" class="btn btn-primary">Modifier</a>
                                                </div>
                                                <div class="d-inline-block mr-3">
                                                    @if($voirs->etat==0)
                                                    <a href="{{route('produit.state',$voirs->id)}}" class="btn btn-danger">desactiver</a>
                                                    @else
                                                    <a href="{{route('produit.state',$voirs->id)}}" class="btn btn-success">activer</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="col-12 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-md-8 text-center pb-4">
                                        <div class="heading">
                                            <h3 class="lato-font font-weight-bold">image du produit</h3>
                                            <div class="custom-devider large mx-auto"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    @foreach($img as $imgs)
                                    <div class="col-md-6 col-lg-3 mb-4">


                                        <img src="/uploads/Annonce/{{$imgs->image}}" alt="" class="portfolioImage img-fluid">
                                        <div class="d-flex">
                                            <a data-fancybox-group="gallery" href="/uploads/Annonce/{{$imgs->image}}" class="fancybox btn rounded-0 btn-dark w-50">View Large</a>

                                        </div>


                                    </div>
                                    @endforeach






                                </div>

                            </div>
                        </div>


                    </div>

                </div>
                <!-- END: Card DATA-->
            </div>
@endsection
