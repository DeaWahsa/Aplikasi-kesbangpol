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
                            <th>Nama Persyaratan</th>
                            <th width="125px">Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <!-- End Table -->

            </div>
        </div>

    </div>
</div>
<div class="modal fade" id="modalUpload" tabindex="-1">
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
                        <input type="file" id="edit_nama" name="nama" class="form-control">
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
        const id = $(this).data('id');
        const table = $('#m_daftarpendaftaran').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url("/file-persyaratan") }}/' + id,
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'nama_persyaratan',
                    name: 'nama_persyaratan'
                },

                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        });
    });
</script>
@endsection