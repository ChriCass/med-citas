<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\BloodType;

class Patient extends Model
{
    protected $fillable = [
        'user_id',
        'blood_type_id',
        'allergies',
        'family_history',
        'chronic_conditions',
        'surgical_history',
        'observations',
        'emergency_contact_name',
        'emergency_contact_relationship',
        'emergency_contact_phone',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bloodType()
    {
        return $this->belongsTo(BloodType::class, 'blood_type_id');
    }
}
