<?php

namespace App\Http\Controllers;

use App\Models\Niveau;
use Illuminate\Http\Request;
use App\Models\groupe;
use App\Models\Module;
use App\Models\Attribution;
use Auth;

class NiveauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vv=module::all()->where('dimunitif','=','niveau')->count();
        $niveau=Niveau::all();
        $modES=module::all()->where('dimunitif','=','niveau')->first();
        $niveau_count=Niveau::all()->count();
        $attribut=Attribution::all()->where('etat','=',Auth::guard('admin')->user()->id)->first();
        return view('Back.niveau.index',compact('niveau','niveau_count','attribut','modES','vv'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'niveau'=>'required|string',
            'detail'=>'required|string',


    ]);


    $save= new Niveau;
    $save->matricule ="123";
    $save->niveau=$request->niveau;
    if($request->detail==null){
        $save->Description=" ";
    }else{
        $save->Description=$request->detail;
    }

   
    $save->etat=0;

    $save->save();
    return BACK()->with('message',"Groupe enregistre !");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Niveau  $niveau
     * @return \Illuminate\Http\Response
     */
    public function show(Niveau $niveau)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Niveau  $niveau
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modif=Niveau::findOrFail($id);
        return view('Back.niveau.edit',compact('modif'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Niveau  $niveau
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateDate=$request->validate([
            'niveau'=>'required|string',
            'detail'=>'required|string',


    ]);


    $save= Niveau::find($id);
    $save->niveau =$request->niveau;
    
    if($request->Description==null){
        $save->Description=$request->detail2;
    }else{
        $save->Description=$request->detail;
    }



    $save->update();
    return BACK()->with('message',"Modification reussi !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Niveau  $niveau
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $des=Niveau::findOrFail($request->id_f);
        $des->delete();
            return BACK()->with("message","Suppression reussi");
    }

    public function state(Request $request,$id)
    {
        $mod=Niveau::findOrFail($request->id_s);
        if($mod->etat==0)
        {
            $etat=1;
            $message="Niveau activer";
        }elseif ($mod->etat==1)
        {
            $etat=0;
            $message="Niveau desactiver";
        }
           $mod->etat=$etat;
           $mod->save();
           return BACK()->with('message',$message);

    }
}
