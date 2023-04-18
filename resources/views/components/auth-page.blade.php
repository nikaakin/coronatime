<div class="flex ">
    <div class="flex-1 px-4 pt-6 md:pl-28 md:pt-10">
        <a href="{{ route('home') }}">
            <img src="{{ asset("assets/logo.svg") }}" class=" mb-10 md:mb-12 w-40 h-auto"/>
        </a>
        {{ $slot }}
    </div>
    <img src="{{ asset("assets/side-pic.png") }}" alt="side pic"
    class=" h-screen w-auto hidden md:block"
    />
</div>