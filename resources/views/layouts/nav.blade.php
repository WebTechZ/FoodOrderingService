<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Food Ordering Service</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('/home') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            @auth
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('/menus') }}">Edit Menu <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="{{ url('/order') }}">Order <span class="sr-only">(current)</span></a>
            </li>

                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/stat') }}">Statistic <span class="sr-only">(current)</span></a>
                </li>

            <li class="nav-item active">
                <a class="nav-link" href="{{ url('/logout') }}">Logout <span class="sr-only">(current)</span></a>
            </li>
            @endauth

{{--            <li class="nav-item {{ \Route::currentRouteName() === 'posts.index' ? 'active':' ' }}">--}}
{{--                <a class="nav-link" href="{{ route('posts.index') }}">All posts</a>--}}
{{--            </li>--}}
        </ul>

    </div>
</nav>
