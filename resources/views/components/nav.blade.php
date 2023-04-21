<nav class="flex flex-1 px-4 pt-6 md:px-28 md:pt-10 justify-between text-slate-970 pb-6 md:pb-5 mb-6 md:mb-10 items-center border-b-[1px] border-neutral-150">
    <a href="{{ route('home') }}"  >
        <img src="{{ asset("assets/logo.svg") }}" class="  w-40 h-auto"/>
    </a>

    <div class="flex flex-row gap-12 items-center">
        <div class="font-normal  text-base">
           <x-dropdown></x-dropdown>
        </div>

        <x-burger></x-burger>
    </div>
</nav>