<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Region;
use Illuminate\Http\Request;
use App\Models\groupe;
use App\Models\Module;
use App\Models\Attribution;
use Auth;
use App\Models\Niveau;
use App\Imports\CentreImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
class CentreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vv=module::all()->where('dimunitif','=','centre')->count();
        $centre=Centre::all();
        $modES=module::all()->where('dimunitif','=','centre')->first();
        $region=Region::all();
        $centre_count=Centre::all()->count();
        $attribut=Attribution::all()->where('etat','=',Auth::guard('admin')->user()->id)->first();
        return view('Back.centre.index',compact('centre','centre_count','attribut','modES','vv','region'));
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
            'centre'=>'required|string',
          

    ]);


    $save= new Centre;
    $save->matricule ="123";
    $save->Nom_Centre=$request->centre;
    $save->region_id=$request->region_id;


   
    $save->etat=0;

    $save->save();
    return BACK()->with('message',"Region enregistre !");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Centre  $centre
     * @return \Illuminate\Http\Response
     */
    public function show(Centre $centre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Centre  $centre
     * @return \Illuminate\Http\Response
     */
    public function edit(Centre $centre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Centre  $centre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateDate=$request->validate([
            'centre'=>'required|string',
           


    ]);


    $save= Centre::find($id);
    $save->Nom_Centre=$request->centre;
    $save->region_id=$request->region_id;



    $save->update();
    return BACK()->with('message',"Modification reussi !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Centre  $centre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $des=Centre::findOrFail($request->id_f);
        $des->delete();
            return BACK()->with("message","Suppression reussi");
    }

    public function state(Request $request,$id)
    {
        $mod=Centre::findOrFail($request->id_s);
        if($mod->etat==0)
        {
            $etat=1;
            $message="centre activer";
        }elseif ($mod->etat==1)
        {
            $etat=0;
            $message="centre desactiver";
        }
           $mod->etat=$etat;
           $mod->save();
           return BACK()->with('message',$message);

    }



    public function import(Request $request) 
    {
        // dd(request()->all());
        $import = new CentreImport($request); // Passer l'objet Request lors de l'instanciation

        if(!$request->HasFile('file')){
            return Back()->with('error','Veuillez inserer le fichier');
        }else{

        
        
        Excel::import(new CentreImport($request), $request->file('file'));
        return back();
        }
    }
}
