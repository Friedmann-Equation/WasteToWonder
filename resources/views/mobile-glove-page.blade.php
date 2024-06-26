<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Glove</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #fff;
            display: flex;
            flex-direction: column;
            height: 100vh;
            justify-content: center;
            align-items: center;
        }
        .content {
            background-color: #2e2e2e;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="content">
        <h1>Mobile Glove</h1>
        <p>Price: Rp 500000</p>
        <form method="POST" action="{{ route('purchase') }}">
            @csrf
            <input type="hidden" name="product" value="Mobile Glove">
            <input type="hidden" name="price" value="500000">
            <button type="submit">Buy Now</button>
        </form>
    </div>
</body>
</html>
