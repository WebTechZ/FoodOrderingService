@extends('layouts.main')

@section('content')
    <x-guest-layout>
        <x-jet-authentication-card>

            <x-jet-validation-errors class="mb-4"/>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group container" style="width: 50%">
                    <label for="email">Email</label>
                    <input type="email" class="form-control " id="email" required aria-describedby="emailHelp">
                </div>
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group container " style="width: 50%">
                    <label for="password">Password</label>
                    <input type="password" class="form-control " id="password" required>
                </div>
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div style="text-align: center">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>

            </form>


        </x-jet-authentication-card>
    </x-guest-layout>

    {{--    <form method="POST" action="{{ route('login') }}">--}}
    {{--        @csrf--}}

    {{--        <div>--}}
    {{--            <x-jet-label for="email" value="{{ __('Email') }}" />--}}
    {{--            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />--}}
    {{--        </div>--}}

    {{--        <div class="mt-4">--}}
    {{--            <x-jet-label for="password" value="{{ __('Password') }}" />--}}
    {{--            <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />--}}
    {{--        </div>--}}

    {{--        <div class="block mt-4">--}}
    {{--            <label for="remember_me" class="flex items-center">--}}
    {{--                <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">--}}
    {{--                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>--}}
    {{--            </label>--}}
    {{--        </div>--}}

    {{--        <div class="flex items-center justify-end mt-4">--}}
    {{--            @if (Route::has('password.request'))--}}
    {{--                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">--}}
    {{--                    {{ __('Forgot your password?') }}--}}
    {{--                </a>--}}
    {{--            @endif--}}

    {{--            <x-jet-button class="ml-4">--}}
    {{--                {{ __('Login') }}--}}
    {{--            </x-jet-button>--}}
    {{--        </div>--}}
    {{--    </form>--}}
@endsection
