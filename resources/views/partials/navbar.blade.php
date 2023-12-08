<nav
    class="w-full px-6 py-3 mx-auto text-white bg-white border shadow-md rounded-xl border-white/80 bg-opacity-80 backdrop-blur-2xl backdrop-saturate-200 mt-4">
    <div class="flex items-center justify-between text-blue-gray-900">
        <a href="#"
            class="mr-4 block cursor-pointer py-1.5 font-sans text-base font-semibold leading-relaxed tracking-normal text-inherit antialiased">
            Image Labs
        </a>
        <div class="hidden lg:block">
            <ul class="flex flex-col gap-2 my-2 lg:mb-0 lg:mt-0 lg:flex-row lg:items-center lg:gap-6">
                <li class="block p-1 font-sans text-sm antialiased font-medium leading-normal text-blue-gray-900">
                    <a href="{{ route('dashboard') }}" class="flex items-center transition-colors hover:text-blue-500">
                        Home
                    </a>
                </li>
                <li class="block p-1 font-sans text-sm antialiased font-medium leading-normal text-blue-gray-900">
                    <a href="{{ route('dashboard.features') }}" class="flex items-center transition-colors hover:text-blue-500">
                        Feature
                    </a>
                </li>
            </ul>
        </div>
        <button
            class="relative ml-auto h-6 max-h-[40px] w-6 max-w-[40px] select-none rounded-lg text-center align-middle font-sans text-xs font-medium uppercase text-inherit transition-all hover:bg-transparent focus:bg-transparent active:bg-transparent disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none lg:hidden"
            type="button" data-collapse-target="navbar" id="btnNav">
            <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" id="burger">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" aria-hidden="true" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
                </svg>
            </span>
            <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 hidden" id="btnX">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" aria-hidden="true" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </span>
        </button>
    </div>
    <div class="block w-full basis-full overflow-hidden h-0 lg:hidden transition-all ease-in" data-collapse="navbar"
        id="menuMobile" style="height: 0px;">
        <ul class="flex flex-col gap-2 my-2 lg:mb-0 lg:mt-0 lg:flex-row lg:items-center lg:gap-6">
            <li class="block p-1 font-sans text-sm antialiased font-medium leading-normal text-blue-gray-900">
                <a href="{{ route('dashboard') }}" class="flex items-center transition-colors hover:text-blue-500">
                    Home
                </a>
            </li>
            <li class="block p-1 font-sans text-sm antialiased font-medium leading-normal text-blue-gray-900">
                <a href="{{ route('dashboard.features') }}" class="flex items-center transition-colors hover:text-blue-500">
                    Feature
                </a>
            </li>
        </ul>
    </div>
</nav>
@push('scripts')
    <script>
        var btnNav = document.getElementById("btnNav");
        var burger = document.getElementById("burger");
        var btnX = document.getElementById("btnX");
        var menuMobile = document.getElementById("menuMobile");
        btnNav.addEventListener("click", function() {
            if (menuMobile.style.height !== '0px') {
                btnX.classList.remove('hidden');
                burger.classList.add('hidden');

            } else {
                burger.classList.remove('hidden');
                btnX.classList.add('hidden');
            }
        });
    </script>
@endpush
