@extends('layout.app')

@section('content')
<div class="container">
    <h1>Daftar Event</h1>
    <a href="{{ route('events.create') }}" class="btn btn-primary mb-3">Tambah Event</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
            <tr>
                <td>{{ $event->nama_event }}</td>
                <td>{{ $event->deskripsi }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
