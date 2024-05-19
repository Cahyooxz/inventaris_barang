<?php

namespace App\Http\Controllers;

use App\Exports\BarangExport;
use App\Exports\BarangImport;
use App\Models\Barang;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function download(){
        return Excel::download(new BarangExport,'barang.xlsx');
    }
    public function index()
    {
        $data = Barang::all();
        return view('barang.barang_index',[
            'data' => $data,
        ]);
    }
    public function create()
    {
        return view('barang.barang_create');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'kode_barang' => 'required|min:5|unique:barang',
            'nama_barang' => 'required',
            'jenis_barang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
        ]);

        $data = ([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'jenis_barang' => $request->jenis_barang,
            'merk' => $request->merk,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
        ]);

        if($barang = Barang::create($data)){
            return redirect()->route('barang.index')->with('success','Data Barang berhasil disimpan');
        }else{
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Barang::findOrFail($id);
        return view('barang.barang_show',[
            'data' => $data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        //
    }
}
