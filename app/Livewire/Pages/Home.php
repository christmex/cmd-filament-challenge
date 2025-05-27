<?php

namespace App\Livewire\Pages;

use DateTime;
use Livewire\Component;
use Filament\Forms\Form;
use App\Enums\ServiceType;
use App\Models\Quote;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Notifications\Notification;

class Home extends Component implements HasForms
{
    use InteractsWithForms;
    
    public ?array $data = [];
    
    public function mount(): void
    {
        $this->form->fill();
    }
    
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make([
                    TextInput::make('name')
                        ->required()
                        ->placeholder('Ex: John Doe'),
                    TextInput::make('email')
                        ->email()
                        ->required()
                        ->placeholder('Ex: john@gmail.com'),
                    TextInput::make('phone')
                        ->required()
                        ->columnSpanFull()
                        ,
                    Textarea::make('address')
                        ->required()
                        ->columnSpanFull(),
                    Select::make('service_type')
                        ->label('Service Type')
                        ->columnSpanFull()
                        ->required()
                        ->options(
                            collect(ServiceType::cases())->mapWithKeys(fn ($case) => [
                                $case->value => $case->label()
                            ])->toArray()
                            ),
                    DateTimePicker::make('booking_date')
                        ->required(),
                    TextInput::make('duration')
                        ->integer()
                        ->minValue(1)
                        ->required()
                        ->placeholder(1)
                        ->suffix('Hour/s'),
                    Textarea::make('notes')
                        ->columnSpanFull(),
                ])->columns(2)
            ])
            ->statePath('data');
    }
    
    public function create(): void
    {
        Quote::create($this->form->getState());
        Notification::make()
            ->title('Berhasil')
            ->success()
            ->send();

        // Reinitialize the form to clear its data.
        $this->form->fill();

    }

    public function render()
    {
        return view('livewire.pages.home');
    }
}
