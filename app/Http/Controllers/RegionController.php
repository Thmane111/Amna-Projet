<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;
use App\Models\groupe;
use App\Models\Module;
use App\Models\Attribution;
use Auth;
use App\Models\Niveau;

use App\Imports\RegionImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vv=module::all()->where('dimunitif','=','region')->count();
        $region=Region::all();
        $modES=module::all()->where('dimunitif','=','region')->first();
        $niveau=Niveau::all();
        $region_count=Region::all()->count();
        $attribut=Attribution::all()->where('etat','=',Auth::guard('admin')->user()->id)->first();
        return view('Back.region.index',compact('region','region_count','attribut','modES','vv'));
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
            'region'=>'required|string',
          

    ]);


    $save= new Region;
    $save->matricule ="123";
    $save->Nom_Region=$request->region;


   
    $save->etat=0;

    $save->save();
    return BACK()->with('message',"Region enregistre !");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function show(Region $region)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function edit(Region $region)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateDate=$request->validate([
            'region'=>'required|string',
           


    ]);


    $save= Region::find($id);
    $save->Nom_Region=$request->region;



    $save->update();
    return BACK()->with('message',"Modification reussi !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $des=Region::findOrFail($request->id_f);
        $des->delete();
            return BACK()->with("message","Suppression reussi");
    }

    public function state(Request $request,$id)
    {
        $mod=Region::findOrFail($request->id_s);
        if($mod->etat==0)
        {
            $etat=1;
            $message="region activer";
        }elseif ($mod->etat==1)
        {
            $etat=0;
            $message="region desactiver";
        }
           $mod->etat=$etat;
           $mod->save();
           return BACK()->with('message',$message);

    }


    public function import(Request $request) 
    {
        if(!$request->HasFile('file')){
            return Back()->with('error','Veuillez inserer le fichier');
        }else{

        
        // dd(request()->all());
        $import = new RegionImport($request); // Passer l'objet Request lors de l'instanciation
        
        Excel::import(new RegionImport($request), $request->file('file'));
        return back();
        }
    }
}
