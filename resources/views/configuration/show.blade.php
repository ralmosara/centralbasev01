<x-filament::app-layout>
    <x-filament::page-header :title="__('Example Details')">
        <!-- Additional header content can go here -->
    </x-filament::page-header>

    <x-filament::card>
        <div class="p-6">
            <h2 class="text-xl font-semibold mb-4">{{ $example->configuration }}</h2>
            <!-- Display other fields of the example record -->
        </div>
    </x-filament::card>
</x-filament::app-layout>

