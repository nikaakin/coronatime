@props(['active'])

<section class="px-4 md:px-28 mb-0 md:mb-8 ">
    <h1 class="font-extrabold text-2xl mb-6 md:mb-10">{{ __('dashboard.worldwide_statistics') }}</h1>
    <ul class="flex gap-6 md:gap-16 font-normal border-b-[1px] border-neutral-150">
        <li class=" text-base pb-4 {{ $active === 'worldwide' ? 'font-bold border-b-[3px]  border-slate-970':'' }}">
            <a href="{{ route('home') }}">{{ __('dashboard.worldwide') }}</a>
        </li>
        <li class=" text-base pb-4 {{ $active === 'by_country' ? 'font-bold border-b-[3px]  border-slate-970':'' }}">
            <a href="{{ route('by_country') }}">{{ __('dashboard.by_country') }}</a>
        </li>
    </ul>
</section>