<a href='/product/{{$product->id}}' class="productCardLink"><section class='productCard'>
    <img class="productCardImage" src='/{{$product->image}}' alt="Productafbeelding">
    <h2 class="productCardTitle">{{$product->name}}</h2>
    <p class="productCardOwner">{{App\Models\User::where('id', $product->owner)->first()->name}}</p>
    @if ($product->loaned_to != null)
        @if(App\Http\Controllers\ProductController::deletionAuth($product->id))
        <p class="loaned_out">Uitgeleend aan: {{App\Models\User::where('id', $product->loaned_to)->first()->name}}</p>
        @else
        <p class="loaned_out">Uitgeleend</p>
        @endif
    @else
        <p class="loaned_out">Beschikbaar!</p>
    @endif
</section></a>