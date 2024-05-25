@extends('layouts.app')
@section('content')
    <div class="dashboard-content container-fluid mt-3">
        <div class="mb-3">
            @if(auth()->user()->role === 'admin')
            <h4>Admin Dashboard</h4>
            @elseif(auth()->user()->role === 'operator')
            <h4>Operator Dashboard</h4>
            @elseif(auth()->user()->role === 'petugas')
            <h4>Petugas Dashboard</h4>
            @endif
        </div>
        <div class="row mt-5">
            @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('operator'))
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card card-dashboard bg-gray text-light">
                        <div class="card-body py-4">
                            <div class="d-flex align-items-center">
                                <div class="d-flex align-items-center justify-content-center">
                                    <h4 class="a-icon"><i class="bi bi-people-fill"></i></h4>
                                    <div class="ms-5 d-flex flex-column gap-3">
                                        <h5 class="fw-medium">Data User</h5>
                                        <h1 class="fw-bold">{{ $data['user'] }}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card card-dashboard bg-gray text-light">
                        <div class="card-body py-4">
                            <div class="d-flex align-items-center">
                                <div class="d-flex align-items-center justify-content-center">
                                    <h4 class="a-icon"><i class="fa-solid fa-boxes-stacked"></i></h4>
                                    <div class="ms-5 d-flex flex-column gap-3">
                                        <h5 class="fw-medium">Data Barang</h5>
                                        <h1 class="fw-bold">{{ $data['barang'] }}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card card-dashboard bg-gray text-light">
                        <div class="card-body py-4">
                            <div class="d-flex align-items-center">
                                <div class="d-flex align-items-center justify-content-center">
                                    <h4 class="a-icon"><i class="fa-solid fa-cart-shopping"></i></h4>
                                    <div class="ms-5 d-flex flex-column gap-3">
                                        <h5 class="fw-medium">Data Pembelian</h5>
                                        <h1 class="fw-bold">{{ $data['pembelian'] }}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card card-dashboard bg-gray text-light">
                        <div class="card-body py-4">
                            <div class="d-flex align-items-center">
                                <div class="d-flex align-items-center justify-content-center">
                                    <h4 class="a-icon"> <i class="fa-solid fa-people-carry-box"></i></h4>
                                    <div class="ms-5 d-flex flex-column gap-3">
                                        <h5 class="fw-medium">Data Pemakaian</h5>
                                        <h1 class="fw-bold">{{ $data['pemakaian'] }}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if(auth()->user()->hasRole('petugas'))
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card card-dashboard bg-gray text-light">
                        <div class="card-body py-4">
                            <div class="d-flex align-items-center">
                                <div class="d-flex align-items-center justify-content-center">
                                    <h4 class="a-icon"><i class="fa-solid fa-boxes-stacked"></i></h4>
                                    <div class="ms-5 d-flex flex-column gap-3">
                                        <h5 class="fw-medium">Data Barang</h5>
                                        <h1 class="fw-bold">{{ $data['barang'] }}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card card-dashboard bg-gray text-light">
                        <div class="card-body py-4">
                            <div class="d-flex align-items-center">
                                <div class="d-flex align-items-center justify-content-center">
                                    <h4 class="a-icon"><i class="fa-solid fa-cart-shopping"></i></h4>
                                    <div class="ms-5 d-flex flex-column gap-3">
                                        <h5 class="fw-medium">Data Pembelian</h5>
                                        <h1 class="fw-bold">{{ $data['pembelian'] }}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-12 col-md-6 d-flex">
                <div class="card flex-fill border-0 illustration">
                    <div class="card-body p-0 d-flex flex-fill">
                        <div class="row php  w-100">
                            <div class="col-6">
                                <div class="p-3 m-1">
                                    <h4>Welcome Back, {{ $user }}</h4>
                                    <p class="mb-0">Dashboard {{ auth()->user()->role }}</p>
                                </div>
                            </div>
                            <div class="col-6 align-self-end text-end p-0">
                                <img src="{{ asset('image/inventaris.png') }}" class="img-fluid illustration-img" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 d-flex">
                <div class="card flex-fill border-0">
                    <div class="card-body py-4">
                        <div class="d-flex align-items-start">
                            <div class="flex-grow-1">
                                <h4 class="mb-2">
                                    Rp. {{ number_format($total_pembelian, 0, ',', '.') }}
                                </h4>
                                <p class="mb-2">
                                    Total Purchases This Month  
                                </p>
                                <div class="mb-0">
                                    <span class="badge text-{{ $status == 'naik' || $status == 'tidak berubah' ? 'success' : 'danger' }} me-2">
                                        {{ $persen }}%
                                    </span>
                                    <span class="text-muted">
                                        Since Last Month
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(auth()->user()->role === 'admin')
            <div class="row mt-3">
                <div class="d-flex mb-3">
                    <h4>Data Inventaris Barang</h4>
                    <a href="{{ route('inventaris.download') }}" class="btn btn-success ms-auto"><i
                        class="bi bi-file-earmark-arrow-down me-3"></i>Download</a>
                </div>
                <div class="col-12 col-xl-6 mb-5 col-xl-mb-0">
                    <div class="card">
                        <div class="card-body" style="height: 50vh">
                            <div class="fw-bold mb-3">
                                Data Pembelian
                            </div>
                            <div class="table-responsive">
                                <table id="table-pembelian" class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Merk/Type</th>
                                            <th>Jumlah</th>
                                            <th>Harga</th>
                                            <th>Total Harga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pembelian as $d)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $d->nama_barang }}</td>
                                            <td>{{ $d->merk }}</td>
                                            <td>{{ $d->jumlah }}</td>
                                            <td>Rp. {{ number_format($d->harga,0,',','.') }}</td>
                                            <td>Rp. {{ number_format($d->total,0,',','.') }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="bi bi-gear me-3"></i>Option
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item"
                                                                href="{{ route('pembelian.edit', ['id' => $d->id]) }}"><i
                                                                    class="bi bi-pen me-2"></i>Edit</a>
                                                        </li>
                                                        <li>
                                                            <form id="hapus-pembelian-{{ $d->id }}" action="{{ route('pembelian.destroy', ['id' => $d->id]) }}" method="POST" class="form-delete">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="dropdown-item text-danger btn-delete" id="btnHapusPembelian{{ $d->id }}"><i class="bi bi-trash3 me-2"></i>Delete</button>
                                                            </form>
                                                              <script>
                                                                document.addEventListener('DOMContentLoaded', function() {
                                                                    document.getElementById('btnHapusPembelian{{ $d->id }}').addEventListener('click', function() {
                                                                        Swal.fire({
                                                                            title: 'Apakah Anda yakin menghapus data {{ $d->nama_barang}} ?',
                                                                            text: "Data yang dihapus tidak dapat dikembalikan!",
                                                                            icon: 'warning',
                                                                            showCancelButton: true,
                                                                            confirmButtonColor: '#d33',
                                                                            cancelButtonColor: '#3085d6',
                                                                            confirmButtonText: 'Ya, hapus!',
                                                                            cancelButtonText: 'Batal'
                                                                        }).then((result) => {
                                                                            if (result.isConfirmed) {
                                                                                document.getElementById('hapus-pembelian-{{ $d->id }}').submit();
                                                                            }
                                                                        });
                                                                    });
                                                                });
                                                              </script>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-6 mb-5 col-xl-mb-0">
                    <div class="card">
                        <div class="card-body" style="height: 50vh">
                            <div class="fw-bold mb-3">
                                Data Pemakaian
                            </div>
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
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pemakaian as $d)
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
                                                <td>
                                                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="bi bi-gear me-3"></i>Option
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="{{ route('pemakaian.edit', ['id' => $d->id]) }}"><i
                                                                    class="bi bi-pen me-2"></i>Edit</a>
                                                        </li>
                                                        <li>
                                                            <form id="hapus-pemakaian-{{ $d->id }}" action="{{ route('pemakaian.destroy', ['id' => $d->id]) }}" method="POST" class="form-delete">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="dropdown-item text-danger btn-delete" id="btnHapuspemakaian{{ $d->id }}"><i class="bi bi-trash3 me-2"></i>Delete</button>
                                                            </form>
                                                              <script>
                                                                document.addEventListener('DOMContentLoaded', function() {
                                                                    document.getElementById('btnHapuspemakaian{{ $d->id }}').addEventListener('click', function() {
                                                                        Swal.fire({
                                                                            title: 'Apakah Anda yakin menghapus data {{ $d->nama_barang}} ?',
                                                                            text: "Data yang dihapus tidak dapat dikembalikan!",
                                                                            icon: 'warning',
                                                                            showCancelButton: true,
                                                                            confirmButtonColor: '#d33',
                                                                            cancelButtonColor: '#3085d6',
                                                                            confirmButtonText: 'Ya, hapus!',
                                                                            cancelButtonText: 'Batal'
                                                                        }).then((result) => {
                                                                            if (result.isConfirmed) {
                                                                                document.getElementById('hapus-pemakaian-{{ $d->id }}').submit();
                                                                            }
                                                                        });
                                                                    });
                                                                });
                                                              </script>
                                                        </li>
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
            </div>
        @endif
    </div>
@endsection