@extends('admin.main')

@section('container')
    <div class="container">
        <h1>Preview File</h1>
        <p>Total Mahasiswa yang belum konfirmasi: {{ $total_users_konfirmasi }}</p>
        <iframe src="{{ $fileUrl }}" width="100%" height="600px"></iframe>
    </div>
@endsection
