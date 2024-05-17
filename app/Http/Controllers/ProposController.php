<?php

namespace App\Http\Controllers;

use App\Models\propos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use Image;
use Intervention\Image\Exception\NotReadableException;
class ProposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $propos_count=propos::all()->count();
        $propos=propos::all()->first();
        return view('Espace-Admin.module-site-web.propos.index',compact('propos','propos_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Espace-Admin.module-site-web.propos.add');
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

            'titre'=>'required|string',
            'texte'=>'required|string',
            'image'=>'required|image|mimes:jpg,png,jiff,svg,jpeg|Max:2048'



        ]);

        $save= new propos;
        $save->titre=$request->titre;
        $save->LeTexte=$request->texte;

        $save->etat=0;
        $save->deletable=0;
        if($request->hasfile('image')){
            $file= $request->file('image');
            $extension= $file->getClientOriginalExtension();
            $filename= time(). '.'. $extension;
            $file->move('photo/propos/',$filename);
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
     * @param  \App\Models\propos  $propos
     * @return \Illuminate\Http\Response
     */
    public function show(propos $propos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\propos  $propos
     * @return \Illuminate\Http\Response
     */
    public function edit(propos $propos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\propos  $propos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $valid=$request->validate([

            'titre'=>'required|string',
            'texte'=>'required|string'

        ]);

        $save=propos::find($id);
        $save->titre=$request->titre;
      $save->LeTexte=$request->texte;

        $save->etat=0;
        $save->deletable=0;


        if($request->hasfile('image')){
             $destination="photo/propos/".$save->image;
             if(File::exists($destination)){
                File::delete($destination);
             }
            $file= $request->file('image');
            $extension= $file->getClientOriginalExtension();
            $filename='Dtic-'.time(). '.'. $extension;
            $file->move('photo/propos/',$filename);
            $save->image=$filename;
        }else{

            $save->image=$request->image2;
        }

        $save->update();
        return BACK()->with('message',"Enregistrement avec success !");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\propos  $propos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clients=propos::findOrFail($id);
        $verifier=propos::all()->where('id','=',$id)->first();
        $destination="photo/propos/".$verifier->image;
        if(File::exists($destination)){
           File::delete($destination);
        }
        $clients->delete();

            return BACK()->with("message","Suppression reussi Avec Success");
    }
}
