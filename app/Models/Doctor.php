<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Doctor extends Model
{
    protected $table = 'doctors';
    protected $primaryKey = 'doctor_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'first_name',
        'last_name',
        'specialty',
        'phone_number',
        'email',
    ];

    /**
     * Get appointments for this doctor
     */
    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class, 'doctor_id', 'doctor_id');
    }

    /**
     * Get availabilities for this doctor
     */
    public function availabilities(): HasMany
    {
        return $this->hasMany(Availability::class, 'doctor_id', 'doctor_id');
    }
}
