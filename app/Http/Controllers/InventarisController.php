<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Barang::join('data_pembelian','data_pembelian.kode_barang','=','barang.kode_barang')
                ->join('data_pemakaian','data_pemakaian.kode_barang','=','barang.kode_barang')
                ->leftJoin('ruangan','ruangan.id','=','data_pemakaian.ruang_id')
                ->select('barang.kode_barang','barang.jenis_barang','barang.jumlah',Barang::raw("DATE_FORMAT(data_pembelian.created_at, '%Y-%m-%d') as tanggal_pembelian"),'data_pemakaian.tanggal as tanggal_pemakaian','data_pemakaian.pemakai','data_pemakaian.ruang_id')->get();

        return view('inventaris.inventaris_index',[
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
