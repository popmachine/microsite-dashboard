<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: sans-serif;
            background: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-box {
            background: white;
            padding: 2rem 2.5rem;
            border-radius: 8px;
            box-shadow: 0 4px 30px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 0.75rem;
            margin-top: 0.5rem;
            margin-bottom: 1rem;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            background: #4f46e5;
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 4px;
            width: 100%;
            font-size: 1rem;
        }
        .error {
            color: red;
            font-size: 0.85rem;
            margin-bottom: 0.5rem;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2 style="text-align:center; margin-bottom: 1rem;">Login</h2>
        @if ($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>