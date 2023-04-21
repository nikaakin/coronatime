@props(['src', 'content', 'number', 'color'])

<div {{ $attributes->merge(['class'=> 'flex flex-col items-center justify-center bg-opacity-10 shadow-card rounded-[16px] ']) }} |>
    <img src="{{ $src }}" alt="icon" class=" w-24 h-auto pt-6 md:pt-8 pb-4 md:pb-6">
    <p class="text-base md:text-xl font-medium mt-2 pb-4 md:pb-6">{{ $content }}</p>
    <p class="text-2xl md:text-4xl font-black mt-2 pb-6 md:pb-8 {{ $color }}">{{ number_format($number) }}</p>
</div>
