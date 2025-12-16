<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Appointment extends Model
{
    protected $table = 'appointments';
    protected $primaryKey = 'appointment_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'created_by_staff_id',
        'updated_by_staff_id',
        'appointment_datetime',
        'status',
        'notes',
    ];

    protected $casts = [
        'appointment_datetime' => 'datetime',
    ];

    /**
     * Get the patient for this appointment
     */
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'patient_id');
    }

    /**
     * Get the doctor for this appointment
     */
    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class, 'doctor_id', 'doctor_id');
    }

    /**
     * Get the staff who created this appointment
     */
    public function createdByStaff(): BelongsTo
    {
        return $this->belongsTo(Staff::class, 'created_by_staff_id', 'staff_id');
    }

    /**
     * Get the staff who last updated this appointment
     */
    public function updatedByStaff(): BelongsTo
    {
        return $this->belongsTo(Staff::class, 'updated_by_staff_id', 'staff_id');
    }

    /**
     * Get visit logs for this appointment
     */
    public function visitLogs(): HasMany
    {
        return $this->hasMany(VisitLog::class, 'appointment_id', 'appointment_id');
    }

    /**
     * Get reminders for this appointment
     */
    public function reminders(): HasMany
    {
        return $this->hasMany(Reminder::class, 'appointment_id', 'appointment_id');
    }
}
