<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\ObatKeluar;
use Illuminate\Http\Request;

class ObatKeluarController extends Controller
{
    public function index(Request $request){
        $no = 1;
        $search = $request->input('search');
        $data = ObatKeluar::where('namaObat', 'LIKE', "%{$search}%")
            ->orWhere('kodeObat', 'LIKE', "%{$search}%")
            ->paginate(10);
        return view('pengguna.obatkeluar.index', [
            'data' => $data,
            'no' => $no
        ]);
    }
}
