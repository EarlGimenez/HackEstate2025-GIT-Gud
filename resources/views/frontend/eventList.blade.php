<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Event List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100 p-6">
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Event List</h1>

        @foreach ($events as $event)
            <div class="bg-white rounded-lg shadow-md p-4 mb-4">
                <h2 class="text-xl font-semibold">{{ $event->event_name }}</h2>
                <p><strong>Date:</strong> {{ $event->event_date }}</p>
                <p><strong>Location:</strong> {{ $event->location }}</p>
                <p><strong>Description:</strong> {{ Str::limit($event->description, 100) }}</p>
                
                <a href="{{ route('eventDetails', ['id' => $event->id]) }}" class="text-blue-600 hover:underline mt-2 inline-block">View Details</a>
            </div>
        @endforeach

        <a href="{{ url('/') }}" class="text-gray-600 hover:underline mt-4 inline-block">Back to Home</a>
    </div>
</body>
</html>
