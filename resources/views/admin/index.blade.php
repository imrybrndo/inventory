<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </div>
    </x-slot>
    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <div class="stats shadow w-full bg-neutral">
            <div class="stat text-white">
                <div class="stat-title text-white">Stok Obat</div>
                <div class="stat-value text-white">{{$totalStokObat}}</div>
            </div>
        </div>
        <div class="flex gap-2">
            <div class="stats shadow w-full mt-3">
                <div class="stat text-white">
                    <div class="stat-title text-neutral">Obat Layak Pakai</div>
                    <div class="stat-value text-neutral">{{$totalLayak}}</div>
                </div>
            </div>
            <div class="stats shadow w-full  mt-3">
                <div class="stat text-white">
                    <div class="stat-title text-neutral">Obat Tidak Layak Pakai</div>
                    <div class="stat-value text-neutral">{{$totalTidakLayak}}</div>
                </div>
            </div>
        </div>
        <div class="flex gap-2">
            <div class="stats shadow w-full mt-3">
                <div class="stat text-white">
                    <div class="stat-title text-neutral">Obat Keluar</div>
                    <div class="stat-value text-neutral">{{$obatKeluar}}</div>
                </div>
            </div>
            <div class="stats shadow w-full  mt-3">
                <div class="stat text-white">
                    <div class="stat-title text-neutral">Obat Masuk</div>
                    <div class="stat-value text-neutral">{{$totalObat}}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>