<x-layout>
    <div class="max-w-lg w-full p-4 pb-10 relative md:mt-44 md:mx-auto md:mb-14">
        <img src="{{ asset('assets/preview.png') }}" alt="w-full" >
    </div>

    <div class="flex   flex-col items-center p-4">
        <h1 class="font-black text-2xl mb-2 md:mb-4">{{ __('login.recover_email') }}</h1>
        <h3 class="font-normal text-lg mb-6 md:mb-10">{{ __('login.recover_email_hint') }}</h3>
        <x-button-link href="#" content="{{ __('login.recover_email_button') }}"/>
    </div>
</x-layout>