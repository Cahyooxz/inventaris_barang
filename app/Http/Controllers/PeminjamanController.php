<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Barang;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Peminjaman::join('barang', 'barang.kode_barang','=','data_peminjaman.kode_barang')
        ->join('users','users.id','=','data_peminjaman.peminjam')
        ->select('data_peminjaman.id','barang.nama_barang','barang.merk','users.name','users.role','data_peminjaman.jumlah','data_peminjaman.tanggal')
        ->get();


        return view('peminjaman.peminjam_index',
        [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
           $user = User::select('id','name','role')->get();
           $barang = Barang::select('kode_barang','nama_barang','merk')->get();
        return view('peminjaman.peminjam_create',[
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
            'peminjam' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',
        ]);

        $data = [
            'kode_barang' => $request->kode_barang,
            'peminjam' => $request->peminjam,
            'jumlah' => $request->jumlah,
            'tanggal' => $request->tanggal,
        ];
        $barang = Barang::where('kode_barang', $data['kode_barang'])->first();
        $peminjaman = Peminjaman::create($data);

        if($peminjaman){
            $barang->update([
                'jumlah' => $barang->jumlah - $data['jumlah']
            ]);
            return redirect()->route('peminjaman.index')->with('success', 'Data berhasil ditambahkan');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Peminjaman::findOrFail($id);
        $user_tes = User::where('id', $data->peminjam);
        dd($user_tes);
        $user = User::select('id','name','role')->get();
        $barang = Barang::select('kode_barang','nama_barang','merk')->where('kode_barang', $data->kode_barang)->get();   
        
        return view('peminjaman.peminjam_edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peminjaman $peminjaman)
    {
        //
    }
}
