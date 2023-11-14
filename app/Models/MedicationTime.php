<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicationTime extends Model
{
    use HasFactory;

    public $fillable = [
        'time',
        'medication_id',
    ];
}
