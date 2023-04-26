<div class="flex  ">
    <div class="lg:flex-1 px-4 pt-6 md:pl-28 md:pt-10 mx-auto">
        <div class="flex mb-10 md:mb-12">
            <a href="{{ route('home') }}">
                <img src="{{ asset("assets/logo.svg") }}" class="  w-40 h-auto"/>
            </a>
    
        </div>
        {{ $slot }}
    </div>
    <img src="{{ asset("assets/side-pic.png") }}" alt="side pic"
    class=" h-screen w-auto hidden lg:block"
    />
</div>