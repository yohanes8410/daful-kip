@extends('admin.main')

@section('container')
    <div class="container-create">
        <h1>{{ isset($form) ? 'Edit Formulir' : 'Buat Formulir Baru' }}</h1>
        <form action="{{ isset($form) ? route('admin.forms.update', $form) : route('admin.forms.store') }}" method="POST">
            @csrf
            @if (isset($form))
                @method('PUT')
            @endif
            <div class="form-group">
                <label for="nama">Nama Formulir</label>
                <input type="text" name="nama" class="form-control" value="{{ isset($form) ? $form->nama : '' }}"
                    required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" required style="height: 150px;">{{ isset($form) ? $form->deskripsi : '' }}</textarea>
            </div>
            <div id="pertanyaan-container">
                <h3>Pertanyaan</h3>
                @if (isset($form))
                    @foreach ($form->pertanyaans as $index => $pertanyaan)
                        <div class="card mb-3 pertanyaan-group">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="tipe">Tipe Pertanyaan</label>
                                    <select name="pertanyaans[{{ $index }}][tipe]"
                                        class="form-control tipe-pertanyaan" data-index="{{ $index }}">
                                        <option value="short_text"
                                            {{ $pertanyaan->tipe == 'short_text' ? 'selected' : '' }}>Jawaban Singkat
                                        </option>
                                        <option value="paragraph" {{ $pertanyaan->tipe == 'paragraph' ? 'selected' : '' }}>
                                            Paragraf</option>
                                        <option value="multiple_choice"
                                            {{ $pertanyaan->tipe == 'multiple_choice' ? 'selected' : '' }}>Pilihan Ganda
                                        </option>
                                        <option value="checkbox" {{ $pertanyaan->tipe == 'checkbox' ? 'selected' : '' }}>
                                            Kotak Centang</option>
                                        <option value="file_upload"
                                            {{ $pertanyaan->tipe == 'file_upload' ? 'selected' : '' }}>Upload File</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="pertanyaan">Pertanyaan</label>
                                    <input type="text" name="pertanyaans[{{ $index }}][pertanyaan]"
                                        class="form-control" value="{{ $pertanyaan->pertanyaan }}" required>
                                </div>
                                <button type="button" class="btn btn-success btn-sm add-option"
                                    data-index="{{ $index }}"
                                    style="display: {{ in_array($pertanyaan->tipe, ['multiple_choice', 'checkbox']) ? 'inline-block' : 'none' }};">Tambah
                                    Opsi</button>
                                <div class="form-group options-container" data-index="{{ $index }}">
                                    @if (in_array($pertanyaan->tipe, ['multiple_choice', 'checkbox']))
                                        @foreach ($pertanyaan->options as $optionIndex => $option)
                                            <div class="option-group mb-2">
                                                <input type="text"
                                                    name="pertanyaans[{{ $index }}][options][{{ $optionIndex }}]"
                                                    class="form-control option-input" value="{{ $option->option }}"
                                                    required>
                                                <button type="button" class="btn btn-danger btn-sm remove-option"><span
                                                        class="material-symbols-outlined">delete</span></button>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <button type="button" class="btn btn-danger btn-sm remove-question">Hapus
                                    Pertanyaan</button>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="submit-button mb-3">

                <button type="button" id="add-question" class="btn btn-success">Tambah Pertanyaan</button>
                <input type="button" value="Kembali" class="btn btn-primary"
                    onclick="window.location.href = '/admin/forms'">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>

    <style>
        .container-create {
            width: 80vw;
            margin: 0;
            padding: 0;
        }

        #deskripsi {
            min-height: 150px;
            max-height: 300px;
            overflow-y: auto;
        }

        .form-card {
            border: 1px solid #0F0529;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 15px;
            background-color: #fff;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .option-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .options-container .add-option {
            margin-top: 10px;
        }
    </style>

    <script>
        function addEventListeners() {
            document.querySelectorAll('.tipe-pertanyaan').forEach(select => {
                select.removeEventListener('change', handleQuestionTypeChange);
                select.addEventListener('change', handleQuestionTypeChange);
            });

            document.querySelectorAll('.add-option').forEach(button => {
                button.removeEventListener('click', handleAddOption);
                button.addEventListener('click', handleAddOption);
            });

            document.querySelectorAll('.remove-question').forEach(button => {
                button.removeEventListener('click', handleRemoveQuestion);
                button.addEventListener('click', handleRemoveQuestion);
            });

            addOptionEventListeners();
        }

        function handleQuestionTypeChange(event) {
            const index = event.target.dataset.index;
            const container = document.querySelector(`.options-container[data-index="${index}"]`);
            const addOptionButton = document.querySelector(`.add-option[data-index="${index}"]`);
            if (event.target.value === 'multiple_choice' || event.target.value === 'checkbox') {
                addOptionButton.style.display = 'inline-block';
                container.innerHTML = `
                <div class="option-group mb-2">
                    <input type="text" name="pertanyaans[${index}][options][0]" class="form-control option-input" required>
                    <button type="button" class="btn btn-danger btn-sm remove-option"><span class="material-symbols-outlined">delete</span></button>
                </div>`;
                addOptionEventListeners();
            } else {
                addOptionButton.style.display = 'none';
                container.innerHTML = '';
            }
        }

        function handleAddOption(event) {
            const index = event.target.dataset.index;
            const container = document.querySelector(`.options-container[data-index="${index}"]`);
            const optionIndex = container.querySelectorAll('.option-group').length;
            const optionHtml = `
            <div class="option-group mb-2">
                <input type="text" name="pertanyaans[${index}][options][${optionIndex}]" class="form-control option-input" required>
                <button type="button" class="btn btn-danger btn-sm remove-option"><span class="material-symbols-outlined">delete</span></button>
            </div>`;
            container.insertAdjacentHTML('beforeend', optionHtml);
            addOptionEventListeners();
        }

        function handleRemoveQuestion(event) {
            event.target.closest('.pertanyaan-group').remove();
        }

        function addOptionEventListeners() {
            document.querySelectorAll('.remove-option').forEach(button => {
                button.removeEventListener('click', handleRemoveOption);
                button.addEventListener('click', handleRemoveOption);
            });
        }

        function handleRemoveOption(event) {
            event.target.closest('.option-group').remove();
        }

        document.getElementById('add-question').addEventListener('click', function() {
            const container = document.getElementById('pertanyaan-container');
            const index = container.querySelectorAll('.pertanyaan-group').length;
            const questionHtml = `
            <div class="card mb-3 pertanyaan-group">
                <div class="card-body">
                    <div class="form-group">
                        <label for="tipe">Tipe Pertanyaan</label>
                        <select name="pertanyaans[${index}][tipe]" class="form-control tipe-pertanyaan" data-index="${index}">
                            <option value="short_text">Jawaban Singkat</option>
                            <option value="paragraph">Paragraf</option>
                            <option value="multiple_choice">Pilihan Ganda</option>
                            <option value="checkbox">Kotak Centang</option>
                            <option value="file_upload">Upload File</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pertanyaan">Pertanyaan</label>
                        <input type="text" name="pertanyaans[${index}][pertanyaan]" class="form-control" required>
                    </div>
                    <button type="button" class="btn btn-success btn-sm add-option" data-index="${index}" style="display: none;">Tambah Opsi</button>
                    <div class="form-group options-container" data-index="${index}"></div>
                    <button type="button" class="btn btn-danger btn-sm remove-question">Hapus Pertanyaan</button>
                </div>
            </div>`;
            container.insertAdjacentHTML('beforeend', questionHtml);
            addEventListeners();
        });

        document.addEventListener('DOMContentLoaded', function() {
            const textarea = document.getElementById('deskripsi');

            function autoResizeTextarea() {
                textarea.style.height = 'auto';
                textarea.style.height = (textarea.scrollHeight) + 'px';
            }

            textarea.addEventListener('input', autoResizeTextarea);
            autoResizeTextarea(); // Call this once to set the initial size

            addEventListeners();
        });
    </script>
@endsection
