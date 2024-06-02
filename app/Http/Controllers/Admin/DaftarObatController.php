<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DaftarObat;
use App\Models\Obat;
use Illuminate\Http\Request;

class DaftarObatController extends Controller
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
        $data = DaftarObat::where('namaObat', 'LIKE', "%{$search}%")
            ->orWhere('kodeObat', 'LIKE', "%{$search}%")
            ->paginate(10);
        return view('admin.inventory.index', [
            'data' => $data,
            'no' => $no
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.inventory.create');
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
            'tanggalObat' => ['required',],
            'kodeObat' => ['required'],
            'namaObat' => ['required'],
            'jumlah' => ['required'],
            'satuan' => ['required'],
            'kondisi' => ['required'],
            'expired' => ['required']
        ]);
        $data = DaftarObat::where('kondisi', 'layak')->get();
        $totalData = $data->sum('jumlah');
        $existingObat = Obat::where('namaObat', $request->namaObat)->get();
        if ($existingObat->isNotEmpty()) {
            $existingObat = $existingObat->first();
            if ($request->input('kondisi') == 'layak') {
                $result = $totalData + $request->jumlah;
                $existingObat->first()->update(['stokObat' => $result]);
                DaftarObat::create([
                    'tanggalObat' => $request->tanggalObat,
                    'kodeObat' => $request->kodeObat,
                    'namaObat' => $request->namaObat,
                    'satuan' => $request->satuan,
                    'jumlah' => $request->jumlah,
                    'kondisi' => $request->kondisi,
                    'stokObat' => $request->jumlah,
                    'expired' => $request->expired
                ]);
            } elseif ($request->input('kondisi') == 'tidak_layak') {
                DaftarObat::create([
                    'tanggalObat' => $request->tanggalObat,
                    'kodeObat' => $request->kodeObat,
                    'namaObat' => $request->namaObat,
                    'satuan' => $request->satuan,
                    'jumlah' => $request->jumlah,
                    'kondisi' => $request->kondisi,
                    'stokObat' => $request->jumlah,
                    'expired' => $request->expired
                ]);
            }
        } else {
            Obat::create([
                'tanggalObat' => $request->tanggalObat,
                'kodeObat' => $request->kodeObat,
                'namaObat' => $request->namaObat,
                'satuan' => $request->satuan,
                'jumlah' => $request->jumlah,
                'kondisi' => $request->kondisi,
                'stokObat' => $request->jumlah,
                'expired' => $request->expired
            ]);
        }
        return redirect()->route('obat.index')->with('toast_success', 'Data obat berhasil disimpan!');
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
        $data = DaftarObat::findOrFail($id);
        if ($data->kondisi == 'layak') {
            $existingObat = Obat::where('namaObat', $data->namaObat)->first();
            $a = $data->jumlah;
            $b = $existingObat->stokObat;
            $c = $b - $a;
            if ($c < 0) {
                $existingObat->delete();
            } elseif ($c > 0) {
                $existingObat->first()->update(['stokObat' => $c]);
            }
            $data->delete();
        } elseif ($data->kondisi == 'tidak_layak') {
            $data->delete();
        }
        return redirect()->route('obat.index')->with('toast_success', 'Berhasil!!');
    }
}
