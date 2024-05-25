@extends('layouts.app')
@section('content')
    <div class="container-fluid mt-3 dashboard-content">
        <div class="card border-0">
            <div class="card-body">
                <h5 class="card-title fw-bold mb-3">
                    Tambah Barang
                </h5>
                <form action="{{ route('barang.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="container-fluid">
                        <div class="row">
                          <div class="col-6">
                            <label for="nama_barang" class="fw-medium mb-2 mt-2">Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control mb-3" placeholder="Nama Barang"
                                value="{{ old('nama_barang') }}">
                            @error('nama_barang')
                                <small class="text-danger mb-3 d-block">{{ $message }}</small>
                            @enderror
                          </div>
                          <div class="col-6">
                            <label for="jenis_barang" class="fw-medium mb-2 mt-2">Jenis Barang</label>
                            <input type="text" name="jenis_barang" class="form-control mb-3" placeholder="Jenis Barang"
                                value="{{ old('jenis_barang') }}">
                            @error('jenis_barang')
                                <small class="text-danger mb-3 d-block">{{ $message }}</small>
                            @enderror
                          </div>
                          <div class="col-12">
                            <label for="merk" class="fw-medium mb-2 mt-2">Merk / Type Barang</label>
                            <input type="text" name="merk" class="form-control mb-3" placeholder="Merk Barang"
                                value="{{ old('merk') }}">
                            @error('merk')
                                <small class="text-danger mb-3 d-block">{{ $message }}</small>
                            @enderror
                          </div>
                          <div class="col-12">
                            <label for="jumlah" class="fw-medium mb-2 mt-2">Jumlah</label>
                            <input type="jumlah" name="jumlah" class="form-control mb-3" placeholder="Jumlah Barang"
                                value="{{ old('jumlah') }}">
                            @error('jumlah')
                                <small class="text-danger mb-3 d-block">{{ $message }}</small>
                            @enderror
                          </div>
                          <div class="col-12">
                              <label for="harga" class="fw-medium mb-2 mt-2">Harga</label>
                              <div class="input-group mb-3">
                                  <span class="input-group-text">Rp.</span>
                                  <input type="text" name="harga" class="form-control" placeholder="Harga"
                                      value="{{ old('harga') }}">
                              </div>
                              @error('harga')
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