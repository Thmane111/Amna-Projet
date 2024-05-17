<?php

namespace App\Models;
use App\Models\groupe;
use App\Models\Module;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acces extends Model
{
    public function groupe()
    {
        return $this->belongsTo(groupe::class);
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
