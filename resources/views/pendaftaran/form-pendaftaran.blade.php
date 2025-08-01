@extends('layout.app')
@section('content')

<div class="row">
  <div class="col-lg-12">

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">General Form Elements</h5>

        <!-- General Form Elements -->
        <form id="form-Pendaftaran" action="{{ route('form-pendaftaran.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputEmail" class="col-sm-2 col-form-label">NIK</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" name="nik">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputPassword" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="alamat">
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Submit Button</label>
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Submit Form</button>
            </div>
          </div>

        </form><!-- End General Form Elements -->

      </div>
    </div>

  </div>
</div>
</div>
@endsection

@section('scripts')
<script>
  $(document).ready(function() {
    $('#form-Pendaftaran').on('submit', function(e) {
      e.preventDefault();

      var formData = new FormData(this);
      var id = $('#id').val();
      var url = id ? `{{ url('form-pendaftaran') }}/${id}` : `{{ route('form-pendaftaran.store') }}`;
      if (id) {
        formData.append('_method', 'PUT');
      }

      $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
          $('#form-Pendaftaran')[0].reset();
          $('#id').val('');
          Swal.fire("Berhasil!", "Data berhasil disimpan.", "success");
        },
        error: function(xhr) {
          let message = "Inputan Tidak Boleh Kosong!";
          if (xhr.responseJSON && xhr.responseJSON.message) {
            message = xhr.responseJSON.message;
          }
          Swal.fire("Gagal!", message, "error");
        }
      });
    });
  });
</script>
@endsection