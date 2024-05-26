<x-perfect-scrollbar as="nav" aria-label="main" class="flex flex-col flex-1 gap-4 px-3">

    @if (auth()->user()->hasRole('admin'))
    <x-sidebar.link title="Dashboard" href="{{ route('dashboard') }}" :isActive="request()->routeIs('dashboard')">
        <x-slot name="icon">
            <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>

    <x-sidebar.dropdown title="Obat" :active="Str::startsWith(request()->route()->uri(), 'obat')">
        <x-slot name="icon">
            <x-heroicon-o-view-grid class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>

        <x-sidebar.sublink title="Obat Masuk" href="{{ route('obat.index') }}"
            :active="request()->routeIs('obat.index')" />

        <x-slot name="icon">
            <x-heroicon-o-view-grid class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>

        <x-sidebar.sublink title="Obat Keluar" href="{{ route('obatkeluar.index') }}"
            :active="request()->routeIs('obatkeluar.index')" />
    </x-sidebar.dropdown>

    <x-sidebar.link title="Stok Obat" href="{{ route('listobat.index') }}"
        :isActive="request()->routeIs('listobat.index')">
        <x-slot name="icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9.75 3.104v5.714a2.25 2.25 0 0 1-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 0 1 4.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0 1 12 15a9.065 9.065 0 0 0-6.23-.693L5 14.5m14.8.8 1.402 1.402c1.232 1.232.65 3.318-1.067 3.611A48.309 48.309 0 0 1 12 21c-2.773 0-5.491-.235-8.135-.687-1.718-.293-2.3-2.379-1.067-3.61L5 14.5" />
            </svg>
        </x-slot>
    </x-sidebar.link>
    @endif

    @if (auth()->user()->hasRole('pengguna'))
    <x-sidebar.link title="Beranda" href="{{ route('beranda') }}" :isActive="request()->routeIs('beranda')">
        <x-slot name="icon">
            <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>

    <x-sidebar.dropdown title="Obat" :active="Str::startsWith(request()->route()->uri(), 'obat')">
        <x-slot name="icon">
            <x-heroicon-o-view-grid class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>

        <x-sidebar.sublink title="Obat Masuk" href="{{ route('obatmasuk') }}"
            :active="request()->routeIs('obatmasuk')" />

        <x-slot name="icon">
            <x-heroicon-o-view-grid class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>

        <x-sidebar.sublink title="Obat Keluar" href="{{ route('obatkeluar') }}"
            :active="request()->routeIs('obatkeluar')" />
    </x-sidebar.dropdown>

    <x-sidebar.link title="Stok Obat" href="{{ route('stokobat') }}" :isActive="request()->routeIs('stokobat')">
        <x-slot name="icon">
            <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    @endif


</x-perfect-scrollbar>