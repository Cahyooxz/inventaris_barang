<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\Barang;
use App\Models\BarangPembelian;
use App\Models\Pemakaian;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user()->name;
        $tanggal = Carbon::now();

        
        $totalPembelian = BarangPembelian::whereYear('created_at', $tanggal->year)
        ->whereMonth('created_at',$tanggal->month)
        ->sum('total');
        
        // bulan kemarin di tahun ini
        $tanggalk = Carbon::now()->subMonths();
        $totalPembelianLalu = BarangPembelian::whereYear('created_at', $tanggalk->year)
        ->whereMonth('created_at', $tanggalk->month)
        ->sum('total');

        // menghitung selisih antara kedua waktu bulan ini dan kemarin
        $total = $totalPembelian - $totalPembelianLalu;
        if($totalPembelianLalu !=0){
            if($total >0){
                $status = 'naik';
                $persen = ($total / $totalPembelianLalu) * 100;
            }
            elseif($total <0){
                $status = 'turun';
                $persen = ($total / $totalPembelianLalu) * 100;
            }
        } else{
            $status = 'tidak berubah';
            $persen = 0;
        }
        $persen_format = number_format($persen, 2);



        $users = User::count();
        $barangs = Barang::count();
        $pengembelians = BarangPembelian::count();
        $pemakaians = Pemakaian::count();

        $data = ([
            'user' => $users,
            'barang' => $barangs,
            'pembelian' => $pengembelians,
            'pemakaian' => $pemakaians,
        ]);

        $pembelian = BarangPembelian::join('barang', 'barang.kode_barang', '=', 'data_pembelian.kode_barang')
        ->select('data_pembelian.id','barang.nama_barang','barang.merk','data_pembelian.jumlah','data_pembelian.harga','data_pembelian.total')
        ->get();

        $pemakaian = Pemakaian::join('barang', 'barang.kode_barang','=','data_pemakaian.kode_barang')
        ->join('users','users.id','=','data_pemakaian.pemakai')
        ->leftJoin('ruangan','ruangan.id','=','data_pemakaian.ruang_id')
        ->select('data_pemakaian.id','barang.nama_barang','barang.merk','users.name','users.role','data_pemakaian.jumlah','data_pemakaian.tanggal','ruangan.nama_ruangan')
        ->get();

        return view('dashboard',[
            'user' => $user,
            'total_pembelian' => $totalPembelian,
            'total_lalu' => $totalPembelianLalu,
            'status' => $status,
            'persen' => $persen_format,
            'data' => $data,
            'pembelian' => $pembelian,
            'pemakaian' => $pemakaian,
            'title' => 'Dashboard',
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
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
