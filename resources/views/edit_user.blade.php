@extends('/components/main')
@section('content')
@php($user = App\Models\User::where('username', request()->route('username'))->first())
<h1>{{$user->name}} aanpassen</h1>
<div>
    <form class="createProduct" method="POST" action="/user/{{$user->username}}/edit" enctype="multipart/form-data">
        @csrf
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <p class="error">{{ $error }}</p>
            @endforeach
        @endif
        <input style="display: none;" name='userID' value="{{$user->id}}">
        <label for="name">Naam:</label>
        <input id='name' name="name" value="{{$user->name}}">
        <label for="username">Gebruikersnaam:</label>
        <input id='username' name="username" value="{{$user->username}}">
        <label for="email">Emailadres:</label>
        <input id='email' name="email" type='email' value="{{$user->email}}">
        <label for="password">Wachtwoord:</label>
        <input id='password' name="password" type=password>
        <label for="password_confirmation">Wachtwoord herhalen:</label>
        <input id='password_confirmation' name="password_confirmation" type=password>
        <input id="submit" type="submit" value="Bewerken">
    </form>
</div>

@endsection