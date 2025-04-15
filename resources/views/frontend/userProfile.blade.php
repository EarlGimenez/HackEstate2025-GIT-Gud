<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: sans-serif;
        }
        .container {
            max-width: 800px;
            margin: auto;
            padding: 2rem;
        }
        .property-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>User Profile</h1>

        <!-- Display user info -->
        <p><strong>Username:</strong> {{ $user->username }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Full Name:</strong> {{ $user->firstname }} {{ $user->lastname }}</p>

        <hr>

        <h2>Properties Listed by {{ $user->firstname }}</h2>

        @if ($user->properties->count() > 0)
            @foreach ($user->properties as $property)
                <div class="property-card">
                    <h3>{{ $property->propName }}</h3>
                    <p>{{ $property->propDesc }}</p>
                    <p><strong>Price:</strong> ${{ number_format($property->propPrice, 2) }}</p>
                    <a href="{{ route('propertyDetails', ['id' => $property->id]) }}">View Details</a>
                </div>
            @endforeach
        @else
            <p>This user has not listed any properties.</p>
        @endif

        <a href="{{ route('userList') }}">← Back to user list</a>
    </div>
</body>
</html>
