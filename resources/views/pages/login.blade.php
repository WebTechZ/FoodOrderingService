@extends('layouts.main')

@section('content')
    <form>


        <div class="form-group container" style="width: 50%">
            <label for="exampleInputEmail1" >Username</label>
            <input type="email" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group container " style="width: 50%">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control " id="exampleInputPassword1">
        </div>
        <div style="text-align: center">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>

    </form>
@endsection
