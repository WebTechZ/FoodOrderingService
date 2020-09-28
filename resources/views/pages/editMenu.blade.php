@extends('layouts.main')

@section('content')

    <h1>Edit Menu</h1>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Menu Status</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">A1</th>
            <td>Sushi</td>
            <td>40</td>
            <td>Yes</td>
            <td><button class="btn btn-warning">Edit</button></td>
        </tr>
        <tr>
            <th scope="row">A2</th>
            <td>Donburi</td>
            <td>200</td>
            <td>Yes</td>
            <td><button class="btn btn-warning">Edit</button></td>
        </tr>
        <tr>
            <th scope="row">B1</th>
            <td>Salmon Steak</td>
            <td>230</td>
            <td>No</td>
            <td><button class="btn btn-warning">Edit</button></td>
        </tr>
        </tbody>
    </table>

@endsection
