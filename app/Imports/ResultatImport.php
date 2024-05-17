<?php

namespace App\Imports;

use App\Models\Resultat;
use App\Models\Eleve;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Hash;
use Illuminate\Http\Request;

class ResultatImport implements ToArray, WithHeadingRow
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
        $tab=[];
        $i=0;
        
       if($this->request->input('serie_id')==0){
        return Back()->with('error','Veuillez renseigner la serie');
       }else if(!$this->request->HasFile('file')){
        return Back()->with('error','Veuillez importer une fichier excel');
       }else{
  
        foreach($row as $rows){
        $verifie_eleve_existe_count=Eleve::all()->where('Numero_Candidat',$rows['numero'])->count();
         
        $tab[$i]=$rows['numero'];
        $i++;
        
          
  
           if($verifie_eleve_existe_count!=0){
            $verifie_eleve_existe=Eleve::all()->where('Numero_Candidat',$rows['numero'])->first();
      
            $note = $this->sanitize($rows['note']);
          // Conversion de la note en entier
// Remplacement des virgules par des points
$noteFormatted = str_replace(',', '.', $note);


Resultat::create([
    'eleve_id' => $verifie_eleve_existe->id,
    'Matiere_id' => 0,
    'note' => $noteFormatted, // Utilisation de la note convertie en entier
    'etat' => 0,
]);
        }else{



          continue ;
        }
        }
     
        return Back()->with('message','Enregistrement reussi');
      }
        
      }


      private function sanitize($value)
      {
          // Nettoyer les caractères spéciaux
          $sanitizedValue = mb_convert_encoding($value, 'UTF-8', 'UTF-8');
          return $sanitizedValue;
      }
  }
