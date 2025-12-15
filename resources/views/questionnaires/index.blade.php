<x-admin-layout title="Manajemen Kuesioner">

    <div class="mb-3 d-flex justify-content-between">
        <h3>Daftar Kuesioner</h3>
        <a href="{{ route('questionnaires.create') }}" class="btn btn-primary">
            + Tambah Kuesioner
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Judul</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($questionnaires as $q)
                <tr>
                    <td>{{ $q->title }}</td>
                    <td>
                        <a href="{{ route('questionnaires.show', $q->id) }}" class="btn btn-sm btn-info">Detail</a>
                        <a href="{{ route('questionnaires.edit', $q->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('questionnaires.destroy', $q->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</x-admin-layout>
