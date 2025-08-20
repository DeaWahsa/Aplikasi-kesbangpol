@extends('layout.app')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">File Pendaftaran</h5>
                <div class="table-responsive">
                    <table id="m_daftarpendaftaran" class="display table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Persyaratan</th>
                                <th>Nama File</th>
                                <th>Status</th>
                                <th width="125px">Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-body">
                <h5 class="card-title border-bottom pb-2 mb-3">
                    <i class="bi bi-person-badge me-2 text-primary"></i> Biodata
                </h5>

                <table class="table table-sm align-middle">
                    <tr>
                        <th class="text-muted" style="width: 40%">
                            <i class="bi bi-people me-2 text-success"></i> Kelompok Tani
                        </th>
                        <td class="fw-semibold">: {{ $biodata->nama }}</td>
                    </tr>
                    <tr>
                        <th class="text-muted">
                            <i class="bi bi-credit-card-2-front me-2 text-warning"></i> NIK
                        </th>
                        <td class="fw-semibold">: {{ $biodata->nik }}</td>
                    </tr>
                    <tr>
                        <th class="text-muted">
                            <i class="bi bi-geo-alt me-2 text-danger"></i> Alamat
                        </th>
                        <td class="fw-semibold">: {{ $biodata->alamat }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>


</div>


<!-- Modal Upload -->
<div class="modal fade" id="modalUpload" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editForm" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Upload File Persyaratan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="edit_id" name="id_persyaratan">
                    <input type="hidden" id="id_pendaftaran" value="{{ $id_pendaftaran }}" name="id_pendaftaran">
                    <div class="mb-3">
                        <label>File</label>
                        <input type="file" id="file" name="file" class="form-control">
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

<!-- Modal Verifikasi -->
<div class="modal fade" id="modalVerifikasi" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formVerifikasi">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Verifikasi Persyaratan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="verif_id" name="id_persyaratan">
                    <div class="mb-3">
                        <label>Status Verifikasi</label>
                        <select class="form-control" name="status_verifikasi" id="status_verifikasi" required>
                            <option value="">Pilih</option>
                            <option value="2">Verifikasi</option>
                            <option value="1">Tolak</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btnVerif" class="btn btn-primary">Simpan</button>
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
    const id = `{{ $id_pendaftaran }}`;
    const table = $('#m_daftarpendaftaran').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: `{{ url('file-persyaratan') }}/${id}`,
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false,
                className: 'text-center',
                width: '30px'
            },
            {
                data: 'nama_persyaratan',
                name: 'nama_persyaratan'
            },
            {
                data: 'original_file_name',
                name: 'original_file_name',
                render: function(data, type, row) {
                    if (!data) {
                        return '<span class="text-danger">Belum diupload</span>';
                    } else {
                        const encodedFile = encodeURIComponent(row.nama_media);
                        return `<a href="{{ asset('storage/uploads/${encodedFile}') }}" target="_blank">${data}</a>`;
                    }
                }
            },
            {
                data: 'status',
                name: 'status',
                render: function(data, type, row) {
                    let statusValue = (data !== null) ? parseInt(data) : null;

                    if (!row.original_file_name) {
                        status = '<span class="badge bg-warning text-dark">Belum Upload</span>';
                    } else if (statusValue === 0) {
                        status = '<span class="badge bg-secondary">Belum Diverifikasi</span>';
                    } else if (statusValue === 1) {
                        status = '<span class="badge bg-danger">Ditolak</span>';
                    } else if (statusValue === 2) {
                        status = '<span class="badge bg-success">Terverifikasi</span>';
                    } else {
                        status = '<span class="badge bg-dark">Unknown</span>';
                    }

                    return status;
                },
                className: 'text-center'
            },

            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false,
                className: 'text-center',
                render: function(data, type, row) {
                    let uploadBtn =
                        `<a href="javascript:void(0)" data-id="${row.id}" class="edit btn btn-primary btn-sm modalUpload" title="Upload File"><i class="ri-upload-2-line"></i></a>`;
                    let verifBtn = '';

                    if (row.original_file_name) {
                        verifBtn =
                            ` <a href="javascript:void(0)" data-id="${row.file_id}" data-status="${row.status}" class="btn btn-warning btn-sm btnVerifikasi" title="Ubah Status Verifikasi"><i class="ri-check-fill"></i></a>`;
                    }


                    return uploadBtn + verifBtn;
                }

            }
        ]
    });

    // Modal upload
    // Klik tombol upload
    $('body').on('click', '.modalUpload', function() {
        let id = $(this).data('id');
        $('#edit_id').val(id);
        $('#modalUpload').modal('show');
    });

    // Submit form
    $('#editForm').on('submit', function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        let id = $('#edit_id').val();

        $.ajax({
            url: `{{ url('upload-file-persyaratan') }}/${id}`,
            type: 'POST',
            data: formData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            enctype: 'multipart/form-data',
            beforeSend: function() {
                myLoader('body', 'Sedang memuat... <br> Mohon menunggu beberapa saat...');
            },
            complete: function() {
                $('body').waitMe('hide');
            },
            success: function(response) {
                $('#modalUpload').modal('hide');
                $('#editForm')[0].reset();
                table.ajax.reload(null, false);
                Swal.fire('Berhasil', response.message, 'success');
            },
            error: function(e) {
                let response = e.responseJSON;
                Swal.fire('Error', response.message, 'error');
            }
        });
    });


    // Modal verifikasi
    $(document).on('click', '.btnVerifikasi', function() {
        let id = $(this).data('id');
        let status = $(this).data('status');
        $('#verif_id').val(id);
        $('#status_verifikasi').val(status);
        $('#modalVerifikasi').modal('show');
    });

    // Submit verifikasi
    $('#formVerifikasi').on('submit', function(e) {
        e.preventDefault();
        const formData = $(this).serialize();
        const id = $('#verif_id').val();

        $.ajax({
            url: `{{url('verifikasi-persyaratan')}}/${id}`,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function() {
                myLoader('body', 'Sedang memuat... <br> Mohon menunggu beberapa saat...');
            },
            complete: function() {
                $('body').waitMe('hide');
            },
            data: formData
        }).done(function(res) {
            $('#modalVerifikasi').modal('hide');
            $('#formVerifikasi')[0].reset();
            table.ajax.reload(null, false);
            Swal.fire('Berhasil', res?.message || 'Status berhasil diperbarui.', 'success');
        }).fail(function(xhr) {
            Swal.fire('Gagal', 'Gagal memperbarui status.', 'error');
            console.error(xhr.responseText);
        });
    });

});
</script>
@endsection