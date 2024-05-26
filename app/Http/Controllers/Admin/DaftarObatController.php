<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DaftarObat;
use App\Models\JumlahStokObat;
use App\Models\Obat;
use Illuminate\Support\Facades\Validator;
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
        // $this->validate($request,[
        //     'tanggalObat' => ['required', 'date'],
        //     'kodeObat' => ['required', 'string', 'max:255'],
        //     'namaObat' => ['required', 'string', 'max:255'],
        //     'jumlah' => ['required'],
        //     'satuan' => ['required'],
        //     'kondisi' => ['required', 'string', 'max:255'],
        //     'stokObat' => ['required'],
        //     'expired' => ['required']
        // ]);  
        $existingObat = Obat::where('namaObat', $request->namaObat)->get();
        if ($existingObat->isNotEmpty()) {
            $existingObat = $existingObat->first();
            if ($existingObat->kondisi == 'layak') {
                $totalJumlah = $existingObat->sum('jumlah');
                $totalJumlah += $request->jumlah;
                $existingObat->first()->update(['stokObat' => $totalJumlah]);
                # code...
            } elseif ($existingObat->kondisi == 'tidak_layak') {
                Obat::create([
                    'tanggalObat' => $request->tanggalObat,
                    'kodeObat' => $request->kodeObat,
                    'namaObat' => $request->namaObat,
                    'satuan' => $request->satuan,
                    'jumlah' => $request->jumlah,
                    'kondisi' => $request->kondisi,
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
        //
    }
}
