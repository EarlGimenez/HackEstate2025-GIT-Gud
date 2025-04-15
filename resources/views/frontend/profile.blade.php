@extends('frontend.master-profile')

<div class="reward-block">
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