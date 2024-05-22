@extends('layouts.app')
@section('content')
    <div class="container-fluid mt-3 dashboard-content">
        <div class="card border-0">
            <div class="card-body">
                <h5 class="card-title fw-bold mb-3">
                    Edit Barang
                </h5>
                <form action="{{ route('barang.update',[$data->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="container-fluid">
                        <div class="row">
                          <div class="col-6">
                            <label for="nama_barang" class="fw-medium mb-2 mt-2">Nama Barang</label>
                            <input type="text" readonly name="nama_barang" class="form-control mb-3" placeholder="Nama Barang"
                                value="{{ $data->nama_barang }}">
                            @error('nama_barang')
                                <small class="text-danger mb-3 d-block">{{ $message }}</small>
                            @enderror
                          </div>
                          <div class="col-12">
                              <label for="harga" class="fw-medium mb-2 mt-2">Harga</label>
                              <input type="number" name="harga" class="form-control mb-3" placeholder="Harga"
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