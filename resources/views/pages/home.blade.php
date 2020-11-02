@extends('layouts.main')

@section('content')

    <h1>Table Status</h1>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Number Of Customer</th>
            <th scope="col">Status</th>
        </tr>
        </thead>
        <tbody>

        @foreach($tables as $table)
            <tr @if($table->reserve_status) bgcolor="#d3d3d3" @endif>
                <th scope="row">{{ $table->table_number }}</th>
                <td>{{ $table->number_of_customer }}</td>
                @if($table->reserve_status)
                    <td>Not Available</td>
                @endif
                @if($table->reserve_status == false)
                    <td>Available</td>
                @endif
            </tr>
        @endforeach

        </tbody>
    </table>

@endsection
