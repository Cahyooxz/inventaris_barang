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
                <div class="d-flex mt-3">
                    @if(!$barang->isEmpty())
                    <a href="{{ route('pemakaian.create') }}" class="btn-b text-decoration-none p-0 m-0 py-2 px-3 rounded text-light ms-auto me-3"><i class="bi bi-plus-circle me-3"></i>Tambah Pemakaian</a>
                    @endif
                    <a href="" class="btn btn-success {{ $barang->isEmpty() ? 'ms-auto' : ''}}"><i
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
                                <th>Merk</th>
                                <th>Nama Pemakai</th>
                                <th>Role</th>
                                <th>Jumlah Pemakaian</th>
                                <th>Tanggal Pemakaian</th>
                                <th>Aksi</th>
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
                                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="bi bi-gear me-3"></i>Option
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item"
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
@endsection
