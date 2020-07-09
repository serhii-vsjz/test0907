<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contact extends Model
{
    private function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
