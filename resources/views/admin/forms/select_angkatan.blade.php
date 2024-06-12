@extends('admin.main')

@section('container')
    <div class="container-form_angkatan">
        <h1>Pilih Angkatan untuk Formulir</h1>
        <h6>{{ $form->nama }}</h6>

        @foreach ($angkatans as $angkatan)
            <a href="{{ route('admin.forms.user_responses_by_angkatan', [$form, $angkatan]) }}">
                <div class="card mb-2">
                    <div class="text-area">
                        <h1>{{ $angkatan->tahun }}</h1>
                    </div>
                </div>
            </a>
        @endforeach

    </div>
@endsection

<style>
    .container-form_angkatan a {
        text-decoration: none;
    }

    .container-form_angkatan a .card {
        display: flex;
        justify-content: center;
        background-color: #0F0529;
        width: 78vw;
        height: 50px;
        border-radius: 1rem;
    }


    .container-form_angkatan a .card .text-area {
        padding-left: 1.5rem;
    }

    .container-form_angkatan a .card .text-area h1 {
        text-decoration: none;
        color: white;
        font-weight: 500;
        font-size: 1.25rem;
    }
</style>
