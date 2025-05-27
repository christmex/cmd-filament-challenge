<div class="relative flex min-h-screen flex-col justify-center overflow-hidden bg-gray-50 py-6 sm:py-12">
    <img src="beams.png" alt="" class="absolute left-1/2 top-1/2 max-w-none -translate-x-1/2 -translate-y-1/2" width="1308" />
    <div class="absolute inset-0 bg-[url(https://play.tailwindcss.com/img/grid.svg)] bg-center [mask-image:linear-gradient(180deg,white,rgba(255,255,255,0))]"></div>
    
    <div class="relative bg-white px-6 py-6 shadow-xl ring-1 ring-gray-900/5 sm:mx-auto sm:max-w-lg sm:rounded-lg sm:px-6">
        <div class="mx-auto max-w-md">
            <img src="{{ asset('logo.svg') }}" class="h-10" alt="BASIC DIGITAL LOGO" />
            <div class="divide-y divide-gray-300/50">

                <div class="space-y-6 py-3 text-base leading-7 text-gray-600">
                    <p>Welcome to CMD Quoting System</p>
                    
                    <form wire:submit="check" id="form">
                        {{ $this->form }}
                        
                        <x-filament::button wire:click="create" color="success" class="mt-6 w-full font-bold">
                            Send Now
                        </x-filament::button>
                    </form>
                
                
                </div>
                {{-- <div class="pt-2 text-base font-semibold leading-7 tex-ce">
                    <p class="text-gray-900">Need help?</p>
                </div> --}}
            </div>
        </div>
    </div>

</div>