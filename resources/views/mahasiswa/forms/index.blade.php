@extends('mahasiswa.main')

@section('container')
    <div class="container-show_form_mahasiswa">
        <h1>Daftar Formulir</h1>

        @foreach ($forms as $form)
            <div class="form-card position-relative mb-2">
                <div class="form-title">
                    <h6>{{ $form->nama }}</h6>
                </div>
                <div class="action-button">
                    <a href="{{ route('mahasiswa.forms.show', $form) }}" class="btn btn-primary btn-sm"
                        title="Isi/edit formulir">
                        <span class="material-symbols-outlined">edit_note</span>
                    </a>
                </div>
                @if (!$form->is_filled)
                    <span class="badge badge-danger position-absolute top-0 end-0">!</span>
                @endif
            </div>
        @endforeach
    </div>
@endsection

<style>
    .container-show_form_mahasiswa {
        color: #000;
    }

    .container-show_form_mahasiswa {
        text-decoration: none;
    }

    .container-show_form_mahasiswa .form-card {
        position: relative;
        text-decoration: none;
        color: #fff;
        border-radius: 0.25rem;
        background-color: #007bff;
        padding: 1rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .container-show_form_mahasiswa .form-card .form-title {
        flex-grow: 1;
    }

    .container-show_form_mahasiswa .form-card .form-title h6 {
        color: #fff;
        font-weight: 500;
        font-size: 1rem;
        margin: 0;
    }

    .container-show_form_mahasiswa .form-card .action-button {
        padding: 3px 8px;
        font-size: 12px;
    }

    .container-show_form_mahasiswa .form-card .material-symbols-outlined {
        font-size: 20px;
    }

    .badge {
        padding: 0.5em 0.7em;
        font-size: 1em !important;
        font-weight: 700;
        color: #fff;
        text-align: center;
        border-radius: 50%;
    }

    .badge-danger {
        background-color: #dc3545;
    }

    .position-absolute {
        position: absolute !important;
    }

    .top-0 {
        top: 0 !important;
    }

    .end-0 {
        right: 0 !important;
    }
</style>
