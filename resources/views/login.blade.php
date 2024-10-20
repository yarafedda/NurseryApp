<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite('resources/css/login.css')
</head>
<body>
    <h2>Login</h2>
    

    

    <form action="{{ route('login') }}" method="POST">
    @csrf
    @if (session('error'))
            <div class="error-message">
                <p>{{ session('error') }}</p>
            </div>
        @endif
    
        @if($errors->any())
        <div>
            @foreach($errors->all() as $error)
                <p class="error-message">{{ $error }}</p>
            @endforeach
        </div>
    @endif
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
        <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>

    </form>

    
   
</body>
</html>
