<x-layout>
   <x-auth-page>
        <h1 class=" font-black text-xl md:text-2xl mb-4">{{ __('login.title') }}</h1>
        <h3 class=" font-normal text-base md:text-xl mb-6 text-zinc-550 ">{{ __('login.title_sub') }}</h3>
       
        <form action="{{ route('login') }}" method="POST">
         @csrf
            <div class="mb-6">
               <x-input 
               id="username" 
               name="username" 
               error="username"
               type="text"
               label="{{ __('login.username') }}"
            placeholder="{{ __('signup.username_placeholder') }}" 
            />
         
            <x-input 
               id="password" 
               name="password"
               error="password" 
               type="password"
               label="{{ __('login.password') }}"
               placeholder="{{ __('signup.password_placeholder') }}" 
            />
         </div>

         @if (session('error'))
            <div class="flex flex-row gap-2 font-medium text-red-750 mb-4">
               <img src="{{ asset('assets/wrong.svg') }}">    
               {{ session('error') }}
         </div>
         @endif

         <div class="flex flex-row  items-center max-w-sm ">
           <div class="flex-1">
            <input type="checkbox" name="remember" class="rounded text-green-550 focus:ring-transparent mr-2" id="remember"/>
            <label for="remember" class="font-semibold text-sm">{{ __('login.remember') }}</label>
           </div>
            <a href="{{ route('show_forgot') }}" class="font-semibold text-sm text-blue-750">{{ __('login.forgot') }}</a>
         </div>

         <div class="mt-6">
            <x-button content="{{ __('login.button') }}"/>
         </div>

         <div class="flex flex-row items-center mt-6 text-zinc-550 text-sm md:text-base justify-center max-w-sm w-full">
            <div class="">{{ __('login.question') }}</div>
            &nbsp;
            <a href="{{ route('show_signup') }}" class="font-semibold  text-slate-970"> {{ __('login.question_link') }}</a>
         </div>   

         </form>

   </x-auth-page>
</x-layout>