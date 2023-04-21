<div class=" hidden md:flex">
    <h6 
    class="md:mr-4 md:pr-4 md:border-r-[1px] border-neutral-250 font-bold text-base "
    >{{ auth()->user()->username }}</h6>
    <a href="{{ route('logout') }}" class="font-medium text-sm">{{ __('dashboard.logout') }}</a>
</div>

<div class="flex md:hidden">
    <button id="dropdownDelayButton" data-dropdown-toggle="dropdownDelay" data-dropdown-delay="500"  class=" items-center flex  focus:outline-none  font-normal  text-base text-center  " type="button-1">
        <img src="{{ asset('assets/burger.svg') }}" alt="" class=" cursor-pointer">
        </button>
    
    <div id="dropdownDelay"  class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
            <li class="block px-4 py-2 dark:hover:bg-gray-600 dark:hover:text-white">
                {{ auth()->user()->username }}
            </li>
            <li>
                <a href="{{ route('logout') }} " 
                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                >{{ __('dashboard.logout') }}</a>
            </li>
        </ul>
    </div>
</div>