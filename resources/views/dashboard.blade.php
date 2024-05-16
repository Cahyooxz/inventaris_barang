@extends('layouts.app')
@section('content')
    <div class="container-fluid mt-3">
        <div class="mb-3">
            <h4>Admin Dashboard</h4>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 d-flex">
                <div class="card flex-fill border-0 illustration">
                    <div class="card-body p-0 d-flex flex-fill">
                        <div class="row php  w-100">
                            <div class="col-6">
                                <div class="p-3 m-1">
                                    <h4>Welcome Back, {{ $user }}</h4>
                                    <p class="mb-0">Admin Dashboard</p>
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
                                    $ 78.00
                                </h4>
                                <p class="mb-2">
                                    Total Earnings
                                </p>
                                <div class="mb-0">
                                    <span class="badge text-success me-2">
                                        +9.0%
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
        <!-- Table Element -->
        <div class="card border-0">
            <div class="card-header pb-3">
                <h5 class="card-title">
                    Basic Table
                </h5>
                <h6 class="card-subtitle text-muted">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum ducimus,
                    necessitatibus reprehenderit itaque!
                </h6>
                <div class="d-flex">
                    <a href="{{ route('dashboard.create') }}" class="btn-b text-decoration-none p-0 m-0 py-2 px-2 rounded text-light mt-3"><i class="bi bi-plus-circle me-3 "></i>Tambah User</a>
                    <a href="{{ route('download') }}" class="btn btn-success mt-3 ms-auto"><i class="bi bi-file-earmark-arrow-down me-3"></i>Download</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Username</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Action</th>
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
                                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-gear me-3"></i>Option
                                        </button>
                                        <ul class="dropdown-menu">
                                          <li><a class="dropdown-item" href="#"><i class="bi bi-pen me-2"></i>Edit</a></li>
                                          <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash3 me-2"></i>Delete</a></li>
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