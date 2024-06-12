@extends('admin.main')

@section('container')
    <div class="container-show_form">
        <h1>Formulir Admin</h1>
        <a href="{{ route('admin.forms.create') }}" class="btn btn-success mb-3">Buat Formulir Baru</a>
        @foreach ($forms as $form)
            <div class="form-card mb-2">
                <h6 class="form-title">{{ $form->nama }}</h6>
                <div class="form-actions mr-2">
                    <a href="{{ route('admin.forms.edit', $form) }}" class="btn btn-warning btn-sm" style="margin: 0"><span
                            class="material-symbols-outlined" title="Edit formulir">
                            edit
                        </span>
                    </a>
                    <a href="{{ route('admin.forms.select_angkatan', $form) }}" class="btn btn-info btn-sm"
                        style="margin: 0"><span class="material-symbols-outlined" title="Lihat jawaban">
                            visibility
                        </span>
                    </a>
                    <form action="{{ route('admin.forms.destroy', $form) }}" method="POST" style="display:inline-block;"
                        title="Hapus formulir">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm ('Anda yakin menghapus formulir {{ $form->nama }} ?')"><span
                                class="material-symbols-outlined">delete</span></button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
