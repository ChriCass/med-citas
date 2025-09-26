<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Patient;

class BloodType extends Model
{
    /**
     * Relación uno a muchos con Patient.
     */
    public function patients()
    {
        return $this->hasMany(Patient::class);
    }
}
