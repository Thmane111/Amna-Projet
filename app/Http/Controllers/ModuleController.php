<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\acces;
use App\Models\tache;
use App\Models\Attribution;
use App\Models\navigation;
use App\Models\permission;
use Auth;
use Illuminate\Http\Request;
use Image;
use Illuminate\Http\Response;
use RealRashid\SweetAlert\Facades\Alert;
use Intervention\Image\Exception\NotReadableException;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $mod=module::all();
        $modESSS=module::all()->where('dimunitif','=','Module')->count();
       
        $modES=module::all()->where('dimunitif','=','Module')->first();

        $mod_count=module::all()->count();
        $navigation=navigation::all()->where('etat','=',1);
        $attribut=Attribution::all()->where('etat','=',Auth::guard('admin')->user()->id)->first();
        $attribut_perso=Attribution::all()->where('id_admin','=',Auth::guard('admin')->user()->id);
        return view('Back.module.index',compact('mod','mod_count','attribut','modES','navigation','modESSS'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Back.module.add');
    }


    public function createapp()
    {
        return view('Back.module.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateDate=$request->validate([
            'nom_module'=>'required|string',
            'caption'=>'required|string',



    ]);

       $verifie=Module::all()->where('dimunitif','=',$request->caption)->count();

       if($verifie==0){


    $save= new module;
    $save->nom_module =$request->nom_module;
    $save->dimunitif =$request->caption;
    if($request->detail==null){
        $save->detail=" ";
    }else{
        $save->detail=$request->detail;
    }

    $save->url ="/bagwelle/".$request->caption;

    if($request->navigation==0){
        $save->navigation_id =0;
    }else{
        $save->navigation_id=$request->navigation;
    }

    $save->deletable=0;
    $save->etat=1;


    $save->save();

    return BACK()->with('message',"Module enregistre !");
       }else{

        return BACK()->with('error',"Module existe deja !");
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $voirs=module::All()->where('id','=',$id)->first();
        return  response()->json($voirs);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modif=module::findOrFail($id);
        return  response()->json($modif);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateDate=$request->validate([
            'nom_module'=>'required|string',
            'caption'=>'required|string',


    ]);

    $verifie=Module::all()->where('dimunitif','=',$request->caption)
    ->where('id','!=',$request->id)
    ->count();

    if($verifie==0){
        $save= Module::find($request->id);
    $save->nom_module =$request->nom_module;
    $save->dimunitif =$request->caption;
    if($request->detail==null){
        if($request->detail2==null){
            $save->detail="";
        }else{
            $save->detail=$request->detail2;
        }

    }else{
        $save->detail=$request->detail;
    }

    $save->url ="/admin/".$request->caption;
    if($request->navigation==0){
        $save->navigation_id =$request->navigation2;
    }else{
        $save->navigation_id =$request->navigation;
    }

    $save->update();
    return BACK()->with('message',"Modification reussi!");

    }else{

        return BACK()->with('error',"Module existe deja !");
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $clients=module::findOrFail($request->id_f);


        $verifier_acces=acces::all()->where('module_id','=',$request->id_f)->count();
        if($verifier_acces!=0){
            $verifier_permission=Permission::all()->where('module_id','=',$request->id_f)->count();
            if($verifier_permission!=0){
                $delete_permission=Permission::all()->where('module_id','=',$request->id_f);
                foreach($delete_permission as $delete_permissionS){

                $delete_permission1=Permission::findOrFail($delete_permissionS->id);
                $delete_permission1->delete();
                }

                $delete_acces=acces::all()->where('module_id','=',$request->id_f)->first();
                $delete_acces1=acces::findOrFail($delete_acces->id);
                $delete_acces1->delete();
            }else{
                $delete_acces=acces::all()->where('module_id','=',$request->id_f)->first();
                $delete_acces1=acces::findOrFail($delete_acces->id);
                $delete_acces1->delete();
            }

            $verifier_tache=Tache::all()->where('module_id','=',$request->id_f)->count();
            if($verifier_tache!=0){
                $delete_tache=Tache::all()->where('module_id','=',$request->id_f);
                foreach($delete_tache as $delete_tacheS){
                $delete_tache1=Tache::findOrFail($delete_tacheS->id);
                $delete_tache1->delete();
                }

            }

        }else{
            $verifier_tache=Tache::all()->where('module_id','=',$request->id_f)->count();
            if($verifier_tache!=0){
                $delete_tache=Tache::all()->where('module_id','=',$request->id_f)->first();
                $delete_tache1=Tache::findOrFail($delete_tache->id);
                $delete_tache1->delete();
            }
            $clients->delete();
        }
        $clients->delete();





        return BACK()->with('message',"Suppression reussi Avec Success");

    }

    public function state(Request $request,$id)
    {
        $mod=Module::findOrFail($request->id_s);
        if($mod->etat==0)
        {
            $etat=1;
            $message="Module Activer";
        }elseif ($mod->etat==1)
        {
            $etat=0;
            $message="Module Desactiver";
        }
           $mod->etat=$etat;
           $mod->save();
           return BACK()->with('message',$message);

    }
}
