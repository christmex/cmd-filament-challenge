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

    public function actionName(): string
    {
        return match($this) {
            self::Pending => 'Mark as Pending',
            self::Approved => 'Mark as Approve',
            self::Rejected => 'Mark as Reject',
            self::Scheduled => 'Mark as Schedule',
            self::Invoiced => 'Mark as Invoice',
        };
    }

    public function color(): string
    {
        return match($this) {
            self::Pending => 'gray',
            self::Approved => 'success',
            self::Rejected => 'danger',
            self::Scheduled => 'info',
            self::Invoiced => 'primary',
        };
    }

    public function icon(): string
    {
        return match($this) {
            self::Pending   => 'heroicon-o-clock',
            self::Approved  => 'heroicon-o-check-circle',
            self::Rejected  => 'heroicon-o-x-circle',
            self::Scheduled => 'heroicon-o-calendar-days',
            self::Invoiced  => 'heroicon-o-receipt-percent',
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
