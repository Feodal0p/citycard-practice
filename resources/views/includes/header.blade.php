<nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="container">
        @use('App\Models\User')
        @if (Auth::user()->role == User::ROLE_ADMIN)
            <a href="{{ route('admin.city.index')}}" class="navbar-brand">
                {{Auth::user()->name. " " . Auth::user()->phone}}
            </a>
        @else
            <a href="{{ route('user.index')}}" class="navbar-brand">
                {{Auth::user()->name. " " . Auth::user()->phone}}
            </a>
        @endif
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar-collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            {{ __('Logout') }}
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>