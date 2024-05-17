<?php

namespace App\Models;
use App\Models\Admin;
use App\Models\groupe;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribution extends Model
{
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function groupe()
    {
        return $this->belongsTo(groupe::class);
    }
}
