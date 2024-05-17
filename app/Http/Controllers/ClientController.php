<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Validation\Rules;
use App\Models\Client;



class ClientController extends Controller
{
    public function index(){
        return view('client.login-A');
    }

    public function Dashboard(){
        return view('Back.partials.main');
    }

    public function store(Request $request){
        $check = $request->all();
        if(Auth::guard('client')->attempt(['email'=>$check['email'], 'password'=>$check['password']])){

            return redirect()->route('client.Dashboard')->with('error','Admin login Successefuly');;
        }else{
            return back()->with('error','Invalide Email ou mot de passe');
        }

    }


    public function register(){
       return view('client.register');
}

public function registerDash(Request $request){
    $request->validate([
        'name' => ['required', 'string', 'max:255'],


        'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Client::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);

    $save= new Client;
    $save->name=$request->name;

    $save->email=$request->email;



    $save->password=Hash::make($request->password);
    $save->save();
    return redirect()->route('client.login-A')->with('error','Enregistrement reussi');
}


public function logout()
{
    Auth::guard('client')->logout();
    return redirect()->route('client.login-A')->with('error','Deconnexion reussi');;


}
}
