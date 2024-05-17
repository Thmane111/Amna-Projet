<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Icon;
class navigation extends Model
{
    public function icon()
    {
        return $this->belongsTo(Icon::class);
    }
}
