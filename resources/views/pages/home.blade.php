@extends('layouts.main')

@section('content')

    <h1>Table Status</h1>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Number Of Customer</th>
            <th scope="col">Status</th>
            <th scope="col">Time In</th>
        </tr>
        </thead>
        <tbody>

        @foreach($tables as $table)
            <tr @if($table->reserve_status) bgcolor="#d3d3d3" @endif>
                <th scope="row">{{ $table->table_number }}</th>
                @if($table->reserve_status)
                    <td>{{ $table->number_of_customer }}</td>
                    <td>Not Available</td>
                    <td>{{ $table->updated_at}}</td>
                @endif
                @if($table->reserve_status == false)
                    <td>No customer now</td>
                    <td>Available</td>
                    <td>----------</td>
                @endif
            </tr>
        @endforeach

        </tbody>
    </table>

@endsection
