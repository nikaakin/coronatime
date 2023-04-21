@props(['name'])

@php
    $inputs = ['search'=>'search', 'delete'=>'delete'];
    unset($inputs[$name]);
@endphp

<form 
action="{{ route('by_country') }}" method="GET">

@foreach ($inputs as $input)
    @if (request($input))
        <input type="hidden" name="{{ $input }}" value="{{ request($input) }}">
    @endif
@endforeach


<input type="text" name="{{ $name }}">
</form>