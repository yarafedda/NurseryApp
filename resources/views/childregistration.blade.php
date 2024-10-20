<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Child - Nursery Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite('resources/css/childregistration.css')
</head>
<body>
    <header>
        <h1>Register Child</h1>
        <a href="{{ url('/home') }}" class="home-icon">
            <i class="fas fa-home"></i> Home
        </a>
    </header>

    <main>

        @if(session('message'))
            <p class="message">{{ session('message') }}</p>
        @endif

         <!-- Display error messages -->
         @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register.child') }}" method="POST">
            @csrf
            <!-- Pass Guardian ID as a hidden input -->
            <input type="hidden" name="guardian_id" value="{{ request()->query('guardian_id') }}">

            <label for="firstname">Child's First Name:</label>
            <input type="text" id="firstname" name="firstname" required>

            <label for="lastname">Child's Last Name:</label>
            <input type="text" id="lastname" name="lastname" required>

            <label for="date_of_birth">Date of Birth:</label>
            <input type="date" id="date_of_birth" name="date_of_birth" required>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>

            

            <button type="submit">Register Child</button>
        </form>

        
    </main>
        @vite('resources/js/childregistration.js')
</body>
</html>
