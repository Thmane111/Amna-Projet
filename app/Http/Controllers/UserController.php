<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\groupe;
use App\Models\Admin;
use App\Models\Attribution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Validation\Rules;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=User::all();
        $groupe=groupe::all();
        return view('Back.utilisateurs.index',compact('data','groupe'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Back.utilisateurs.add');
    }

    public function create2($id)
    {
        $grp=groupe::all()->where('id','=',$id)->first();
        return view('Back.utilisateurs.add',compact('grp'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid=$request->validate([

            'nom'=>'required|string',
            'prenom'=>'required|string',
            'email'=>'required|string|unique:utilisateurs',

        ]);

        $save= new utilisateurs;
        $save->nom=$request->nom;
        $save->prenom=$request->prenom;
        $save->email=$request->email;
        $save->password=$request->pass1;
        $save->groupe=1;
        $save->connect=0;
        $save->cle_activation=0;

        $save->etat=0;
        $save->deletable=0;
        if($request->hasfile('image')){
            $file= $request->file('image');
            $extension= $file->getClientOriginalExtension();
            $filename= time(). '.'. $extension;
            $file->move('photo/img/',$filename);
            $save->image=$filename;
        }else{
            return $request ;
            $save->image='';
        }

        $save->save();
        return BACK()->with('message',"Enregistrement avec success !");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\utilisateurs  $utilisateurs
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $voirs=Admin::All()->where('id','=',$id)->first();
        return view('Back.utilisateurs.view',compact('voirs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\utilisateurs  $utilisateurs
     * @return \Illuminate\Http\Response
     */
    public function edit(utilisateurs $utilisateurs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\utilisateurs  $utilisateurs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, utilisateurs $utilisateurs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\utilisateurs  $utilisateurs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_del=User::findOrFail($id);
        $user_del->delete();
            return BACK()->with("message","utilisateurs supprimer");
    }

    public function state($id)
    {
        $mod=User::findOrFail($id);
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


    public function Liste_Membre($id)
    {
        $membre=Attribution::All()->where('groupe_id','=',$id);
        return view('Back.utilisateurs.liste',compact('membre'));
    }


    public function registerDash(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],

            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Admin::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $save= new Admin;
        $save2=new Attribution;
        $save->name=$request->name;
        $save->prenom=$request->prenom;
        $save->email=$request->email;
        $save->password=Hash::make($request->password);

        $save2->groupe_id=$request->id;
        $save->etat=0;
        $save2->etat=0;
        $save2->deletable=0;

        $save->save();
        $save2->admin_id=$save->id;
        $save2->save();

        return Back()->with('message','Enregistrement reussi');
    }
}
