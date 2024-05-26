<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\Obat;
use Illuminate\Http\Request;

class StokObatController extends Controller
{
    public function index(Request $request)
    {
        $no = 1;
        $search = $request->input('search');
        $data = Obat::where('namaObat', 'LIKE', "%{$search}%")
            ->orWhere('kodeObat', 'LIKE', "%{$search}%")
            ->paginate(10);
        return view('pengguna.stokobat.index', [
            'no' => $no,
            'data' => $data
        ]);
    }
}
