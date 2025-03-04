<x-auth-layout>

    {{-- title --}}
    <x-slot:title>Sign In</x-slot>
    <x-slot:subtitle>Get access to your account</x-slot>

    <div class="flex flex-col gap-3">
        {{-- google login link --}}
        <button
            class="py-1.5 rounded bg-slate-100 border border-slate-200 inline-flex items-center justify-center gap-3 text-sm">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 488 512" class="size-3 text-red-500" fill="currentColor">
                <path
                    d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z" />
            </svg>
            <span>Sign in with google</span>
        </button>

        {{-- facebook login link --}}
        <button
            class="py-1.5 rounded bg-slate-100 border border-slate-200 inline-flex items-center justify-center gap-3 text-sm">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="size-3 text-blue-500" fill="currentColor">
                <path
                    d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z" />
            </svg>
            <span>Sign in with facebook</span>
        </button>
    </div>

    {{-- or sign in with email --}}
    <div class="my-5 flex items-center">
        <div class="flex-1 bg-slate-100 h-[1px] rounded-s"></div>
        <div class="leading-none text-sm px-2 py-1 bg-slate-100">or use email</div>
        <div class="flex-1 bg-slate-100 h-[1px] rounded-e"></div>
    </div>


    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-forms.input-label for="email" :value="__('Email')" />
            <x-forms.text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autofocus autocomplete="username" />
            <x-forms.input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-forms.input-label for="password" :value="__('Password')" />

            <x-forms.text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-forms.input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-4">
            <!-- Remember Me -->
            <div class="block">
                <label for="remember_me" class="inline-flex items-center">
                    <x-forms.checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            {{-- password reset request link --}}
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <div class=" mt-4">
            <x-primary-button class="w-full">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

    <div class="mt-4 flex items-center justify-center text-sm">
        <a href="{{ route('register') }}" class="text-indigo-500 hover:underline">Create an account</a>
    </div>
</x-auth-layout>
