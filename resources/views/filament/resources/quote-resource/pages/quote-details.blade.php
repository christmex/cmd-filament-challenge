<x-filament-panels::page>
    <div class="flex gap-2 justify-center flex-col lg:flex-row">

        <!-- Service Summary -->
        <div class="bg-white border rounded-lg p-4 shadow-sm w-full">
            <h2 class="font-semibold text-lg mb-4">Service Details</h2>
            <ul class="text-sm text-gray-700 space-y-2">
                <li class="flex gap-2">
                    <span class="font-bold">Service Type:</span> 
                    <x-filament::badge size="xs" color="{{ $record->service_type->color() }}" class="inline-block px-2">
                        {{ $record->service_type }}
                    </x-filament::badge>
                </li>
                <li class="flex gap-2">
                    <span class="font-bold">Status:</span> 
                    <x-filament::badge size="xs" color="{{ $record->status->color() }}" class="inline-block px-2">
                        {{ $record->status }}
                    </x-filament::badge>
                </li>
                <li><span class="font-bold">Booking Date:</span> {{ $record->booking_date }}</li>
                <li><span class="font-bold">Finish Estimate:</span> {{ $record->booking_date }}</li>
                <li><span class="font-bold">Duration:</span> {{ $record->duration }} hour(s)</li>
                <li><span class="font-bold">Price:</span> ${{ number_format($record->price) }}</li>
                @if ($record->rejection_reason)
                <li class="text-red-500"><span class="font-bold">Rejection Reason:</span> {{ $record->rejection_reason }}</li>
                @endif
                <li><span class="font-bold">Notes:</span> {{ $record->notes ?: '-' }}</li>
            </ul>
        </div>

        <!-- Customer Info -->
        <div class="bg-white border rounded-lg p-4 shadow-sm space-y-2 w-full">
            <h2 class="font-semibold text-lg mb-4">Customer Info</h2>
            <p class="text-sm text-gray-700"><span class="font-bold">Name:</span> {{ $record->name }}</p>
            <p class="text-sm text-gray-700"><span class="font-bold">Email:</span> {{ $record->email }}</p>
            <p class="text-sm text-gray-700"><span class="font-bold">Phone:</span> {{ $record->phone }}</p>
            <p class="text-sm text-gray-700"><span class="font-bold">Address:</span> {{ $record->address }}</p>
        </div>
        
    </div>
</x-filament-panels::page>
