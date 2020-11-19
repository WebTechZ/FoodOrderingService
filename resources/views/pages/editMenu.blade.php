@extends('layouts.main')

@section('content')

    <h1>Edit Menu</h1>

    <form action="{{ route('menus.update', ['menu' => $menu->id]) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <h3>ID: {{ $menu->menu_id }}</h3>

        <div class="form-group">
            <label for="menu_name">Name</label>
            <input type="text" class="form-control" id="menu_name" name="menu_name"
                   required value="{{ $menu->menu_name }}">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" min="0"
                   required value="{{ $menu->price }}">
        </div>
        <div class="form-group">
            <label for="menu_status">Status</label>
            <select class="form-control" id="menu_status" name="menu_status">
                @if($menu->menu_status)
                    <option>Yes</option>
                    <option>No</option>
                @endif
                @if($menu->menu_status == false)
                    <option>No</option>
                    <option>Yes</option>
                @endif
            </select>
        </div>
        <div class="form-group">
            <label for="file">Select Image</label>
            <input type="file" class="form-control-file" id="file" name="file" onchange="Filevalidation()">
            <p id="size"></p>

            <script>
                Filevalidation = () => {
                    const fi = document.getElementById('file');
                    // Check if any file is selected.
                    if (fi.files.length > 0) {
                        for (let i = 0; i <= fi.files.length - 1; i++) {

                            const fsize = fi.files.item(i).size;
                            const file = Math.round((fsize / 1024));
                            console.log(file) ;
                            document.getElementById('size').innerHTML = '<b>'
                                + file + '</b> KB';
                            // The size of the file.
                            if (file >= 45) {
                                document.getElementById('file').innerHTML = ''
                                alert(
                                    "File too Big, please select a file less than 4mb");
                            } else {
                                document.getElementById('size').innerHTML = '<b>'
                                    + file + '</b> KB';
                            }
                        }
                    }
                }
            </script>


        </div>

        <button type="submit" class="btn btn-warning">Edit</button>
{{--        <a href="{{ url('/menus') }}">--}}
{{--            <button class="btn btn-danger">Cancel</button>--}}
{{--        </a>--}}
    </form>
    <br>
    <a href="{{ url('/menus') }}">
        <button class="btn btn-danger">Cancel</button>
    </a>

@endsection
