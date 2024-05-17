<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Attribution;
use App\Models\groupe;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('admin.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Admin::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);


        $save3=new groupe;
        $save= new Admin;
        $save2=new Attribution;

        $save3->nom_groupe="Supers administrateurs";
        $save3->caption="Admin";
        $save3->detail=" ";
        $save3->etat=1;
        $save3->deletable=0;

        $save->name=$request->name;
        $save->prenom=$request->prenom;
        $save->email=$request->email;
        $save->etat=1;
        $save->password=Hash::make($request->password);
        $save3->save();
        $save->save();


        $save2->groupe_id=$save3->id;
        $save2->admin_id=$save->id;
        $save2->etat=0;
        $save2->deletable=0;
        $save2->save();

        Auth::login($save);

        return redirect(RouteServiceProvider::ADMIN_HOME);
    }
}
