@extends('layouts.app')
@section('content')
    <div class="container-fluid mt-3">
        <div class="mb-3">
            <h4>Data Pembelian</h4>
        </div>
        <!-- Table Element -->
        <div class="card border-0">
            <div class="card-header pb-3">
                <h6 class="card-subtitle text-muted">
                </h6>
                <div class="d-flex mt-3">
                    <a href="{{ route('pembelian.create') }}" class="btn-b text-decoration-none p-0 m-0 py-2 px-3 rounded text-light ms-auto me-3"><i class="bi bi-plus-circle me-3"></i>Tambah Pembelian</a>
                    <a href="" class="btn btn-success"><i
                            class="bi bi-file-earmark-arrow-down me-3"></i>Download</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table" class="table">
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
                            @foreach ($data as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->nama_barang }}</td>
                                <td>{{ $d->merk }}</td>
                                <td>{{ $d->jumlah }}</td>
                                <td>{{ $d->harga }}</td>
                                <td>Rp. {{ $d->total }}</td>
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
@endsection
