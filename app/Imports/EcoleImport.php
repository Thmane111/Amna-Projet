<?php

namespace App\Imports;

use App\Models\Ecole;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Hash;
use Illuminate\Http\Request;

class EcoleImport implements ToArray, WithHeadingRow
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
       
       if($this->request->input('centre_id')==0){
        return Back()->with('error','Veuillez renseigner le niveau');
       }else if($this->request->input('region_id')==0){
        return Back()->with('error','Veuillez renseigner le niveau');
       }
       else if(!$this->request->HasFile('file')){
       return Back()->with('error','Veuillez renseigner le niveau');
       }else{
  
        foreach($row as $rows){
        $verifie=Ecole::all()->where('Matricule',$rows['mat'])
     
        ->count();
      
        
          
  
           if($verifie==0){
            $verifie_recup_count=Ecole::all()->where('Nom_Ecole',$rows['nom'])
            ->count();
       if($verifie_recup_count!=0){
        return Back()->with('error','Veuillez changer le nom de l\'ecole '+$rows['nom']);
       }else{
      
//             $note = $this->sanitize($rows['note']);
//           // Conversion de la note en entier
// // Remplacement des virgules par des points
// $noteFormatted = str_replace(',', '.', $note);


            Ecole::create([
             
                'centre_id' => $this->request->input('centre_id'),
                'region_id' => $this->request->input('region_id'),
                'Matricule' => $rows['mat'],
                'Nom_Ecole'=>$rows['nom'],
              
                'etat' => 0,
            ]);
        }
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
