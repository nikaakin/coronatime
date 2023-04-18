{{-- list of local messages --}}
{{-- message="{{ __('validation.confirmation') }}" --}}
{{-- message="{{ __('passwords.update_success') }}" --}}
{{-- message="{{ __('signup.account_confirm') }}" --}}


<x-layout>
    <div class="max-w-sm w-full mx-auto px-4 pt-6 flex flex-col h-screen">
        <a href="{{ route('home') }}" class="mx-4 mt-6 mb-10 md:flex md:justify-center md:mt-10 md:mb-36 block ">
            <img src="{{ asset('assets/logo.svg') }}" alt="">
        </a>

        <div class="absolute top-80  left-1/2 -translate-x-1/2  flex justify-center flex-col items-center gap-4 w-full">
            <img src="{{ asset('assets/checkmark.gif') }}" alt="" class="w-14" >
             <h3>{{ $message }}</h3>
        </div>
   </div>
</x-layout>