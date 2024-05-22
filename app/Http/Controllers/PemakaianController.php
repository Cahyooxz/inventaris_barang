<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Barang;
use App\Models\Pemakaian;

class PemakaianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pemakaian::join('barang', 'barang.kode_barang','=','data_pemakaian.kode_barang')
        ->join('users','users.id','=','data_pemakaian.pemakai')
        ->select('data_pemakaian.id','barang.nama_barang','barang.merk','users.name','users.role','data_pemakaian.jumlah','data_pemakaian.tanggal')
        ->get();
        $barang = Barang::select('kode_barang','nama_barang','merk', 'jumlah')->where('jumlah','>',0)->get();

        return view('pemakaian.pemakaian_index',
        [
            'data' => $data,
            'barang' => $barang,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::select('id','name','role')->where('role','admin')->orWhere('role','operator')->get();
        // memakai jika stok di data barang ada atau lebih dari 0
        $barang = Barang::select('kode_barang','nama_barang','merk', 'jumlah')->where('jumlah','>',0)->get();
        return view('pemakaian.pemakaian_create',[
            'user' => $user,
            'barang' => $barang,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'kode_barang' => 'required',
            'pemakai' => 'required',
            'jumlah' => 'required|integer',
            'tanggal' => 'required',
        ]);

        $data = [
            'kode_barang' => $request->kode_barang,
            'pemakai' => $request->pemakai,
            'jumlah' => $request->jumlah,
            'tanggal' => $request->tanggal,
        ];

        $barang = Barang::where('kode_barang', $data['kode_barang'])->first();
        $jumlah_barang = $barang->jumlah;
        if($data['jumlah'] <= $barang->jumlah){
            $pemakaian = Pemakaian::create($data);
            if($pemakaian){
                $barang->update([
                    'jumlah' => $barang->jumlah - $data['jumlah']
                ]);
                return redirect()->route('pemakaian.index')->with('success', 'Data berhasil ditambahkan');
            }
        } else{
            return redirect()->route('pemakaian.create')->with(['jumlah_barang' => $jumlah_barang, 'fail-pemakaian' => 'Data gagal ditambahkan']);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Pemakaian $Pemakaian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Pemakaian::findOrFail($id);
        $user = User::select('id', 'name','role')->where('id', $data->pemakai)->first();
        $user_all = User::select('id', 'name','role')->whereNot('id', $data->pemakai)->whereNot('role', 'petugas')->get();

        $barang = Barang::select('kode_barang','nama_barang','merk','jumlah')->where('kode_barang', $data->kode_barang)->first(); 

        return view('pemakaian.pemakaian_edit',[
            'data' => $data,
            'user' => $user,
            'user_all' => $user_all,
            'barang' => $barang,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Pemakaian::findOrFail($id);
        $barang = Barang::where('kode_barang', $data->kode_barang)->first();

        $barang->update([
            'jumlah' => $barang->jumlah + $data->jumlah,
        ]);


        $this->validate($request,[
            'kode_barang' => 'required',
            'pemakai' => 'required',
            'jumlah' => 'required|integer',
            'tanggal' => 'required',
        ]);
            
        // Menambahkan jumlah barang berdasarkan permintaan yang baru
        $barang->update([
            'jumlah' => $barang->jumlah - $request->jumlah,
        ]);

        $data->update([
            'kode_barang' => $request->kode_barang,
            'pemakai' => $request->pemakai,
            'jumlah' => $request->jumlah,
            'tanggal' => $request->tanggal,
        ]);
        return redirect()->route('pemakaian.index')->with('success-update', 'Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Pemakaian::findOrFail($id);
        $barang = Barang::where('kode_barang', $data->kode_barang)->first();

        $barang->jumlah = $barang->jumlah + $data->jumlah;
        if($barang->jumlah){
            $barang->save();
            $data->delete();
            return redirect()->route('pemakaian.index')->with('success-delete', 'Data barang berhasil diedit');
        }
    }
}
