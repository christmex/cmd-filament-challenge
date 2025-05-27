<?php

namespace App\Filament\Resources;

use Filament\Tables;
use App\Models\Quote;
use App\Enums\QuoteStatus;
use App\Enums\ServiceType;
use Filament\Tables\Table;
use Filament\Support\RawJs;
use Filament\Resources\Resource;
use Filament\Support\Enums\IconSize;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\QuoteResource\Pages;
use Malzariey\FilamentDaterangepickerFilter\Filters\DateRangeFilter;

class QuoteResource extends Resource
{
    protected static ?string $model = Quote::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';


    public static function table(Table $table): Table
    {
        return $table
            ->deferFilters()
            ->persistColumnSearchesInSession()
            ->deferLoading()
            ->searchOnBlur()
            ->defaultSort('created_at', 'asc')
            ->paginated([10, 25, 50, 100])
            ->filtersFormColumns(2)
            ->searchPlaceholder('Search: Name|Email|Phone|Address')
            ->filtersTriggerAction(
                fn (\Filament\Tables\Actions\Action $action) => $action
                    ->button()
                    ->label('Filter'),
            )
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->copyable()
                    ->description(fn (Model $record) => $record->email)
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query->where('name', 'like', "%{$search}%")
                            ->orWhere('email', 'like', "%{$search}%");
                    }),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable()
                    ->copyable(),
                Tables\Columns\TextColumn::make('address')
                    ->searchable()
                    ->copyable(),
                Tables\Columns\TextColumn::make('service_type')
                    ->badge()
                    ->color(fn ($record) => $record->service_type->color()),
                Tables\Columns\TextColumn::make('booking_date')
                    ->dateTime('Y-m-d H:i')
                    ->sortable(),
                Tables\Columns\TextColumn::make('duration')
                    ->numeric(),
                Tables\Columns\TextColumn::make('price')
                    ->money(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('service_type')
                    ->columnSpanFull()
                    ->options(
                        collect(ServiceType::cases())->mapWithKeys(fn ($case) => [
                            $case->value => $case->label()
                        ])->toArray()
                    ),
                DateRangeFilter::make('created_at'),
                DateRangeFilter::make('booking_date'),
            ], layout: FiltersLayout::Modal)
            ->actions([
                // Tables\Actions\EditAction::make()->iconButton()->iconSize(IconSize::Small),
                // Tables\Actions\DeleteAction::make()->iconButton()->iconSize(IconSize::Small),
                Tables\Actions\Action::make(QuoteStatus::Approved->actionName())
                    ->iconButton()
                    ->tooltip(QuoteStatus::Approved->actionName())
                    ->icon(QuoteStatus::Approved->icon())
                    // ->iconSize(IconSize::Small)
                    ->requiresConfirmation()
                    ->modalIcon(QuoteStatus::Approved->icon())
                    ->color(QuoteStatus::Approved->color())
                    ->modalIconColor(QuoteStatus::Approved->color())
                    ->form([
                        TextInput::make('price')
                            ->required()
                            ->prefix('$')
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->numeric()
                            ->default(function(Quote $record){
                                return $record->price;
                            })
                            ->minValue(0)
                    ])
                    ->action(function(Quote $record, array $data){
                        $record->update(['price' => $data['price']]);
                        Notification::make()
                            ->title('Quote Approved')
                            ->body('Email sent to the user')
                            ->success()
                            ->send();
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageQuotes::route('/'),
        ];
    }
}
