@extends('layouts.app')
@section('content')
    <div class="container-fluid mt-3">
        <div class="card border-0">
            <div class="card-body">
                <h5 class="card-title fw-bold mb-3">
                    Edit Pemakaian
                </h5>
                <form action="{{ route('pemakaian.update', ['id' => $data->id]) }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="container-fluid">
                        <div class="row">
                          <div class="col-12">
                            <label for="nama_barang" class="fw-medium mb-2 mt-2">Nama Barang</label>
                            <select name="kode_barang" id="" class="form-select mb-3">
                                <option value="{{ $data->kode_barang }}">{{ $data->nama_barang }} - {{ $data->merk }}</option>
                            </select>
                          </div>
                          <div class="col-12">
                            <label for="peminjam" class="fw-medium mb-2 mt-2">Nama Pemakaian</label>
                            <select name="peminjam" id="peminjam" class="form-select mb-3">
                                <option value="{{ $data->id }}">{{ $data->name }} - {{ $data->role }}</option>
                            </select>
                          </div>
                          <div class="col-12">
                            <label for="jumlah" class="fw-medium mb-2 mt-2">Jumlah</label>
                            <input type="jumlah" name="jumlah" class="form-control mb-3" placeholder="Jumlah Barang"
                                value="{{ old('jumlah') }}">
                            @error('jumlah')
                                <small class="text-danger mb-3 d-block">{{ $message }}</small>
                            @enderror
                            <label for="tanggal" class="fw-medium mb-2 mt-2">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control mb-3" placeholder="Tanggal"
                                value="{{ old('tanggal') }}">
                            @error('tanggal')
                                <small class="text-danger mb-3 d-block">{{ $message }}</small>
                            @enderror
                          </div>
                          <div class="col-12 mt-5">
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