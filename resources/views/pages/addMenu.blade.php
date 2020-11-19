@extends('layouts.main')

@section('content')

    <h1>Add Menu</h1>

    <form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="menu_id">ID</label>
            <input type="text" class="form-control" id="menu_id" name="menu_id" required>
        </div>
        <div class="form-group">
            <label for="menu_name">Name</label>
            <input type="text" class="form-control" id="menu_name" name="menu_name" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" min="0" required>
        </div>
        <div class="form-group">
            <label for="menu_status">Status</label>
            <select class="form-control" id="menu_status" name="menu_status">
                <option>Yes</option>
                <option>No</option>
            </select>
        </div>
        <div class="form-group">
            <label for="file">Select Image</label>
            <input type="file" class="form-control-file" id="file" name="file">
        </div>

    <button class="btn btn-success">Confirm</button>
    </form>
    <br>
    <a href="{{ url('/menus') }}"><button class="btn btn-danger">Cancel</button></a>

@endsection
