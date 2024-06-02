<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Tambah data obat baru') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <form action="{{route('obat.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text dark:text-white">Tanggal</span>
                </div>
                <input type="date" name="tanggalObat" class="input input-bordered w-full" />
                @error('tanggalObat')
                <div role="alert" class="alert alert-error mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Gagal! Tanggal obat tidak boleh kosong!.</span>
                </div>
                @enderror
            </label>
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text dark:text-white">Kode Obat</span>
                </div>
                <input type="text" name="kodeObat" class="input input-bordered w-full" />
                @error('kodeObat')
                <div role="alert" class="alert alert-error mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Gagal! Kode obat tidak boleh kosong!.</span>
                </div>
                @enderror
            </label>
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text dark:text-white">Nama Obat</span>
                </div>
                <input type="text" name="namaObat" class="input input-bordered w-full" />
                @error('namaObat')
                <div role="alert" class="alert alert-error mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Gagal! Nama obat tidak boleh kosong!.</span>
                </div>
                @enderror
            </label>
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text dark:text-white">Jumlah</span>
                </div>
                <input type="number" name="jumlah" class="input input-bordered w-full" />
                @error('jumlah')
                <div role="alert" class="alert alert-error mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Gagal! Jumlah tidak boleh kosong!.</span>
                </div>
                @enderror
            </label>
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text dark:text-white">Satuan</span>
                </div>
                <input type="text" name="satuan" class="input input-bordered w-full" />
                @error('satuan')
                <div role="alert" class="alert alert-error mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Gagal! Satuan tidak boleh kosong!.</span>
                </div>
                @enderror
            </label>
            <label class="form-control">
                <div class="label">
                    <span class="label-text dark:text-white">Kondisi</span>
                </div>
                <select name="kondisi" class="select select-bordered w-full">
                    <option disabled selected>Pilih salah satu</option>
                    <option value="layak">Layak</option>
                    <option value="tidak_layak">Tidak Layak</option>
                </select>
                @error('kondisi')
                <div role="alert" class="alert alert-error mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Gagal! Kondisi tidak boleh kosong!.</span>
                </div>
                @enderror
            </label>
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text dark:text-white">Tanggal Ekspayer</span>
                </div>
                <input id="tanggal" type="date" name="expired" class="input input-bordered w-full" />
                @error('expired')
                <div role="alert" class="alert alert-error mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Gagal! Tanggal Ekspayer tidak boleh kosong!.</span>
                </div>
                @enderror
            </label>

            <div class="mt-4">
                <button type="submit" class="btn btn-success text-white btn-block">Simpan</button>
                <a href="{{route('obat.index')}}" class="btn btn-block mt-2">Kembali</a>
            </div>
        </form>
    </div>
    <script>
        var inputTanggal = document.getElementById('tanggal');
        inputTanggal.addEventListener('change', function() {
            var tanggalInput = new Date(this.value);
            var tanggalHariIni = new Date();
            if (tanggalInput < tanggalHariIni) {
                alert('Tanggal harus lebih dari atau sama dengan hari ini');
                this.value = '';
            }
        });
    </script>
</x-app-layout>