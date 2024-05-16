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
                                    <h4>Create User</h4>
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
            <div class="card-header">
                <h5 class="card-title">
                    Tambah User
                </h5>
                <h6 class="card-subtitle text-muted">
                </h6>
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="text" name="name" class="form-control mb-3" placeholder="Nama Lengkap">
                    @error('name')
                    <small class="text-danger mb-3">{{ $message }}</small>
                    @enderror
                    <input type="text" name="username" class="form-control mb-3" placeholder="Username">
                    @error('username')
                    <small class="text-danger mb-3">{{ $message }}</small>
                    @enderror
                    <input type="email" name="email" class="form-control mb-3" placeholder="Email">
                    @error('email')
                    <small class="text-danger mb-3">{{ $message }}</small>
                    @enderror
                    <input type="password" name="password" class="form-control mb-3" placeholder="Password">
                    @error('password')
                    <small class="text-danger mb-3">{{ $message }}</small>
                    @enderror
                    <select name="role" id="" class="form-select">
                        <option selected>Pilih Role</option>
                        <option value="admin">Admin</option>
                        <option value="operator">Operator</option>
                        <option value="Petugas">Petugas</option>
                    </select>
                    @error('role')
                    <small class="text-danger mb-3">{{ $message }}</small>
                    @enderror
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary mt-3">Close</a>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
