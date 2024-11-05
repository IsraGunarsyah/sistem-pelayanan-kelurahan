<aside class="fixed inset-y-0 max-w-62.5 ease-nav-brand z-990 inset-y-0 my-4 ml-4 block w-full -translate-x-full flex-wrap items-center justify-between overflow-y-auto rounded-2xl border-0 bg-white p-0 antialiased shadow-none transition-transform duration-200 xl:left-0 xl:translate-x-0 xl:bg-transparent text-slate-500" id="sidenav-main" data-sidebar="true" data-sidebar-value="null">
    <div class="h-19.5">
        <i class="absolute top-0 right-0 hidden p-4 opacity-50 cursor-pointer fas fa-times text-slate-400 xl:hidden" sidenav-close="" aria-hidden="true"></i>
        <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap text-slate-700" href="javascript:;">
            <img src="{{ asset('images/logo.png') }}" class="inline h-full max-w-full transition-all duration-200 ease-nav-brand max-h-8" alt="main_logo">
            <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">Tanjung Laut Indah</span>
        </a>
    </div>
    <hr class="h-px mt-0 bg-transparent bg-gradient-horizontal-dark">
    <div class="items-center block w-auto max-h-screen overflow-auto grow basis-full">
        <ul class="flex flex-col pl-0 mb-0">
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors {{ request()->routeIs('Staff.index') ? 'bg-blue-500 text-white' : 'text-slate-700' }}" href="{{ route('Staff.index') }}">
                    <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white">
                        <i class="fas fa-tachometer-alt text-lg {{ request()->routeIs('Staff.index') ? 'text-black' : 'text-slate-700' }}"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Dashboard</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors {{ request()->routeIs('Staff.pelayanan') ? 'bg-blue-500 text-white' : 'text-slate-700' }}" href="{{ route('Staff.pelayanan') }}">
                    <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white">
                        <i class="fa-solid fa-file text-lg {{ request()->routeIs('Staff.pelayanan') ? 'text-black' : 'text-slate-700' }}"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Pelayanan Surat</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors {{ request()->routeIs('Staff.riwayat.index') ? 'bg-blue-500 text-white' : 'text-slate-700' }}" href="{{ route('Staff.riwayat.index') }}">
                    <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white">
                        <i class="fa-solid fa-clock-rotate-left text-lg {{ request()->routeIs('Staff.riwayat.index') ? 'text-black' : 'text-slate-700' }}"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Riwayat Pembuatan Surat</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors {{ request()->routeIs('Staff.datart') ? 'bg-blue-500 text-white' : 'text-slate-700' }}" href="{{ route('Staff.datart') }}">
                    <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white">
                        <i class="fa-solid fa-list text-lg {{ request()->routeIs('Staff.datart') ? 'text-black' : 'text-slate-700' }}"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Data RT</span>
                </a>
            </li>
            <!-- Button Logout -->
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors hover:bg-red-500" href="/">
                    <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white">
                        <i class="fa-solid fa-arrow-right-from-bracket text-lg text-black"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</aside>