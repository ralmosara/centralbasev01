<x-filament-panels::layout.base>
    <div class="min-h-screen bg-gray-100 relative">
        <!-- Top Left Logo -->
        <div class="absolute top-4 left-4">
            <img src="{{ asset('path/to/your/left-logo.png') }}" alt="Left Logo" class="h-12 w-auto">
        </div>

        <!-- Top Right Logo -->
        <div class="absolute top-4 right-4">
            <img src="{{ asset('path/to/your/right-logo.png') }}" alt="Right Logo" class="h-12 w-auto">
        </div>

        <div class="flex min-h-screen items-center justify-center">
            <div class="w-full max-w-md">
                <div class="rounded-lg bg-white p-8 shadow-md">
                    <h2 class="mb-2 text-center text-2xl font-bold text-gray-900">
                        {{-- {{ $this->getHeading() }} --}}
                    </h2>
                    <p class="mb-6 text-center text-sm text-gray-600">
                        {{-- {{ $this->getSubheading() }} --}}
                    </p>

       
                </div>
            </div>
        </div>
    </div>
</x-filament-panels::layout.base>