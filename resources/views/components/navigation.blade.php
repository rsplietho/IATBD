<div>
    <ul class="navigation">
        <li class="navigation"><a class="navigation {{ (Request::is('/')) ? 'active' : '' }}" href="{{ route('home') }}"><span class="material-symbols-rounded">Home</span>&nbsp;&nbsp;Home</a></li>
        <li class="navigation"><a class="navigation {{ (Request::is('new')) ? 'active' : '' }}" href="{{ route('new') }}"><span class="material-symbols-rounded">Grade</span>&nbsp;&nbsp;New</a></li>
        <li class="navigation"><a class="navigation {{ (Request::is('search')) ? 'active' : '' }}" href="{{ route('search') }}"><span class="material-symbols-rounded">Search</span>&nbsp;&nbsp;Search</a></li>
        @if (Auth::check())
            @if (Auth::user()->role == 1)
                <li class="navigation"><a class="navigation {{ (Request::is('admin')) ? 'active' : '' }}" href={{ route('admin') }}><span class="material-symbols-rounded">admin_panel_settings</span>&nbsp;&nbsp;Administrator Settings</a></li>
            @endif
            <li class="dropdown">
                <a class="dropbtn navigation {{ strpos(url()->current(), 'profile') !== false ? 'active' : '' }}" href={{ route('profile') }}><span class="material-symbols-rounded">Person</span>&nbsp;&nbsp;{{Auth()->user()->name}}<span class="material-symbols-rounded">expand_more</span></a>
                <div class="dropdown-content">
                    <a href={{ route('profile.items') }}>My Items</a>
                    <a href={{ route('profile.loaned') }}>Loaned Items</a>
                    <a href={{ route('profile') }}>Profile Settings</a>
                </div>
            </li>
            <li style="float: right" class="{{ (Request::is('logout')) ? 'active' : '' }}"><a class="navigation" href={{ route('logout')}} onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="material-symbols-rounded">Logout</span>&nbsp;&nbsp;Log out</a></li>
        @else
            <li style="float: right" class="{{ (Request::is('login')) ? 'active' : '' }}"><a class="navigation" href={{ route('login')}}><span class="material-symbols-rounded">Login</span>&nbsp;&nbsp;Log in</a></li>
            <li style="float: right" class="{{ (Request::is('register')) ? 'active' : '' }}"><a class="navigation" href={{ route('register')}}><span class="material-symbols-rounded">Person_add</span>&nbsp;&nbsp;Register</a></li>
        @endif
    </ul>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
</div>
