<?php

namespace App\Filament\Resources\QuoteResource\Pages;

use Filament\Actions;
use Illuminate\Support\Js;
use Filament\Resources\Pages\Page;
use App\Filament\Resources\QuoteResource;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;

class QuoteDetails extends Page
{
    use InteractsWithRecord;

    protected static string $resource = QuoteResource::class;

    protected static string $view = 'filament.resources.quote-resource.pages.quote-details';
    
    public function mount(int | string $record): void
    {
        $this->record = $this->resolveRecord($record);
    }

    public function getHeading(): string|\Illuminate\Contracts\Support\Htmlable
    {
        return $this->record->reference_number;
    }

    public function getSubheading(): ?string
    {
        return 'Created at '.$this->record->created_at->diffForHumans();

    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('back')
                ->label('Back to list')
                ->alpineClickHandler('document.referrer ? window.history.back() : (window.location.href = ' . Js::from($this->previousUrl ?? static::getResource()::getUrl()) . ')')
                ->color('gray'),
        ];
    }
}
