@extends('layouts.app')
@section('content')
    <div class="container-fluid mt-3 dashboard-content">
        <div class="card border-0">
            <div class="card-body">
                <h5 class="card-title fw-bold mb-3">
                    Tambah User
                </h5>
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <label for="" class="fw-medium mb-2">Role User</label>
                                <select name="role" id="" class="form-select mb-3">
                                    <option disabled selected>Pilih Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="operator">Operator</option>
                                    <option value="petugas">Petugas</option>
                                </select>
                                @error('role')
                                    <small class="text-danger mb-3 d-block">{{ $message }}</small>
                                @enderror
                                <label for="" class="fw-medium mb-2 mt-2">Name</label>
                                <input type="text" name="name" class="form-control mb-3" placeholder="Nama Lengkap"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <small class="text-danger mb-3 d-block">{{ $message }}</small>
                                @enderror
                                
                                <label for="" class="fw-medium mb-2 mt-2">Email</label>
                                <input type="email" name="email" class="form-control mb-3" placeholder="Email"
                                    value="{{ old('email') }}">
                                @error('email')
                                    <small class="text-danger mb-3 d-block">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="" class="fw-medium mb-2 mt-2">Username</label>
                                <input type="text" name="username" class="form-control mb-3" placeholder="Username"
                                    value="{{ old('username') }}">
                                @error('username')
                                    <small class="text-danger mb-3 d-block">{{ $message }}</small>
                                @enderror
                            </div>
                            
                            <div class="col-12 col-md-6">
                                <label for="" class="fw-medium mb-2 mt-2">Password</label>
                                <input type="password" name="password" class="form-control mb-3" placeholder="Password">
                                @error('password')
                                    <small class="text-danger mb-3 d-block">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-12 mt-5">
                                <a href="{{ route('users.index') }}" class="btn btn-secondary me-3">Close</a>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
