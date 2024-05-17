<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\SerieRegion;
use App\Models\Serie;
use App\Models\Eleve;
use App\Models\Centre;
use App\Models\Jury;
use App\Models\Ecole;
use App\Models\Resultat;
use App\Models\Region;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;



    public function PageSerie($id)
    {
  
        $serie=Serie::all()->where('niveau_id',$id);
        $serie_count=Serie::all()->where('niveau_id',$id)->count();

    
        return view('Espace.resulat',compact('serie','serie_count','id'));
    }


    public function View($id)
    {
        
        $liste=[];
        $compteur=1;
        $liste_classements_eleve=[];
        $liste_classements_eleve_regional=[];
        $classement=0;
        $classement_regional=0;
        $indice=1;
        $verifie_major=false;
        $verifie_id_count=Eleve::all()->where('id',$id)->count();
             if($verifie_id_count!=0){
                $verifie_id=Eleve::all()->where('id',$id)->first();
                // Reperation totale liste des eleves pour traiter le classements de eleve
                 // Debut de traitement classement national
                $recup_total_eleve=Eleve::all()->where('serie_id',$verifie_id->serie_id);
                foreach($recup_total_eleve as $recup_total_eleves){
                    $liste_eleve_count=Resultat::all()->where('eleve_id',$recup_total_eleves->id)->count();
                    if($liste_eleve_count!=0){
                        $liste_eleve=Resultat::all()->where('eleve_id',$recup_total_eleves->id)->first();
                            // Ajout des informations de l'élève dans le tableau $liste
                        $liste_classements_eleve[$compteur] = [
                            'id_eleve'=> $liste_eleve->eleve_id,
                            'note' => $liste_eleve->note,
                            
                        ];
                        $compteur++;
                    }else{
                        continue;
                    }
                }

                // Tri du tableau par note en ordre décroissant
                usort($liste_classements_eleve, function($a, $b) {
                return $b['note'] - $a['note'];
                });

                // determiner le classements de l'eleve
             
                foreach ($liste_classements_eleve as $index => $liste_classements_eleves) {
                    if ($liste_classements_eleves['id_eleve'] == $id) {
                        // Utilisez $index ici pour accéder à l'indice de l'élément
                        $classement=$indice;
                        if($liste_classements_eleves['note']>=10 &&  $classement<=3){
                            $verifie_major=true;
                        }
                       
                    }
                    $indice++;
                }
                $compteur=0;
                $indice=1;
                // Fin Traitement de classement national 


                // Debut traitement de classement regional
                $recup_ecole_region=Centre::all()->where('id',$verifie_id->centre_id)->first();
                $sous= DB::table('eleves')
                ->join('centres', 'eleves.ecole_id', '=', 'centres.id')
                ->join('series','eleves.serie_id','=','series.id')
                ->join('regions', 'centres.region_id','=','regions.id')
                ->join('resultats','resultats.eleve_id','=','eleves.id')
                ->select('eleves.id','resultats.note')
                ->where('regions.id', $recup_ecole_region->region->id)
                ->where('series.id',$verifie_id->serie_id)
                ->get();
                     
                foreach($sous as $souss){
                    if($liste_eleve_count!=0){
                       
                            // Ajout des informations de l'élève dans le tableau $liste
                        $liste_classements_eleve_regional[$compteur] = [
                            'id_eleve'=> $souss->id,
                            'note' => $souss->note,
                            
                        ];
                        $compteur++;
                    }else{
                        continue;
                    }
                }
                // Tri du tableau par note en ordre décroissant de classement regional
                usort($liste_classements_eleve_regional, function($a, $b) {
                    return $b['note'] - $a['note'];
                    });

                // determiner le classements de l'eleve
             
            foreach ($liste_classements_eleve_regional as $index => $liste_classements_eleve_regionals) {
                if ($liste_classements_eleve_regionals['id_eleve'] == $id) {
                    // Utilisez $index ici pour accéder à l'indice de l'élément
                    $classement_regional=$indice;
                    
                }
                $indice++;
            }
                $compteur=0;
                $indice=0;
                 
              

                // Fin Traitement de classement regional



                $recup_detail_eleve_count=Eleve::all()->where('Numero_Candidat',$verifie_id->Numero_Candidat)->count();
                if($recup_detail_eleve_count!=0){
                    $recup_detail_eleve=Eleve::all()->where('Numero_Candidat',$verifie_id->Numero_Candidat)->first();
                    $recup_resultat_eleve=Resultat::where('eleve_id',$recup_detail_eleve->id)->first();
                    $recup_ecole=Centre::where('id',$recup_detail_eleve->centre_id)->first();
                    $recup_region=Region::where('id',$recup_ecole->region_id)->first();
        
                    $liste[0] = [
                        'nom' => $recup_detail_eleve->Nom,
                        'matricule'=>$recup_detail_eleve->Numero_Candidat,
                        'serie'=>$recup_detail_eleve->serie->serie,
                        'prenom' => $recup_detail_eleve->Prenom,
                        'note'=>$recup_resultat_eleve->note,
                        'centre'=>$recup_ecole->Nom_Centre,
                        'region'=>$recup_region->Nom_Region,
                        'rang_national'=>$classement,
                        'rang_regional'=>$classement_regional,
                        'major'=>$verifie_major,
                    ];
                }else{
                    dd('faute 3');
                }
             }else{
                dd('faute 1');
             }
       
                       
       
        return view('Espace.view',compact('liste'));
    }



    public function getRegionEspace($id)
    {
    
        $html=" ";
        // $rid = $request->post('rid');
        // $countries= DB::table('countries')->where('region_id', $rid)->get();
        // dd($countries);
        
        $sous= SerieRegion::where('serie_id', $id)->get();
        
        

        $html .= '
        <div class="form-group">
            <select class="form-group" style="width:100%; height:35px;background-color: aqua;color:black;" name="region_id" id="region2">
                <option style="height:30px;font-size:14px;">Choisi une région</option>';
    
    foreach($sous as $souss) {
            $list_ticket = DB::table('eleves')
            ->join('ecoles', 'eleves.ecole_id', '=', 'ecoles.id')
            ->join('regions', 'ecoles.region_id','=','regions.id')
            
            ->where('ecoles.region_id', $souss->region->id)
            ->count();
        $html .= '<option value="' . $souss->region->id . '">' . $souss->region->Nom_Region . ' (' . $list_ticket . ')' . '</option>';
    }
    
    $html .= '
            </select>
        </div>';
    
        return response()->json($html);
    
    }




















    public function getCentreEspace($id)
    {
    
        $html=" ";
        // $rid = $request->post('rid');
        // $countries= DB::table('countries')->where('region_id', $rid)->get();
        // dd($countries);
        
        $sous= Centre::where('region_id', $id)->get();
        
 

        $html .= '
        <div class="form-group">
            <select class="form-group" style="width:100%; height:35px;background-color: aqua;color:black;" id="ecole2">
                <option style="height:30px;font-size:14px;">Choisi un centres</option>';
    
    foreach($sous as $souss) {
            $list_ticket = DB::table('centres')
            ->join('ecoles', 'ecoles.centre_id', '=', 'centres.id')
          
            ->join('eleves', 'eleves.ecole_id','=','ecoles.id')
          
            ->join('series','series.id','=','eleves.serie_id')
            ->where('centres.id', $souss->id)
            ->count();
        $html .= '<option value="' . $souss->id . '">' . $souss->Nom_Centre . ' (' . $list_ticket . ')' . '</option>';
    }
    
    $html .= '
            </select>
        </div>';
    
        return response()->json($html);
    
    }





















    public function getEcoleEspace($id)
    {
    
        $html=" ";
        // $rid = $request->post('rid');
        // $countries= DB::table('countries')->where('region_id', $rid)->get();
        // dd($countries);
        
        $sous= Jury::where('centre_id', $id)->get();
        
 

        $html .= '
        <div class="form-group">
            <select class="form-group" style="width:100%; height:35px;background-color: aqua;color:black;" id="ecole3">
                <option style="height:30px;font-size:14px;">choisi un jurie</option>';
    
    foreach($sous as $souss) {
            $list_ticket = DB::table('juries')
            ->join('centres', 'juries.centre_id', '=', 'centres.id')
          
            ->join('eleves', 'eleves.centre_id','=','centres.id')
          
            ->join('series','series.id','=','eleves.serie_id')
            ->where('juries.id', $souss->id)
            ->count();
        $html .= '<option value="' . $souss->id . '">' . "code-jury-".$souss->matricule . ' (' . $list_ticket . ')' . '</option>';
    }
    
    $html .= '
            </select>
        </div>';
    
        return response()->json($html);
    
    }



    
    public function FiltreSerie($id)
    {
    
        $html=" ";    
        $compteur=0;
        $liste=[];
        $liste_top_10=[];
        $i=1;
       $sous= Eleve::where('serie_id', $id)->get();
        
 
      foreach($sous as $souss){
        $liste_eleve_count=Resultat::all()->where('eleve_id',$souss->id)->count();
        if($liste_eleve_count!=0){
            $liste_eleve=Resultat::all()->where('eleve_id',$souss->id)->first();
            $recup_ecole=Eleve::where('id',$souss->id)->first();
            $recup_ecole2=Centre::where('id',$recup_ecole->centre->id)->first();
            $recup_region=Region::where('id',$recup_ecole2->region_id)->first();

                // Ajout des informations de l'élève dans le tableau $liste
    $liste[$compteur] = [
        'id'=>$liste_eleve->eleve->id,
        'nom' => $liste_eleve->eleve->Nom,
        'prenom' => $liste_eleve->eleve->Prenom,
        'note'=>$liste_eleve->note,
        'centre'=>$recup_ecole->centre->Nom_Centre,
        'region'=>$recup_region->Nom_Region,
    ];
      $compteur++;


        }else{
            continue;
          }
      }

      // Tri du tableau par note en ordre décroissant
usort($liste, function($a, $b) {
    return $b['note'] - $a['note'];
  });
  
  // Tableau pour stocker les 10 meilleurs élèves
  $liste_top_10 = array_slice($liste, 0, 10);
  foreach($liste_top_10 as $liste_top_10s){
    $html .= '<tr style="border-top: solid 0px transparent;">
    <td style="border-top: solid 0px transparent;">' . $i++ . '</td>
    <td colspan="4" style="border-top: solid 0px transparent; margin-top: 10%; height: 10px;">
    <strong><a href="/resulat/detail/resultat/'.$liste_top_10s['id'].'" >'. $liste_top_10s['prenom'] . ' ' . $liste_top_10s['nom'] .'</a></strong>
    <br>
        <table> <!-- Ouvrir une nouvelle table pour les lignes suivantes -->
            <tr>
                <td style="border-top: solid 0px transparent;"></td>
                <td colspan="3" style="border-top: solid 0px transparent; border-bottom: solid 0.01px black;">Moyenne<br>' . $liste_top_10s['note'] . '</td>
                <td style="border-top: solid 0px transparent; border-bottom: solid 0.01px black;">Ecole<br><span style="color: blue;">' . $liste_top_10s['centre'] . '</span></td>
                <td style="border-top: solid 0px transparent; border-bottom: solid 0.01px black;">Wilaya<br><span style="color: blue;">' . $liste_top_10s['region'] . '</span></td>
            </tr>
        </table> <!-- Fermer la table -->
    </td>
</tr>';

  }
    //     $html .= '
    //     <div class="form-group">
    //         <select class="form-control" style="height:35px;" id="ecole2">
    //             <option style="height:30px;font-size:14px;">toute les ecoles</option>';
    
    // foreach($sous as $souss) {
    //         $list_ticket = DB::table('ecoles')
    //         ->join('centres', 'ecoles.centre_id', '=', 'centres.id')
          
    //         ->join('eleves', 'eleves.ecole_id','=','ecoles.id')
          
    //         ->join('series','series.id','=','eleves.serie_id')
    //         ->where('ecoles.id', $souss->id)
    //         ->count();
    //     $html .= '<option value="' . $souss->id . '">' . $souss->Nom_Ecole . ' (' . $list_ticket . ')' . '</option>';
    // }
    
    // $html .= '
    //         </select>
    //     </div>';


    
        return response()->json($html);
    
    }

































    public function FiltreRegion($id)
    {
    
        $html=" ";    
        $compteur=0;
        $liste=[];
        $liste_top_10=[];
        $i=1;
        $sous_count= DB::table('centres')
        ->join('eleves', 'eleves.centre_id', '=', 'centres.id')
        ->join('regions', 'centres.region_id','=','regions.id')
        ->join('resultats','resultats.eleve_id','=','eleves.id')
        ->select('eleves.Nom','eleves.Prenom','regions.Nom_Region','centres.Nom_Centre','resultats.note')
        ->where('centres.region_id', $id)
        ->count();


       
      
        
  if($sous_count!=0){
    $sous= DB::table('centres')
    ->join('eleves', 'eleves.centre_id', '=', 'centres.id')
    ->join('regions', 'centres.region_id','=','regions.id')
    ->join('resultats','resultats.eleve_id','=','eleves.id')
    ->select('eleves.Nom','eleves.id','eleves.Prenom','regions.Nom_Region','centres.Nom_Centre','resultats.note')
    ->where('centres.region_id', $id)
    ->get();
 
    foreach($sous as $souss){
       

                // Ajout des informations de l'élève dans le tableau $liste
    $liste[$compteur] = [
        'id'=>$souss->id,
        'nom' => $souss->Nom,
        'prenom' => $souss->Prenom,
        'note'=>$souss->note,
        'centre'=>$souss->Nom_Centre,
        'region'=>$souss->Nom_Region,
    ];
      $compteur++;


        
      }

      // Tri du tableau par note en ordre décroissant
usort($liste, function($a, $b) {
    return $b['note'] - $a['note'];
  });
  
  // Tableau pour stocker les 10 meilleurs élèves
  $liste_top_10 = array_slice($liste, 0, 10);
  foreach($liste_top_10 as $liste_top_10s){
    $html .= '<tr style="border-top: solid 0px transparent;">
    <td style="border-top: solid 0px transparent;">' . $i++ . '</td>
    <td colspan="4" style="border-top: solid 0px transparent; margin-top: 10%; height: 10px;">
    <strong><a href="/resulat/detail/resultat/'.$liste_top_10s['id'].'" >'. $liste_top_10s['prenom'] . ' ' . $liste_top_10s['nom'] .'</a></strong><br>
        <table> <!-- Ouvrir une nouvelle table pour les lignes suivantes -->
            <tr>
                <td style="border-top: solid 0px transparent;"></td>
                <td colspan="3" style="border-top: solid 0px transparent; border-bottom: solid 0.01px black;">Moyenne<br>' . $liste_top_10s['note'] . '</td>
                <td style="border-top: solid 0px transparent; border-bottom: solid 0.01px black;">Centre<br><span style="color: blue;">' . $liste_top_10s['centre'] . '</span></td>
                <td style="border-top: solid 0px transparent; border-bottom: solid 0.01px black;">Region<br><span style="color: blue;">' . $liste_top_10s['region'] . '</span></td>
            </tr>
        </table> <!-- Fermer la table -->
    </td>
</tr>';

  }
  }
    //     $html .= '
    //     <div class="form-group">
    //         <select class="form-control" style="height:35px;" id="ecole2">
    //             <option style="height:30px;font-size:14px;">toute les ecoles</option>';
    
    // foreach($sous as $souss) {
    //         $list_ticket = DB::table('ecoles')
    //         ->join('centres', 'ecoles.centre_id', '=', 'centres.id')
          
    //         ->join('eleves', 'eleves.ecole_id','=','ecoles.id')
          
    //         ->join('series','series.id','=','eleves.serie_id')
    //         ->where('ecoles.id', $souss->id)
    //         ->count();
    //     $html .= '<option value="' . $souss->id . '">' . $souss->Nom_Ecole . ' (' . $list_ticket . ')' . '</option>';
    // }
    
    // $html .= '
    //         </select>
    //     </div>';


    
        return response()->json($html);
    
    }













































    public function FiltreCentre($id)
    {
    
        $html=" ";    
        $compteur=0;
        $liste=[];
        $liste_top_10=[];
        $i=1;
        $sous_count= DB::table('eleves')
     
        ->join('centres', 'eleves.centre_id', '=', 'centres.id')
        ->join('regions', 'centres.region_id','=','regions.id')
        ->join('resultats','resultats.eleve_id','=','eleves.id')
        ->select('eleves.Nom','eleves.Prenom','regions.Nom_Region','centres.Nom_Centre','resultats.note')
        ->where('eleves.centre_id', $id)
        ->count();


       
      
        
  if($sous_count!=0){
    $sous= DB::table('eleves')
    ->join('centres', 'eleves.centre_id', '=', 'centres.id')
        ->join('regions', 'centres.region_id','=','regions.id')
        ->join('resultats','resultats.eleve_id','=','eleves.id')
        ->select('eleves.id','eleves.Nom','eleves.Prenom','regions.Nom_Region','centres.Nom_Centre','resultats.note')
        ->where('eleves.centre_id', $id)
    ->get();
 
    foreach($sous as $souss){
       

                // Ajout des informations de l'élève dans le tableau $liste
    $liste[$compteur] = [
        'id'=>$souss->id,
        'nom' => $souss->Nom,
        'prenom' => $souss->Prenom,
        'note'=>$souss->note,
        'centre'=>$souss->Nom_Centre,
        'region'=>$souss->Nom_Region,
    ];
      $compteur++;


        
      }

      // Tri du tableau par note en ordre décroissant
usort($liste, function($a, $b) {
    return $b['note'] - $a['note'];
  });
  
  // Tableau pour stocker les 10 meilleurs élèves
  $liste_top_10 = array_slice($liste, 0, 10);
  foreach($liste_top_10 as $liste_top_10s){
    $html .= '<tr style="border-top: solid 0px transparent;">
    <td style="border-top: solid 0px transparent;">' . $i++ . '</td>
    <td colspan="4" style="border-top: solid 0px transparent; margin-top: 10%; height: 10px;">
    <strong><a href="/resulat/detail/resultat/'.$liste_top_10s['id'].'" >'. $liste_top_10s['prenom'] . ' ' . $liste_top_10s['nom'] .'</a></strong><br>
        <table> <!-- Ouvrir une nouvelle table pour les lignes suivantes -->
            <tr>
                <td style="border-top: solid 0px transparent;"></td>
                <td colspan="3" style="border-top: solid 0px transparent; border-bottom: solid 0.01px black;">Moyenne<br>' . $liste_top_10s['note'] . '</td>
                <td style="border-top: solid 0px transparent; border-bottom: solid 0.01px black;">Centre<br><span style="color: blue;">' . $liste_top_10s['centre'] . '</span></td>
                <td style="border-top: solid 0px transparent; border-bottom: solid 0.01px black;">Region<br><span style="color: blue;">' . $liste_top_10s['region'] . '</span></td>
            </tr>
        </table> <!-- Fermer la table -->
    </td>
</tr>';

  }
  }
    //     $html .= '
    //     <div class="form-group">
    //         <select class="form-control" style="height:35px;" id="ecole2">
    //             <option style="height:30px;font-size:14px;">toute les ecoles</option>';
    
    // foreach($sous as $souss) {
    //         $list_ticket = DB::table('ecoles')
    //         ->join('centres', 'ecoles.centre_id', '=', 'centres.id')
          
    //         ->join('eleves', 'eleves.ecole_id','=','ecoles.id')
          
    //         ->join('series','series.id','=','eleves.serie_id')
    //         ->where('ecoles.id', $souss->id)
    //         ->count();
    //     $html .= '<option value="' . $souss->id . '">' . $souss->Nom_Ecole . ' (' . $list_ticket . ')' . '</option>';
    // }
    
    // $html .= '
    //         </select>
    //     </div>';


    
        return response()->json($html);
    
    }


























    
    public function FiltreEcole($id)
    {
    
        $html=" ";    
        $compteur=0;
        $liste=[];
        $liste_top_10=[];
        $i=1;
        $sous_count= DB::table('eleves')
        ->join('juries', 'eleves.jurie_id', '=', 'juries.id')
        ->join('centres','centres.id','=','eleves.centre_id')
        ->join('regions', 'centres.region_id','=','regions.id')
        ->join('resultats','resultats.eleve_id','=','eleves.id')
        ->select('eleves.Nom','eleves.Prenom','regions.Nom_Region','centres.Nom_Centre','resultats.note')
        ->where('eleves.jurie_id', $id)
        ->count();


       
      
        
  if($sous_count!=0){
    $sous= DB::table('eleves')
    ->join('juries', 'eleves.jurie_id', '=', 'juries.id')
    ->join('centres','centres.id','=','eleves.centre_id')
    ->join('regions', 'centres.region_id','=','regions.id')
    ->join('resultats','resultats.eleve_id','=','eleves.id')
    ->select('eleves.id','eleves.Nom','eleves.Prenom','regions.Nom_Region','centres.Nom_Centre','resultats.note')
    ->where('eleves.jurie_id', $id)
    ->get();
 
    foreach($sous as $souss){
       

                // Ajout des informations de l'élève dans le tableau $liste
    $liste[$compteur] = [
        'id'=>$souss->id,
        'nom' => $souss->Nom,
        'prenom' => $souss->Prenom,
        'note'=>$souss->note,
        'centre'=>$souss->Nom_Centre,
        'region'=>$souss->Nom_Region,
    ];
      $compteur++;


        
      }

      // Tri du tableau par note en ordre décroissant
usort($liste, function($a, $b) {
    return $b['note'] - $a['note'];
  });
  
  // Tableau pour stocker les 10 meilleurs élèves
  $liste_top_10 = array_slice($liste, 0, 10);
  foreach($liste_top_10 as $liste_top_10s){
    $html .= '<tr style="border-top: solid 0px transparent;">
    <td style="border-top: solid 0px transparent;">' . $i++ . '</td>
    <td colspan="4" style="border-top: solid 0px transparent; margin-top: 10%; height: 10px;">
    <strong><a href="/resulat/detail/resultat/'.$liste_top_10s['id'].'" >'. $liste_top_10s['prenom'] . ' ' . $liste_top_10s['nom'] .'</a></strong><br>
        <table> <!-- Ouvrir une nouvelle table pour les lignes suivantes -->
            <tr>
                <td style="border-top: solid 0px transparent;"></td>
                <td colspan="3" style="border-top: solid 0px transparent; border-bottom: solid 0.01px black;">Moyenne<br>' . $liste_top_10s['note'] . '</td>
                <td style="border-top: solid 0px transparent; border-bottom: solid 0.01px black;">Centre<br><span style="color: blue;">' . $liste_top_10s['centre'] . '</span></td>
                <td style="border-top: solid 0px transparent; border-bottom: solid 0.01px black;">Region<br><span style="color: blue;">' . $liste_top_10s['region'] . '</span></td>
            </tr>
        </table> <!-- Fermer la table -->
    </td>
</tr>';

  }
  }
    //     $html .= '
    //     <div class="form-group">
    //         <select class="form-control" style="height:35px;" id="ecole2">
    //             <option style="height:30px;font-size:14px;">toute les ecoles</option>';
    
    // foreach($sous as $souss) {
    //         $list_ticket = DB::table('ecoles')
    //         ->join('centres', 'ecoles.centre_id', '=', 'centres.id')
          
    //         ->join('eleves', 'eleves.ecole_id','=','ecoles.id')
          
    //         ->join('series','series.id','=','eleves.serie_id')
    //         ->where('ecoles.id', $souss->id)
    //         ->count();
    //     $html .= '<option value="' . $souss->id . '">' . $souss->Nom_Ecole . ' (' . $list_ticket . ')' . '</option>';
    // }
    
    // $html .= '
    //         </select>
    //     </div>';


    
        return response()->json($html);
    
    }





















































































    public function DetailRecherche(Request $request)
    {
        
        $liste=[];
        $compteur=1;
        $liste_classements_eleve=[];
        $liste_classements_eleve_regional=[];
        $classement=0;
        $classement_regional=0;
        $indice=1;
        $verifie_major=false;
         $existe_eleve_count=Eleve::where('Numero_Candidat',$request->candidat)->count();

         if($existe_eleve_count!=0){
            $existe_eleve=Eleve::where('Numero_Candidat',$request->candidat)->first();
            $verifie_id_count=Eleve::all()->where('id',$existe_eleve->id)->count();
            if($verifie_id_count!=0){
               $verifie_id=Eleve::all()->where('id',$existe_eleve->id)->first();
               // Reperation totale liste des eleves pour traiter le classements de eleve
                // Debut de traitement classement national
               $recup_total_eleve=Eleve::all()->where('serie_id',$verifie_id->serie_id);
               foreach($recup_total_eleve as $recup_total_eleves){
                   $liste_eleve_count=Resultat::all()->where('eleve_id',$recup_total_eleves->id)->count();
                   if($liste_eleve_count!=0){
                       $liste_eleve=Resultat::all()->where('eleve_id',$recup_total_eleves->id)->first();
                           // Ajout des informations de l'élève dans le tableau $liste
                       $liste_classements_eleve[$compteur] = [
                           'id_eleve'=> $liste_eleve->eleve_id,
                           'note' => $liste_eleve->note,
                           
                       ];
                       $compteur++;
                   }else{
                       continue;
                   }
               }

               // Tri du tableau par note en ordre décroissant
               usort($liste_classements_eleve, function($a, $b) {
               return $b['note'] - $a['note'];
               });

               // determiner le classements de l'eleve
            
               foreach ($liste_classements_eleve as $index => $liste_classements_eleves) {
                   if ($liste_classements_eleves['id_eleve'] == $existe_eleve->id) {
                       // Utilisez $index ici pour accéder à l'indice de l'élément
                       $classement=$indice;
                       if($liste_classements_eleves['note']>=10 &&  $classement<=3){
                           $verifie_major=true;
                       }
                      
                   }
                   $indice++;
               }
               $compteur=0;
               $indice=1;
               // Fin Traitement de classement national 


               // Debut traitement de classement regional
               $recup_ecole_region=Centre::all()->where('id',$verifie_id->centre_id)->first();
               $sous= DB::table('eleves')
               ->join('centres', 'eleves.centre_id', '=', 'centres.id')
               ->join('series','eleves.serie_id','=','series.id')
               ->join('regions', 'centres.region_id','=','regions.id')
               ->join('resultats','resultats.eleve_id','=','eleves.id')
               ->select('eleves.id','resultats.note')
               ->where('regions.id', $recup_ecole_region->region->id)
               ->where('series.id',$verifie_id->serie_id)
               ->get();
                    
               foreach($sous as $souss){
                   if($liste_eleve_count!=0){
                      
                           // Ajout des informations de l'élève dans le tableau $liste
                       $liste_classements_eleve_regional[$compteur] = [
                           'id_eleve'=> $souss->id,
                           'note' => $souss->note,
                           
                       ];
                       $compteur++;
                   }else{
                       continue;
                   }
               }
               // Tri du tableau par note en ordre décroissant de classement regional
               usort($liste_classements_eleve_regional, function($a, $b) {
                   return $b['note'] - $a['note'];
                   });

               // determiner le classements de l'eleve
            
           foreach ($liste_classements_eleve_regional as $index => $liste_classements_eleve_regionals) {
               if ($liste_classements_eleve_regionals['id_eleve'] == $existe_eleve->id) {
                   // Utilisez $index ici pour accéder à l'indice de l'élément
                   $classement_regional=$indice;
                   
               }
               $indice++;
           }
               $compteur=0;
               $indice=0;
                
             

               // Fin Traitement de classement regional



               $recup_detail_eleve_count=Eleve::all()->where('Numero_Candidat',$verifie_id->Numero_Candidat)->count();
               if($recup_detail_eleve_count!=0){
                   $recup_detail_eleve=Eleve::all()->where('Numero_Candidat',$verifie_id->Numero_Candidat)->first();
                   $recup_resultat_eleve=Resultat::where('eleve_id',$recup_detail_eleve->id)->first();
                   $recup_ecole=Centre::where('id',$recup_detail_eleve->centre_id)->first();
                   $recup_region=Region::where('id',$recup_ecole->region_id)->first();
       
                   $liste[0] = [
                       'nom' => $recup_detail_eleve->Nom,
                       'matricule'=>$recup_detail_eleve->Numero_Candidat,
                       'serie'=>$recup_detail_eleve->serie->serie,
                       'prenom' => $recup_detail_eleve->Prenom,
                       'note'=>$recup_resultat_eleve->note,
                       'centre'=>$recup_ecole->Nom_Centre,
                       'region'=>$recup_region->Nom_Region,
                       'rang_national'=>$classement,
                       'rang_regional'=>$classement_regional,
                       'major'=>$verifie_major,
                   ];
               }else{
                   dd('faute 3');
               }
            }else{
               dd('faute 1');
            }
      
                      
      
       return view('Espace.view',compact('liste'));
         }else{
            return view('Espace.Error',compact('liste'));
         }
    }
}
