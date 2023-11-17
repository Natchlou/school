<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Devoir extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'content',
        'timetable_id'
    ];

    public function timetable(): BelongsTo
    {
        return $this->belongsTo(Timetable::class);
    }
}
