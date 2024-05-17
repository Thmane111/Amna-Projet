<?php

namespace App\Models;
use App\Models\Region;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Centre extends Model
{
    
    protected $fillable = [
        'matricule',
        'Nom_Centre',
        'region_id',
        'etat',
        
    ];
    use HasFactory;


    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
