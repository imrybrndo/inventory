<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Stok Obat Tersedia') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <div class="flex justify-between items-end mb-3">
            <div>
                <a href="{{route('cetakstokobat')}}" class="btn">Export PDF</a>
            </div>
            <div>
                <form action="{{ route('obat.index') }}" method="GET">
                    <input type="text" name="search" placeholder="Cari..." class="input input-bordered"
                        value="{{ request()->query('search') }}">
                    <button type="submit" class="btn btn-neutral">Cari</button>
                </form>
            </div>
        </div>
        <div class="mt-4">
            <div class="overflow-x-auto">
                <table class="table">
                    <!-- head -->
                    <thead class="bg-neutral text-white text-center">
                        <tr>
                            <th>
                                No
                            </th>
                            <th>Kode Obat</th>
                            <th>Nama Obat</th>
                            <th>Stok Obat</th>
                            <th>Satuan</th>
                            <th>Kondisi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- row 1 -->
                        @foreach ($data as $item)
                        <tr>
                            <th>
                                {{$no++}}
                            </th>
                            <td class="text-center">
                                {{$item->kodeObat}}
                            </td>
                            <td>
                                <div class="flex items-center gap-3">
                                    <div>
                                        <div class="font-bold">{{$item->namaObat}}</div>
                                        <div class="text-sm opacity-50">{{$item->kodeObat}}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">{{$item->stokObat}}</td>
                            <td class="text-center">{{$item->satuan}}</td>
                            <td class="text-center">{{$item->kondisi}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-2">
                    {{$data->appends(request()->input())->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
