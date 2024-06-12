@extends('admin.main')

@section('container')
    <div class="container">
        <h2>Tambah Pengingat Pesan</h2>
        <form action="{{ route('reminders.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="send_to" class="form-label">Kirim Kepada</label>
                <select name="send_to" id="send_to" class="form-control" required>
                    <option value="mahasiswa">Mahasiswa</option>
                    <option value="ortu">Orang Tua/Wali</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Pesan</label>
                <textarea name="message" id="message" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label for="start_date" class="form-label">Tanggal Mulai</label>
                <input type="date" name="start_date" id="start_date" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="end_date" class="form-label">Tanggal Selesai</label>
                <input type="date" name="end_date" id="end_date" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="send_time" class="form-label">Waktu Pengiriman</label>
                <input type="time" name="send_time" id="send_time" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

        <!-- Bagian Status Pengiriman -->
        <div class="mt-5">
            <h3>Daftar Broadcast</h3>
            <table class="table mb-5">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kirim Kepada</th>
                        <th>Pesan</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Waktu Pengiriman</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reminders as $reminder)
                        <tr>
                            <td>{{ $reminder->id }}</td>
                            <td>{{ $reminder->send_to == 'mahasiswa' ? 'Mahasiswa' : 'Orang Tua/Wali' }}</td>
                            <td>{{ $reminder->message }}</td>
                            <td>{{ $reminder->start_date }}</td>
                            <td>{{ $reminder->end_date }}</td>
                            <td>{{ $reminder->send_time }}</td>
                            <td>
                                <form action="{{ route('admin.hapus-broadcast', ['id' => $reminder->id]) }}" method="post"
                                    style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="badge bg-danger  rounded-pill" title="Hapus"
                                        style="border: none"
                                        onclick="return confirm('Anda yakin menghapus broadcast ?')"><span
                                            class="material-symbols-outlined">delete</span></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
