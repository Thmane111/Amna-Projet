<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Module;

class Tache extends Model
{
    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
