@extends('layouts.app')
@section('content')
    <div class="container-fluid mt-3 dashboard-content">
        <div class="mb-3">
            <h4>Data Inventaris Barang</h4>
        </div>
        <!-- Table Element -->
        <div class="card border-0">
            <div class="card-header pb-3">
                <h6 class="card-subtitle text-muted">
                </h6>
                <div class="d-flex mt-3">
                    <a href="{{ route('barang.index') }}" class="btn btn-success"><i class="bi bi-file-earmark-arrow-down me-3"></i>Download</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Jenis Barang</th>
                                <th>Jumlah Barang</th>
                                <th>Tanggal Pembelian</th>
                                <th>Tanggal Pemakaian</th>
                                <th>Nama Pemakai</th>
                                <th>Ruangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $d->kode_barang }}</td>
                                    <td>{{ $d->jenis_barang }}</td>
                                    <td>{{ $d->jumlah }}</td>
                                    <td>{{ $d->tanggal_pembelian }}</td>
                                    <td>{{ $d->tanggal_pemakaian }}</td>
                                    <td>{{ $d->pemakai }}</td>
                                    <td>{{ $d->ruang_id }}</td>
                                    <td>
                                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="bi bi-gear me-3"></i>Option
                                        </button>
                                        <ul class="dropdown-menu">
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
