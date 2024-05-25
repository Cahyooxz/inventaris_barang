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
    </div>
@endsection