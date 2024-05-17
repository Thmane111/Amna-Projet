<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service=Service::all();
        $service_count=Service::all()->count();
        return view('Espace-Admin.module-site-web.service.index',compact('service','service_count'));
    }

    public function listeFor()
    {
        $service=Service::all();
        $service_count=Service::all()->count();
        return view('Espace-Client.formation.index',compact('service','service_count'));
    }
    public function detailFor()
    {
        $service=Service::all();
        $service_count=Service::all()->count();
        return view('site-web.cours.service_detail');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $service=ServiceCategory::orderBy('service_category','ASC')->get();


        return view('Espace-Admin.module-site-web.service.add',compact('service'));
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
            'service_titre'=>'required|string',
            'image'=>'required|image|mimes:jpg,png,jiff,svg,jpeg|Max:2048',

        ]);

        if($request->hasfile('image')){
            $file= $request->file('image');
            $extension= $file->getClientOriginalExtension();
            $filename= 'Dtic-'.time(). '.'. $extension;
            $file->move('photo/service/',$filename);

        }else{
            return $request ;
            $save->image='';
        }
        if($request->servicecategory==0){
            $serv=0;
        }else{
            $serv=$request->servicecategory;
        }
        Service::insert([
          'service_category_id'=>$request->servicecategory,
          'service_title'=>$request->service_titre,
          'service_description'=>$request->description,
          'service_image'=>$filename,
          'etat'=>0,
          'created_at'=>Carbon::now(),


        ]);


        $notification=array(
            'message'=>'Enregistrement reussi',
            'alert-type'=>'success'
        );
        return BACK()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service,$id)
    {
        $modif=service::findOrFail($id);
        $service=ServiceCategory::orderBy('service_category','ASC')->get();


        return view('Espace-Admin.module-site-web.service.edit',compact('service','modif'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $valid=$request->validate([
            'service_titre'=>'required|string',



        ]);

        $save=service::find($id);
        if($request->hasfile('image')){
            $destination="photo/service/".$save->image;
            if(File::exists($destination)){
               File::delete($destination);
            }
           $file= $request->file('image');
           $extension= $file->getClientOriginalExtension();
           $filename='Dtic-'.time(). '.'. $extension;
           $file->move('photo/service/',$filename);
           $save->service_image=$filename;
       }else{

           $save->service_image=$request->image2;
       }

       if($request->servicecategory==0){
        $save->service_category_id=$request->servicecategory2;
       }else{
        $save->service_category_id=$request->servicecategory;
       }

       $save->service_title=$request->service_titre;

       $save->service_description=$request->description;
       $save->update();
        $notification=array(
            'message'=>'Enregistrement reussi',
            'alert-type'=>'success'
        );
        return BACK()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $clients=Service::findOrFail($request->id_f);
        $verifier=Service::all()->where('id','=',$request->id_f)->first();
        $destination="photo/service/".$verifier->blog_image;
        if(File::exists($destination)){
           File::delete($destination);
        }
        $clients->delete();

            return BACK()->with("message","Suppression reussi Avec Success");
    }

    public function state(Request $request,$id)
    {
        $mod=Service::findOrFail($request->id_s);
        if($mod->etat==0)
        {
            $etat=1;
            $message="Service Activer";
        }elseif ($mod->etat==1)
        {
            $etat=0;
            $message="Service Désactiver";
        }
           $mod->etat=$etat;
           $mod->save();
           return BACK()->with('message',$message);

    }

    public function DetailFormation(){
        return view('site-web.cours.service_detail');
    }
}
