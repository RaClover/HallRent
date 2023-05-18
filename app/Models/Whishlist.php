<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\Pivot;

    class Whishlist extends Pivot
    {
        protected $table = 'whishlists';

        /**
         * @param Hall $Hall
         * @return void
         */
        public static function toggle(Hall $hall): void
        {
            $hallInWhishlist = auth()->user()->whishlist()
                ->wherePivot('hall_id', $hall->id)
                ->first();

            if (!$hallInWhishlist) {
                auth()->user()->whishlist()->attach($hall->id);
            } else {
                auth()->user()->whishlist()->detach($hall->id);
            }
        }

        public static function getContent(): Collection
        {
            return auth()->user()->whishlist;
        }

        /**
         * @param Hall $hall
         * @return void
         */
        public static function moveToCart(Hall $hall): void
        {
            auth()->user()->cart()->attach($hall->id, ['quantity' => 1]);
            auth()->user()->whishlist()->detach($hall->id);
        }

        public static function empty(): void
        {
            auth()->user()->whishlist()->detach();
        }

        public function hall(): BelongsTo
        {
            return $this->belongsTo(Hall::class);
        }

    }
