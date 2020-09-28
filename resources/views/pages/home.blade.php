@extends('layouts.main')

@section('content')

    <h1>Table Status</h1>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Number Of Customer</th>
            <th scope="col">Get In Time</th>
            <th scope="col">Status</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>4</td>
            <td>14:00</td>
            <td>Eating</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>2</td>
            <td>14:30</td>
            <td>Ordering</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>5</td>
            <td>14:35</td>
            <td>Checking Out</td>
        </tr>
        </tbody>
    </table>

@endsection
