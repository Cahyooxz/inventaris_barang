@extends('layouts.app')
@section('content')
    <div class="container-fluid mt-3">
        <div class="card border-0">
            <div class="card-body">
                <div class="d-flex mb-3">
                    <a href="{{ route('barang.index') }}" class="btn btn-dark d-flex align-items-center me-3">
                        <i class="fa-regular fa-circle-left"></i>
                    </a>
                    <h5 class="card-title fw-bold">
                        Detail Barang
                    </h5>
                </div>
                <div class="container-fluid mb-3">
                    <div class="row">
                        <div class="col-3 border fw-semibold pb-5 pt-2">
                            Kode Barang
                        </div>
                        <div class="col-9 border pb-5 pt-2">
                            : {{ $data->kode_barang }}
                        </div>
                        <div class="col-3 border fw-semibold pb-5 pt-2">
                            Nama Barang
                        </div>
                        <div class="col-9 border pb-5 pt-2">
                            : {{ $data->nama_barang }}
                        </div>
                        <div class="col-3 border fw-semibold pb-5 pt-2">
                            Jenis Barang
                        </div>
                        <div class="col-9 border pb-5 pt-2">
                            : {{ $data->jenis_barang }}
                        </div>
                        <div class="col-3 border fw-semibold pb-5 pt-2">
                            Merk
                        </div>
                        <div class="col-9 border pb-5 pt-2">
                            : {{ $data->merk }}
                        </div>
                        <div class="col-3 border fw-semibold pb-5 pt-2">
                            Jumlah
                        </div>
                        <div class="col-9 border pb-5 pt-2">
                            : {{ $data->jumlah }}
                        </div>
                        <div class="col-3 border fw-semibold pb-5 pt-2">
                            Harga
                        </div>
                        <div class="col-9 border pb-5 pt-2">
                            : Rp. {{ $data->harga }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
