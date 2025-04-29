@extends('layout')

@section('title', 'Order Success - Mie Gacoan Self Service')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow text-center">
    <h2 class="text-3xl font-semibold mb-4 text-green-600">Thank you for your order!</h2>
    <p class="mb-6">Your order ID is <strong>#{{ $order->id }}</strong>.</p>

    <h3 class="text-xl font-semibold mb-2">Order Details:</h3>
    <ul class="mb-6 text-left">
        @foreach ($order->orderDetails as $detail)
        <li class="border-b py-2 flex justify-between">
            <span>{{ $detail->menuItem->name }} x {{ $detail->quantity }}</span>
            <span>Rp {{ number_format($detail->price * $detail->quantity, 0, ',', '.') }}</span>
        </li>
        @endforeach
    </ul>

    <p class="font-bold text-lg mb-6">Total: Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>

    <a href="{{ route('menu') }}" class="inline-block bg-red-600 text-white px-6 py-3 rounded hover:bg-red-700 transition">Back to Menu</a>
</div>
@endsection
