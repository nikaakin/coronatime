<x-layout>
    <div class="max-w-sm w-full mx-auto px-4  flex flex-col h-screen">
        <a href="{{ route('home') }}" class="mx-4 mt-6 mb-10 md:flex md:justify-center md:mt-10 md:mb-36 block">
            <img src="{{ asset('assets/logo.svg') }}" alt="">
        </a>

        <h1 class="text-center font-black text-2xl mb-10 md:mb-14">{{ __('passwords.reset_password') }}</h1>

        <form action="{{ route('password.email') }}" class="flex-1 flex flex-col pb-10 md:block" method="POST">
            @csrf
            <div class="mb-14 flex-1">
                <x-input 
                type="email" 
                name="email" 
                placeholder="{{ __('signup.email_placeholder') }}" 
                id="email" 
                label="{{ __('signup.email') }}" 
                error="email" />
            </div>

            <div class="text-end">
                <x-button content="{{ __('login.reset_password') }}"/>
            </div>
        </form>
   </div>
</x-layout>