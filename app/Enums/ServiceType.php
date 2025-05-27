<?php

namespace App\Enums;

enum ServiceType: string
{
    case Cleaning = 'cleaning';
    case Maintenance = 'maintenance';
    case Inspections = 'inspections';

    public function label(): string
    {
        return match($this) {
            self::Cleaning => 'Cleaning',
            self::Maintenance => 'Maintenance',
            self::Inspections => 'Inspections',
        };
    }

    public function price(): int
    {
        return match($this) {
            self::Cleaning => 40,
            self::Maintenance => 50,
            self::Inspections => 70,
        };
    }
}
