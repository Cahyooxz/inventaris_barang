@extends('layouts.app')
@section('content')
    <div class="container-fluid mt-3 dashboard-content">
        <div class="mb-3">
            <h4>Data Pemakaian</h4>
        </div>
        <!-- Table Element -->
        <div class="card border-0">
            <div class="card-header pb-3">
                <h6 class="card-subtitle text-muted">
                </h6>
                <form action="{{ route('pemakaian.laporan') }}" method="GET">
                <div class="d-flex mt-3 gap-5">
                        <input type="date" name="from" id="" class="form-control" value="{{ request('from') }}">
                        <input type="date" name="end" id="" class="form-control" value="{{ request('end') }}">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </form>
                <a href="{{ route('pemakaian.download', ['from' => request('from'),'end' => request('end')]) }}" class="btn btn-success mt-3"><i
                        class="bi bi-file-earmark-arrow-down me-3"></i>Download</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table-pemakaian" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Merk</th>
                                <th>Nama Pemakai</th>
                                <th>Role</th>
                                <th>Jumlah Pemakaian</th>
                                <th>Tanggal Pemakaian</th>
                                <th>Ruangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $loop->iteration  }}</td>
                                    <td>{{ $d->nama_barang  }}</td>
                                    <td>{{ $d->merk  }}</td>
                                    <td>{{ $d->name  }}</td>
                                    <td>{{ $d->role  }}</td>
                                    <td>{{ $d->jumlah  }}</td>
                                    <td>{{ $d->tanggal  }}</td>
                                    <td>
                                        @if($d->nama_ruangan)
                                            {{ $d->nama_ruangan }}
                                        @else
                                            N/A
                                        @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
