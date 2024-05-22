<?php

namespace App\Http\Controllers;
use App\Exports\PembelianExport;
use App\Models\BarangPembelian;
use App\Models\Barang;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = BarangPembelian::join('barang', 'barang.kode_barang', '=', 'data_pembelian.kode_barang')
        ->select('data_pembelian.id','barang.nama_barang','barang.merk','data_pembelian.jumlah','data_pembelian.harga','data_pembelian.total')
        ->get();
            
        return view('pembelian.pembelian_index',[
            'data' => $data,
        ]);
    }
    public function download(){
        return Excel::download(new PembelianExport, 'data_pembelian.xlsx');
        
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
        ]);

        $barang = Barang::where('kode_barang', $request->kode_barang)->first();

        $pembelian = [
            'kode_barang' => $request->kode_barang,
            'jumlah' => $request->jumlah,
            'harga' => $barang->harga,
            'total' => $barang->harga * $request->jumlah,
        ];

        // menambahkan jumlah di table barang berdasarkan jumlah pembelian di table data_pembelian
        $barang = Barang::where('kode_barang', $request['kode_barang'])->first();
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
        $barang = Barang::select('nama_barang','merk','harga')->where('kode_barang', $data->kode_barang)->first();

        return view('pembelian.pembelian_edit',[
            'data' => $data,
            'barang' => $barang,
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
        ]);

        $data->update([
            'jumlah' => $request->jumlah,
            'total' => $barang->harga * $request->jumlah,
        ]);

        if($data->update()){
            $barang->jumlah = $barang->jumlah + $request->jumlah;
            if($barang->jumlah){
                $barang->save();
                return redirect()->route('pembelian.index')->with('success-update', 'Data berhasil diedit');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = BarangPembelian::findOrFail($id);
        $barang = Barang::where('kode_barang', $data->kode_barang)->first();

        $barang->jumlah = $barang->jumlah - $data->jumlah;
        $barang->save();

        $hapus = $data->delete();
        if($hapus){
            return redirect()->route('pembelian.index')->with('success-delete','Data barang berhasil dihapus');
        }
        // $data_delete = $data->delete();
    }
}
