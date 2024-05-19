<?php

namespace App\Http\Controllers;
use App\Models\BarangPembelian;
use App\Models\Barang;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = BarangPembelian::join('barang', 'barang.kode_barang', '=', 'data_pembelian.kode_barang')
        ->select('data_pembelian.id','barang.nama_barang','barang.merk','data_pembelian.jumlah','data_pembelian.harga')
        ->get();
            
        return view('pembelian.pembelian_index',[
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kode_barang = Barang::select('kode_barang','nama_barang','merk')->get();
        return view('pembelian.pembelian_create',[
            'kode_barang' => $kode_barang,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'kode_barang' => 'required',
            'jumlah' => 'required|integer',
            'harga' => 'required|integer',
        ]);

        $pembelian = [
            'kode_barang' => $request->kode_barang,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
        ];

        // menambahkan jumlah di table barang berdasarkan jumlah pembelian di table data_pembelian
        $barang = Barang::where('kode_barang', $request->kode_barang)->first();
        if(BarangPembelian::create($pembelian)){
            if($request->kode_barang === $barang->kode_barang){
                $barang->update([
                'jumlah' => $barang->jumlah + $request->jumlah
                ]);
            }
            return redirect()->route('pembelian.index')->with('success', 'Data barang berhasil disimpan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = BarangPembelian::findOrFail($id);
        $barang = Barang::select('nama_barang','merk')->where('kode_barang', $data->kode_barang)->first();
        return view('pembelian.pembelian_edit',[
            'data' => $data,
            'barang' => $barang,
            // 'nama_barang' => $nama_barang
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $barang = Barang::where('kode_barang',$request->kode_barang)->first();
        $data = BarangPembelian::findOrFail($id);

        $barang->jumlah = $barang->jumlah - $data->jumlah;
        $barang->save();
        
        $this->validate($request,[
            'jumlah' => 'required|integer',
            'harga' => 'required|integer',
        ]);

        $data->update([
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
        ]);

        if($data->update()){
            $barang->jumlah = $barang->jumlah + $request->jumlah;
            if($barang->jumlah){
                $barang->save();
                return redirect()->route('pembelian.index')->with('success', 'Data berhasil diedit');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
