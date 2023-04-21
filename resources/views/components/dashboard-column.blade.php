@props(['country'])

<div class=" grid grid-cols-12 py-5 text-center md:rounded-t-[8px] border-b-[1px] border-neutral-150">
    <p class="text-sm  break-words col-span-3 md:col-span-2">{{ $country->location  }}</p>
    <p class="text-sm  break-words col-span-3 md:col-span-2">{{ $country->new_cases }}</p>
    <p class="text-sm  break-words col-span-3 md:col-span-2">{{ $country->deaths }}</p>
    <p class="text-sm  break-words col-span-3 md:col-span-2">{{ $country->recovered }}</p>
</div>