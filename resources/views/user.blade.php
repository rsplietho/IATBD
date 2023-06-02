@extends('/components/main')
@section('content')
    @php($user = App\Models\User::where('username', request()->route('username'))->first())
    <h1>{{$user->name}}</h1>
    <h2><a href='mailto:{{$user->email}}'>{{$user->email}}</a></h2>
    <article class="ProductCard-holder">
    @foreach (App\Models\Product::where('owner', $user->id)->get() as $product)
        @include('/components/productCard')
    @endforeach
    </article>
@endsection
