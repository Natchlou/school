<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Recap extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'when',
        'is_justify',
        'user_id',
        'time'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
