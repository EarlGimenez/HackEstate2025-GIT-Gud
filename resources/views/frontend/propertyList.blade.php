@extends('frontend/layout')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">All Properties</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($properties as $property)
        <div class="bg-white rounded-lg shadow p-4">
            <img src="{{ asset('storage/images/' . ($property->image_1 ?? 'placeholder.jpg')) }}"
                 alt="{{ $property->propName }}"
                 class="w-full h-40 object-cover rounded mb-3">
            <h2 class="text-lg font-semibold">
                <a href="{{ route('propertyDetails', ['id' => $property->id]) }}" class="text-blue-500 hover:underline">
                    {{ $property->propName }}
                </a>
            </h2>
            <p class="text-sm text-gray-600 mb-1">{{ $property->propAddress }}</p>
            <p class="text-sm text-gray-800">{{ Str::limit($property->propDesc, 80) }}</p>
            <p class="text-blue-600 font-semibold mt-2">₱{{ number_format($property->propPrice) }}</p>
        </div>
        @endforeach
    </div>
</div>
@endsection
