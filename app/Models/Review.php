<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'hall_id',
        'user_id',
        'comment',
        'rating',
    ];

    public function hall():BelongsTo
    {
        return $this->belongsTo(Hall::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
