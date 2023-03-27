@extends('/components/main')

@section('content')
    <h1>Profile</h1>
    <a href="{{ url('profile/edit') }}">Edit Contents</a>
    <p>Name: {{Auth::user()->name}}
    <p>Username: {{Auth::user()->username}}
    <p>Role: {{Auth::user()->role}}, {{App\Models\Role::find(Auth::user()->role)->value('name')}}</p>

    <p>{{Auth::user()}}</p>
@endsection
