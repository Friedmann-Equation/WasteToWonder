@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="section">
            <h2>Glove Purchases</h2>
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
        </div>
    </div>
@endsection
