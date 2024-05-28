<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Daftar Obat Masuk') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <div class="flex justify-between items-end mb-3">
            <div>
                <a href="{{route('obat.create')}}" class="btn btn-neutral">Tambah</a>
                <a href="{{route('cetak.index')}}" class="btn">Export PDF</a>
            </div>
            <div>
                <form action="{{ route('obatkeluar.index') }}" method="GET">
                    <input type="text" name="search" placeholder="Cari..." class="input input-bordered"
                        value="{{ request()->query('search') }}">
                    <button type="submit" class="btn btn-neutral">Cari</button>
                </form>
            </div>
        </div>
        <div class="">
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
                            <th>Tanggal Masuk</th>
                            <th>Obat Masuk</th>
                            <th>Satuan</th>
                            <th>Kondisi</th>
                            <th>Tanggal Ekspayer</th>
                            {{-- <th>Aksi</th> --}}
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
                            <td class="text-center">{{$item->jumlah}}</td>
                            <td class="text-center">{{$item->satuan}}</td>
                            <td class="text-center">
                                @if ($item->kondisi == 'layak')
                                Layak
                                @elseif($item->kondisi == 'tidak_layak')
                                Tidak Layak
                                @endif
                            </td>
                            <td class="text-center">{{
                                \Carbon\Carbon::parse($item->expired)->diffInDays(\Carbon\Carbon::now()) }} hari lagi
                            </td>
                            {{-- <th>
                                <div class="flex justify-center items-center gap-1">
                                    <!-- Open the modal using ID.showModal() method -->
                                    <button class="btn btn-error btn-xs" onclick="my_modal_1{{$item->id}}.showModal()">open modal</button>
                                    <dialog id="my_modal_1" class="modal">
                                        <div class="modal-box">
                                            <h3 class="font-bold text-lg">PERINGATAN!!</h3>
                                            <p class="py-4">Apakah anda yakin ingin menghapus data ini?</p>
                                            <div class="modal-action">
                                                <form method="dialog">
                                                    <!-- if there is a button in form, it will close the modal -->
                                                    <button class="btn">Close</button>
                                                </form>
                                            </div>
                                        </div>
                                    </dialog>
                                    <button class="btn btn-xs btn-warning">edit</button>
                                    <form action="{{route('obat.destroy', $item->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-error btn-xs">hapus</button>
                                    </form> --}}
                                </div>
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