@extends('/components/main')

@section('content')
    <h1>Administratorinstellingen</h1>
    <h2>Gebruikers</h2>
    <table>
        <tr>
            <th>Naam</th>
            <th>Gebruikersnaam</th>
            <th>Emailadres</th>
            <th>Rol</th>
            <th>Status</th>
            <th style="width: 1em" \>
            <th style="width: 1em" \>
        </tr>
        @foreach (App\Models\User::all() as $user)
        
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->username}}</td>
            <td>{{$user->email}}</td>
            <td>{{App\Models\Role::where('id',$user->role)->value('name')}}</td>
            <td>@if($user->status == 1)
                Actief
                @else
                Geblokkeerd
                @endif
            </td>
            <td><a href="/user/{{$user->username}}/edit"><span class="material-symbols-rounded">edit</span></a></td>
            <td>
                <form id='blockUser' method="POST" action="/user/{{$user->username}}/block" onsubmit="return confirm('Weet je zeker dat je {{$user->username}} wil @if($user->status)blokkeren @else&#x200b;deblokkeren @endif ?');">
                    @csrf
                    <input style='display: none;' name='userid' value="{{$user->id}}">
                    <button class='linkButton' id="submit" type="submit"><i class="material-symbols-rounded">
                        @if($user->status == 1)
                        block
                        @else
                        check_circle
                        @endif
                    </i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
