<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Data Obat Keluar') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <div class="flex justify-between items-end mb-3">
            <div>
                <a href="{{route('obatkeluar.create')}}" class="btn btn-neutral mb-3">Transaksi Obat</a>
                <a href="{{route('cetakobatkeluar')}}" class="btn">Export PDF</a>
            </div>
            <div>
                <form action="{{ route('obat.index') }}" method="GET">
                    <input type="text" name="search" placeholder="Cari..." class="input input-bordered"
                        value="{{ request()->query('search') }}">
                    <button type="submit" class="btn btn-neutral">Cari</button>
                </form>
            </div>
        </div>
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
                        <th>Tanggal Obat Keluar</th>
                        <th>Stok Obat</th>
                        <th>Obat Keluar</th>
                        <th>Satuan</th>
                        <th>Stok Tersisa</th>
                        <th>Aksi</th>
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
                        <td class="text-center">
                            {{ \Carbon\Carbon::parse($item->tanggalObat)->translatedFormat('l, j F Y') }}
                        </td>
                        <td class="text-center">{{$item->stokObat}}</td>
                        <td class="text-center">{{$item->obatKeluar}}</td>
                        <td class="text-center">{{$item->satuan}}</td>
                        <td class="text-center">{{$item->sisaObat}}</td>
                        <th>
                            <!-- Open the modal using ID.showModal() method -->
                            <button class="btn btn-error btn-xs"
                                onclick="my_modal_5{{$item->id}}.showModal()">hapus</button>
                            <dialog id="my_modal_5{{$item->id}}" class="modal modal-bottom sm:modal-middle">
                                <div class="modal-box">
                                    <h3 class="font-bold text-lg">Perhatian!</h3>
                                    <p class="py-4">Apakah anda yakin ingin mengahpus data "{{$item->namaObat}}"?</p>
                                    <div class="modal-action">
                                        <div class="flex gap-1">
                                            <form action="{{route('obatkeluar.destroy', $item->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-neutral">Hapus</button>
                                            </form>
                                            <form method="dialog">
                                                <!-- if there is a button in form, it will close the modal -->
                                                <button class="btn">Tidak</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </dialog>
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-2">
                {{$data->appends(request()->input())->links()}}
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
</x-app-layout>