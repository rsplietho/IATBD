<div>
    <ul class=navbar>
        @foreach ($pages as $page)
            <li><a href="{{ route($page->url) }}">{{ $page->name }}</a></li>
        @endforeach
        <li><a href="{{ route('login') }}">Login</a></li>
    </ul>
</div>
