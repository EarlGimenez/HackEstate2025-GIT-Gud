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
        <form action="/add-property" method="POST" id="property-form" enctype="multipart/form-data">
            @csrf
            <h3>Add Property</h3>

            <div class="form-columns">
                <!-- Property Details -->
                <div class="form-column">
                    <label for="propName">Property Name</label>
                    <input type="text" id="propName" name="propName" placeholder="Enter property name" required>

                    <label for="propAddress">Property Address</label>
                    <input type="text" id="propAddress" name="propAddress" placeholder="Enter property address" required>

                    <label for="propDesc">Property Description</label>
                    <textarea id="propDesc" name="propDesc" placeholder="Enter property description" rows="4" required></textarea>

                    <label for="propPrice">Property Price</label>
                    <input type="number" id="propPrice" name="propPrice" placeholder="Enter property price" required>
                </div>

                <!-- Property Images -->
                <div class="form-column">
                    <label for="image_1">Property Image 1</label>
                    <input type="file" id="image_1" name="image_1" accept="image/*" required>

                    <label for="image_2">Property Image 2</label>
                    <input type="file" id="image_2" name="image_2" accept="image/*">

                    <label for="image_3">Property Image 3</label>
                    <input type="file" id="image_3" name="image_3" accept="image/*">
                </div>
            </div>

            <button type="submit">Add Property</button>
        </form>
    </div>
</body>
</html>