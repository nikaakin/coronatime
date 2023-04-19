<x-layout>
    <div class="max-w-sm w-full mx-auto px-4  flex flex-col h-screen">
        <a href="{{ route('home') }}" class="mx-4 mt-6 mb-10 md:flex md:justify-center md:mt-10 md:mb-36 block">
            <img src="{{ asset('assets/logo.svg') }}" alt="">
        </a>

        <h1 class="text-center font-black text-2xl mb-10 md:mb-14">{{ __('passwords.reset_password') }}</h1>

        <form action="{{ route('password.reset') }}" class="flex-1 flex flex-col pb-10 md:block" method="POST">
            @csrf
            @method('PATCH')

            <input  type="hidden" value="{{ $token }}" name="token">
            <input  type="hidden" value="{{ $email }}" name="email">

            <div class="">
                <x-input 
                type="password" 
                name="password" 
                placeholder="{{ __('signup.password_placeholder') }}" 
                id="password" 
                label="{{ __('signup.password') }}"
                error="password"
                />
            </div>

            <div class="mb-14 flex-1">
                <x-input 
                id="password_repeat" 
                name="password_confirmation" 
                type="password"
                label="{{ __('signup.password_repeat') }}"
                placeholder="{{ __('signup.password_repeat') }}" 
                error="password"
               />
            </div>

            <div class="text-end">
                <x-button content="{{ __('signup.reset_save') }}"/>
            </div>
        </form>
   </div>
</x-layout>