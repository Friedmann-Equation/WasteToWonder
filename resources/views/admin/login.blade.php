<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body>
    <form action="{{ route('admin.login.submit') }}" method="POST">
        @csrf
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        @if ($errors->has('password'))
            <span>{{ $errors->first('password') }}</span>
        @endif
        <button type="submit">Login</button>
    </form>
</body>
</html>
