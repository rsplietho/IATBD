@extends('/components/main')

@section('content')
    <h1>Profiel</h1>
    @php($user = Auth::user())
    <a class='button' href="/user/{{$user->username}}/edit"><span class="material-symbols-rounded">edit</span> Bewerken</a>
    <p>Naam: {{$user->name}}
    <p>Gebruikersnaam: {{$user->username}}
    <p>Emailadres: {{$user->email}}</p>
    <p>Rol: {{$user->role}}, {{App\Models\Role::find($user->role)->value('name')}}</p>
@endsection
