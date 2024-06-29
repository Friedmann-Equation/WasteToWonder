<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Admin Dashboard</h1>

    <h2>Customer Data</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Bottle Donations</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer ID</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($donations as $donation)
                <tr>
                    <td>{{ $donation->id }}</td>
                    <td>{{ $donation->user_id }}</td>
                    <td>{{ $donation->product }}</td>
                    <td>{{ $donation->price }}</td>
                    <td>{{ $donation->created_at }}</td>
                    <td>{{ $donation->updated_at }}</td>
                </tr>
        @endforeach
        </tbody>
    </table>

    <h2>Glove Purchases</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer ID</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->id }}</td>
                    <td>{{ $transaction->user_id }}</td>
                    <td>{{ $transaction->product }}</td>
                    <td>{{ $transaction->price }}</td>
                    <td>{{ $transaction->created_at }}</td>
                    <td>{{ $transaction->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
