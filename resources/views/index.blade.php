@extends('/components/main')

@section('content')
    <h1>Home</h1>
    <article class="ProductCard-holder">
    @foreach (App\Models\Product::all() as $product)
        @include('/components/productCard')
    @endforeach
    </article>
@endsection
