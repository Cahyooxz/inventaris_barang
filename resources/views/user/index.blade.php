@extends('layouts.app')
@section('content')
    <div class="container-fluid mt-3 dashboard-content">
        <div class="mb-3">
            <h4>Data Users</h4>
        </div>
        <!-- Table Element -->
        <div class="card border-0">
            <div class="card-header pb-3">
                <h6 class="card-subtitle text-muted">
                </h6>
                <div class="d-flex mt-3">
                    <a href="{{ route('users.create') }}" class="btn-b text-decoration-none p-0 m-0 py-2 px-3 rounded text-light ms-auto me-3"><i class="bi bi-plus-circle me-3"></i>Tambah User</a>
                    <a href="{{ route('download') }}" class="btn btn-success"><i
                            class="bi bi-file-earmark-arrow-down me-3"></i>Download</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table" class="table">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $d->username }}</td>
                                    <td>{{ $d->name }}</td>
                                    <td>{{ $d->email }}</td>
                                    <td>{{ $d->role }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="bi bi-gear me-3"></i>Option
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item"
                                                        href="{{ route('users.edit', ['id' => $d->id]) }}"><i
                                                            class="bi bi-pen me-2"></i>Edit</a></li>
                                                <li>
                                                    <form id="hapus-users-{{ $d->id }}" action="{{ route('users.destroy', ['id' => $d->id]) }}" method="POST" class="form-delete">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="dropdown-item text-danger btn-delete" id="btnHapusUsers{{ $d->id }}"><i class="bi bi-trash3 me-2"></i>Delete</button>
                                                    </form>
                                                      <script>
                                                        document.addEventListener('DOMContentLoaded', function() {
                                                            document.getElementById('btnHapusUsers{{ $d->id }}').addEventListener('click', function() {
                                                                Swal.fire({
                                                                    title: 'Apakah Anda yakin menghapus data {{ $d->name}} ?',
                                                                    text: "Data yang dihapus tidak dapat dikembalikan!",
                                                                    icon: 'warning',
                                                                    showCancelButton: true,
                                                                    confirmButtonColor: '#d33',
                                                                    cancelButtonColor: '#3085d6',
                                                                    confirmButtonText: 'Ya, hapus!',
                                                                    cancelButtonText: 'Batal'
                                                                }).then((result) => {
                                                                    if (result.isConfirmed) {
                                                                        document.getElementById('hapus-users-{{ $d->id }}').submit();
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
