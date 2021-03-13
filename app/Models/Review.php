<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends BaseModel
{
    /** @return BelongsTo  */
    public function reservation(): BelongsTo
    {
        return $this->belongsTo(Reservation::class);
    }
}
