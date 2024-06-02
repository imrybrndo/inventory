<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DaftarObat;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CetakLaporanStokObat extends Controller
{
    public function index(){
        $no = 1;
        $data = DaftarObat::all();
        $pdf = Pdf::loadView('admin.cetak.stok', ['data' => $data, 'no' => $no]);
        return $pdf->download('laporan_stok_obat.pdf');
        // return view('admin.cetak.stok', ['data' => $data, 'no' => $no]);
        
    }
}
