@extends('admin.main')

@section('container')
    <div class="container">
        <h1>Buat Formulir Baru</h1>
        <form action="{{ route('admin.forms.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama">Nama Form</label>
                <input type="text" name="nama" class="form-control" required>
            </div>

            <div id="pertanyaan-container">
                <h3>Pertanyaan</h3>
                <div class="form-group">
                    <label for="tipe">Tipe Pertanyaan</label>
                    <select name="pertanyaans[0][tipe]" class="form-control">
                        <option value="short_text">Jawaban Singkat</option>
                        <option value="paragraph">Paragraf</option>
                        <option value="multiple_choice">Pilihan Ganda</option>
                        <option value="checkbox">Kotak Centang</option>
                        <option value="file_upload">Upload File</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pertanyaan">Pertanyaan</label>
                    <input type="text" name="pertanyaans[0][pertanyaan]" class="form-control" required>
                </div>
            </div>

            <button type="button" id="add-question">Tambah Pertanyaan</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <script>
        document.getElementById('add-question').addEventListener('click', function() {
            const container = document.getElementById('pertanyaan-container');
            const index = container.children.length / 2;
            const questionHtml = `
        <div class="form-group">
            <label for="tipe">Tipe Pertanyaan</label>
            <select name="pertanyaans[${index}][tipe]" class="form-control">
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
        </div>`;
            container.insertAdjacentHTML('beforeend', questionHtml);
        });
    </script>
@endsection
