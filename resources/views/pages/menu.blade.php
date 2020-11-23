@extends('layouts.main')

@section('content')
    <h1>Menus</h1>
    <div>
        <a href="{{ url('/addMenu') }}">
            <button class="btn btn-info">Add</button>
        </a>

{{--        <p><label for="sortType">Sort by</label><select class="" id="sortType" name="sortType">--}}
{{--                <option>No Sort</option>--}}
{{--                <option>Rices [A]</option>--}}
{{--                <option>Noodles [B]</option>--}}
{{--                <option>Hot Dishes [C]</option>--}}
{{--                <option>Appetizers [D]</option>--}}
{{--                <option>Sushi [E]</option>--}}
{{--                <option>Beverages [F]</option>--}}
{{--            </select>--}}
{{--            <a href="{{ route('/sortMenu', document.getElementById("sortType").value) }}">--}}
{{--                <button class="btn btn-success">Sort</button>--}}
{{--            </a>--}}
{{--        </p>--}}
{{--        <br/>--}}
    </div>
            <p>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Menu Status</th>
            <th scope="col">Image</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        {{ $menus->links() }}
        @foreach($menus as $menu)


            <tr @if($menu->menu_status == 'No') bgcolor="#d3d3d3" @endif >
                <th scope="row">{{ $menu->menu_id }}</th>
                <td>{{ $menu->menu_name }}</td>
                <td>{{ $menu->price }} Baht</td>
                @if($menu->menu_status)
                    <td>Yes</td>
                @endif
                @if($menu->menu_status == 0)
                    <td>No</td>
                @endif
                <td><img src="data:image/;base64,{{ $menu->image }}" style="width: 250px;height: 150px"></td>
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
