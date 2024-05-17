     
    @extends('Front.index')
@section('content')
    <!-- ...:::: Start Customer Login Section :::... -->
    <div class="customer-login" style="margin-top:5%;">
        <div class="container" >
            <div class="row" style="justify-content: center;align-items:center;">
                <!--login area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form" data-aos="fade-up" data-aos-delay="0">
                           <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" >
        @csrf

        <!-- Name -->
        <div class="default-form-box">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

     
           
       

          <!-- Prenom-->
          <div class="default-form-box">
            <x-input-label for="name" :value="__('Prenom')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required autofocus />
            <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
        </div>

            <!-- Prenom-->
            <div class="default-form-box">
            <x-input-label for="name" :value="__('Téléphone')" />
            <input id="name" class="block mt-1 w-full" type="number" name="tel" :value="old('tel')" required autofocus />
            <x-input-error :messages="$errors->get('tel')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="default-form-box">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="default-form-box">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="default-form-box">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <div class="login_submit">
            <button class="btn btn-md  mb-4" name="valider" style="background:red;">
                {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
