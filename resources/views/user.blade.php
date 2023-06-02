@extends('/components/main')
@section('content')
    @php($user = App\Models\User::where('username', request()->route('username'))->first())
    <h1>{{$user->name}}</h1>
    <article class="ProductCard-holder">
    @foreach (App\Models\Product::where('owner', $user->id)->get() as $product)
        @include('/components/productCard')
    @endforeach
    </article>
@endsection
