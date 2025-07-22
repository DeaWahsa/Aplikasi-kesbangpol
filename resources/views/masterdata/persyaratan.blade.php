@extends('layout.app')
@section('content')
<div class="row">
  <div class="col-lg-12">

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Datatables</h5>
        <p><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Tambah Persyaratan</button></p>

        <!-- Table with stripped rows -->
        <table id="tabel-persyaratan" class="display" style="width:100%">
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
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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

    // Submit form tambah
    $('#formPersyaratan').on('submit', function(e) {
      e.preventDefault();

      $.ajax({
        url: '{{ url("add-persyaratan") }}',
        type: 'POST',
        data: {
          _token: '{{ csrf_token() }}',
          nama_persyaratan: $('#inputText').val()
        },
        success: function(response) {
          $('#staticBackdrop').modal('hide');
          $('#formPersyaratan')[0].reset();
          table.ajax.reload(); // refresh data
          Swal.fire({
            title: "Berhasil!",
            text: "Data berhasil disimpan.",
            icon: "success"
          });
        },
        error: function(xhr) {
          Swal.fire({
            icon: "error",
            title: "Gagal!",
            text: xhr.responseJSON?.message || "Inputan tidak boleh kosong!"
          });
        }
      });
    });
    $('body').on('click', '.deletePersyaratan', function() {
      let id = $(this).data("id");

      Swal.fire({
        title: "Yakin ingin menghapus?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Ya, hapus",
        cancelButtonText: "Batal"
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: '{{ url("persyaratan") }}/' + id,
            type: 'DELETE',
            data: {
              _token: '{{ csrf_token() }}'
            },
            success: function(response) {
              $('#tabel-persyaratan').DataTable().ajax.reload(); // refresh datatable
              Swal.fire("Berhasil!", "Data berhasil dihapus.", "success");
            },
            error: function(xhr) {
              Swal.fire("Gagal!", "Data gagal dihapus.", "error");
            }
          });
        }
      });
    });
    $('body').on('click', '.editPersyaratan', function() {
      var id = $(this).data('id');
      $.get("{{ url('persyaratan') }}/" + id + "/edit", function(data) {
        $('#modalLabel').text("Edit Persyaratan");
        $('#staticBackdrop').modal('show');
        $('#id').val(data.id);
        $('#inputText').val(data.nama_persyaratan);
      });
    });
    $('#formPersyaratan').on('submit', function(e) {
      e.preventDefault();

      var id = $('#id').val();
      var url = id ? '{{ url("persyaratan") }}/' + id : '{{ url("add-persyaratan") }}';
      var type = id ? 'PUT' : 'POST';

      $.ajax({
        url: url,
        type: type,
        data: {
          _token: '{{ csrf_token() }}',
          _method: type,
          nama_persyaratan: $('#inputText').val()
        },
        success: function(response) {
          $('#staticBackdrop').modal('hide');
          $('#formPersyaratan')[0].reset();
          $('#id').val('');
          $('#tabel-persyaratan').DataTable().ajax.reload();
          Swal.fire("Berhasil!", "Data berhasil disimpan.", "success");
        },
        error: function(xhr) {
          Swal.fire("Gagal!", "Terjadi kesalahan saat menyimpan data.", "error");
        }
      });
    });
  });
</script>
@endsection