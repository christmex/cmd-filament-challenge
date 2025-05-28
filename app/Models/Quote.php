<?php

namespace App\Models;

use App\Enums\QuoteStatus;
use App\Enums\ServiceType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class Quote extends Model
{
    protected $casts = [
        'service_type' => ServiceType::class,
        'status' => QuoteStatus::class,
    ];

    protected $fillable = [
        'reference_number',
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

    protected function bookingDate(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Carbon::parse($value)->format('l, F j, Y \a\t g:i A'),
        );
    }

    protected static function booted(): void
    {
        static::creating(function ($quote) {
            $quote->reference_number = $quote->reference_number ?? self::generateReference();
            $quote->status = QuoteStatus::Pending;
            $quote->price = $quote->duration * $quote->service_type->price();
        });
    }

    public function scopeStatus(Builder $query, QuoteStatus|string $status): Builder
    {
        $statusValue = $status instanceof QuoteStatus ? $status->value : QuoteStatus::from($status)->value;

        return $query->where('status', $statusValue);
    }

    public static function generateReference(): string
    {
        return 'QUOTE-'.Str::upper(Str::ulid());
    }
}
