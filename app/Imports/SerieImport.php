<?php

namespace App\Imports;

use App\Models\Serie;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Hash;
use Illuminate\Http\Request;
class SerieImport implements ToArray, WithHeadingRow
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
        $validateDate=$request->validate([
            'serie'=>'required|string',
          
            'caption'=>'required|string',


    ]);
       if($this->request->input('niveau_id')==0){
        return Back()->with('error','Veuillez renseigner le niveau');
       }else if($this->request->input('region_id')==0){
        return Back()->with('error','Veuillez renseigner le region');
       }else if(!$this->request->HasFile('file')){
        return Back()->with('error','Veuillez importer une fichier excel');
       }else{
  
        foreach($row as $rows){
        $verifie_liste_existe_count=Serie::all()->where('niveau_id',$this->request->input('niveau_id'))
        ->where('region_id',$this->request->input('region_id'))
        ->where('matricule',$rows['mat'])
        ->count();
      
        
          
  
           if($verifie_liste_existe_count!=0){
            $verifie_liste_existe_count=Serie::all()->where('niveau_id',$this->request->input('niveau_id'))
        ->where('region_id',$this->request->input('region_id'))
        ->where('matricule',$rows['mat'])
        ->first();
      
      
//             $note = $this->sanitize($rows['note']);
//           // Conversion de la note en entier
// // Remplacement des virgules par des points
// $noteFormatted = str_replace(',', '.', $note);


            Serie::create([
                'matricule' => $rows['mat'],
                'niveau_id' => $this->request->input('niveau_id'),
                'serie' => $rows['serie'],
                'Design'=>$rows['caption'],
                'region_id' => $this->request->input('region_id'),
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
