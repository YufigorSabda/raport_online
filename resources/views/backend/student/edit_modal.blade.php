<div class="modal fade" style="" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true"
    role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Edit Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="edit_form" method="POST" action="{{ route('student.update', 'ID_PLACEHOLDER') }}">
                @csrf
                @method('put')

                <div class="modal-body">
                    <div class="row">
                        <input id="edit_id" type="hidden" value="">
                        <div class="form-group col-sm-12 col-md-12"><label class="col-form-label">Nama Siswa</label>
                            <div><input type="text" class="form-control" name="nama_siswa" id="edit_nama_siswa">
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-6"><label class="col-form-label">NIS</label>

                            <div><input type="text" class="form-control" name="nis" id="edit_nis">
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-6"><label class="col-form-label">NISN</label>

                            <div><input type="text" class="form-control" name="nisn" id="edit_nisn">
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-12"><label class="col-form-label">NIK</label>

                            <div><input type="text" class="form-control" name="nik" id="edit_nik">
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-6"><label class="col-form-label">Telepon Rumah</label>

                            <div><input type="text" class="form-control" name="telp_rumah" id="edit_telp_rumah">
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-6"><label class="col-form-label">Telepon Seluler</label>

                            <div><input type="text" class="form-control" name="telp_seluler" id="edit_telp_seluler">
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-12"><label class="col-form-label">Alamat Peserta
                                Didik</label>

                            <div><input type="text" class="form-control" name="alamat" id="edit_alamat">
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-8"><label class="col-form-label">Tempat Lahir</label>

                            <div><input type="text" class="form-control" name="tempat_lahir" id="edit_tempat_lahir">
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-4"><label class="col-form-label">Tanggal Lahir</label>

                            <div><input type="date" class="form-control" name="tgl_lahir" id="edit_tgl_lahir">
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-6"><label class="col-form-label">Berat Badan</label>

                            <div><input type="text" class="form-control" name="berat_badan" id="edit_berat_badan">
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-6"><label class="col-form-label">Tinggi Badan</label>

                            <div><input type="text" class="form-control" name="tinggi_badan" id="edit_tinggi_badan">
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-6"><label class="col-form-label">Jenis Kelamin</label>

                            <div><select class="form-control" name="id_gender" id="edit_id_gender">
                                    @foreach ($referensi['ref_gender'] as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->nama_gender }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-6"><label class="col-form-label">Agama</label>

                            <div><select class="form-control" name="id_agama" id="edit_id_agama">
                                    @foreach ($referensi['ref_agama'] as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_agama }}</option>
                                    @endforeach
                                    <option>Protestan</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-6"><label class="col-form-label">Status Dalam
                                Keluarga</label>
                            <div>
                                <select class="form-control" name="id_status_dk" id="edit_id_status_dk">
                                    @foreach ($referensi['ref_status_dk'] as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_status_dk }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-6"><label class="col-form-label">Anak ke</label>

                            <div><input type="text" class="form-control" name="anak_ke" id="edit_anak_ke">
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-12"><label class="col-form-label">Sekolah Asal</label>

                            <div><input type="text" class="form-control" name="sekolah_asal"
                                    id="edit_sekolah_asal">
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-6"><label class="col-form-label">Tanggal Masuk
                                Sekolah</label>

                            <div><input type="date" class="form-control" name="tgl_masuk" id="edit_tgl_masuk">
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-6"><label class="col-form-label">Diterima di
                                Kelas</label>

                            <div><select class="form-control" name="id_tingkat" id="edit_id_tingkat">
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

                            <div><input type="text" class="form-control" name="nama_ayah" id="edit_nama_ayah">
                            </div>
                        </div>
                        <div class="form-group col-sm-12 col-md-4"><label class="col-form-label">Pekerjaan
                                Ayah</label>

                            <div><input type="text" class="form-control" name="pekerjaan_ayah"
                                    id="edit_pekerjaan_ayah">
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-8"><label class="col-form-label">Nama Ibu</label>

                            <div><input type="text" class="form-control" name="nama_ibu" id="edit_nama_ibu">
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-4"><label class="col-form-label">Pekerjaan Ibu</label>

                            <div><input type="text" class="form-control" name="pekerjaan_ibu"
                                    id="edit_pekerjaan_ibu">
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-4"><label class="col-form-label">Telepon Orang
                                Tua</label>

                            <div><input type="text" class="form-control" name="telp_ortu" id="edit_telp_ortu">
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-8"><label class="col-form-label">Alamat Orang
                                Tua</label>

                            <div><input type="text" class="form-control" name="alamat_ortu"
                                    id="edit_alamat_ortu">
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-8"><label class="col-form-label">Nama Wali</label>

                            <div><input type="text" class="form-control" name="nama_wali" id="edit_nama_wali">
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-4"><label class="col-form-label">Pekerjaan
                                Wali</label>

                            <div><input type="text" class="form-control" name="pekerjaan_wali"
                                    id="edit_pekerjaan_wali">
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-6"><label class="col-form-label">Telepon Wali</label>

                            <div><input type="text" class="form-control" name="telp_wali" id="edit_telp_wali">
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-6"><label class="col-form-label">Alamat Wali</label>

                            <div><input type="text" class="form-control" name="alamat_wali"
                                    id="edit_alamat_wali">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    function openEditModal(id_student) {
        const apiUrl = `{{ route('student.edit', ['id' => 'ID_PLACEHOLDER']) }}`.replace('ID_PLACEHOLDER', id_student);

        fetch(apiUrl)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                const fields = ['id', 'nama_siswa', 'nis', 'nisn', 'nik', 'telp_rumah', 'telp_seluler', 'alamat',
                    'tempat_lahir', 'tgl_lahir', 'berat_badan', 'tinggi_badan', 'anak_ke', 'sekolah_asal',
                    'tgl_masuk'
                ];
                const fieldsOrtu = ['nama_ayah', 'pekerjaan_ayah', 'nama_ibu', 'pekerjaan_ibu', 'telp_ortu',
                    'alamat_ortu', 'nama_wali', 'pekerjaan_wali', 'telp_wali', 'alamat_wali'
                ]
                fields.forEach(field => {
                    document.getElementById(`edit_${field}`).value = data[field];
                });
                fieldsOrtu.forEach(field => {
                    document.getElementById(`edit_${field}`).value = data.ref_siswa_ortu[field];
                });
                const genderValue = document.getElementById('edit_id_gender');
                genderValue.value = data.ref_gender.id;
                const agamaValue = document.getElementById('edit_id_agama');
                agamaValue.value = data.ref_agama.id;
                const statusdkValue = document.getElementById('edit_id_status_dk');
                statusdkValue.value = data.ref_status_dk.id;
                const tingkatValue = document.getElementById('edit_id_tingkat');
                tingkatValue.value = data.ref_tingkat.id;

                const form = document.getElementById('edit_form');
                form.action = form.action.replace('ID_PLACEHOLDER', id_student);
            })
            .catch(error => {
                console.error('There has been a problem with your fetch operation:', error);
            });
    }
</script>
