<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ObatKeluar;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CetakLaporanObatKeluarController extends Controller
{
    public function index(){
        $no = 1;
        $data = ObatKeluar::all();
        $pdf = Pdf::loadView('admin.cetak.keluar', ['data' => $data, 'no' => $no]);
        return $pdf->download('laporan_obat_keluar.pdf');
        // return view('admin.cetak.keluar', ['data' => $data, 'no' => $no]);
        
    }
}
