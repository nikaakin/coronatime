<x-layout>
    <x-nav/>
    <x-dashboard-header active="by_country"/>
    <section class="px-0 md:px-28  md:mb-10 w-full md:w-60">
        <x-search-input name="query" placeholder="{{ __('dashboard.search_by_country') }}"/>
    </section>
    <section class="px-0 md:px-28 mb-6 md:mb-8 w-full ">
        <x-dashboard-table :countries="$countries" />
    </section>
</x-layout>