<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Staff extends Model
{
    protected $table = 'staff';
    protected $primaryKey = 'staff_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'first_name',
        'last_name',
        'role',
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    /**
     * Get appointments created by this staff member
     */
    public function createdAppointments(): HasMany
    {
        return $this->hasMany(Appointment::class, 'created_by_staff_id', 'staff_id');
    }

    /**
     * Get appointments updated by this staff member
     */
    public function updatedAppointments(): HasMany
    {
        return $this->hasMany(Appointment::class, 'updated_by_staff_id', 'staff_id');
    }
}
