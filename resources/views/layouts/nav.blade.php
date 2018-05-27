<style>

    .bg-primary, .btn-primary {
        background-color: #375a7f !important;
        border-color: #375a7f !important;
    }

</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <ul class="navbar-nav mr-auto">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Time Tracker') }}
        </a>
        <li class="nav-item">
            <a class="nav-link" href="#">About</a>
        </li>
        @auth
        <li class="nav-item">
            <a class="nav-link" href="#">Config</a>
        </li>
        @endauth
    </ul>

    <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
        <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
        <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->first_name . " " . Auth::user()->last_name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            @endguest
    </ul>
</nav>