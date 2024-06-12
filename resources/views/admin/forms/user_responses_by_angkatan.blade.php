{{-- resources/views/admin/forms/user_responses_by_angkatan.blade.php --}}

@extends('admin.main')

@section('container')
    <div class="container">
        <h1>Jawaban untuk formulir</h1>
        <h6> {{ $form->nama }}</h6>
        <h6>Angkatan {{ $angkatan->tahun }}</h6>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Mahasiswa</th>
                    <th>Fakultas</th>
                    <th>Prodi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $number = 1;
                @endphp
                @foreach ($users as $user)
                    @if (
                        $user->jawabans()->whereHas('pertanyaan', function ($query) use ($form) {
                                $query->where('form_id', $form->id);
                            })->exists())
                        <tr>
                            <td>{{ $number++ }}</td>
                            <td>{{ $user->nama }}</td>
                            <td>{{ $user->fakultas->nama }}</td>
                            <td>{{ $user->prodi->nama }}</td>
                            <td>
                                <a href="{{ route('admin.forms.user_responses', [$form, $user]) }}"
                                    class="badge rounded-pill bg-info"><span class="material-symbols-outlined">
                                        visibility
                                    </span></a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
