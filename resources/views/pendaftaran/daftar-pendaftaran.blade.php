@extends('layout.app')
@section('content')
<div class="row">
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Pendaftaran</h5>

                <!-- Table -->
                <table id="m_daftarpendaftaran" class="display table table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Alamat</th>
                            <th width="125px">Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <!-- End Table -->

                <!-- inikpunya dea -->

            </div>
        </div>

    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editForm">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">Edit Pendaftaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="edit_id" name="id">
                    <div class="mb-3">
                        <label>Nama</label>
                        <input type="text" id="edit_nama" name="nama" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>NIK</label>
                        <input type="text" id="edit_nik" name="nik" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Alamat</label>
                        <input type="text" id="edit_alamat" name="alamat" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btnUpdate" class="btn btn-primary">Simpan Perubahan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        const table = $('#m_daftarpendaftaran').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route("daftar-pendaftaran.index") }}',
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'nik',
                    name: 'nik'
                },
                {
                    data: 'alamat',
                    name: 'alamat'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        });

        // ✅ Tombol EDIT
        $('body').on('click', '.editPendaftaran', function() {
            const id = $(this).data('id');

            $.get(`{{ url('daftar-pendaftaran') }}/${id}/edit`)
                .done(function(data) {
                    // Set judul (opsional)
                    $('.modal-title').text('Edit Pendaftaran');

                    // Tampilkan modal (jika pakai Bootstrap; jika tidak, ganti dengan modal custom)
                    if ($('#editModal').modal) {
                        $('#editModal').modal('show');
                    }

                    // Isi form
                    $('#edit_id').val(data.id);
                    $('#edit_nama').val(data.nama);
                    $('#edit_nik').val(data.nik);
                    $('#edit_alamat').val(data.alamat);
                })
                .fail(function(xhr) {
                    Swal.fire('Gagal', 'Tidak dapat mengambil data untuk diedit.', 'error');
                    console.error(xhr.responseText);
                });
        });

        // ✅ Submit form EDIT (AJAX)
        $('#editForm').off('submit').on('submit', function(e) {
            e.preventDefault();

            const id = $('#edit_id').val();
            if (!id) {
                Swal.fire('Gagal', 'ID tidak ditemukan.', 'error');
                return;
            }

            const url = `{{ url('daftar-pendaftaran') }}/${id}`;
            const payload = {
                _token: '{{ csrf_token() }}',
                _method: 'PUT',
                nama: $('#edit_nama').val(),
                nik: $('#edit_nik').val(),
                alamat: $('#edit_alamat').val()
            };

            $('#btnUpdate').prop('disabled', true).text('Menyimpan...');

            $.post(url, payload)
                .done(function(res) {
                    if ($('#editModal').modal) {
                        $('#editModal').modal('hide');
                    }
                    $('#editForm')[0].reset();
                    $('#edit_id').val('');
                    table.ajax.reload(null, false);
                    Swal.fire('Sukses', res?.success || 'Data berhasil diperbarui.', 'success');
                })
                .fail(function(xhr) {
                    let msg = 'Terjadi kesalahan saat update.';
                    if (xhr.status === 422 && xhr.responseJSON?.errors) {
                        const firstKey = Object.keys(xhr.responseJSON.errors)[0];
                        msg = xhr.responseJSON.errors[firstKey][0];
                    }
                    Swal.fire('Gagal', msg, 'error');
                    console.error(xhr.responseText);
                })
                .always(function() {
                    $('#btnUpdate').prop('disabled', false).text('Simpan Perubahan');
                });
        });

        // ✅ Tombol HAPUS
        $('body').on('click', '.deletePendaftaran', function() {
            const id = $(this).data("id");

            Swal.fire({
                title: "Yakin ingin menghapus?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, hapus",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (!result.isConfirmed) return;

                $.ajax({
                        url: `{{ url('daftar-pendaftaran') }}/${id}`,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        }
                    })
                    .done(function(response) {
                        table.ajax.reload(null, false);
                        Swal.fire("Berhasil!", response?.success || "Data berhasil dihapus.", "success");
                    })
                    .fail(function() {
                        Swal.fire("Gagal!", "Data gagal dihapus.", "error");
                    });
            });
        });

        // ✅ Tombol UPLOAD (AJAX file upload via FormData)
        $('body').on('click', '.uploadPendaftaran', function() {
            const id = $(this).data('id');

            // Buat input file sementara
            const $input = $('<input type="file" accept=".pdf,.jpg,.jpeg,.png,.doc,.docx" style="display:none;">');
            $('body').append($input);

            $input.on('change', function() {
                const file = this.files[0];
                if (!file) {
                    $input.remove();
                    return;
                }

                const formData = new FormData();
                formData.append('_token', '{{ csrf_token() }}');
                formData.append('berkas', file);

                $.ajax({
                        url: `{{ url('daftar-pendaftaran') }}/${id}/upload`,
                        type: 'POST',
                        data: formData,
                        processData: false, // wajib untuk FormData
                        contentType: false, // wajib untuk FormData
                        xhr: function() {
                            // (Opsional) progress upload
                            const xhr = $.ajaxSettings.xhr();
                            if (xhr.upload) {
                                xhr.upload.addEventListener('progress', function(e) {
                                    if (e.lengthComputable) {
                                        const pct = Math.round((e.loaded / e.total) * 100);
                                        // Contoh: tampilkan progress di console atau progress bar kustom
                                        console.log('Upload:', pct + '%');
                                    }
                                }, false);
                            }
                            return xhr;
                        }
                    })
                    .done(function(res) {
                        table.ajax.reload(null, false);
                        Swal.fire('Sukses', res?.success || 'File berhasil diupload.', 'success');
                    })
                    .fail(function(xhr) {
                        let msg = 'Gagal mengupload file.';
                        if (xhr.status === 422 && xhr.responseJSON?.errors?.berkas) {
                            msg = xhr.responseJSON.errors.berkas[0];
                        }
                        Swal.fire('Gagal', msg, 'error');
                        console.error(xhr.responseText);
                    })
                    .always(function() {
                        $input.remove();
                    });
            });

            // Trigger pilih file
            $input.click();
        });
    });
</script>
@endsection