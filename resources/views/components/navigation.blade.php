<nav class="navbar navbar-expand-md bg-primary navbar-dark shadow" style="border-bottom: 3px solid white;">
    <div class="container">
        <a class="navbar-brand" href="/">Bloggie</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse overflow-y-auto" id="navbarNav" style="max-height: calc(100vh - 70px);">
            <form action="{{ route('posts.search', ['query' => request('query', '')]) }}" method="GET"
                style="margin-top: 10px; @media (min-width: 720) { margin-top: 0; };">
                <div class="input-group">
                    <input type="text" name="query" class="form-control" style=" height:35px" placeholder="Search..."
                        value="{{ request('query') }}">
                    <button type="submit" class="btn btn-primary"><span class="material-icons">search</span></button>
                </div>
                @error('query')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </form>

            <ul class="navbar-nav ms-auto mb-lg-0 d-flex align-items-center justify-content-center"
                style="margin-top: 5px; @media (min-width: 720) { margin-top: 0; }">
                @auth
                    <li class="nav-item">
                        <div class="d-flex">
                            <a class="nav-link text-light" href="{{ route('posts.user') }}">
                                <span class="material-icons" title="My posts">view_list</span>
                            </a>&nbsp;&nbsp;
                            <a class="nav-link text-light href="{{ route('profile.edit') }}">
                                <span class="material-icons" title="My profile">account_circle</span>
                            </a>&nbsp;&nbsp;
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="nav-link text-light" href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                title="Logout">
                                <span class="material-icons">power_settings_new</span>
                            </a>
                        </form>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="btn btn-outline-light rounded-0 me-2">Log In</a>
                        <a href="{{ route('register') }}" class="btn btn-outline-light rounded-0 me-2">Sign Up</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
