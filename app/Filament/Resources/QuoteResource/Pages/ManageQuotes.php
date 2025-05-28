<?php

namespace App\Filament\Resources\QuoteResource\Pages;

use App\Enums\QuoteStatus;
use App\Filament\Resources\QuoteResource;
use App\Models\Quote;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ManageRecords;
use Illuminate\Database\Eloquent\Builder;

class ManageQuotes extends ManageRecords
{
    protected static string $resource = QuoteResource::class;

    public function getHeading(): string|\Illuminate\Contracts\Support\Htmlable
    {
        return 'Quote Management';
    }

    public function getSubheading(): ?string
    {
        return 'Track, review, and schedule incoming service quotes';

    }

    public function getTabs(): array
    {
        $tabs = [];

        foreach (QuoteStatus::cases() as $case) {
            $tabs[$case->value] = Tab::make($case->label()) // optional custom label
                ->icon($case->icon())
                ->badge(Quote::query()->where('status', $case->value)->count())
                ->badgeColor('warning')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', $case->value));
        }

        return $tabs;
    }
}
