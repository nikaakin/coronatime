<x-layout>
    <x-nav/>
    <x-dashboard-header active="worldwide"/>

   <section class="px-4 mt-6 mb-14 md:px-28 grid grid-rows-2   md:grid-cols-3 gap-4 md:gap-6 ">
        <x-card 
        src="{{ asset('assets/new-cases.svg') }}" 
        content="{{ __('dashboard.new_cases') }}" 
        number="{{ $new_cases }}"
        color="text-blue-750"
        class="bg-blue-750 col-span-2 md:col-span-1" 
        />
        <x-card 
        src="{{ asset('assets/recovered.svg') }}" 
        content="{{ __('dashboard.recovered') }}" 
        number="{{ $recovered }}"
        color="text-green-550"
        class="bg-green-550"
        />
        <x-card 
        src="{{ asset('assets/death.svg') }}" 
        content="{{ __('dashboard.deaths') }}" 
        number="{{ $deaths }}"
        color="text-yellow-450"
        class="bg-yellow-450"
        />
   </section>
</x-layout>