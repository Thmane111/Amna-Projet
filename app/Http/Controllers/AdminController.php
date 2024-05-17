<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Validation\Rules;
use App\Models\Admin;


class AdminController extends Controller
{
    public function index(){
        return view('admin.login-A');
    }

    public function Dashboard(){
        return view('Back.partials.main');
    }

    public function store(Request $request){
        $check = $request->all();
        if(Auth::guard('admin')->attempt(['email'=>$check['email'], 'password'=>$check['password']])){

            return redirect()->route('admin.Dashboard')->with('error','Admin login Successefuly');;
        }else{
            return back()->with('error','Invalide Email ou mot de passe');
        }

    }


    public function register(){
       return view('admin.register');
}

public function registerDash(Request $request){
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'prenom' => ['required', 'string', 'max:255'],

        'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Admin::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);

    $save= new Admin;
    $save->name=$request->name;
    $save->name=$request->prenom;
    $save->email=$request->email;



    $save->password=Hash::make($request->password);
    $save->save();
    return Back()->with('message','Enregistrement reussi');
}


public function logout()
{
    Auth::guard('admin')->logout();
    return redirect()->route('admin.login-A')->with('error','Deconnexion reussi');;


}


}
