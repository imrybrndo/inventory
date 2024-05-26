<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DaftarObat;
use App\Models\Obat;
use App\Models\ObatKeluar;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $totalStokObat = Obat::sum('stokObat');
        $totalObat = DaftarObat::sum('jumlah');
        $totalLayak = DaftarObat::where('kondisi', 'layak')->sum('jumlah');
        $totalTidakLayak = DaftarObat::where('kondisi', 'tidak_layak')->sum('jumlah');
        $obatKeluar = ObatKeluar::sum('obatKeluar');
        return view('admin.index', [
            'totalStokObat' => $totalStokObat,
            'totalObat' => $totalObat,
            'totalLayak' => $totalLayak,
            'totalTidakLayak' => $totalTidakLayak,
            'obatKeluar' => $obatKeluar,
        ]);
    }
}
