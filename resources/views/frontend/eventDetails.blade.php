<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $event->name }} - Event Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg p-6">
        <h1 class="text-3xl font-bold mb-4">{{ $event->name }}</h1>

        @if($event->image_path)
            <img src="{{ asset('storage/' . $event->image_path) }}" alt="Event Image" class="mb-4 rounded-lg w-full max-h-96 object-cover">
        @endif

        <p><strong>Host:</strong> {{ $event->host }}</p>
        <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($event->date)->format('F j, Y') }}</p>
        <p><strong>Time:</strong> 
            {{ $event->start_time ? \Carbon\Carbon::parse($event->start_time)->format('g:i A') : 'TBA' }} 
            - 
            {{ $event->end_time ? \Carbon\Carbon::parse($event->end_time)->format('g:i A') : 'TBA' }}
        </p>
        <p><strong>Location:</strong> {{ $event->location }}</p>

        @if ($event->latitude && $event->longitude)
            <p><strong>Coordinates:</strong> {{ $event->latitude }}, {{ $event->longitude }}</p>
        @endif

        @if ($event->description)
            <div class="mt-4">
                <h2 class="font-semibold text-lg mb-2">Description</h2>
                <p>{{ $event->description }}</p>
            </div>
        @endif

        <div class="mt-6">
            <a href="{{ route('eventList') }}" class="text-blue-600 hover:underline">&larr; Back to Event List</a>
        </div>
    </div>
</body>
</html>
