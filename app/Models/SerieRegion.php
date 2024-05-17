<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Serie;
use App\Models\Region;

class SerieRegion extends Model
{
    use HasFactory;

    protected $fillable = [
        'serie_id',
        'region_id',
        'etat',
   
        
    ];

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
