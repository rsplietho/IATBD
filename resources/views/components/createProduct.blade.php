<div>
    <form class="createProduct" method="POST" action="/createproduct" enctype="multipart/form-data">
        @csrf
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <p class="error">{{ $error }}</p>
            @endforeach
        @endif
        <label for="name">Titel:</label>
        <input id='name' name="Naam" required>
        <label for="description">Beschrijving:</label>
        <input id='description' name="Beschrijving">
        <label for="image">Afbeelding:</label>
        <input id='image' type="file" accept=".png,.jpeg,.jpg" name="Afbeelding">
        <label for="category">Categorie:</label>
        <select id="category" name="Categorie" required>
            <option value="" disabled selected>Kies een categorie</option>
            @foreach (App\Models\Category::all() as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        <input id="submit" type="submit" value="Aanmaken">
    </form>
</div>