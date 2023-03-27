<div class="navigation">
    <ul>
        <li><a href={{ route('home') }}><span class="material-symbols-rounded">Home</span> Home</a></li>
        <li><a href={{ route('new') }}><span class="material-symbols-rounded">Grade</span> New</a></li>
        <li><a href={{ route('search') }}><span class="material-symbols-rounded">Search</span> Search</a></li>
        @if (Auth::check())
            <li><a href={{ route('profile') }}><span class="material-symbols-rounded">Person</span> {{Auth()->user()->name}}</a></li>
            <li><a href={{ route('logout')}} onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="material-symbols-rounded">Logout</span> Log out</a></li>
        @else
            <li><a href={{ route('login')}}><span class="material-symbols-rounded">Login</span> Log in</a></li>
        @endif
        </ul>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
</div>
