@props(['name', 'placeholder'])

@php
    $inputs = ['query'=>'query', 'location'=>'location', 'new_cases'=>'new_cases', 'deaths'=>'deaths', 'recovered'=>'recovered'];
    unset($inputs[$name]);
@endphp

<form 
action="{{ route('by_country') }}" method="GET">

@foreach ($inputs as $input)
    @if (request($input))
        <input type="hidden" name="{{ $input }}" value="{{ request($input) }}">
    @endif
@endforeach

<div class="relative md:w-60 ">
    <img src="{{ asset('assets/magnifier.png') }}" alt="search" class="absolute top-1/2 left-4 md:left-6 -translate-y-1/2 ">
    <input 
    class="text-zinc-550 w-full pl-12 md:pl-14 py-6 md:py-4  border-0 md:border-[1px] md:border-neutral-250 md:rounded-[8px] text-sm font-medium focus:outline-none focus:ring-0 "
    type="text" 
    name="{{ $name }}" placeholder="{{ $placeholder }}">
</div>
</form>