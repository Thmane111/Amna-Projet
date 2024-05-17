<?php

namespace App\Imports;

use App\Models\Centre;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Hash;
use Illuminate\Http\Request;

class CentreImport implements ToArray, WithHeadingRow
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
        return Back()->with('error','Veuillez renseigner le niveau');
       
       }else{
  
        foreach($row as $rows){
        $verifie=Centre::all()->where('matricule',$rows['matricule'])
     
        ->count();
      
        
          
  
           if($verifie==0){
      



            Centre::create([
             
                'matricule' => $rows['matricule'],
                'region_id' => $this->request->input('region_id'),
                'Nom_Centre' => $rows['centre'],
               
              
                'etat' => 0,
            ]);
        
        }else{
         $recup_centre=Centre::where('matricule',$rows['matricule'])->first();
         $save= Centre::find($recup_centre->id);
         $save->Nom_Centre=$rows['centre'];
         $save->region_id=$this->request->input('region_id');
        $save->matricule=$rows['matricule'];
     
     
         $save->update();


        
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
