@extends('layout.app')
@section('content')

<div class="row">
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">General Form Elements</h5>

                <!-- General Form Elements -->
                <form id="form-pendaftaran" action="{{ route('form-pendaftaran.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    {{-- Nama Kelompok Tani --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Nama Kelompok Tani</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama" class="form-control"
                                placeholder="Masukkan nama kelompok tani" required>
                        </div>
                    </div>

                    {{-- NIK --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">NIK</label>
                        <div class="col-sm-10">
                            <input type="number" name="nik" class="form-control"
                                placeholder="Masukkan Nomor Induk Kependudukan" required>
                        </div>
                    </div>

                    {{-- Alamat --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea name="alamat" class="form-control" rows="3" placeholder="Masukkan alamat lengkap"
                                required></textarea>
                        </div>
                    </div>

                    {{-- Kecamatan --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Kecamatan</label>
                        <div class="col-sm-10">
                            <select id="kecamatan" name="kecamatan" class="form-select" required>
                                <option value="">-- Pilih Kecamatan --</option>
                                @foreach($kecamatan as $u)
                                <option value="{{$u->id}}">{{$u->nama_kecamatan}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Desa --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Desa</label>
                        <div class="col-sm-10">
                            <select id="desa" name="desa" class="form-select" required>
                                <option value="">-- Pilih Desa --</option>
                            </select>
                        </div>
                    </div>

                    {{-- Tombol Submit --}}
                    <div class="row mb-3">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-send"></i> Submit Form
                            </button>
                        </div>
                    </div>
                </form>

                <!-- End General Form Elements -->

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

 $('#kecamatan').on('change', function () {
        var kecamatanID = $(this).val();

        if (kecamatanID) {
            $.ajax({
               url: "{{ url('get-desa') }}/" + kecamatanID,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#desa').empty();
                    $('#desa').append('<option value="">-- Pilih Desa --</option>');
                    $.each(data, function (key, desa) {
                        $('#desa').append('<option value="'+ desa.id +'">'+ desa.nama_desa +'</option>');
                    });
                }
            });
        } else {
            $('#desa').empty();
            $('#desa').append('<option value="">-- Pilih Desa --</option>');
        }
    });
</script>
@endsection