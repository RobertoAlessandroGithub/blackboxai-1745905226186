@extends('layout')

@section('title', 'Menu - Mie Gacoan Self Service')

@section('content')
<div class="max-w-4xl mx-auto">
    <h2 class="text-3xl font-semibold mb-6">Menu</h2>

    <form id="orderForm" action="{{ route('order.place') }}" method="POST" class="space-y-6">
        @csrf
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            @foreach ($menuItems as $item)
            <div class="bg-white rounded-lg shadow p-4 flex flex-col">
                @if($item->image_url)
                <img src="{{ $item->image_url }}" alt="{{ $item->name }}" class="w-full h-40 object-cover rounded mb-4" />
                @else
                <div class="w-full h-40 bg-gray-200 rounded mb-4 flex items-center justify-center text-gray-400">
                    <i class="fas fa-image fa-3x"></i>
                </div>
                @endif
                <h3 class="text-xl font-semibold mb-2">{{ $item->name }}</h3>
                <p class="text-gray-600 mb-4 flex-grow">{{ $item->description }}</p>
                <div class="flex items-center justify-between">
                    <span class="font-bold text-lg">Rp {{ number_format($item->price, 0, ',', '.') }}</span>
                    <input type="number" name="items[{{ $item->id }}][quantity]" min="0" value="0" class="w-20 border rounded px-2 py-1" />
                    <input type="hidden" name="items[{{ $item->id }}][menu_item_id]" value="{{ $item->id }}" />
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-8 bg-white p-4 rounded shadow">
            <h3 class="text-xl font-semibold mb-4">Customer Information (Optional)</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="customer_name" class="block font-medium mb-1">Name</label>
                    <input type="text" id="customer_name" name="customer_name" class="w-full border rounded px-3 py-2" />
                </div>
                <div>
                    <label for="customer_phone" class="block font-medium mb-1">Phone</label>
                    <input type="text" id="customer_phone" name="customer_phone" class="w-full border rounded px-3 py-2" />
                </div>
            </div>
        </div>

        <div class="mt-6 flex justify-end">
            <button type="submit" class="bg-red-600 text-white px-6 py-3 rounded hover:bg-red-700 transition">Place Order</button>
        </div>
    </form>
</div>
@endsection
