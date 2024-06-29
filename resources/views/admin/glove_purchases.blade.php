<!-- resources/views/admin/transactions.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="section">
            <h2>Transactions</h2>
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User ID</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Created At</th>
                        <th>Updated At</th>
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
        </div>
    </div>
@endsection
