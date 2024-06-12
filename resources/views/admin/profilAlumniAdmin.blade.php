@extends('admin.main')

@section('container')
    <h1>Alumni</h1>
    <div class="container-profil">
        @foreach ($skemas as $skema)
            <div class="card mb-3">
                <div class="content">
                    <div class="text-area">
                        <a href="{{ route('show.periode-alumni', ['status_id' => $status_id, 'skema_id' => $skema->id]) }}">
                            <h3>Skema</h3>
                            <h1>{{ $skema->nama }}</h1>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
        {{-- <h1>Profil Mahasiswa</h1> --}}
    </div>
@endsection
