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
            </label>
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text dark:text-white">Kode Obat</span>
                </div>
                <input type="text" name="kodeObat" class="input input-bordered w-full" />
            </label>
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text dark:text-white">Nama Obat</span>
                </div>
                <input type="text" name="namaObat" class="input input-bordered w-full" />
            </label>
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text dark:text-white">Jumlah</span>
                </div>
                <input type="number" name="jumlah" class="input input-bordered w-full" />
            </label>
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text dark:text-white">Satuan</span>
                </div>
                <input type="text" name="satuan" class="input input-bordered w-full" />
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
            </label>
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text dark:text-white">Tanggal Ekspayer</span>
                </div>
                <input id="tanggal" type="date" name="expired" class="input input-bordered w-full" />
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