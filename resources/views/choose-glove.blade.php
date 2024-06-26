<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Glove</title>
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
        .glove-option {
            background-color: #2e2e2e;
            border-radius: 10px;
            padding: 20px;
            margin: 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .glove-option:hover {
            background-color: #444;
        }
    </style>
</head>
<body>
    <div class="glove-option" onclick="window.location.href='{{ route('mobile-glove') }}'">
        Mobile Glove - Rp 500000
    </div>
    <div class="glove-option" onclick="window.location.href='{{ route('lite-glove') }}'">
        Lite Glove - Rp 1200000
    </div>
    <div class="glove-option" onclick="window.location.href='{{ route('ai-glove') }}'">
        AI Glove - Rp 2000000
    </div>
</body>
</html>
