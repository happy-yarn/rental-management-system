<nav class="navbar sticky-top navbar-expand-lg bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name') }}</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">Dashboard</a>
                </li>
                @if (auth()->user()->isStaff())
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('users') ? 'active' : '' }}" href="{{ route('users.index') }}">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('apartments') ? 'active' : '' }}" href="{{ route('apartments.index') }}">Apartments</a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('maintenance') ? 'active' : '' }}" href="{{ route('maintenance.index') }}">Maintenance</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('complains') ? 'active' : '' }}" href="{{ route('complains.index') }}">Complains</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('invoices') ? 'active' : '' }}" href="{{ route('invoices.index') }}">Invoices</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ Request::is('my-account') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item {{ Request::is('my-account') ? 'active' : '' }}" href="{{ route('account') }}">My Account</a></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a></li>
                    </ul>
                </li>
            </ul>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</nav>
