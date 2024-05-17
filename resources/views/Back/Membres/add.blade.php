






@extends('Back.index')
    @section('content')

    <div class="container-fluid site-width">
         <!-- START: Breadcrumbs-->
         <div class="row ">
            <div class="col-12  align-self-center">
                <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto"><h4 class="mb-0">Form Layouts</h4></div>

                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item">Form</li>
                        <li class="breadcrumb-item active"><a href="#">Layouts</a></li>
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
                        <h4 class="card-title">Multi Column Form</h4>
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

            <form method="POST" action="{{ route('Backlg.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="col-6 mb-3">
                        <label for="username">Prenom</label>

                        <input type="text" value="{{old('prenom')}}" name="prenom" class="form-control" placeholder="prenom">
                        @error('prenom')
                        <div class="text-danger" style="color: red;">
                            {{"renseigner ce champs"}}
                          </div>
                          @enderror
                    </div>
                    <div class="col-6 mb-3">
                        <label for="email">Nom</label>
                        <input type="text" name="nom" value="{{old('nom')}}" class="form-control" placeholder="nom">
                        @error('nom')
                        <div class="text-danger" style="color: red;">
                            {{"renseigner ce champs"}}
                          </div>
                          @enderror
                    </div>

                    <div class="col-6 mb-3">
                        <label for="email">Email</label>

                        <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="E-mail">
                        @error('email')
                        <div class="text-danger" style="color: red;">
                            {{"E-mail obligatoire"}}
                          </div>
                          @enderror
                    </div>
                    <div class="col-6 mb-3">
                        <label for="email">Numero Téléphone</label>
                        <input type="text" name="NumTel" value="{{old('NumTel')}}" class="form-control" placeholder="numero téléphone">
                        @error('NumTel')
                        <div class="text-danger" style="color: red;">
                            {{"renseigner ce champs"}}
                          </div>
                          @enderror
                    </div>

                    <div class="col-6 mb-3">
                        <label for="username">Numero Whatsapp <span style="color: red;">Facultatif</span></label>

                        <input type="text" name="NumWht" value="{{old('NumWht')}}" class="form-control" placeholder="numero whatsapp">
                        @error('prenom')
                        <div class="text-danger" style="color: red;">
                            {{"Numero téléphone incorrect"}}
                          </div>
                          @enderror

                    </div>
                    <div class="col-6 mb-3">
                        <div class="form-group">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="form-control"
                        type="password"
                        name="password"
                        required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" style="color: red;" />
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="form-group">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                            <x-text-input id="password_confirmation" class="form-control"
                            type="password"
                            name="password_confirmation" required />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" style="color: red;"/>
                            </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="form-group">
                        <label for="exampleInputFile">Ajouter une profile</label>
                        <div class="input-group">
                            <div class="custom-file">
                            <input type="file" name="image" class="form-control" id="exampleInputFile">

                            </div>

                        </div>
                        </div>
                    </div>

                                            <div class="col-12">

                                                <button type="submit" class="btn btn-primary">Sign in</button>   <button type="reset" class="btn btn-outline-warning">Reset</button>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
