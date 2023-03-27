@extends('/components/main')

@section('content')
    <h1>Register new account</h1>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" :value="__('Name')">
            <input id="name" type="text" name="name" :value="old('name')" placeholder="Name" required autofocus />
        </div>

        <!-- Userame -->
        <div>
            <label for="username" :value="__('Username')">

            <input id="username" type="text" name="username" :value="old('username')" placeholder="Username" required />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <label for="email" :value="__('Email Address')">

            <input id="email" type="email" name="email" :value="old('email')" placeholder="Email Address" required />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password" :value="__('Password')">

            <input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            placeholder="Password"
                            required>
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <label for="password_confirmation" :value="__('Confirm Password')">

            <input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation"
                            placeholder="Confirm Password" required />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <button class="ml-4">
                {{ __('Register') }}
            </button>
        </div>
    </form>

@endsection
