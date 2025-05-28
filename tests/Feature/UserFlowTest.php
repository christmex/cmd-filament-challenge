<?php 

use App\Models\Quote;
use Livewire\Livewire;
use App\Enums\ServiceType;
use App\Livewire\Pages\Home;
use App\Services\QuoteMailer;
use App\Mail\UserNewQuoteMail;
use Illuminate\Support\Facades\Mail;


test('user can access the form', function () {
    Livewire::test(Home::class)->assertStatus(200);
});

it('submitting the form sends a notification', function () {

    Livewire::test(Home::class)
        ->set('data.name', 'John Doe')
        ->set('data.email', 'john@example.com')
        ->set('data.phone', '+61431532189')
        ->set('data.address', '456 Avenue')
        ->set('data.service_type', ServiceType::Maintenance)
        ->set('data.booking_date', now()->addDays(2)->format('Y-m-d H:i'))
        ->set('data.duration', 1)
        ->set('data.notes', 'Another note')
        ->call('create')
        ->assertNotified('Successfully create new quote');
});

