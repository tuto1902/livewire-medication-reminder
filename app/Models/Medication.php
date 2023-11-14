<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Medication extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'dosage',
        'type',
        'interval',
        'times',
    ];

    protected $casts = [
        'times' => 'array',
    ];

    // public function times(): HasMany
    // {
    //     return $this->hasMany(MedicationTime::class);
    // }
}
