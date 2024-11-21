<x-filament-panels::page>
    @section('title', 'Crear Orden')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($productos as $producto)

                <x-filament::button class="text-lg font-bold px-4 py-2" wire:click="addProduct({{ $producto->id }})">
                    <h3 class="text-lg font-bold mt-4 text-orange-500">{{ $producto->nombre }}</h3>
                    <p class="text-gray-500"> Q. {{ $producto->precio }}.00</p>
                </x-filament::button>

        @endforeach
    </div>

        <div class="overflow-x-auto">
            <table class="min-w-full ">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b border-gray-200 bg-gray-100">Producto</th>
                        <th class="py-2 px-4 border-b border-gray-200 bg-gray-100">Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ordenesProducto as $producto)
                        <tr>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $producto->producto->nombre }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $producto->cantidad }}</td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
</x-filament-panels::page>
