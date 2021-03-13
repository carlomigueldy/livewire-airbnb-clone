<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends BaseModel
{
    protected $guarded = ['created_at', 'updated_at', 'deleted_at', 'id'];

    /** @return BelongsTo  */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    /** @return HasMany  */
    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }
}
