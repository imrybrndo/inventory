<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Obat Keluar') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <form action="{{route('obatkeluar.store')}}" method="post" enctype="multipart/form-data">
            @csrf

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Kode Obat</span>
                </div>
                <input type="text" name="kodeObat" class="input input-bordered w-full" />
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Nama Obat</span>
                </div>
                <input type="text" name="namaObat" class="input input-bordered w-full" />
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Stok Obat</span>
                </div>
                <select class="select select-bordered" name="stokObat">
                    @foreach ($data as $item)
                        <option value="{{$item->stokObat}}">{{$item->namaObat}} - Stok Obat : {{$item->stokObat}}</option>
                    @endforeach
                </select>
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Obat Keluar</span>
                </div>
                <input type="text" name="obatKeluar" class="input input-bordered w-full" />
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Satuan</span>
                </div>
                <input type="text" name="satuan" class="input input-bordered w-full" />
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Tanggal</span>
                </div>
                <input type="date" name="tanggal" class="input input-bordered w-full" />
            </label>

            <script>
                function updateStok(select) {
                    var selectedOption = select.options[select.selectedIndex];
                    var stokObatInput = document.getElementById('stokObat');
                    stokObatInput.value = selectedOption.value;
                }
            </script>

            <div class="mt-4">
                <button type="submit" class="btn btn-success text-white btn-block">Simpan</button>
                <a href="{{route('obatkeluar.index')}}" class="btn btn-block mt-2">Kembali</a>
            </div>
        </form>
    </div>
</x-app-layout>