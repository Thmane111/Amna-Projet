<?php

namespace App\Imports;

use App\Models\Jury;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Hash;
use Illuminate\Http\Request;

class JuryImport implements ToArray, WithHeadingRow
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
       
       }elseif($this->request->input('centre_id')==0){
        return Back()->with('error','Veuillez renseigner le centre');
       }elseif($this->request->input('serie_id')==0){
        return Back()->with('error','Veuillez renseigner la serie');
       }else{

        foreach($row as $rows){
        $verifie=Jury::all()->where('matricule',$rows['matricule'])
     
        ->count();
      
        
          
  
           if($verifie==0){
      



            Jury::create([
             
                'matricule' => $rows['matricule'],
                'centre_id' => $this->request->input('centre_id'),
                'serie_id' => $this->request->input('serie_id'),
                'nom' => $rows['jury'],
             
            ]);
        
        }else{
         $recup_jury=Jury::where('matricule',$rows['matricule'])->first();
         $save= Jury::find($recup_jury->id);
         $save->nom=$rows['jury'];
         $save->centre_id=$this->request->input('centre_id');
         $save->serie_id=$this->request->input('serie_id');
        $save->telephone=$rows['telephone'];
     
     
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
