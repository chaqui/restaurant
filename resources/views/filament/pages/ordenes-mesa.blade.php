<x-filament-panels::page>
    @section('title', 'Órdenes de Mesa: ' . $mesa->name)

    <div class="flex justify-end mb-4">
        <x-filament::button tag="a" href="{{ route('filament.pages.create-orden', ['mesaId' => $mesaId]) }}">
            Crear Orden
        </x-filament::button>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($ordenes as $order)
            @if($order->estado->name == 'Pagada')
                @continue
            @else
                <div class="shadow-md rounded-lg p-4">
                    <a href="#" class=" mt-4 inline-block">
                        <h3 class="text-lg font-bold mt-4 text-orange-500">{{ $order->tiempo->nombre }}</h3>
                        <p class="text-gray-500">{{ $order->estado->name }}</p>
                    </a>
                </div>
            @endif
        @endforeach
    </div>
</x-filament-panels::page>
