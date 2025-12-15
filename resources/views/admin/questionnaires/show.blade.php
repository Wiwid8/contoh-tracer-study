<x-admin-layout>
    <div class="container-fluid">
        <h3>{{ $questionnaire->title }}</h3>
        <ol>
            @foreach(json_decode($questionnaire->questions) as $q)
                <li>{{ $q }}</li>
            @endforeach
        </ol>
        <a href="{{ route('admin.questionnaires.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</x-admin-layout>
