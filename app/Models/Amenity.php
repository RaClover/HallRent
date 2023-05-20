<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Amenity extends Model
{
    use HasFactory;



    public function halls():BelongsToMany
    {
        return $this->belongsToMany(Hall::class, 'hall_amenities');
    }

}
