<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Timetable extends Model
{
    use HasFactory;

    protected $fillable = [
        'matiere',
        'color',
        'prof',
        'salle',
        'absent',
        'start_at',
        'end_at',
    ];

    public function devoirs(): BelongsToMany
    {
        return $this->BelongsToMany(Devoir::class);
    }
}
