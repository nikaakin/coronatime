<x-layout>
    <x-auth-page>
         <h1 class=" font-black text-xl md:text-2xl mb-4">{{ __('signup.title') }}</h1>
         <h3 class=" font-normal text-base md:text-xl mb-6 text-zinc-550 ">{{ __('signup.title_sub') }}</h3>
        
         <form action="" class="mb-12 max-w-sm w-full">
             <div class="mb-6">
                <x-input 
                id="username" 
                name="username" 
                type="text"
                label="{{ __('signup.username') }}"
                placeholder="{{ __('signup.username_placeholder') }}" 
                error="{{ __('auth.username_required') }}"
             />
          
                <x-input 
                id="email" 
                name="email" 
                type="text"
                label="{{ __('signup.email') }}"
                placeholder="{{ __('signup.email_placeholder') }}" 
                error="{{ __('auth.email_required') }}"
             />

          
             
             <x-input 
                id="password" 
                name="password" 
                type="text"
                label="{{ __('signup.password') }}"
                placeholder="{{ __('signup.password_placeholder') }}" 
                error="{{ __('auth.password_required') }}"
                />

             <x-input 
                id="password_repeat" 
                name="password_repeat" 
                type="text"
                label="{{ __('signup.password_repeat') }}"
                placeholder="{{ __('signup.password_repeat') }}" 
                error="{{ __('auth.repeat_required') }}"
               />

            </div>
 
            <div class="mt-6">
               <x-button content="{{ __('signup.button') }}"/>
            </div>
   
            <div class="flex flex-row items-center mt-6 text-zinc-550 text-sm md:text-base justify-center ">
               <div class="">{{ __('signup.question') }}</div>
               &nbsp;
               <a href="#" class="font-semibold  text-slate-970"> {{ __('signup.question_link') }}</a>
            </div>   
 
          </form>
 
    </x-auth-page>
 </x-layout>