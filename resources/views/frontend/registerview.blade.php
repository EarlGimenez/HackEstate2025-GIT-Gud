<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets_loginregister/register.css') }}">
</head>
<body>
    <div class="register-page">
        <div class="background">
            <div class="shape"></div>
            <div class="shape"></div>
        </div>
        <form action="/register" method="POST" id="register-form">
            @csrf
            <h3>Register Here</h3>

            <div class="form-columns">
                <!-- Left Column -->
                <div class="form-column">
                    <label for="userType">User Type</label>
                    <select id="userType" name="userType" onchange="toggleFields(this.value)" required>
                        <option value="Buyer">Buyer</option>
                        <option value="Broker">Broker</option>
                        <option value="Agent">Agent</option>
                    </select>

                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter your username" required>

                    <label for="firstname">First Name</label>
                    <input type="text" id="firstname" name="firstname" placeholder="Enter your first name" required>

                    <label for="lastname">Last Name</label>
                    <input type="text" id="lastname" name="lastname" placeholder="Enter your last name" required>

                    <label for="email">E-Mail</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>

                <!-- Right Column -->
                <div class="form-column">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>

                    <label for="phone_number">Phone Number</label>
                    <input type="text" id="phone_number" name="phone_number" placeholder="Enter your phone number" required>

                    <label for="terms_agreed">Terms Agreed</label>
                    <input type="checkbox" id="terms_agreed" name="terms_agreed" required>
                </div>

                <!-- Conditional Fields for Brokers and Agents -->
                <div class="form-column" id="brokerAgentFields" style="display: none;">
                    <label for="license_number">License Number</label>
                    <input type="text" id="license_number" name="license_number" placeholder="Enter your license number">

                    <label for="license_expiration_date">License Expiration Date</label>
                    <input type="date" id="license_expiration_date" name="license_expiration_date">

                    <label for="agency_name">Agency Name</label>
                    <input type="text" id="agency_name" name="agency_name" placeholder="Enter your agency name">
                </div>
            </div>

            <button type="submit">Register</button>
        </form>
    </div>

    <script>
        function toggleFields(userType) {
            const brokerAgentFields = document.getElementById('brokerAgentFields');
            if (userType === 'Broker' || userType === 'Agent') {
                brokerAgentFields.style.display = 'block';
            } else {
                brokerAgentFields.style.display = 'none';
            }
        }
    </script>
</body>
</html>