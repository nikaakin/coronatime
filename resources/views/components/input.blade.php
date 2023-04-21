@props(['name' ,'type', 'id', 'label', 'placeholder', 'error', 'isError' => false, 'isCorrect' => false])

@php
    if (count($errors) != 0) {
        if ($errors->has($error)) {
            $isError = true ;   
            $isCorrect = false;
        }else{
            $isError = false ;   
            $isCorrect = true;
        }
    }
@endphp    

<div class="relative flex gap-2 flex-col max-w-sm w-full mb-4 md:mb-6">
    <label
    class="block font-bold text-base text-slate-970"
    for="{{ $id }}">{{ $label }}</label>

    <div class="relative w-full">
        <input 
        class="py-4 w-full border-neutral-250 border rounded-[8px] px-6 text-zinc-550 text-base focus:shadow-focused focus:border-blue-750 outline-none {{ $isError ? 'border-red-750' : '' }} {{ $isCorrect ? 'border-green-650' : '' }} "
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $id }}"
        value="{{ old($name) }}"
        placeholder="{{ $placeholder }}"
        />
        @if ($isCorrect)
            <img class="absolute top-1/2 -translate-y-1/2 right-4" src="{{ asset('assets/correct.svg') }}">
        @endif
    
    </div>
    
    @error($error)
        <div class="flex flex-row gap-2 font-medium text-red-750">
            <img src="{{ asset('assets/wrong.svg') }}">    
            {{ $message }}
        </div>
    @enderror
</div>

