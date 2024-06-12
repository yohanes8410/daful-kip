{{-- resources/views/mahasiswa/forms/show.blade.php --}}

@extends('mahasiswa.main')

@section('container')
    <div class="container mt-5 ml-2">
        <div class="form-header mb-4">
            <h1 class="display-4">{{ $form->nama }}</h1>
            <p class="lead">{!! nl2br(e($form->deskripsi)) !!}</p>
        </div>
        <form action="{{ route('mahasiswa.forms.submit', $form) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @foreach ($form->pertanyaans as $pertanyaan)
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="pertanyaan_{{ $pertanyaan->id }}"
                                class="font-weight-bold">{{ $pertanyaan->pertanyaan }}</label>
                            @php
                                $jawaban = $existingAnswers[$pertanyaan->id]->jawaban ?? null;
                            @endphp

                            @if ($pertanyaan->tipe == 'short_text')
                                <input type="text" name="jawabans[{{ $pertanyaan->id }}]" class="form-control"
                                    value="{{ old('jawabans.' . $pertanyaan->id, $jawaban) }}" required>
                            @elseif ($pertanyaan->tipe == 'paragraph')
                                <textarea name="jawabans[{{ $pertanyaan->id }}]" class="form-control" required>{{ old('jawabans.' . $pertanyaan->id, $jawaban) }}</textarea>
                            @elseif ($pertanyaan->tipe == 'multiple_choice')
                                @foreach ($pertanyaan->options as $option)
                                    <div class="form-check">
                                        <input type="radio" name="jawabans[{{ $pertanyaan->id }}]"
                                            class="form-check-input" value="{{ $option->option }}"
                                            {{ old('jawabans.' . $pertanyaan->id, $jawaban) == $option->option ? 'checked' : '' }}
                                            required>
                                        <label class="form-check-label">{{ $option->option }}</label>
                                    </div>
                                @endforeach
                            @elseif ($pertanyaan->tipe == 'checkbox')
                                @php
                                    $jawabanArray = json_decode($jawaban, true) ?? [];
                                @endphp
                                @foreach ($pertanyaan->options as $option)
                                    <div class="form-check">
                                        <input type="checkbox" name="jawabans[{{ $pertanyaan->id }}][]"
                                            class="form-check-input" value="{{ $option->option }}"
                                            {{ in_array($option->option, old('jawabans.' . $pertanyaan->id, $jawabanArray)) ? 'checked' : '' }}
                                            required>
                                        <label class="form-check-label">{{ $option->option }}</label>
                                    </div>
                                @endforeach
                            @elseif ($pertanyaan->tipe == 'file_upload')
                                @if ($jawaban)
                                    <p>File sudah diupload: <a href="{{ $jawaban }}" target="_blank">Lihat File</a>
                                    </p>
                                @endif
                                <input type="file" name="jawabans[{{ $pertanyaan->id }}]" class="form-control" required>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="form-footer mt-3 mb-5">
                <input type="button" value="Kembali" class="btn btn-primary"
                    onclick="window.location.href = '/mahasiswa/forms'">
                <button type="submit" class="btn btn-primary ml-1">Simpan Jawaban</button>
            </div>
        </form>
    </div>

    <style>
        .container {
            padding: 0;
            margin: 0;
            color: #000;
        }

        .form-header h1 {
            font-weight: 400;
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }

        .form-header p {
            font-size: 1rem;
            color: #000;
            /* white-space: pre-wrap; */
            /* Preserve whitespace and line breaks */
        }

        .card {
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 1.5rem;
        }

        .form-group label {
            font-size: 0.9rem;
            /* Smaller font size */
            font-weight: normal;
            /* Normal font weight */
            margin-bottom: 0.5rem;
        }

        .form-check-label {
            font-size: 0.9rem;
            /* Smaller font size */
            font-weight: normal;
            /* Normal font weight */
        }

        .form-footer {
            display: flex;
            justify-content: left;
        }
    </style>
@endsection
