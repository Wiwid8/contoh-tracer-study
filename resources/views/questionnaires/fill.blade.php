<x-user-layout title="Isi Kuesioner">

    <h3 class="mb-4">{{ $questionnaire->title }}</h3>

    <form method="POST" action="{{ route('questionnaires.submit', $questionnaire->id) }}">
        @csrf

        @foreach(json_decode($questionnaire->questions, true) as $index => $question)
            <div class="mb-3">
                <label class="form-label">{{ $question }}</label>
                <input type="text" name="answers[{{ $index }}]" class="form-control" required>
            </div>
        @endforeach

        <button class="btn btn-success">Kirim Jawaban</button>
    </form>

</x-user-layout>

