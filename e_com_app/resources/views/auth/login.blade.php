<!DOCTYPE html>
<html>

<head>
@include('home.css')
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    
    <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div class="input-group">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full rounded-lg border-2 border-gray-300 focus:ring-2 focus:ring-indigo-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
        </div>

        <!-- Password -->
        <div class="input-group">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full rounded-lg border-2 border-gray-300 focus:ring-2 focus:ring-indigo-500" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center">
            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
            <label for="remember_me" class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</label>
        </div>

        <div class="flex items-center justify-between mt-6">
            @if (Route::has('password.request'))
                <a class="text-sm text-indigo-600 hover:text-indigo-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="px-6 py-2 text-white bg-indigo-600 hover:bg-indigo-700 rounded-md focus:ring-2 focus:ring-indigo-500">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>


</body>

</html>