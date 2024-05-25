<?php

namespace App\Http\Controllers;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    public function index(){
        $ruangan = Ruangan::all();
        return view('ruangan.ruangan_index',
        [
            'data' => $ruangan,
            'title' => 'Data Ruangan',
        ]);
    }

    public function create(){
        return view('ruangan.ruangan_create',[
            'title' => 'Tambah Data Ruangan',
        ]);
    }
    public function store(Request $request){

        $this->validate($request,[
            'nama_ruangan' => 'required|unique:ruangan,nama_ruangan'
        ],[
            'nama_ruangan.required' => 'Nama Ruangan wajib diisi',
            'nama_ruangan.unique' => 'Nama Ruangan sudah ada'
        ]);
        $data = [
            'nama_ruangan' => $request->nama_ruangan
        ];

        Ruangan::create($data);

        return redirect()->route('ruangan.index')->with('success','Data ruangan '.$data['nama_ruangan'].' berhasil ditambah!');
    }
    public function edit(string $id){
        $ruangan = Ruangan::findOrFail($id);
        return view('ruangan.ruangan_edit',[
            'data' => $ruangan,
            'title' => 'Edit Data Ruangan',
        ]);
    }

    public function update(Request $request, string $id){
        $ruangan = Ruangan::findOrFail($id);

        $this->validate($request,[
            'nama_ruangan' => 'required|unique:ruangan,nama_ruangan,'.$ruangan->id
        ],[
            'nama_ruangan.required' => 'Nama Ruangan wajib diisi',
            'nama_ruangan.unique' => 'Nama Ruangan sudah ada'
        ]);

        $ruangan->update([
            'nama_ruangan' => $request->nama_ruangan
        ]);

        return redirect()->route('ruangan.index')->with('success-update','Data ruangan '.$ruangan->nama_ruangan.' berhasil diubah!');
    }

    public function destroy(string $id){
        $ruangan = Ruangan::findOrFail($id);

        $ruangan->delete();
        return redirect()->route('ruangan.index')->with('success-delete','Data ruangan '.$ruangan->nama_ruangan.' berhasil dihapus!');
    }
}
