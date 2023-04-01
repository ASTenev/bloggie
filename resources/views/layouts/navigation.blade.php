<nav class="navbar navbar-expand-md bg-primary navbar-dark shadow" style="border-bottom: 3px solid white;">
    <div class="container">
        <a class="navbar-brand" href="/">My Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @auth
                    <li class="nav-item">
                        <a class="nav-link text-light" href="/users/{{ auth()->user()->id }}/posts">My posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="/profile/{{ auth()->user()->id }}/posts">Profile</a>
                    </li>
                     <li class="nav-item">
                     <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="/login" class="btn btn-outline-light rounded-0 me-2">Log In</a>
                    </li>
                    <li class="nav-item">
                        <a href="/register" class="btn btn-outline-light rounded-0 me-2">Sign Up</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
