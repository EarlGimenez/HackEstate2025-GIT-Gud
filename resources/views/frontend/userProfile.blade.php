<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Add any required CSS here -->
</head>
<body>
    <div class="container">
        <h1>User Profile</h1>

        <!-- Display user info -->
        <p><strong>Username:</strong> {{ $user->username }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Full Name:</strong> {{ $user->full_name }}</p>

        <!-- Add more fields as needed -->

        <!-- Link back to the user list -->
        <a href="{{ route('userList') }}">Back to user list</a>
    </div>
</body>
</html>