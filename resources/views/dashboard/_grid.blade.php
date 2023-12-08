<h1 class="font-semibold text-xl lg:text-2xl">Feature</h1>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 mt-5">
    @include('partials.card')
</div>

<a href="{{ route('dashboard.features') }}"
    class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-gray-900 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none flex items-center justify-center mx-auto mt-10 w-full"
    type="button" data-ripple-light="true">
    Lihat Semua
</a>
