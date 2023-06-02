@extends('/components/main')
@section('content')
    @php($user = Auth::user())
    <h1>Mijn geleende items</h1>
    <article class="ProductCard-holder">
    @foreach (App\Models\Product::where('loaned_to', $user->id)->get() as $product)
        @include('/components/productCard')
    @endforeach
    </article>
@endsection
