@extends('layout.app')
@section('content')
<div class="row">
  <div class="col-lg-12">

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Datatables</h5>
        <p><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Tambah Persyaratan</button></p>
        
        <!-- Table with stripped rows -->
        <table class="table table-bordered data-table">
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
  function loadData() {
    $.ajax({
      url: '{{ route("persyaratan.index") }}',
      type: 'GET',
      dataType: 'json',
      success: function(response) {
        let rows = '';
        response.data.forEach(function(item, index) {
          rows += `
            <tr>
              <td>${index + 1}</td>
              <td>${item.nama_persyaratan}</td>
              <td>
                <button onclick="hapus(${item.id})" class="btn btn-danger btn-sm">
                  <i class="bi bi-trash"></i> Hapus
                </button>
              </td>
            </tr>
          `;
        });
        $('#tabel-persyaratan tbody').html(rows);
      },
      error: function(xhr, status, error) {
        console.error('Error:', error);
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "Gagal memuat data!"
        });
      }
    });
  }

  $(document).ready(function () {
    loadData(); // muat data saat awal

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
          loadData(); // refresh data
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
  });

  function hapus(id) {
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
            loadData();
            Swal.fire("Berhasil!", "Data berhasil dihapus.", "success");
          },
          error: function(xhr) {
            Swal.fire("Gagal!", "Data gagal dihapus.", "error");
          }
        });
      }
    });
  }
</script>
@endsection
