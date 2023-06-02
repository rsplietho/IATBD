@extends('/components/main')

@section('content')
    <h1>Login</h1>

    <form method="POST" action="{{ route('login') }}">
            @csrf
            @if($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="error">{{ $error }}</p>
                @endforeach
            @endif
            @if (session('error'))
                <p class="error">{{ session('error') }}<p>
            @endif
       
            <!-- Username -->
            <div>
                <label for="username" :value="__('Username')" />

                <input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" placeholder="Username" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password" :value="__('Password')" />

                <input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                placeholder="Password"
                                required>
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <button class="ml-3">
                    {{ __('Log in') }}
                </button>
            </div>
        </form>

@endsection
