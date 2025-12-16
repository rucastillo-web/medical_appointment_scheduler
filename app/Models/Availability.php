<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Availability extends Model
{
    protected $table = 'availabilities';
    protected $primaryKey = 'availability_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'doctor_id',
        'available_date',
        'start_time',
        'end_time',
    ];

    protected $casts = [
        'available_date' => 'date',
    ];

    /**
     * Get the doctor for this availability
     */
    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class, 'doctor_id', 'doctor_id');
    }
}
