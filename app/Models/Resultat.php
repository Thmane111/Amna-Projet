<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Eleve;

class Resultat extends Model
{
    use HasFactory;
    protected $fillable = [
        'eleve_id',
        'matiere_id',
        'note',
        'etat',
        
    ];


    public function eleve()
    {
        return $this->belongsTo(Eleve::class);
    }
}
