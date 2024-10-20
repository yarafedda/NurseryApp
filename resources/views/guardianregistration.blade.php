<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Guardian - Nursery Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite('resources/css/childregistration.css')
</head>
<body>
    <header>
        <h1>Register Guardian</h1>
        <a href="{{ url('/home') }}" class="home-icon">
            <i class="fas fa-home"></i> Home
        </a>
    </header>
    <main>
        <form action="{{ route('register.guardian') }}" method="POST">
            @csrf
            <label for="firstname">First Name:</label>
            <input type="text" id="firstname" name="firstname" required>
            
            <label for="lastname">Last Name:</label>
            <input type="text" id="lastname" name="lastname" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="phone_number">Phone Number:</label>
            <input type="text" id="phone_number" name="phone_number" required>
            
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>
            
            <label for="relationship_to_child">Relationship to Child:</label>
            <input type="text" id="relationship_to_child" name="relationship_to_child" required>
            
            <button type="submit">Register Guardian</button>
        </form>

        <div id="guardian-message"></div>
    </main>
    @vite('resources/js/childregistration.js')
</body>
</html>
