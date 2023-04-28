<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Hall extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'description',
        'user_id',
        'address_id'
    ];


    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function address():HasOne
    {
        return $this->hasOne(Address::class);
    }
}
