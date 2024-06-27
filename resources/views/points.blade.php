<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #fff;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }
        .header {
            position: fixed;
            top: 0;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #2e2e2e;
            padding: 10px 20px;
            z-index: 1000;
        }
        .header img {
            width: 275px; 
        }
        .header button {
            padding: 10px 20px;
            background-color: #8a19c9;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: #fff;
            margin-right: 40px;
        }
        .container {
            display: flex;
            flex: 1;
            margin-top: 60px;
            height: calc(100vh - 60px);
        }
        .sidebar {
            width: 250px;
            background-color: #1f1f1f;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 20px;
            height: calc(100vh - 60px);
            position: fixed; 
            top: 60px; 
        }
        .sidebar img {
            width: 80%;
            margin-bottom: 20px;
        }
        .sidebar a {
            text-decoration: none;
            color: #fff;
            margin: 10px 0;
            display: flex;
            align-items: center;
            width: 100%;
            padding: 10px;
            padding-left: 80px; 
            transition: background 0.3s;
        }
        .sidebar a:hover, .sidebar a.active {
            background-color: #333;
            width: 50%;
        }
        .sidebar a .icon {
            margin-right: 10px;
        }
        .main-content {
            flex: 1;
            padding: 20px;
            margin-left: 250px; 
        }
        .section {
            background-color: #2e2e2e;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }
        .section h2 {
            margin-top: 0;
        }
        .slider-container {
            position: relative;
            display: flex;
            overflow: hidden;
            width: 100%;
            height: 700px;
        }
        .slider {
            display: flex;
            transition: transform 0.5s ease;
        }
        .slider img {
            width: 100%;
            height: 100%; 
            flex-shrink: 0;
        }
        .slider-controls {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
        }
        .slider-controls button {
            background: rgba(0, 0, 0, 0.5);
            border: none;
            color: white;
            padding: 10px;
            cursor: pointer;
        }
    </style>
    <title>NeuTrack Dashboard</title>
</head>
<body>
    <div class="header">
        <img class="pics" src="/images/neutrack.png" alt="content">
        <div>
            <button onclick="window.location.href='{{ route('choose-glove') }}'">Buy Glove</button>
            <button>Donate Now</button>
        </div>
    </div>

    <div class="container">
        <div class="sidebar">
            <h1>Welcome, {{ session('username') }}!</h1>
            <!-- <h1>Welcome, {{ session('userid') }}!</h1> -->
            <a href="{{ route('home') }}">
                <i class="fas fa-home icon"></i> Home
            </a>
            <a href="{{ route('points') }}" class="active">
                <i class="fas fa-money-bill-wave icon"></i> My Points
            </a>
            <a href="{{ route('gloves') }}">
                <i class="fas fa-hand-paper icon"></i> Gloves
            </a>
            <a href="{{ route('bottles') }}">
                <i class="fas fa-recycle icon"></i> Bottles
            </a>
            <a href="{{ route('signin') }}">
                <i class="fas fa-sign-out-alt icon"></i> Log out
            </a>
        </div>

        <div class="main-content">
            <h2>My Points</h2>
            <div class="section">
            </div>
        </div>
    </div>

    <script>
        const slider = document.querySelector('.slider');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');

        let currentIndex = 0;

        prevBtn.addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex--;
                updateSlider();
            }
        });

        nextBtn.addEventListener('click', () => {
            if (currentIndex < slider.children.length - 1) {
                currentIndex++;
                updateSlider();
            }
        });

        function updateSlider() {
            const width = slider.children[0].clientWidth;
            slider.style.transform = `translateX(-${currentIndex * width}px)`;
        }
    </script>
</body>
</html>
