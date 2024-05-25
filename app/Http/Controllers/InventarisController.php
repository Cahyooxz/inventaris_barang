<?php
namespace App\Http\Controllers;
use App\Exports\InventarisBarangExport;
use App\Exports\InventarisExport;
use App\Models\Barang;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class InventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Barang::Leftjoin('data_pembelian','data_pembelian.kode_barang','=','barang.kode_barang')
                ->Leftjoin('data_pemakaian','data_pemakaian.kode_barang','=','barang.kode_barang')
                ->Leftjoin('users','users.id','=','data_pemakaian.pemakai')
                ->leftJoin('ruangan','ruangan.id','=','data_pemakaian.ruang_id')
                ->select('barang.kode_barang','barang.jenis_barang','barang.jumlah',DB::raw("DATE_FORMAT(data_pembelian.created_at, '%Y-%m-%d') as tanggal_pembelian"),'data_pemakaian.tanggal as tanggal_pemakaian','users.name','ruangan.nama_ruangan')->get();

        return view('inventaris.inventaris_index',[
            'data' => $data,
            'title' => 'Inventaris Data Barang',
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
    public function download(){
        return Excel::download(new InventarisExport,'inventaris.xlsx');
    }
    public function downloadBarang(){
        return Excel::download(new InventarisBarangExport,'inventaris_barang.xlsx');
    }
}
