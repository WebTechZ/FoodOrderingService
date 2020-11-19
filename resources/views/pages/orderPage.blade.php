@extends('layouts.main')

@section('content')

    <h1>All Order</h1>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Order ID</th>
            <th scope="col">Table Number</th>
            <th scope="col">Menu ID</th>
            <th scope="col">Order Time</th>
            <th scope="col">Status</th>
            <th ccope="col"></th>
        </tr>
        </thead>
        <tbody>

        @foreach($orders as $order)
            <tr>
                <th scope="row">{{ $order->id }}</th>
                <td>{{ $order->table_number }}</td>
                <td>{{ $order->menu_id }}</td>
                <td>{{ $order->created_at->diffForHumans() }}</td>
                @if($order->status == 'cooking')
                    <td style="color: red">{{ $order->status }}</td>
                    <td>
                        <form action="{{ route('order.destroy', ['order' => $order->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-success">Complete</button>
                        </form>
                    </td>
                @endif
                @if($order->status == 'complete')
                    <td style="color: green">{{ $order->status }}</td>
                    <td>
                        <form action="{{ route('order.destroy', ['order' => $order->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-success" disabled>Complete</button>
                        </form>
                    </td>
                @endif

            </tr>
        @endforeach

        </tbody>
    </table>

@endsection
