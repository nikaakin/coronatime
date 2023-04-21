@props(['name'])

@php
    $initialValue =  request($name); 
    $value = request($name);
    if($value == '' || $value ==  'desc') $value = 'asc';
    else $value = 'desc';
    $inputs = ['query'=>'query', 'location'=>'location', 'new_cases'=>'new_cases', 'deaths'=>'deaths', 'recovered'=>'recovered'];
    unset($inputs[$name]);
@endphp

<form 
action="{{ route('by_country') }}" method="GET"
class=" col-span-3 md:col-span-2 "
>
    <button>
        
            @foreach ($inputs as $input)
            @if (request($input))
            <input type="hidden" name="{{ $input }}" value="{{ request($input) }}">
            @endif
        @endforeach
        
        <input type="hidden" name="{{ $name }}" value="{{ $value }}">
        <div class="relative">
            <p class="text-sm font-semibold  break-words">{{ __('dashboard.'. $name) }}</p>
            
            <img src="{{ asset('assets/' . ($initialValue == "asc" ? "arrow-black.png" : "arrow-gray.png")) }}" 
            alt="arrow" 
            class="absolute top-1/2 -right-4 -translate-y-1.5 transform rotate-180">
            
            <img src="{{ asset('assets/' .  ($initialValue == 'desc' ? 'arrow-black.png' : 'arrow-gray.png')) }}" 
            alt="arrow" 
            class="absolute top-1/2 -right-4 translate-y-1 transform rotate-0">
        </div>
            
    </button>
</form>