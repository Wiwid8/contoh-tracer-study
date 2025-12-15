<x-admin-layout>
    <div class="py-4 container-fluid">

        <div class="mb-3 d-flex justify-content-between align-items-center">
            <h3>Daftar Kuesioner</h3>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createQuestionnaireModal">
                Tambah Kuesioner
            </button>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Judul</th>
                    <th>Pertanyaan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($questionnaires as $q)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $q->title }}</td>
                    <td>
                        <ul>
                            @foreach(json_decode($q->questions) as $question)
                                <li>{{ $question }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <!-- Tombol Edit -->
                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editQuestionnaireModal{{ $q->id }}">
                            Edit
                        </button>

                        <!-- Tombol Hapus -->
                        <form action="{{ route('admin.questionnaires.destroy', $q->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus kuesioner ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>

                <!-- Modal Edit -->
                <div class="modal fade" id="editQuestionnaireModal{{ $q->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form action="{{ route('admin.questionnaires.update', $q->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Kuesioner</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label>Judul Kuesioner</label>
                                        <input type="text" name="title" class="form-control" value="{{ $q->title }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Pertanyaan</label>
                                        <div id="questionsWrapper{{ $q->id }}">
                                            @foreach(json_decode($q->questions) as $question)
                                                <input type="text" name="questions[]" class="mb-2 form-control" value="{{ $question }}" required>
                                            @endforeach
                                        </div>
                                        <button type="button" class="btn btn-sm btn-outline-primary addQuestionBtn" data-target="#questionsWrapper{{ $q->id }}">
                                            Tambah Pertanyaan
                                        </button>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal Create -->
    <div class="modal fade" id="createQuestionnaireModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ route('admin.questionnaires.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Kuesioner Baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Judul Kuesioner</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Pertanyaan</label>
                            <div id="questionsWrapper">
                                <input type="text" name="questions[]" class="mb-2 form-control" placeholder="Pertanyaan 1" required>
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-primary" id="addQuestionBtn">
                                Tambah Pertanyaan
                            </button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // Tambah input pertanyaan di modal create
        document.getElementById('addQuestionBtn').addEventListener('click', function() {
            let wrapper = document.getElementById('questionsWrapper');
            let inputCount = wrapper.querySelectorAll('input').length + 1;
            let input = document.createElement('input');
            input.type = 'text';
            input.name = 'questions[]';
            input.classList.add('form-control', 'mb-2');
            input.placeholder = 'Pertanyaan ' + inputCount;
            input.required = true;
            wrapper.appendChild(input);
        });

        // Tambah input pertanyaan di modal edit (loop)
        document.querySelectorAll('.addQuestionBtn').forEach(btn => {
            btn.addEventListener('click', function() {
                let target = document.querySelector(this.dataset.target);
                let inputCount = target.querySelectorAll('input').length + 1;
                let input = document.createElement('input');
                input.type = 'text';
                input.name = 'questions[]';
                input.classList.add('form-control', 'mb-2');
                input.placeholder = 'Pertanyaan ' + inputCount;
                input.required = true;
                target.appendChild(input);
            });
        });
    </script>
    @endpush

</x-admin-layout>
