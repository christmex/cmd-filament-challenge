<div>
    
    <form wire:submit="create" class="w-full">
        {{ $this->form }}
        
        <button type="submit" class="bg-red-400 w-full">
            Book Now
        </button>
    </form>
    
    <x-filament-actions::modals />
</div>