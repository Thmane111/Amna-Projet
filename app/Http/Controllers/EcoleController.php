<?php

namespace App\Http\Controllers;

use App\Models\Ecole;
use Illuminate\Http\Request;
use App\Models\groupe;
use App\Models\Module;
use App\Models\Attribution;
use Auth;
use App\Models\Region;
use App\Models\Centre;
use App\Imports\EcoleImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class EcoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vv=module::all()->where('dimunitif','=','ecole')->count();
        $ecole=Ecole::all();
        $modES=module::all()->where('dimunitif','=','ecole')->first();
        $region=Region::all();
        $centre=Centre::all();
        $ecole_count=ecole::all()->count();
        $attribut=Attribution::all()->where('etat','=',Auth::guard('admin')->user()->id)->first();
        return view('Back.ecole.index',compact('ecole','ecole_count','attribut','modES','vv','region','centre'));
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
            'ecole'=>'required|string',
          

    ]);


    $save= new Ecole;
    $save->matricule ="123";
    $save->Nom_Ecole=$request->ecole;
    $save->region_id=$request->region_id;
    $save->centre_id=$request->centre_id;


   
    $save->etat=0;

    $save->save();
    return BACK()->with('message',"Region enregistre !");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ecole  $ecole
     * @return \Illuminate\Http\Response
     */
    public function show(Ecole $ecole)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ecole  $ecole
     * @return \Illuminate\Http\Response
     */
    public function edit(Ecole $ecole)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ecole  $ecole
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateDate=$request->validate([
            'ecole'=>'required|string',
           


    ]);


    $save= Ecole::find($id);
    $save->Nom_Ecole=$request->ecole;
    $save->region_id=$request->region_id;
    $save->centre_id=$request->centre_id;


    $save->update();
    return BACK()->with('message',"Modification reussi !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ecole  $ecole
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $des=Ecole::findOrFail($request->id_f);
        $des->delete();
            return BACK()->with("message","Suppression reussi");
    }


    public function state(Request $request,$id)
    {
        $mod=Ecole::findOrFail($request->id_s);
        if($mod->etat==0)
        {
            $etat=1;
            $message="ecole activer";
        }elseif ($mod->etat==1)
        {
            $etat=0;
            $message="ecole desactiver";
        }
           $mod->etat=$etat;
           $mod->save();
           return BACK()->with('message',$message);

    }



    public function import(Request $request) 
    {
        // dd(request()->all());
        $import = new EcoleImport($request); // Passer l'objet Request lors de l'instanciation
        
        Excel::import(new EcoleImport($request), $request->file('file'));
        return back();
    }


    public function getEcoleCentre($id)
{

    $html=" ";
    // $rid = $request->post('rid');
    // $countries= DB::table('countries')->where('region_id', $rid)->get();
    // dd($countries);
    
    $sous= Centre::where('region_id', $id)->get();
    
    // dd($countries);
    
    
    foreach($sous as $souss){
    
    $html.= '  <option value="'.$souss->id.'">'.$souss->Nom_Centre.'</option>';
    }
    return response()->json($html);

}
}
