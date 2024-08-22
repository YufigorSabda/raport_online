<div class="modal fade" style="" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Tambah Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('student.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">

                        <div class="form-group col-sm-12 col-md-12"><label class="col-form-label">Nama Siswa</label>
                            <div><input type="text" class="form-control" name="nama_siswa">
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-6"><label class="col-form-label">NIS</label>

                            <div><input type="text" class="form-control" name="nis">
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-6"><label class="col-form-label">NISN</label>

                            <div><input type="text" class="form-control" name="nisn">
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-12"><label class="col-form-label">NIK</label>

                            <div><input type="text" class="form-control" name="nik">
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-6"><label class="col-form-label">Telepon Rumah</label>

                            <div><input type="text" class="form-control" name="telp_rumah">
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-6"><label class="col-form-label">Telepon Seluler</label>

                            <div><input type="text" class="form-control" name="telp_seluler">
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-12"><label class="col-form-label">Alamat Peserta
                                Didik</label>

                            <div><input type="text" class="form-control" name="alamat">
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-8"><label class="col-form-label">Tempat Lahir</label>

                            <div><input type="text" class="form-control" name="tempat_lahir">
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-4"><label class="col-form-label">Tanggal Lahir</label>

                            <div><input type="date" class="form-control" name="tgl_lahir">
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-6"><label class="col-form-label">Berat Badan</label>

                            <div><input type="text" class="form-control" name="berat_badan">
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-6"><label class="col-form-label">Tinggi Badan</label>

                            <div><input type="text" class="form-control" name="tinggi_badan">
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-6"><label class="col-form-label">Jenis Kelamin</label>

                            <div><select class="form-control" name="id_gender">
                                    @foreach ($referensi['ref_gender'] as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_gender }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-6"><label class="col-form-label">Agama</label>

                            <div><select class="form-control" name="id_agama">
                                    @foreach ($referensi['ref_agama'] as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_agama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-6"><label class="col-form-label">Status Dalam
                                Keluarga</label>

                            <div><select class="form-control" name="id_status_dk">
                                    @foreach ($referensi['ref_status_dk'] as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_status_dk }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-6"><label class="col-form-label">Anak ke</label>

                            <div><input type="text" class="form-control" name="anak_ke">
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-12"><label class="col-form-label">Sekolah Asal</label>

                            <div><input type="text" class="form-control" name="sekolah_asal">
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-6"><label class="col-form-label">Tanggal Masuk
                                Sekolah</label>

                            <div><input type="date" class="form-control" name="tgl_masuk">
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-6"><label class="col-form-label">Diterima di
                                Kelas</label>

                            <div><select class="form-control" name="id_tingkat">
                                    @foreach ($referensi['ref_tingkat'] as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_tingkat }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="row">
                        <div class="form-group col-sm-12 col-md-8"><label class="col-form-label">Nama Ayah</label>

                            <div><input type="text" class="form-control" name="nama_ayah">
                            </div>
                        </div>
                        <div class="form-group col-sm-12 col-md-4"><label class="col-form-label">Pekerjaan
                                Ayah</label>

                            <div><input type="text" class="form-control" name="pekerjaan_ayah">
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-8"><label class="col-form-label">Nama Ibu</label>

                            <div><input type="text" class="form-control" name="nama_ibu">
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-4"><label class="col-form-label">Pekerjaan Ibu</label>

                            <div><input type="text" class="form-control" name="pekerjaan_ibu">
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-4"><label class="col-form-label">Telepon Orang
                                Tua</label>

                            <div><input type="text" class="form-control" name="telp_ortu">
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-8"><label class="col-form-label">Alamat Orang
                                Tua</label>

                            <div><input type="text" class="form-control" name="alamat_ortu">
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-8"><label class="col-form-label">Nama Wali</label>

                            <div><input type="text" class="form-control" name="nama_wali">
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-4"><label class="col-form-label">Pekerjaan
                                Wali</label>

                            <div><input type="text" class="form-control" name="pekerjaan_wali">
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-6"><label class="col-form-label">Telepon Wali</label>

                            <div><input type="text" class="form-control" name="telp_wali">
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-6"><label class="col-form-label">Alamat Wali</label>

                            <div><input type="text" class="form-control" name="alamat_wali">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
