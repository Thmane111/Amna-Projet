<?php

namespace App\Imports;

use App\Models\SerieRegion;
use App\Models\Region;
use App\Models\Serie;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Hash;
use Illuminate\Http\Request;

class SerieRegionImport implements  ToArray, WithHeadingRow
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
       
       if($this->request->input('serie_id')==0){
        return Back()->with('error','Veuillez renseigner le niveau');
       }else if(!$this->request->HasFile('file')){
        return Back()->with('error','Veuillez importer une fichier excel');
       }else{
  
        foreach($row as $rows){
            $nom = $this->sanitize($rows['nom']);
        $recup=Region::where('Nom_Region',$nom)->count();

      
        if($recup!=0){
            
            $recup1=Region::where('Nom_Region',$rows['nom'])->first();
        $verifie=SerieRegion::all()->where('region_id',$recup1->id)
        ->where('serie_id',$this->request->input('serie_id'))
        ->count();
      
        
          
  
           if($verifie==0){
            $verifie_recup=Region::all()->where('Nom_Region',$rows['nom'])
            ->first();
      
      
           


            SerieRegion::create([
             
                'serie_id' => $this->request->input('serie_id'),
                'region_id' => $verifie_recup->id,
              
                'etat' => 0,
            ]);
            
        }else{



          continue ;
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
