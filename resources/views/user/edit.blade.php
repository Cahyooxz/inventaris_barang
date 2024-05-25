@extends('layouts.app')
@section('content')
    <div class="container-fluid mt-3 dashboard-content">
        <div class="card border-0">
            <div class="card-body">
                <form action="{{ route('users.update',['id' => $data->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="container-fluid">
                        <h5 class="card-title fw-bold mb-4">
                            Edit User
                        </h5>
                        <div class="row">
                            <div class="col-12">
                                <label for="" class="fw-medium mb-2">Role User</label>
                                <select name="role" id="" class="form-select mb-3">
                                    <option disabled selected>Pilih Role</option>
                                    <option value="admin" {{ $data->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="operator" {{ $data->role === 'operator' ? 'selected' : '' }}>Operator</option>
                                    <option value="petugas" {{ $data->role === 'petugas' ? 'selected' : '' }}>Petugas</option>
                                </select>
                                @error('role')
                                    <small class="text-danger mb-3 d-block">{{ $message }}</small>
                                @enderror
                                <label for="" class="fw-medium mb-2 mt-2">Name</label>
                                <input type="text" name="name" class="form-control mb-3" placeholder="Nama Lengkap"
                                    value="{{ $data->name }}">
                                @error('name')
                                    <small class="text-danger mb-3 d-block">{{ $message }}</small>
                                @enderror
                                
                                <label for="" class="fw-medium mb-2 mt-2">Email</label>
                                <input type="email" name="email" class="form-control mb-3" placeholder="Email"
                                    value="{{ $data->email }}">
                                @error('email')
                                    <small class="text-danger mb-3 d-block">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="" class="fw-medium mb-2 mt-2">Username</label>
                                <input type="text" name="username" class="form-control mb-3" placeholder="Username"
                                    value="{{ $data->username }}">
                                @error('username')
                                    <small class="text-danger mb-3 d-block">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-12 mt-3">
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
