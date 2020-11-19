@extends('layouts.main')

@section('content')

    <h1>Order History</h1>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Order ID</th>
            <th scope="col">Table Number</th>
            <th scope="col">Menu ID</th>
            <th scope="col">Order Time</th>
            <th scope="col">Status</th>
        </tr>
        </thead>
        <tbody>

        @foreach($orders as $order)
            <tr>
                <th scope="row">{{ $order->id }}</th>
                <td>{{ $order->table_number }}</td>
                <td>{{ $order->menu_id }}</td>
                <td>{{ $order->order_time }}</td>
                <td>{{ $order->status }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>

@endsection
