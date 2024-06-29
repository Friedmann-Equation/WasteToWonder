<!-- resources/views/layouts/app.blade.php -->
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
            margin-left: 125px; 
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
        .donation-form {
            display: none;
            background-color: #333;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }
        .donation-form input, .donation-form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: none;
            border-radius: 5px;
        }
        .donation-form button {
            background-color: #8a19c9;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            color: #fff;
        }
        .styled-table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            font-family: sans-serif;
            min-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            border-radius: 10px;
            overflow: hidden;
        }
        .styled-table thead tr {
            background-color: #8a19c9;
            color: #ffffff;
            text-align: left;
        }
        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }
        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }
        .styled-table tbody tr:nth-of-type(even) {
            background-color: #1f1f1f;
        }
        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #8a19c9;
        }
        .styled-table tbody tr.active-row {
            font-weight: bold;
            color: #8a19c9;
        }
    </style>
    <title>Admin Dashboard</title>
</head>
<body>

    <div class="header">
        <img class="pics" src="/images/neutrack.png" alt="content">
        <div>
            <button>Update</button>
        </div>
    </div>

    <div class="container">
        <div class="sidebar">
            <h1>Welcome, admin!</h1>
            <a href="{{ route('customers') }}" class="active">
                <i class="fas fa-users icon"></i> Customers
            </a>
            <a href="{{ route('bottle.donations') }}">
                <i class="fas fa-recycle icon"></i> Bottle Donations
            </a>
            <a href="{{ route('glove.purchases') }}">
                <i class="fas fa-hand-paper icon"></i> Gloves Stock
            </a>
        </div>
        <div class="main-content">
            @yield('content')
        </div>
    </div>
</body>
</html>
