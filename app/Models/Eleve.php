<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Niveau;
use App\Models\Ecole;
use App\Models\Serie;
use App\Models\Centre;

class Eleve extends Model
{
    use HasFactory;

    protected $fillable = [
        'CIN',
        'Numero_Candidat',
        'Nom',
        'Prenom',
        'Date_Naissance',
        'Lieu_Naissance',
        'ecole_id',
        'centre_id',
        'serie_id',
        'niveau_id',
        'jurie_id',
        'etat',
        
    ];


    public function niveau()
    {
        return $this->belongsTo(Niveau::class);
    }

    public function ecole()
    {
        return $this->belongsTo(Ecole::class);
    }

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }

    public function centre()
    {
        return $this->belongsTo(Centre::class);
    }
}

