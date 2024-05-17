<?php

namespace App\Models;
use App\Models\Serie;
use App\Models\Centre;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jury extends Model
{
    protected $fillable = [
        'matricule',
        'nom',
        'tephone',
        'centre_id',
        'serie_id',
   
        
    ];
    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }


    public function centre()
    {
        return $this->belongsTo(Centre::class);
    }
    use HasFactory;
}
