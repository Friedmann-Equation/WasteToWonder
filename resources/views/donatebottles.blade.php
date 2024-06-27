<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bottles</title>
    <style>
        /* Add your styles here */
    </style>
</head>
<body>
    <h1>Bottles Page</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <!-- Display the bottles -->
    <div>
        <img src="/images/bottle1.png" alt="Bottle 1">
        <img src="/images/bottle2.png" alt="Bottle 2">
        <img src="/images/bottle3.png" alt="Bottle 3">
    </div>
    
    <!-- Donation form -->
    <form action="{{ route('donate') }}" method="POST">
        @csrf
        <label for="bottle_type">Bottle Type:</label>
        <select name="bottle_type" id="bottle_type">
            <option value="type1">Type 1</option>
            <option value="type2">Type 2</option>
            <option value="type3">Type 3</option>
        </select>
        <label for="amount">Amount:</label>
        <input type="number" name="amount" id="amount" required>
        <button type="submit">Donate</button>
    </form>
</body>
</html>
