<div class="navigation">
    <ul>
        <li><a href={{ route('home') }}><span class="material-symbols-rounded">Home</span>&nbsp;&nbsp;Home</a></li>
        <li><a href={{ route('new') }}><span class="material-symbols-rounded">Grade</span>&nbsp;&nbsp;New</a></li>
        <li><a href={{ route('search') }}><span class="material-symbols-rounded">Search</span>&nbsp;&nbsp;Search</a></li>
        @if (Auth::check())
            @if (Auth::user()->role == 1)
                <li><a href={{ route('admin') }}><span class="material-symbols-rounded">admin_panel_settings</span>&nbsp;&nbsp;Administrator Settings</a></li>
            @endif
            <li><a href={{ route('profile') }}><span class="material-symbols-rounded">Person</span>&nbsp;&nbsp;{{Auth()->user()->name}}</a></li>
            <li><a href={{ route('logout')}} onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="material-symbols-rounded">Logout</span>&nbsp;&nbsp;Log out</a></li>
        @else
            <li><a href={{ route('login')}}><span class="material-symbols-rounded">Login</span>&nbsp;&nbsp;Log in</a></li>
            <li><a href={{ route('register')}}><span class="material-symbols-rounded">Person_add</span>&nbsp;&nbsp;Register</a></li>
        @endif
        </ul>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
</div>
