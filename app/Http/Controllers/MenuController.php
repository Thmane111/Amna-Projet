<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu=Menu::all();
        $menu_count=Menu::all()->count();
        return view('Espace-Admin.module-site-web.menu.index',compact('menu','menu_count'));
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
        $valid=$request->validate([

            'nom'=>'required|string',
            'url'=>'required|string'



        ]);

        $save= new Menu;
        $save->nom=$request->nom;
        if($request->detail==null){
            $save->detail=" ";
        }else{
            $save->detail=$request->detail;
        }

        $save->url=$request->url;
        if($request->parent==0){
            $save->parent=0;
        }else{
            $save->parent=$request->parent;
        }

        $save->etat=0;

        $save->save();
        return BACK()->with('message',"Enregistrement avec success !");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $voirs=Menu::All()->where('id','=',$id)->first();
        return view('Back.E-commerce.structure.menu.view',compact('voirs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modif=Menu::findOrFail($id);
        return view('Back.E-commerce.structure.menu.edit',compact('modif'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $valid=$request->validate([

            'nom'=>'required|string',
            'url'=>'required|string'
        ]);


        $save= Menu::find($id);
        $save->nom=$request->nom;
        if($request->detail==null){
            $save->detail=$request->detail2;
        }else{
            $save->detail=$request->detail;
        }
        if($request->parent==0){
            $save->parent=$request->parent2;
        }else{
            $save->parent=$request->parent;
        }

        $save->url=$request->url;
        $save->etat=0;

        $save->update();
        return BACK()->with('message',"Modification avec success !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $del=Menu::findOrFail($request->$id);
        $del->delete();
            return BACK()->with("message","Suppression reussi Avec Success");
    }




    public function state(Request $request,$id)
    {
        $mod=Menu::findOrFail($request->id_s);
        if($mod->etat==0)
        {
            $etat=1;
            $message="Menu Activer";
        }elseif ($mod->etat==1)
        {
            $etat=0;
            $message="Menu Désactiver";
        }
           $mod->etat=$etat;
           $mod->save();
           return BACK()->with('message',$message);

    }
}

?>
