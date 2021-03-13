<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Reservation extends BaseModel
{
    /** @return HasOne  */
    public function review(): HasOne
    {
        return $this->hasOne(Review::class);
    }

    /** @return BelongsTo  */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /** @return BelongsTo  */
    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
}
