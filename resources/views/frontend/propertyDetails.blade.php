@extends('frontend/layout') <!-- Optional: Remove if you're not using a layout -->

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4">{{ $property->propName }}</h2>

    <div class="mb-4">
        <p><strong>Description:</strong> {{ $property->propDesc }}</p>
        <p><strong>Price:</strong> ${{ number_format($property->propPrice, 2) }}</p>
        <p><strong>Address:</strong> {{ $property->propAddress }}</p>
        <p><strong>Area:</strong> {{ $property->propArea }}</p>
        <p><strong>Coordinates:</strong> {{ $property->latitude }}, {{ $property->longitude }}</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        @if ($property->image_1)
            <img src="{{ asset('storage/' . $property->image_1) }}" alt="Image 1" class="w-full h-48 object-cover rounded">
        @endif
        @if ($property->image_2)
            <img src="{{ asset('storage/' . $property->image_2) }}" alt="Image 2" class="w-full h-48 object-cover rounded">
        @endif
        @if ($property->image_3)
            <img src="{{ asset('storage/' . $property->image_3) }}" alt="Image 3" class="w-full h-48 object-cover rounded">
        @endif
    </div>

    <a href="{{ route('propertyList') }}" class="inline-block mt-6 text-blue-600 hover:underline">← Back to Property List</a>
</div>
@endsection
