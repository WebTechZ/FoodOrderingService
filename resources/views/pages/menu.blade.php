@extends('layouts.main')

@section('content')

    <p>
    <h1>Menus</h1>
    <a href="{{ url('/addMenu') }}">
        <button class="btn btn-info">Add</button>
        <a/>
        </p>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Menu Status</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($menus as $menu)


                <tr @if($menu->menu_status == 'No') bgcolor="#d3d3d3" @endif >
                    <th scope="row">{{ $menu->menu_id }}</th>
                    <td>{{ $menu->menu_name }}</td>
                    <td>{{ $menu->price }}</td>
                    @if($menu->menu_status)
                        <td>Yes</td>
                    @endif
                    @if($menu->menu_status == 0)
                        <td>No</td>
                    @endif
                    <td>
                        <a href="{{ route('menus.edit', ['menu' => $menu->id]) }}">
                            <button class="btn btn-warning">Edit</button>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('menus.destroy', ['menu' => $menu->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger">Remove</button>
                        </form>
                    </td>
                </tr>

            @endforeach
            </tbody>


        </table>

@endsection
