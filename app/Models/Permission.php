<?php

namespace App\Models;
use App\Models\groupe;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public function groupe()
    {
        return $this->belongsTo(groupe::class);
    }
}
