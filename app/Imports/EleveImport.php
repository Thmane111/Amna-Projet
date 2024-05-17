<?php

namespace App\Imports;

use App\Models\Eleve;
use App\Models\Jury;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Hash;
use Illuminate\Http\Request;

class EleveImport implements ToArray, WithHeadingRow
{
  protected $request;
  public function __construct(Request $request)
  {
      $this->request = $request;
  }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

 
    public function array(array $row)
    {
      
     if($this->request->input('region_id')==0){
      return Back()->with('error',' Erreur d\'exportation du fichier Excel Veuillez renseigner la region');
     }else if($this->request->input('centre_id')==0){
      return Back()->with('error','Veuillez renseigner le centre');
     }else if($this->request->input('niveau_id')==0){
      return Back()->with('error','Veuillez renseigner le niveau');
     }elseif($this->request->input('serie_id')==0){
      return Back()->with('error','Veuillez renseigner la serie');
     }else{

     
        // return new Eleve([
        //     'CIN'     => $row['CIN'],
        //     'Numero_Candidat'     => $row['Numero_Candidat'],
        //     'Nom'     => $row['Nom'],
        //     'Prenom'  => $row['Prenom'], 
        //     'Date_Naissance'     => $row['Date_Naissance'],
        //     'Lieu_Naissance'     => $row['Lieu_Naissance'],
        //     'ecole_id'     => $row['ecole_id'],
        //     'serie_id'     => $row['serie_id'],
        //     'niveau_id'     => $row['niveau_id'],
            
        // ]);
      foreach($row as $rows){
        $recup_serie=Jury::where('serie_id',$this->request->input('serie_id'))
        ->where('centre_id',$this->request->input('centre_id'))->first();
        
         $verifie_existe_eleve=Eleve::all()->where('Numero_Candidat','=',$rows['candidat'])
         ->where('centre_id','=',$this->request->input('centre_id'))
         ->where('serie_id','=',$this->request->input('serie_id'))
         ->where('niveau_id','=',$this->request->input('niveau_id'))->count();

         if($verifie_existe_eleve==0){
          $date_obj = \DateTime::createFromFormat('d/m/Y', $rows['date_naissance']); // Convertir la chaîne en objet DateTime
          $formatted_date = $date_obj->format('Y-m-d'); // Convertir la date dans le format AAAA-MM-JJ
         
        Eleve::create([
            'CIN'=>$rows['cin'],
            'Numero_Candidat'=>$rows['candidat'],
            'Nom'=>$rows['nom'],
            'Prenom'=>$rows['prenom'],
            'Date_Naissance'=>$formatted_date,
            'Lieu_Naissance'=>$rows['lieu_naissance'],
            'centre_id'=>$this->request->input('centre_id'),
            'serie_id'=>$this->request->input('serie_id'),
            'niveau_id'=>$this->request->input('niveau_id'),
            'jurie_id'=>$recup_serie->id,
            'etat'=>0,
        ]);
      }else{
        return Back()->with('error','Existe deja');
      }
      }
    }
      
    }
}
