<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'service_type',
        'booking_date',
        'booking_time_start',
        'booking_time_end',
        'duration',
        'notes',
        'status',
        'price',
        'rejection_reason',
    ];
}
