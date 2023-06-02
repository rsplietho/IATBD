<div>
    <ul class="navigation">
        <li class="navigation"><a class="navigation {{ (Request::is('/')) ? 'active' : '' }}" href="{{ route('home') }}"><span class="material-symbols-rounded">Home</span>&nbsp;&nbsp;Home</a></li>
        <li class="navigation"><a class="navigation {{ (Request::is('search')) ? 'active' : '' }}" href="{{ route('search') }}"><span class="material-symbols-rounded">Search</span>&nbsp;&nbsp;Zoeken</a></li>
        <li class="navigation"><a class="navigation {{ (Request::is('new')) ? 'active' : '' }}" href="{{ route('new') }}"><span class="material-symbols-rounded">add</span>&nbsp;&nbsp;Nieuw</a></li>
        @if (Auth::check())
            @if (Auth::user()->role == 1)
                <li class="navigation"><a class="navigation {{ (Request::is('admin')) ? 'active' : '' }}" href={{ route('admin') }}><span class="material-symbols-rounded">admin_panel_settings</span>&nbsp;&nbsp;Administratorinstellingen</a></li>
            @endif
            <li class="dropdown">
                <a class="dropbtn navigation {{ strpos(url()->current(), 'profile') !== false ? 'active' : '' }}" href={{ route('profile') }}><span class="material-symbols-rounded">Person</span>&nbsp;&nbsp;{{Auth()->user()->name}}<span class="material-symbols-rounded">expand_more</span></a>
                <div class="dropdown-content">
                    <a href={{ route('profile.items') }}>Mijn producten</a>
                    <a href={{ route('profile.loaned') }}>Geleende producten</a>
                    <a href={{ route('profile') }}>Profielinstellingen</a>
                </div>
            </li>
            <li class="{{ (Request::is('logout')) ? 'active' : '' }} float-right logout"><a class="navigation logout" href={{ route('logout')}} onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="material-symbols-rounded">Logout</span>&nbsp;&nbsp;Uitloggen</a></li>
        @else
            <li class="{{ (Request::is('login')) ? 'active' : '' }} float-right"><a class="navigation" href={{ route('login')}}><span class="material-symbols-rounded">Login</span>&nbsp;&nbsp;Inloggen</a></li>
            <li class="{{ (Request::is('register')) ? 'active' : '' }} float-right"><a class="navigation" href={{ route('register')}}><span class="material-symbols-rounded">Person_add</span>&nbsp;&nbsp;Registreren</a></li>
        @endif
    </ul>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
</div>
