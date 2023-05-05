<?php

namespace App\Models;

use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory , Sluggable;


    public function halls()
    {
        return $this->hasMany(Hall::class);
    }
}
