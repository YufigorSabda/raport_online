@extends('layouts.layout')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="row-lg-10">
            <h2>Kepala Sekolah</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Data Sekolah</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Kepala Sekolah</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="mt-4 animated fadeInRight">
        <div class="col-lg-12">
            <div class="card ">
                <div class="card-body">
                    <h5>Kepala Sekolah</h5>
                    <div class="card-content">
                        <form action="{{ route('kepala-sekolah.update', $data->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-4"><label class="col-form-label">NIP</label>

                                    <div><input type="text" class="form-control" name="nip"
                                            value="{{ $data->nip }}">
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-4"><label class="col-form-label">Gelar Depan</label>

                                    <div><input type="text" class="form-control" name="gelar_depan"
                                            value="{{ $data->gelar_depan }}">
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-4"><label class="col-form-label">Gelar
                                        Belakang</label>

                                    <div><input type="text" class="form-control" name="gelar_belakang"
                                            value="{{ $data->gelar_belakang }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-sm-4 col-form-label">Nama</label>

                                <div class="col-sm-12"><input type="text" class="form-control" name="nama"
                                        value="{{ $data->nama }}"></div>
                            </div>
                            <div class="form-group row mt-4">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary btn-sm" type="submit">Save changes</button>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="card">
                                <div class="p-3">
                                    <h3 class="font-weight-bold">Nama di Raport</h3>
                                    <div class="mt-4">
                                        <p class="font-weight-light h4">{{ $nama_lengkap }}</p>
                                        <p class="font-weight-light h6">NIP : {{ $data->nip }}</p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
