<header>
    <nav>
        <div class="nav-wrapper">
            <a href="/" class="brand-logo">
                <img src="{{asset('/img/logo.png')}}" alt="logo" class="logo">
            </a>
            <a href="/login">


            </a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li>[{{app()->getLocale()}}]</li>
                <li></li>
                <li><a href="/">Pradžia</a></li>
                <li><a href="{{route('orders.index')}}">Užsakymai</a></li>
                <li><a href="{{route('products.index')}}">Prekės</a></li>
                <li><a href="{{route('categories.index')}}">Kategorijos</a></li>
                <li><a href="{{route('statuses.index')}}">Statusai</a></li>
                <li><a href="{{route('users.index')}}">Vartotojai</a></li>
                <li><a href="{{route('persons.index')}}">Asmenys</a></li>
                <li><a href="{{route('addresses.index')}}">Adresai</a></li>
                <li></li>
            </ul>
            <a href="{{route('profile.edit')}}">{{ __('Profile') }}</a>
            <form method="POST" action="{{ route('logout') }}">    @csrf
                <x-responsive-nav-link :href="route('logout')"
                                       onclick="event.preventDefault();                    this.closest('form').submit();">        {{ __('Log Out') }}    </x-responsive-nav-link>
            </form>
        </div>
    </nav>
</header>
