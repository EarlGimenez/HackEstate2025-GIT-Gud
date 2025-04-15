<!-- filepath: c:\Computer Science\3rdYear\2ndSem\HackEstate2025-GIT-Gud\resources\views\frontend\loginview.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets_loginregister/login.css') }}">
</head>
<body>
    <div class="login-page">
        <div class="background">
            <div class="shape"></div>
            <div class="shape"></div>
        </div>
        <form action="/login" method="POST" id="login-form">
            @csrf
            <h3>Login Here</h3>
    
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required>
    
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
    
            <button type="submit">Log In</button>
        </form>
    </div>
</body>
</html>