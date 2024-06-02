<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\DaftarObat;
use Illuminate\Http\Request;

class ObatMasukController extends Controller
{
    public function index(Request $request){
        $no = 1;
        $search = $request->input('search');
        $data = DaftarObat::where('namaObat', 'LIKE', "%{$search}%")
            ->orWhere('kodeObat', 'LIKE', "%{$search}%")
            ->paginate(10);
        return view('pengguna.obatmasuk.index', [
            'data' => $data,
            'no' => $no
        ]);
    }
}
