@extends('layouts.main')

@section('content')

    <h1>All Order</h1>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Order ID</th>
            <th scope="col">Menu ID</th>
            <th scope="col">Time</th>
            <th scope="col">Price</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">310</th>
            <td>A1</td>
            <td>14:25</td>
            <td>40</td>
        </tr>
        <tr>
            <th scope="row">311</th>
            <td>A1</td>
            <td>14:30</td>
            <td>40</td>
        </tr>
        <tr>
            <th scope="row">312</th>
            <td>A2</td>
            <td>14:32</td>
            <td>200</td>
        </tr>
        </tbody>
    </table>

@endsection
