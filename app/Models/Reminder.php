<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reminder extends Model
{
    protected $table = 'reminders';
    protected $primaryKey = 'reminder_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'appointment_id',
        'reminder_datetime',
        'reminder_type',
        'status',
    ];

    protected $casts = [
        'reminder_datetime' => 'datetime',
    ];

    /**
     * Get the appointment for this reminder
     */
    public function appointment(): BelongsTo
    {
        return $this->belongsTo(Appointment::class, 'appointment_id', 'appointment_id');
    }
}
