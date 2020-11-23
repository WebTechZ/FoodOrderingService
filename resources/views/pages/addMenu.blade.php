@extends('layouts.main')

@section('content')

    <h1>Add Menu</h1>

    <form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
{{--        <div class="form-group">--}}
{{--            <label for="menu_id">ID</label>--}}
{{--            <input type="text" class="form-control" id="menu_id" name="menu_id" required>--}}
{{--        </div>--}}
        <div class="form-group">
            <label for="typeype">Food Type</label>
            <select class="form-control" id="type" name="type">
                <option>Rices</option>
                <option>Noodles</option>
                <option>Hot Dishes</option>
                <option>Appetizers</option>
                <option>Sushi</option>
                <option>Beverages</option>
            </select>
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
            <input type="file" class="form-control-file" id="file" name="file" onchange="Filevalidation()" required>
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
                                    "File too Big, please select a file less than 45kb");
                            } else {
                                document.getElementById('size').innerHTML = '<b>'
                                    + file + '</b> KB';
                            }
                        }
                    }
                }
            </script>
        </div>

    <button class="btn btn-success">Confirm</button>
    </form>
    <br>
    <a href="{{ url('/menus') }}"><button class="btn btn-danger">Cancel</button></a>

@endsection
