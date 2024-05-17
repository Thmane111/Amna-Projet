<?php

namespace App\Http\Controllers;

use App\Models\Jury;
use Illuminate\Http\Request;
use App\Imports\JuryImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Models\groupe;
use App\Models\Module;
use App\Models\Attribution;
use Auth;
use App\Models\Niveau;
use App\Models\SerieRegion;
use App\Models\Region;
use App\Models\Serie;
use App\Models\Centre;

class JuryConttroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vv=module::all()->where('dimunitif','=','jury')->count();
        $jury=Jury::all();
        $modES=module::all()->where('dimunitif','=','jury')->first();
        $centre=Centre::all();
        $region=Region::all();
        $serie=Serie::all();
        $jury_count=Jury::all()->count();
        $attribut=Attribution::all()->where('etat','=',Auth::guard('admin')->user()->id)->first();
        return view('Back.jury.index',compact('jury','jury_count','attribut','modES','vv','centre','region'));
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
            'jury'=>'required|string',
          

    ]);


    $save= new Jury;
    $save->matricule ="123";
    $save->Nom_Jury=$request->jury;


   
    $save->etat=0;

    $save->save();
    return BACK()->with('message',"Jury enregistre !");
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jury  $jury
     * @return \Illuminate\Http\Response
     */
    public function show(Jury $jury)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jury  $jury
     * @return \Illuminate\Http\Response
     */
    public function edit(Jury $jury)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jury  $jury
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id)
    {
        $validateDate=$request->validate([
            'jury'=>'required|string',
           


    ]);


    $save= Jury::find($id);
    $save->Nom_Jury=$request->jury;



    $save->update();
    return BACK()->with('message',"Modification reussi !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jury  $jury
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $des=Jury::findOrFail($request->id_f);
        $des->delete();
            return BACK()->with("message","Suppression reussi");
    }

    public function state(Request $request,$id)
    {
        $mod=Jury::findOrFail($request->id_s);
        if($mod->etat==0)
        {
            $etat=1;
            $message="Jury activer";
        }elseif ($mod->etat==1)
        {
            $etat=0;
            $message="Jury desactiver";
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
        $import = new JuryImport($request); // Passer l'objet Request lors de l'instanciation
        
        Excel::import(new JuryImport($request), $request->file('file'));
        return back();
        }
    }



    public function getCentre($id)
    {
    
        $html=" ";
        $html2=" ";

        
        $sous= Centre::where('region_id', $id)->get();        
        $sous1= SerieRegion::where('region_id', $id)->get();        
        foreach($sous as $souss){
        
        $html.= '  <option value="'.$souss->id.'">'.$souss->Nom_Centre.'</option>';
        }
        foreach($sous1 as $souss1){
        
            $html2.= '  <option value="'.$souss1->serie->id.'">'.$souss1->serie->serie.'</option>';
            }

            return response()->json(['html' => $html,'html2'=>$html2]);



      
    
    }













    
    public function getCentre2($id)
    {
    
        $html=" ";
        

        
        $sous= Centre::where('region_id', $id)->get();        
           
        foreach($sous as $souss){
        
        $html.= '  <option value="'.$souss->id.'">'.$souss->Nom_Centre.'</option>';
        }

        
        
        

            return response()->json(['html' => $html,'html2'=>'Liste des jury de Dakar']);



      
    
    }















    public function getListeJury1($id)
    {
    
        $html=" ";    
    $sous= DB::table('series')
                ->join('juries','series.id','=','juries.serie_id')
               
                
                ->join('centres','centres.id','=','juries.centre_id')
                ->join('regions','centres.region_id','=','regions.id')
                ->select('juries.*','centres.Nom_Centre','series.serie')
                ->where('regions.id', $id)
             
                ->get();
        foreach($sous as $souss){
        
            $html .= '<tr>' .
            '<td><a href="ticket-detail.html" class="fw-bold text-secondary">#' . $souss->matricule . '</a></td>' .
            '<td>' . $souss->nom . '</td>' .
            '<td><span class="fw-bold ms-1">' . $souss->serie . '</span></td>' .
            '<td>' . $souss->Nom_Centre . '</td>' .
           
           
            '</tr>';
    
        }
            return response()->json(['html' => $html,'html2'=>'Liste des jury de Dakar']);
    }














    
    public function getListeJury2($id)
    {
    
        $html=" ";
        

        

        
        $sous= DB::table('centres')
                ->join('juries', 'juries.centre_id', '=', 'centres.id')

                ->join('series','series.id','=','juries.serie_id')
          
                ->select('juries.*','centres.Nom_Centre','series.serie')
                ->where('centres.id', $id)
             
                ->get();
           
        foreach($sous as $souss){
        
            $html .= '<tr>' .
            '<td><a href="ticket-detail.html" class="fw-bold text-secondary">#' . $souss->matricule . '</a></td>' .
            '<td>' . $souss->nom . '</td>' .
            '<td><span class="fw-bold ms-1">' . $souss->serie . '</span></td>' .
            '<td>' . $souss->Nom_Centre . '</td>' .
            '<td>' .
           
            '</tr>';
    
        }

        
        
        

            return response()->json(['html' => $html,'html2'=>'Liste des jury de Dakar']);



      
    
    }
}
