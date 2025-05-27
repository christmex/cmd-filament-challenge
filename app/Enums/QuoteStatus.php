<?php

namespace App\Enums;

enum QuoteStatus: string
{
    case Pending = 'pending';
    case Approved = 'approved';
    case Rejected = 'rejected';
    case Scheduled = 'scheduled';
    case Invoiced = 'invoiced';

    public function label(): string
    {
        return match($this) {
            self::Pending => 'Pending',
            self::Approved => 'Approved',
            self::Rejected => 'Rejected',
            self::Scheduled => 'Scheduled',
            self::Invoiced => 'Invoiced',
        };
    }

    public function color(): string
    {
        return match($this) {
            self::Pending => 'gray',
            self::Approved => 'green',
            self::Rejected => 'red',
            self::Scheduled => 'blue',
            self::Invoiced => 'purple',
        };
    }

    public function canTransitionTo(self $new): bool
    {
        return match ($this) {
            self::Pending => in_array($new, [self::Approved, self::Rejected]),
            self::Approved => in_array($new, [self::Scheduled]),
            self::Scheduled => in_array($new, [self::Invoiced]),
            default => false,
        };
    }
}
