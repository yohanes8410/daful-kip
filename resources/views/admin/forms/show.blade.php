@extends('admin.main')

@section('container')
    <div class="container-show">
        <h1>Formulir Admin</h1>
        <a href="{{ route('admin.forms.create') }}" class="btn btn-primary">Buat Formulir Baru</a>
        <ul>
            @foreach ($forms as $form)
                <li>
                    <a href="{{ route('admin.forms.edit', $form) }}">{{ $form->nama }}</a>
                    <form action="{{ route('admin.forms.destroy', $form) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                    <a href="{{ route('admin.forms.responses', $form) }}" class="btn btn-secondary">Lihat Respons</a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
