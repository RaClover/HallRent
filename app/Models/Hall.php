<?php

namespace App\Models;

use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Hall extends Model
{
    use HasFactory , Sluggable;

    protected $casts = [
        'price' => 'decimal:2'
    ];
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




    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function bookings()
    {
        return $this->belongsToMany(Booking::class, 'booking_hall')
            ->withPivot(['quantity', 'unit_price'])
            ->withTimestamps();
    }


    public function images():HasMany
    {
        return $this->hasMany(HallImage::class);
    }


    public function scopeWithTypes($query, $typeSlugs)
    {
        $query->when($typeSlugs, function ($query) use ($typeSlugs) {
            $query->whereHas('type', function ($query) use ($typeSlugs) {
                if (Str::contains($typeSlugs, ',')) {
                    $query->whereIn('slug', explode(',', $typeSlugs));
                } else {
                    $query->where('slug', $typeSlugs);
                }
            });
        });
    }

    public function scopeWithMinPrice($query, $min_price)
    {
        $query->when($min_price, function ($query) use ($min_price) {
            $query->where('price', '>=', $min_price);
        });
    }

    public function scopeWithMaxPrice($query, $max_price)
    {
        $query->when($max_price, function ($query) use ($max_price) {
            $query->where('price', '<=', $max_price);
        });
    }

    public function scopeWithSearch($query, $search)
    {
        $query->when($search, function ($query) use ($search) {
            $query->where('name', 'LIKE', "%$search%");
        });
    }



    public function scopeWithSortBy($query, $sortBy)
    {
        $query->when($sortBy, function ($query) use ($sortBy) {
            switch ($sortBy) {
                case 'price_desc':
                    $query->orderBy('price', 'desc');
                    break;
                case 'price_asc':
                    $query->orderBy('price', 'asc');
                    break;
                case 'best_selling':
                    $query
                        ->selectRaw('halls.*, SUM(quantity) as best_selling')
                        ->leftJoin('order_product', 'products.id', '=', 'order_product.product_id')
                        ->groupBy('products.id')
                        ->orderBy('best_selling', 'desc');
                    break;
                default:
                    $query->orderBy('created_at', 'desc');
                    break;
            }
        });
    }


}
