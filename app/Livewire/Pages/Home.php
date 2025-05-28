<?php

namespace App\Livewire\Pages;

use DateTime;
use App\Models\Quote;
use Livewire\Component;
use Filament\Forms\Form;
use App\Enums\ServiceType;
use App\Mail\NewQuoteMail;
use App\Mail\UserNewQuoteMail;
use App\Mail\AdminNewQuoteMail;
use Filament\Forms\Components\Group;
use Illuminate\Support\Facades\Mail;
use Filament\Forms\Components\Select;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use DanHarrin\LivewireRateLimiting\WithRateLimiting;

class Home extends Component implements HasForms
{
    use InteractsWithForms;
    use WithRateLimiting;
    public ?array $data = [];
    
    public function mount(): void
    {
        $this->form->fill();
    }
    
    protected function getRateLimitedNotification(TooManyRequestsException $exception): ?Notification
    {
        return Notification::make()
            ->title(__('filament-panels::pages/auth/login.notifications.throttled.title', [
                'seconds' => $exception->secondsUntilAvailable,
                'minutes' => $exception->minutesUntilAvailable,
            ]))
            ->body(array_key_exists('body', __('filament-panels::pages/auth/login.notifications.throttled') ?: []) ? __('filament-panels::pages/auth/login.notifications.throttled.body', [
                'seconds' => $exception->secondsUntilAvailable,
                'minutes' => $exception->minutesUntilAvailable,
            ]) : null)
            ->danger();
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
                        ->placeholder('Ex: +61431532188')
                        ,
                    Textarea::make('address')
                        ->required()
                        ->columnSpanFull(),
                    Select::make('service_type')
                        ->columnSpanFull()
                        ->required()
                        ->options(
                            collect(ServiceType::cases())->mapWithKeys(fn ($case) => [
                                $case->value => $case->label()
                            ])->toArray()
                        ),
                    DateTimePicker::make('booking_date')
                        ->required()
                        ->format('Y-m-d H:i'),
                    TextInput::make('duration')
                        ->integer()
                        ->minValue(1)
                        ->required()
                        ->placeholder(1)
                        ->suffix('hour/s'),
                    Textarea::make('notes')
                        ->columnSpanFull()
                        ->placeholder('Give some notes...'),
                ])->columns([
                    'default' => 1,
                    'sm' => 2
                ])
            ])
            ->statePath('data');
    }
    
    
    public function create(): void
    {
        try {
            $this->rateLimit(5);
        } catch (TooManyRequestsException $exception) {
            $this->getRateLimitedNotification($exception)?->send();
            return;
        }
        
        $data = $this->form->getState();
        $record = Quote::create($data);
        Notification::make()
            ->title('Successfully create new quote')
            ->body('Please check your email to see the quote details.')
            ->success()
            ->send();

        defer(function() use($data, $record){
            Mail::to($data['email'])->send(new UserNewQuoteMail($record));
            Mail::to(config('mail.from.address'))->send(new AdminNewQuoteMail($record));
        });

        // Reinitialize the form to clear its data.
        $this->form->fill();
    }

    public function render()
    {
        return view('livewire.pages.home');
    }
}
