<?php

namespace App\Models;
use App\Models\Region;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ecole extends Model
{
    use HasFactory;


    protected $fillable = [
        'Matricule',
        'Nom_Ecole',
        'centre_id',
        'region_id',
        'etat',
        
    ];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
