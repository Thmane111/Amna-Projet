<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AnnoncerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $annonceur=User::all();
        $annonceur_count=User::all()->count();
        return view('Espace-Admin.module-market-place.annonceur.index',compact('annonceur','annonceur_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Espace-Admin.module-market-place.annonceur.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
             'telephone'=>['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $save= new User;

        $save->name=$request->name;
        $save->prenom=$request->prenom;
        $save->email=$request->email;
        if($request->adresse==" "){
            $save->adresse=" ";
        }else{
            $save->adresse=$request->adresse;
        }

        $save->telephone=$request->telephone;
        $save->email=$request->email;
        $save->password=Hash::make($request->password);
        $save->etat=0;
        $save->save();

        return Back()->with('message','Enregistrement reussi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modif=User::findOrFail($id);
        return view('Espace-Admin.module-market-place.annonceur.edit',compact('modif'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
             'telephone'=>['required', 'string', 'max:20'],

        ]);

        $save=User::find($id);
        $save->name=$request->name;
        $save->prenom=$request->prenom;
        if($request->adresse==" "){
            $request->adresse=" ";
        }else{
            $save->adresse=$request->adresse;
        }
        $save->telephone=$request->telephone;
        $save->update();
        return BACK()->with('message',"enregistre reussi!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $user_del=User::findOrFail($request->id_f);
        $user_del->delete();
            return BACK()->with("message","utilisateurs supprimer");
    }


    public function state(Request $request,$id)
    {
        $mod=User::findOrFail($request->id_s);
        if($mod->etat==0)
        {
            $etat=1;
            $message="utilisateur Activer";
        }elseif ($mod->etat==1)
        {
            $etat=0;
            $message="utilisateur Desactiver";
        }
           $mod->etat=$etat;
           $mod->save();
           return BACK()->with('message',$message);

    }
}
