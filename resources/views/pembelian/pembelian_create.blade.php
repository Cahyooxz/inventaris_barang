@extends('layouts.app')
@section('content')
    <div class="container-fluid mt-3 dashboard-content">
        <div class="card border-0">
            <div class="card-body">
                <h5 class="card-title fw-bold mb-3">
                    Tambah Pembelian
                </h5>
                <form action="{{ route('pembelian.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="container-fluid">
                        <div class="row">
                          <div class="col-12" id="nama-barang-col">
                            <label for="nama_barang" class="fw-medium mb-2 mt-2">Nama Barang</label>
                            <div class="input-group mb-3">
                                <select name="kode_barang" id="select-barang" class="form-select">
                                    <option selected value="">Pilih Barang</option>
                                    @foreach ($kode_barang as $d)
                                    <option value="{{ $d->kode_barang }}">{{ $d->nama_barang }} {{ $d->merk }}</option>
                                    @endforeach
                                </select>
                                <input type="text" name="nama_barang" id="input-barang" class="form-control" placeholder="Barang lain" value="{{ old('nama_barang') }}">
                            </div>
                            @error('kode_barang')
                            <small class="text-danger mb-3 d-block">{{ $message }}</small>
                            @enderror
                            @error('nama_barang')
                            <small class="text-danger mb-3 d-block">{{ $message }}</small>
                            @enderror
                          </div>
                          <div class="col-6 d-none new-barang-field">
                            <label for="jenis_barang" class="fw-medium mb-2 mt-2">Jenis Barang</label>
                            <input type="text" name="jenis_barang" class="form-control mb-3" placeholder="Jenis Barang"
                                value="{{ old('jenis_barang') }}">
                            @error('jenis_barang')
                                <small class="text-danger mb-3 d-block">{{ $message }}</small>
                            @enderror
                          </div>
                          <div class="col-12 d-none new-barang-field">
                            <label for="merk" class="fw-medium mb-2 mt-2">Merk / Type Barang</label>
                            <input type="text" name="merk" class="form-control mb-3" placeholder="Merk Barang"
                                value="{{ old('merk') }}">
                            @error('merk')
                                <small class="text-danger mb-3 d-block">{{ $message }}</small>
                            @enderror
                          </div>
                          <div class="col-12 d-none new-barang-field">
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
                          <div class="col-12">
                            <label for="jumlah" class="fw-medium mb-2 mt-2">Jumlah</label>
                            <input type="jumlah" name="jumlah" class="form-control mb-3" placeholder="Jumlah Barang"
                                value="{{ old('jumlah') }}">
                            @error('jumlah')
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
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const kode_barangSelect = document.getElementById('select-barang');
            const kode_barangInput = document.getElementById('input-barang');
            const namaBarangContainer = document.getElementById('nama-barang-col');
            const barangBaruFields = document.querySelectorAll('.new-barang-field');
    
            function toggleBarangBaruFields(show) {
                barangBaruFields.forEach(field => {
                    if (show) {
                        field.classList.remove('d-none');
                    } else {
                        field.classList.add('d-none');
                    }
                });
            }
    
            kode_barangSelect.addEventListener('change', function() {
                if (this.value === "") {
                    kode_barangInput.disabled = false;
                    namaBarangContainer.classList.replace('col-6', 'col-12');
                    toggleBarangBaruFields(false);
                } else {
                    kode_barangInput.disabled = true;
                    toggleBarangBaruFields(false);
                }
            });
    
            kode_barangInput.addEventListener('input', function() {
                if (this.value.length > 0) {
                    kode_barangSelect.disabled = true;
                    namaBarangContainer.classList.replace('col-12', 'col-6');
                    toggleBarangBaruFields(true);
                } else {
                    kode_barangSelect.disabled = false;
                    namaBarangContainer.classList.replace('col-6', 'col-12');
                    toggleBarangBaruFields(false);
                }
            });
        });
    </script>
    
    
@endsection