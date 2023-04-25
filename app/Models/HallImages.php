<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HallImages extends Model
{
    use HasFactory;


    public function hall():BelongsTo
    {
        return $this->belongsTo(Hall::class);
    }


}
