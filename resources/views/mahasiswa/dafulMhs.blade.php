@extends('mahasiswa.main')

@section('container')
    <div class="container">
        <h1>Daftar Formulir</h1>
        <ul>
            @foreach ($forms as $form)
                <li>
                    <a href="{{ route('mahasiswa.forms.show', $form) }}">{{ $form->nama }}</a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
