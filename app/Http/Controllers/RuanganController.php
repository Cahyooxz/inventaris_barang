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
        ]);
    }

    public function create(){
        return view('ruangan.ruangan_create',[
        ]);
    }
    public function store(Request $request){

        $this->validate($request,[
            'nama_ruangan' => 'required|unique:ruangan,nama_ruangan'
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
            'data' => $ruangan
        ]);
    }

    public function update(Request $request, string $id){
        $ruangan = Ruangan::findOrFail($id);

        $this->validate($request,[
            'nama_ruangan' => 'required|unique:ruangan,nama_ruangan,'.$ruangan->id
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
