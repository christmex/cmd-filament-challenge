<?php

namespace App\Models;

use App\Enums\QuoteStatus;
use App\Enums\ServiceType;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $casts = [
        'service_type' => ServiceType::class,
        'status' => QuoteStatus::class,
    ];
    
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'service_type',
        'booking_date',
        'duration',
        'notes',
        'status',
        'price',
        'rejection_reason',
    ];

    protected static function booted(): void
    {
        static::creating(function ($quote) {
            $quote->status = QuoteStatus::Pending;
            $quote->price = $quote->duration * $quote->service_type->price();
        });
    }
}
