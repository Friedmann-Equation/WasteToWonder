<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-image: url('/images/background.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            margin: 0;
            font-family: Figtree, sans-serif;
        }
        *, ::after, ::before {
            box-sizing: border-box;
        }
        h1, h2, h3, h4, h5, h6, p {
            margin: 0;
            font-weight: inherit;
            color: #fff;
        }
        a {
            color: inherit;
            text-decoration: inherit;
        }
        button {
            font-family: inherit;
            background-color: transparent;
            cursor: pointer;
            width: 100%;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 1.5rem;
            text-align: center;
        }
        .card {
            background-color: rgb(45 45 45);
            border-radius: 2rem;
            box-shadow: 0 25px 50px -12px rgb(0 0 0 / 0.25);
            padding: 5rem;
            max-width: 40rem;
            width: 100%;
            margin-top: 4rem;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            text-align: left;
            display: block;
            margin-bottom: 5px;
            color: #fff;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            background-color: rgb(45 45 45);
            border: 1px solid #fff;
            border-top: none;
            border-left: none;
            border-right: none;
        }
        .form-group input:focus {
            background-color: #333; 
            color: #fff; 
            border-color: rgb(138, 25, 201); 
            outline: none;
        }
        .form-group-auth button {
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            background-color: rgb(138, 25, 201);
            color: white;
            cursor: pointer;
            width: 100%;
        }
        .form-group-auth {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
    </style>
    <title>NeuTrack</title>
</head>
<body>
    <div class="header">
        <button onclick="window.location.href='{{ route('admin.login') }}'">Admin</button>
    </div>
    <div class="container">
        <div class="card">
            <hr class="bg-gray-100 h-0.5 rounded-lg w-16 mx-auto">
            <img src="/images/logo.png" alt="Neutrack Logo">
            @if(session('success'))
                <div>{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div>{{ session('error') }}</div>
            @endif
            <form method="POST" action="{{ route('signin.submit') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group-auth" style="display: flex; justify-content: space-between;">
                    <button type="submit">Sign In</button>
                </div>
            </form>
            <br>
            <p>Don't have an account?</p>
            <div class="form-group-auth" style="display: flex; justify-content: space-between;">
                <button><a href="{{ route('signup') }}">Sign Up</a></button>
            </div>
        </div>
    </div>
</body>
</html>
