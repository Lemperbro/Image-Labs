@include('partials.head')

<header class="fixed z-50 w-full">
        <div class="px-4 md:container">
            @include('partials.navbar')
        </div>
</header>
<div class="px-4 md:container min-h-screen ">
    @yield('container')
</div>

</div>
@include('partials.footer')
@include('partials.end')
