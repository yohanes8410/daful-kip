@extends('admin.main')

@section('container')
    <div class="container-main" style="margin-top: 0">
        <div class="top-card mb-3">
            <div class="content">
                <div class="text-area">
                    <h1>Halo Admin !</h1>
                    <h6>Berikut ini disajikan data rekapitulasi seputar mahasiswa KIP-K di Universitas Tanjungpura.</h6>
                </div>
            </div>
        </div>
        <div class="first-card mb-3">
            <div class="content">
                <img class="card-icon" src="img/groups.svg" alt="">
                <div class="text-area text-right">
                    <div class="editable-area">
                        <button id="edit-button" title="Edit">
                            <img src="img/edit.svg" alt="Edit" />
                        </button>
                        <h1> <span id="student-count" contenteditable="false">???</span></h1>
                    </div>
                    <h6>Mahasiswa KIP Terdaftar</h6>
                </div>
            </div>
        </div>
        <div class="second-card-container">
            <div class="card mb-3">
                <div class="content">
                    <div class="text-area">
                        <img class="card-icon" src="img/group.svg" alt="">
                        <div class="editable-area text-right">
                            <button id="editmhs-button">
                                <img src="img/black-edit.svg" alt="Edit" />
                            </button>
                            <h1> <span id="mhs-count" contenteditable="false">???</span></h1>
                        </div>
                        <h6 class="text-right">Mahasiswa KIP<br>(Aktif)</h6>
                    </div>
                </div>
            </div>
            <a href="{{ route('show.skema-aktif', ['status_id' => 1]) }}" class="card mb-3">
                <div class="content">
                    <div class="text-area">
                        <img class="card-icon" src="img/person-check.svg" alt="">
                        <div class="editable-area text-right">
                            @if ($total_users === 0)
                                <h1>0</h1>
                            @else
                                <h1>{{ $total_users_aktif }}</h1>
                            @endif
                        </div>
                        <h6 class="text-right">Mahasiswa KIP Teregistrasi<br>(Aktif)</h6>
                    </div>
                </div>
            </a>
            <div class="card mb-3">
                <div class="content">
                    <div class="text-area">
                        <img class="card-icon" src="img/person-edit.svg" alt="">
                        <div class="editable-area text-right">
                            <h1>???</h1>
                        </div>
                        <h6 class="text-right">Mahasiswa KIP Mengisi<br>(Aktif)</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="third-card-container">
            <a href="{{ route('show.skema-pasif', ['status_id' => 2]) }}" class="card mb-3">
                <div class="content">
                    <div class="text-area">
                        <img class="card-icon" src="img/person-x.svg" alt="">
                        <div class="editable-area text-right">
                            @if ($total_users_diberhentikan === 0)
                                <h1>0</h1>
                            @else
                                <h1>{{ $total_users_diberhentikan }}</h1>
                            @endif
                        </div>
                        <h6 class="text-right">Mahasiswa Diberhentikan</h6>
                    </div>
                </div>
            </a>
            <a href="{{ route('show.skema-alumni', ['status_id' => 3]) }}" class="card mb-3">
                <div class="content">
                    <div class="text-area">
                        <img class="card-icon" src="img/alumni.svg" alt="">
                        <div class="editable-area text-right">
                            @if ($total_alumni === 0)
                                <h1>0</h1>
                            @else
                                <h1>{{ $total_alumni }}</h1>
                            @endif
                        </div>
                        <h6 class="text-right">Alumni</h6>
                    </div>
                </div>
            </a>
        </div>
    </div>




    <script>
        // scripts.js
        document.addEventListener('DOMContentLoaded', () => {
            const studentCountElement = document.getElementById('student-count');
            const editButton = document.getElementById('edit-button');

            // Function to load the student count from Local Storage
            function loadStudentCount() {
                const savedCount = localStorage.getItem('studentCount');
                if (savedCount !== null) {
                    studentCountElement.textContent = savedCount;
                }
            }

            // Load the student count when the page loads
            loadStudentCount();

            editButton.addEventListener('click', () => {
                studentCountElement.contentEditable = true;
                studentCountElement.focus(); // Fokus pada elemen saat edit mode aktif
                moveCaretToEnd(studentCountElement); // Pindahkan kursor ke akhir teks
            });

            studentCountElement.addEventListener('keydown', (event) => {
                if (event.key === 'Enter') {
                    event.preventDefault(); // Mencegah default behavior form submission
                    const newCount = studentCountElement.textContent.trim();
                    if (newCount !== '') {
                        localStorage.setItem('studentCount',
                            newCount); // Save the new count to Local Storage
                    }
                    studentCountElement.contentEditable = false;
                    studentCountElement.blur(); // Menghilangkan fokus setelah selesai mengedit
                }
            });

            // Optionally, to handle click outside to stop editing
            document.addEventListener('click', (event) => {
                if (!studentCountElement.contains(event.target) && !editButton.contains(event.target)) {
                    studentCountElement.contentEditable = false;
                    const newCount = studentCountElement.textContent.trim();
                    if (newCount !== '') {
                        localStorage.setItem('studentCount',
                            newCount); // Save the new count to Local Storage
                    }
                }
            });

            // Function to move the caret to the end of the contenteditable element
            function moveCaretToEnd(el) {
                const range = document.createRange();
                const sel = window.getSelection();
                range.selectNodeContents(el);
                range.collapse(false);
                sel.removeAllRanges();
                sel.addRange(range);
            }
        });
    </script>

    <script>
        // scripts.js
        document.addEventListener('DOMContentLoaded', () => {
            const mhsCountElement = document.getElementById('mhs-count');
            const editButton = document.getElementById('editmhs-button');

            // Function to load the mhs count from Local Storage
            function loadmhsCount() {
                const savedCount = localStorage.getItem('mhsCount');
                if (savedCount !== null) {
                    mhsCountElement.textContent = savedCount;
                }
            }

            // Load the mhs count when the page loads
            loadmhsCount();

            editButton.addEventListener('click', () => {
                mhsCountElement.contentEditable = true;
                mhsCountElement.focus(); // Fokus pada elemen saat edit mode aktif
                moveCaretToEnd(mhsCountElement); // Pindahkan kursor ke akhir teks
            });

            mhsCountElement.addEventListener('keydown', (event) => {
                if (event.key === 'Enter') {
                    event.preventDefault(); // Mencegah default behavior form submission
                    const newCount = mhsCountElement.textContent.trim();
                    if (newCount !== '') {
                        localStorage.setItem('mhsCount',
                            newCount); // Save the new count to Local Storage
                    }
                    mhsCountElement.contentEditable = false;
                    mhsCountElement.blur(); // Menghilangkan fokus setelah selesai mengedit
                }
            });

            // Optionally, to handle click outside to stop editing
            document.addEventListener('click', (event) => {
                if (!mhsCountElement.contains(event.target) && !editButton.contains(event.target)) {
                    mhsCountElement.contentEditable = false;
                    const newCount = mhsCountElement.textContent.trim();
                    if (newCount !== '') {
                        localStorage.setItem('mhsCount',
                            newCount); // Save the new count to Local Storage
                    }
                }
            });

            // Function to move the caret to the end of the contenteditable element
            function moveCaretToEnd(el) {
                const range = document.createRange();
                const sel = window.getSelection();
                range.selectNodeContents(el);
                range.collapse(false);
                sel.removeAllRanges();
                sel.addRange(range);
            }
        });
    </script>
    {{-- <h1>Dashboard Admin</h1> --}}
@endsection
