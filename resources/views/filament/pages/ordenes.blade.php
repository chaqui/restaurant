<x-filament-panels::page>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($mesas as $mesa)
            <div class="shadow-md rounded-lg p-4">
                <a href="{{ route('filament.pages.ordenes-mesa', ['id' => $mesa->id]) }}" class=" mt-4 inline-block">
                    <h3 class="text-lg font-bold mt-4 text-orange-500">{{ $mesa['name'] }}</h3>
                </a>
            </div>
        @endforeach
    </div>
</x-filament-panels::page>
