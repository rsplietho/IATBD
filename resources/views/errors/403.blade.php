@extends('/components/main')

@section('content')
    <h1>Error 403</h1>
    <h2>{{ $exception->getMessage() }}</h2>
    <a href='/'>Ga naar Home</a>
@endsection