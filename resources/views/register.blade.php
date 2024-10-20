<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register</title>
    
</head>@vite('resources/css/register.css')
<body>
    <h2>Register</h2>

    <form action="{{ route('register') }}" method="POST">
    @if($errors->any())
        <div>
            @foreach($errors->all() as $error)
                <p class="error-message">{{ $error }}</p>
            @endforeach
        </div>
    @endif
        @csrf
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
        <button type="submit">Register</button>
        <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
        
    </form>

    
    @vite('resources/js/register.js')
</body>
</html>
