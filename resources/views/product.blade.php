@extends('/components/main')
@section('content')

<section class="productPageWrapper">
<section class="productPageDetails">
    @php($product = App\Models\Product::where('id', request()->route('id'))->first())
    {{-- @dd(App\Http\Controllers\ProductController::deletionAuth($product->id)) --}}
    <h1 class="productTitle">{{$product->name}}</h1>
    <p class="productOwner"><b>Aangeboden door:</b> <a href="/user/{{App\Models\User::where('id', $product->owner)->first()->username}}">{{App\Models\User::where('id', $product->owner)->first()->name}}</a></p>
    <p class="productCategory"><b>Categorie:</b> {{App\Models\Category::where('id', $product->category)->first()->name}}</p>
    
    <p class="productDescription">{{$product->description}}</p>

    <h2>Uitlenen</h2>
    @if(App\Http\Controllers\ProductController::deletionAuth($product->id))
        @if($product->loaned_to == null)
            <p>Dit product is momenteel niet uitgeleend.</p>
            <form method="POST" action="/loanout">
                @csrf
                @if($errors->any())
                    @foreach ($errors->all() as $error)
                        <p class="error">{{ $error }}</p>
                    @endforeach
                @endif
                <input style='display: none;' name='productid' value="{{$product->id}}">
                <label for="username">Uitlenen aan gebruiker: </label>
                <input id='username' name="username" placeholder="Gebruikersnaam" required>
                <input id="submit" type="submit" value="Uitlenen">
            </form>
        @else
            <p>Momenteel uitgeleend aan: {{App\Models\User::where('id', $product->loaned_to)->first()->name}}</p>
            <p>Deadline: {{$product->returnDate}}</p>
            <form method="POST" action="/takeback">
                @csrf
                <input style='display: none;' name='productid' value="{{$product->id}}">
                <input class="takeBack" id="submit" type="submit" value="Terugnemen">
            </form>
        @endif
    @else
        @if($product->loaned_to == null)
            <p>Dit product is momenteel niet uitgeleend.</p>
        @else
            <p>Dit product is momenteel uitgeleend, maar komt op {{$product->returnDate}} weer terug!</p>
        @endif            
    @endif
    @if (App\Http\Controllers\ProductController::deletionAuth($product->id))
        <form method="POST" action="/removeproduct" onsubmit="return confirm('Weet je zeker dat je dit product wil verwijderen? Dit kan niet ongedaan worden gemaakt.');">
            @csrf
            <input style='display: none;' name='productid' value="{{$product->id}}">
            <input class="takeBack" id="submit" type="submit" value="Product Verwijderen">
        </form>
    @endif
</section>
<section class="productPageLoaned">
    <a href="/{{$product->image}}" target="_blank"><img class="productImage" src='/{{$product->image}}' alt="Productafbeelding"></a>
</section>
</section>
@endsection
