<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use Illuminate\Http\Request;
use App\Models\groupe;
use App\Models\Module;
use App\Models\Attribution;
use Auth;
use App\Models\Niveau;
use App\Models\Ecole;
use App\Models\Centre;
use App\Models\Serie;
use App\Models\Region;
use App\Exports\EleveExport;
use App\Imports\EleveImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class EleveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vv=module::all()->where('dimunitif','=','eleve')->count();
        $eleve=eleve::all();
        $modES=module::all()->where('dimunitif','=','eleve')->first();
        $ecole=Ecole::all();
        $serie=Serie::all();
        $niveau=Niveau::all();
        $region=Region::all();
        $eleve_count=eleve::all()->count();
        $attribut=Attribution::all()->where('etat','=',Auth::guard('admin')->user()->id)->first();
        return view('Back.eleve.index',compact('eleve','eleve_count','attribut','modES','vv','ecole','serie','niveau','region'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Eleve  $eleve
     * @return \Illuminate\Http\Response
     */
    public function show(Eleve $eleve)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Eleve  $eleve
     * @return \Illuminate\Http\Response
     */
    public function edit(Eleve $eleve)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Eleve  $eleve
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Eleve $eleve)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Eleve  $eleve
     * @return \Illuminate\Http\Response
     */
    public function destroy(Eleve $eleve)
    {
        //
    }


     /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new EleveExport, 'users.xlsx');
    }

      /**
    * @return \Illuminate\Support\Collection
    */
    public function import(Request $request) 
    {
        // dd(request()->all());
        $import = new EleveImport($request); // Passer l'objet Request lors de l'instanciation
        
        Excel::import(new EleveImport($request), $request->file('file'));
        return back();
    }



public function getEcole($id)
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


public function getSerie($id)
{

$html=" ";
// $rid = $request->post('rid');
// $countries= DB::table('countries')->where('region_id', $rid)->get();
// dd($countries);

$sous= Serie::where('niveau_id', $id)->get();

// dd($countries);


foreach($sous as $souss){

$html.= '  <option value="'.$souss->id.'">'.$souss->serie.'</option>';
}
return response()->json($html);




}



public function getListe($id)
{

    // $vq_event=Event::all()->where('user_id',Auth::user()->id)->first();
    $list_ticket = DB::table('eleves')
    ->join('niveaux', 'eleves.niveau_id', '=', 'niveaux.id')
    ->select('eleves.*', 'niveaux.niveau')
    ->where('eleves.niveau_id', $id)
    ->get();

        // $list_ticket=Eleve::all();
        return response()->json(['list_ticket' => $list_ticket]);

}
}
