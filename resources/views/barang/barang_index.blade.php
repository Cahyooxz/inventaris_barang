@extends('layouts.app')
@section('content')
    <div class="container-fluid mt-3">
        <div class="mb-3">
            <h4>Data Barang</h4>
        </div>
        <!-- Table Element -->
        <div class="card border-0">
            <div class="card-header pb-3">
                <h6 class="card-subtitle text-muted">
                </h6>
                <div class="d-flex mt-3">
                    <a href="{{ route('barang.create') }}" class="btn-b text-decoration-none p-0 m-0 py-2 px-3 rounded text-light ms-auto me-3"><i class="bi bi-plus-circle me-3"></i>Tambah Barang</a>
                    <a href="{{ route('download-barang') }}" class="btn btn-success"><i class="bi bi-file-earmark-arrow-down me-3"></i>Download</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Jenis Barang</th>
                                <th>Merk</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $d->kode_barang }}</td>
                                    <td>{{ $d->nama_barang }}</td>
                                    <td>{{ $d->jenis_barang }}</td>
                                    <td>{{ $d->merk }}</td>
                                    <td>{{ $d->jumlah }}</td>
                                    <td>Rp. {{ $d->harga }}</td>
                                    <td>
                                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="bi bi-gear me-3"></i>Option
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="{{ route('barang.show', ['id' => $d->id]) }}"><i class="bi bi-eye me-2"></i>Show</a></li>
                                            <li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
