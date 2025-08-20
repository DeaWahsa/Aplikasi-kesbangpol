@extends('layout.app')
@section('content')
<div class="row">
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Datatables</h5>
                <p><button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">Tambah Persyaratan</button></p>

                <!-- Table with stripped rows -->
                <table id="tabel-persyaratan" class="display table table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Persyaratan</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->

            </div>
        </div>

    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Persyaratan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formPersyaratan">
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Nama Persyaratan</label>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="id">
                            <input type="text" class="form-control" id="inputText">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
$(document).ready(function() {
    // Inisialisasi DataTables
    var table = $('#tabel-persyaratan').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route("persyaratan.index") }}',
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false,
                className: 'text-center',
                width: '40px'
            },
            {
                data: 'nama_persyaratan',
                name: 'nama_persyaratan',
                width: '250px', // batasi lebar
                render: function(data, type, row) {
                    return `<div class="text-truncate" style="max-width:230px;" title="${data}">${data}</div>`;
                }
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false,
                width: '120px',
                className: 'text-center'
            }
        ]
    });

    // Submit form tambah/edit
    $('#formPersyaratan').off('submit').on('submit', function(e) {
        e.preventDefault();

        var id = $('#id').val(); // Hidden input ID
        var url = id ? `{{ url('persyaratan') }}/${id}` : `{{ url('persyaratan') }}`;
        var method = id ? 'PUT' : 'POST';

        $.ajax({
            url: url,
            type: 'POST', // Laravel expects POST with _method spoofing for PUT
            data: {
                _token: '{{ csrf_token() }}',
                _method: method,
                nama_persyaratan: $('#inputText').val()
            },

            success: function(response) {
                $('#staticBackdrop').modal('hide');
                $('#formPersyaratan')[0].reset();
                $('#id').val('');
                table.ajax.reload();

                Swal.fire("Berhasil!", "Data berhasil disimpan.", "success");
            },
            error: function(xhr) {
                Swal.fire("Gagal!", xhr.responseJSON?.message ||
                    "Inputan Tidak Boleh Kosong!", "error");
            }
        });
    });

    // Tombol edit
    $('body').on('click', '.editPersyaratan', function() {
        var id = $(this).data('id');
        $.get(`{{ url('persyaratan') }}/${id}/edit`, function(data) {
            $('#modalLabel').text("Edit Persyaratan");
            $('#staticBackdrop').modal('show');
            $('#id').val(data.id);
            $('#inputText').val(data.nama_persyaratan);
        });
    });

    // Tombol hapus
    $('body').on('click', '.deletePersyaratan', function() {
        var id = $(this).data("id");

        Swal.fire({
            title: "Yakin ingin menghapus?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, hapus",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `{{ url('persyaratan') }}/${id}`,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        table.ajax.reload();
                        Swal.fire("Berhasil!", "Data berhasil dihapus.", "success");
                    },
                    error: function() {
                        Swal.fire("Gagal!", "Data gagal dihapus.", "error");
                    }
                });
            }
        });
    });
});
</script>
@endsection