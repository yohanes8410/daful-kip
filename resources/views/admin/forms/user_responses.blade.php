{{-- resources/views/admin/forms/user_responses.blade.php --}}

@extends('admin.main')

@section('container')
    <div class="container mt-5">
        <h1> Jawaban {{ $user->nama }} untuk formulir</h1>
        <h6>{{ $form->nama }}</h6>

        <!-- Tombol Kembali -->


        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th scope="col">Pertanyaan</th>
                    <th scope="col">Jawaban</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($responses as $response)
                    <tr>
                        <td>{{ $response->pertanyaan->pertanyaan }}</td>
                        <td>
                            @if (strpos($response->jawaban, 'drive.google.com') !== false)
                                <a href="{{ $response->jawaban }}" target="_blank">Lihat File</a>
                            @else
                                @php
                                    $jawabanData = json_decode($response->jawaban, true);
                                @endphp
                                @if (json_last_error() === JSON_ERROR_NONE && is_array($jawabanData))
                                    <ul>
                                        @foreach ($jawabanData as $item)
                                            <li>{{ $item }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    {{ $response->jawaban }}
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-2 mb-2">
            <button class="btn btn-secondary" onclick="window.history.back()">Kembali</button>
        </div>
    </div>
@endsection

<style>
    .container {
        margin-top: 20px;
    }

    h1 {
        margin-bottom: 20px;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        border: 1px solid #dee2e6;
        padding: 8px;
        text-align: left;
    }

    .table th {
        background-color: #f8f9fa;
    }

    .table-bordered {
        border: 1px solid #dee2e6;
    }

    .btn-secondary {
        margin-bottom: 20px;
    }
</style>
