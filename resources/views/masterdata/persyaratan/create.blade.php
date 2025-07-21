@extends('layout.app')
@section('content')
<div class="pagetitle">
    <h1>Tambah Persyaratan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('persyaratan.index') }}">Persyaratan</a></li>
            <li class="breadcrumb-item active">Tambah</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form Tambah Persyaratan</h5>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('persyaratan.store') }}" method="POST" class="row g-3">
                        @csrf
                        <div class="col-12">
                            <label for="nama_persyaratan" class="form-label">Nama Persyaratan</label>
                            <input type="text" class="form-control" id="nama_persyaratan" name="nama_persyaratan" value="{{ old('nama_persyaratan') }}" required>
                        </div>

                        <div class="col-12">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="4" required>{{ old('keterangan') }}</textarea>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('persyaratan.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection