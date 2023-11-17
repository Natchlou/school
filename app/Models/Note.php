<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'note',
        'date',
        'timetable_id',
        'coeff'
    ];

    public function timetable(): BelongsTo
    {
        return $this->belongsTo(Timetable::class);
    }
}
