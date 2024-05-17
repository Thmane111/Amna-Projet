<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use Illuminate\Support\Facades\File;

class ServiceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicecategory=serviceCategory::all();
        $servicecategory_count=ServiceCategory::all()->count();
        return view('Espace-Admin.module-site-web.servicecategory.index',compact('servicecategory','servicecategory_count'));
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
            'servicecategory'=>'required|string',
        ],[
            'servicecategory.required'=>'champs vide',
        ]);


        $ver=ServiceCategory::all()->where('service_category','=',$request->servicecategory)->count();
        if($ver==0){
        $save= new ServiceCategory;
        $save->service_category=$request->servicecategory;
        $save->Description=$request->description;
        $save->etat=0;
        if($request->hasfile('image')){
            $file= $request->file('image');
            $extension= $file->getClientOriginalExtension();
            $filename= 'Dtic-'.time(). '.'. $extension;
            $file->move('photo/service-categorie/',$filename);
            $save->image=$filename;

        }else{
            return $request ;
            $save->image='';
        }
        $save->save();
        return BACK()->with('message',"Enregistrement avec success !");
        }else{
            return BACK()->with('error',"Existe déja !");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $valid=$request->validate([
            'servicecategory'=>'required|string'
        ]);

        $ver=ServiceCategory::all()->where('service_category','=',$request->servicecategory)
        ->where('id','!=',$request->update_id)
        ->count();
        if($ver==0){

            $save= ServiceCategory::find($request->update_id);
            if($request->description==null){
                $save->Description=$request->description2;
            }else{
                $save->Description=$request->description;
            }

            if($request->hasfile('image')){
                $destination="photo/service-categorie/".$save->image;
                if(File::exists($destination)){
                   File::delete($destination);
                }
               $file= $request->file('image');
               $extension= $file->getClientOriginalExtension();
               $filename='Dtic-'.time(). '.'. $extension;
               $file->move('photo/service-categorie/',$filename);
               $save->image=$filename;
           }else{

               $save->image=$request->image2;
           }
        $save->service_category=$request->servicecategory;


        $save->update();
        return BACK()->with('message',"Enregistrement avec success !");
        }else{
            return BACK()->with('error',"Existe déja !");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $del=ServiceCategory::findOrFail($request->id);
        $del->delete();
            return BACK()->with("message","Suppression reussi Avec Success");
    }

    public function state(Request $request,$id)
    {
        $mod=ServiceCategory::findOrFail($request->id_s);
        if($mod->etat==0)
        {
            $etat=1;
            $message="Service catégorie Activer";
        }elseif ($mod->etat==1)
        {
            $etat=0;
            $message="Service catégorie Désactiver";
        }
           $mod->etat=$etat;
           $mod->save();
           return BACK()->with('message',$message);

    }
}
