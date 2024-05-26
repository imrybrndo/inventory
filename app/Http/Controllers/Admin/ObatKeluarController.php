<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DaftarObat;
use App\Models\Obat;
use App\Models\ObatKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class ObatKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $no = 1;
        $search = $request->input('search');
        $data = ObatKeluar::where('namaObat', 'LIKE', "%{$search}%")
            ->orWhere('kodeObat', 'LIKE', "%{$search}%")
            ->paginate(10);
        return view('admin.outitem.index', [
            'data' => $data,
            'no' => $no
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Controller method that retrieves the summed data for the view
    public function create()
    {
        $data = Obat::all();
        return view('admin.outitem.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            // 'tanggalObat' => ['required', 'date'],
            // 'kodeObat' => ['required', 'string', 'max:255'],
            // 'namaObat' => ['required', 'string', 'max:255'],
            // 'stokObat' => ['required'],
            // 'obatKeluar' => ['required'],
            // 'satuan' => ['required'],
            // 'sisaObat' => ['required']
        ]);
        $namaObat = $request->input('namaObat');
        $stokObat = $request->input('stokObat');
        $obatKeluar = $request->input('obatKeluar');
        if ($stokObat >= $obatKeluar) {
            $sisaObat = $stokObat - $obatKeluar;
        } elseif ($stokObat <= $obatKeluar) {
            return redirect()->route('obatkeluar.index')->with('error', 'Jumlah stok obat tidak mencukupi!');
        }
        $sisaObat = $request->stokObat - $request->obatKeluar;
        $obat = Obat::where('namaObat', $request->namaObat)->first();
        $obat->update(['stokObat' => $sisaObat]);
        ObatKeluar::create([
            'tanggalObat' => date('d-m-y'),
            'kodeObat' => $request->kodeObat,
            'namaObat' => $request->namaObat,
            'stokObat' => $request->stokObat,
            'obatKeluar' => $request->obatKeluar,
            'satuan' => $request->satuan,
            'sisaObat' => $sisaObat
        ]);
        return redirect()->route('obatkeluar.index')->with('toast_success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ObatKeluar::findOrFail($id);
        return view('admin.outitem.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ObatKeluar::findOrFail($id);
        $data->delete();
        return redirect()->route('obatkeluar.index')->with('success_toast', 'Data berhasil dihapus!');
    }
}
