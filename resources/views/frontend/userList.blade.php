<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User List</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        .user-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h1>All Users</h1>

    @foreach ($users as $user)
        <div class="user-card">
            <p><strong>Username:</strong> {{ $user->username }}</p>
            <p><strong>Name:</strong> {{ $user->firstname }} {{ $user->lastname }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Phone:</strong> {{ $user->phone_number }}</p>
            <p><strong>Role:</strong> {{ ucfirst($user->role) }}</p>
            <p><strong>Broker:</strong> {{ $user->is_broker ? 'Yes' : 'No' }}</p>
            <p><strong>Agent:</strong> {{ $user->is_agent ? 'Yes' : 'No' }}</p>
            <p><strong>Buyer:</strong> {{ $user->is_buyer ? 'Yes' : 'No' }}</p>
        </div>
    @endforeach

    @if ($users->isEmpty())
        <p>No users found.</p>
    @endif
</body>
</html>
