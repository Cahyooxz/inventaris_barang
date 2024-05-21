@extends('layouts.app')
@section('content')
    <div class="container-fluid mt-3">
        <div class="mb-3">
            <h4>Admin Dashboard</h4>
        </div>
        <div class="row">
            <div class="col-3">
                <div class="card border-0 border-start border-3 border-danger">
                    <div class="card-body py-4">
                        <div class="d-flex align-items-start">
                            <div class="flex-grow-1">
                                <h4 class="mb-4">
                                    Barang
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card border-0 border-start border-3 border-danger">
                    <div class="card-body py-4">
                        <div class="d-flex align-items-start">
                            <div class="flex-grow-1">
                                <h4 class="mb-4">
                                    Barang
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card border-0 border-start border-3 border-danger">
                    <div class="card-body py-4">
                        <div class="d-flex align-items-start">
                            <div class="flex-grow-1">
                                <h4 class="mb-4">
                                    Barang
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card border-0 border-start border-3 border-danger">
                    <div class="card-body py-4">
                        <div class="d-flex align-items-start">
                            <div class="flex-grow-1">
                                <h4 class="mb-4">
                                    Barang
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboard-content row">
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
                                    Rp. {{ number_format($total_pembelian, 0, ',', '.') }}
                                </h4>
                                <p class="mb-2">
                                    Total Purchases This Month  
                                </p>
                                <div class="mb-0">
                                    <span class="badge text-{{ $status == 'naik' ? 'success' : 'danger' }} me-2">
                                        {{ $persen }}
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