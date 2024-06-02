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
                @error('kodeObat')
                <div role="alert" class="alert alert-error mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Gagal! Kode obat tidak boleh kosong.</span>
                </div>
                @enderror
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Nama Obat</span>
                </div>
                <input type="text" name="namaObat" class="input input-bordered w-full" />
                @error('namaObat')
                <div role="alert" class="alert alert-error mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Gagal! Nama obat tidak boleh kosong.</span>
                </div>
                @enderror
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
                @error('stokObat')
                <div role="alert" class="alert alert-error mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Gagal! Stok obat tidak boleh kosong.</span>
                </div>
                @enderror
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Obat Keluar</span>
                </div>
                <input type="text" name="obatKeluar" class="input input-bordered w-full" />
                @error('obatKeluar')
                <div role="alert" class="alert alert-error mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Gagal! Obat keluar tidak boleh kosong.</span>
                </div>
                @enderror
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Satuan</span>
                </div>
                <input type="text" name="satuan" class="input input-bordered w-full" />
                @error('satuan')
                <div role="alert" class="alert alert-error mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Gagal! Satuan tidak boleh kosong.</span>
                </div>
                @enderror
            </label>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Tanggal</span>
                </div>
                <input type="date" name="tanggalObat" class="input input-bordered w-full" />
                @error('tanggal')
                <div role="alert" class="alert alert-error mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Gagal! Kode obat tidak boleh kosong.</span>
                </div>
                @enderror
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