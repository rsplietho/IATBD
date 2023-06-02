@extends('/components/main')

@section('content')
    <h1>Zoeken</h1>
    <form method="POST" action="/search">
        @csrf
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <p class="error">{{ $error }}</p>
            @endforeach
        @endif
        <label style='display: none;' for="query">Zoeken: </label>
        <input id='query' name="Query" placeholder="Zoeken">
        <label style='display: none;' for="Categorie">categorie: </label>
        <select id="Categorie" name="Categorie">
            <option value=null selected>Alle categoriën</option>
            @foreach (App\Models\Category::all() as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        <input id="submit" type="submit" value="Zoeken">
    </form>
    @if ($query ?? '' != null OR $filterCategory ?? '' != null)
        <h2><b>Resultaten voor:</b>@if($query != null) {{$query}}@else <i>Geen zoekopdracht ingevuld</i>@endif</h2>
        <h3>Categorie: @if ($filterCategory != null)
            {{App\Models\Category::where('id', $filterCategory)->first()->name}}
            @else
            Alle categoriën
        @endif</h3>
        @if (App\Models\Product::where('name', 'LIKE', $query)->where('category', 'LIKE', $filterCategory)->first() == null)
            <p class="error">De ingevulde zoekopdracht levert geen resultaten op.</p>
        @else
            <article class="ProductCard-holder">
                @foreach (App\Models\Product::where('name', 'LIKE', $query)->where('category', 'LIKE', $filterCategory)->get() as $product)
                    @include('/components/productCard')
                @endforeach
            </article>
        @endif
    @endif
@endsection
