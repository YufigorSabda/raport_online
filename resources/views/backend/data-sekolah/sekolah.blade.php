@extends('layouts.layout')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="row-lg-10">
            <h2>Sekolah</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Data Sekolah</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Sekolah</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="row mt-4 animated fadeInRight" style="margin-bottom: 4rem;">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5>Sekolah</h5>
                    <div class="card-content">
                        <form action="{{ route('sekolah.update', $data->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-4"><label class="col-form-label">Jenjang</label>
                                    <div>
                                        <input type="text" class="form-control" name="jenjang"
                                            value="{{ $data->jenjang }}">
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-4"><label class="col-form-label">NPSN</label>

                                    <div><input type="text" class="form-control" name="npsn"
                                            value="{{ $data->npsn }}">
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-4"><label class="col-form-label">NSS</label>

                                    <div><input type="text" class="form-control" name="nss"
                                            value="{{ $data->nss }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-sm-4 col-form-label">Nama Sekolah</label>

                                <div class="col-sm-12"><input type="text" class="form-control" name="nama_sekolah"
                                        value="{{ $data->nama_sekolah }}"></div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <h4>Alamat</h4>
                            <div class="form-group row"><label class="col-sm-4 col-form-label">Jalan</label>

                                <div class="col-sm-12"><input type="text" class="form-control" name="jalan"
                                        value="{{ $data->ref_sekolah_alamat->jalan }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-4"><label class="col-form-label">Desa /
                                        Kelurahan</label>

                                    <div><input type="text" class="form-control" name="desa"
                                            value="{{ $data->ref_sekolah_alamat->desa }}">
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-4"><label class="col-form-label">Kecamatan</label>

                                    <div><input type="text" class="form-control" name="kecamatan"
                                            value="{{ $data->ref_sekolah_alamat->kecamatan }}"></div>
                                </div>
                                <div class="form-group col-sm-12 col-md-4"><label class="col-form-label">Kabupaten /
                                        Kotamadya</label>

                                    <div><input type="text" class="form-control" name="kabupaten"
                                            value="{{ $data->ref_sekolah_alamat->kabupaten }}"></div>
                                </div>
                                <div class="form-group col-sm-12 col-md-4"><label class="col-form-label">Provinsi</label>

                                    <div><input type="text" class="form-control" name="provinsi"
                                            value="{{ $data->ref_sekolah_alamat->provinsi }}"></div>
                                </div>
                                <div class="form-group col-sm-12 col-md-4"><label class="col-form-label">Kode Pos</label>

                                    <div><input type="text" class="form-control" name="kode_pos"
                                            value="{{ $data->ref_sekolah_alamat->kode_pos }}"></div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <h4>Kontak</h4>
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-4"><label class="col-form-label">Nomor
                                        Telepon</label>

                                    <div><input type="text" class="form-control" name="nomor_telepon"
                                            value="{{ $data->ref_sekolah_kontak->nomor_telepon }}"></div>
                                </div>
                                <div class="form-group col-sm-12 col-md-4"><label class="col-form-label">Nomor Fax</label>

                                    <div><input type="text" class="form-control" name="nomor_fax"
                                            value="{{ $data->ref_sekolah_kontak->nomor_fax }}"></div>
                                </div>
                                <div class="form-group col-sm-12 col-md-4"><label class="col-form-label">Email</label>

                                    <div><input type="text" class="form-control" name="email"
                                            value="{{ $data->ref_sekolah_kontak->email }}"></div>
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-sm-4 col-form-label">Website</label>

                                <div class="col-sm-12"><input type="text" class="form-control" name="website"
                                        value="{{ $data->ref_sekolah_kontak->website }}"></div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group row">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary btn-sm" type="submit">Save changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
