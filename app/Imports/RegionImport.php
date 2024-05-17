<?php

namespace App\Imports;

use App\Models\Region;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Hash;
use Illuminate\Http\Request;

class RegionImport implements ToArray, WithHeadingRow
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
       
      
        foreach($row as $rows){
        $verifie=Region::all()->where('matricule',$rows['code'])

     
        ->count();
      
        
          
  
           if($verifie==0){
      



            Region::create([
             
                'matricule' => $rows['code'],
           
                'Nom_Region' => $rows['nom'],
               
              
                'etat' => 0,
            ]);
        
        }else{
         $recup_region=Region::where('matricule',$rows['code'])->first();
         $save= Region::find($recup_region->id);
         $save->Nom_Region=$rows['nom'];

        $save->matricule=$rows['code'];
     
     
         $save->update();


        
        }
        }
     
        return Back()->with('message','Enregistrement reussi');
      
        
      }


      private function sanitize($value)
      {
          // Nettoyer les caractères spéciaux
          $sanitizedValue = mb_convert_encoding($value, 'UTF-8', 'UTF-8');
          return $sanitizedValue;
      }
}
