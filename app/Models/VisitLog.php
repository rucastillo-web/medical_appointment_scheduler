<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VisitLog extends Model
{
    protected $table = 'visit_logs';
    protected $primaryKey = 'visit_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'appointment_id',
        'visit_datetime',
        'symptoms',
        'diagnosis',
        'treatment',
    ];

    protected $casts = [
        'visit_datetime' => 'datetime',
    ];

    /**
     * Get the appointment for this visit log
     */
    public function appointment(): BelongsTo
    {
        return $this->belongsTo(Appointment::class, 'appointment_id', 'appointment_id');
    }
}
