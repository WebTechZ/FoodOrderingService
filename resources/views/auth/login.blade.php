@extends('layouts.main')

@section('content')
    <div>
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group container" style="width: 50%">
                <label for="email" value="{{ __('Email') }}">Email</label>
                <input id="email" class="form-control " type="email" name="email" :value="old('email')"
                       required autofocus/>
            </div>

            <div class="form-group container" style="width: 50%">
                <label for="password" value="{{ __('Password') }}">Password</label>
                <input id="password" class="form-control " type="password" name="password" required
                       autocomplete="current-password"/>
            </div>


            <div style="text-align: center">
                <button class="btn btn-success">
                    {{ __('Login') }}
                </button>
            </div>
        </form>
    </div>
@endsection
