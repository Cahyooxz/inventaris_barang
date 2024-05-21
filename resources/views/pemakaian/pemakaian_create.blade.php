@extends('layouts.app')
@section('content')
    <div class="container-fluid mt-3">
        <div class="card border-0">
            <div class="card-body">
                <h5 class="card-title fw-bold mb-3">
                    Tambah Pemakaian
                </h5>
                <form action="{{ route('pemakaian.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="container-fluid">
                        <div class="row">
                          <div class="col-12">
                            <label for="nama_barang" class="fw-medium mb-2 mt-2">Nama Barang</label>
                            <select name="kode_barang" id="" class="form-select mb-3">
                                <option selected disabled>Pilih Barang</option>
                                @foreach ($barang as $d)
                                    <option value="{{ $d->kode_barang }}">{{ $d->nama_barang }} - {{ $d->merk }}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="col-12">
                            <label for="peminjam" class="fw-medium mb-2 mt-2">Nama Pemakai</label>
                            <select name="pemakai" id="pemakai" class="form-select mb-3">
                                <option selected disabled>Pilih Pemakai</option>
                                @foreach ($user as $d)
                                <option value="{{ $d->id }}">{{ $d->name }} - {{ $d->role }}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="col-12">
                            <label for="jumlah" class="fw-medium mb-2 mt-2">Jumlah</label>
                            <input type="jumlah" name="jumlah" class="form-control mb-3" placeholder="Jumlah Barang"
                                value="{{ old('jumlah') }}">
                            @if(session('fail-pemakaian'))
                            <small class="text-danger mb-3 d-block">Stok barang yang tersisa hanya {{ (session('jumlah_barang')) }}</small>
                            @endif

                            <label for="tanggal" class="fw-medium mb-2 mt-2">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control mb-3" placeholder="Tanggal"
                                value="{{ old('tanggal') }}">
                            @error('tanggal')
                                <small class="text-danger mb-3 d-block">{{ $message }}</small>
                            @enderror
                          </div>
                          <div class="col-12 mt-5">
                              <a href="{{ route('pemakaian.index') }}" class="btn btn-secondary me-3">Close</a>
                              <button type="submit" class="btn btn-success">Submit</button>
                          </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection