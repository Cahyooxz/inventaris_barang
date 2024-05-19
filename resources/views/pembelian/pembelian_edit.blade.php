@extends('layouts.app')
@section('content')
    <div class="container-fluid mt-3">
        <div class="card border-0">
            <div class="card-body">
                <h5 class="card-title fw-bold mb-3">
                    Edit Pembelian
                </h5>
                <form action="{{ route('pembelian.update',['id' => $data->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="container-fluid">
                        <div class="row">
                          <div class="col-12">
                            <label for="nama_barang" class="fw-medium mb-2 mt-2">Nama Barang</label>
                            <select name="kode_barang" id="" class="form-select mb-3">
                                <option selected value="{{ $data->kode_barang }}">{{ $barang->nama_barang }} {{ $barang->merk }}</option>
                            </select>
                          </div>
                          <div class="col-12">
                            <label for="jumlah" class="fw-medium mb-2 mt-2">Jumlah</label>
                            <input type="jumlah" name="jumlah" class="form-control mb-3" placeholder="Jumlah Barang"
                                value="{{ $data->jumlah }}">
                            @error('jumlah')
                                <small class="text-danger mb-3 d-block">{{ $message }}</small>
                            @enderror
                            <label for="harga" class="fw-medium mb-2 mt-2">Harga</label>
                            <input type="text" name="harga" class="form-control mb-3" placeholder="Harga"
                                value="{{ $data->harga }}">
                            @error('harga')
                                <small class="text-danger mb-3 d-block">{{ $message }}</small>
                            @enderror
                          </div>
                          <div class="col-12 mt-3">
                              <a href="{{ route('barang.index') }}" class="btn btn-secondary me-3">Close</a>
                              <button type="submit" class="btn btn-success">Submit</button>
                          </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection