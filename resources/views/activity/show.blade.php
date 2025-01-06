@php
    $layout = match (auth()->user()->type) {
        'admin' => 'layouts.mainAdmin-layout',
        'parent' => 'layouts.mainParent-layout',
        'student' => 'layouts.main-layout',
    };
@endphp

@extends($layout)

@section('content')
<div class="container">
    <h1>Quiz for {{ $quiz->subject }}</h1>

    <form action="{{ route('submit.quiz') }}" method="POST">
        @csrf
        <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">

        <div class="question">
            <p>{{ $quiz->question }}</p>
            <label><input type="radio" name="question_{{ $quiz->id }}" value="A"> {{ $quiz->option_a }}</label><br>
            <label><input type="radio" name="question_{{ $quiz->id }}" value="B"> {{ $quiz->option_b }}</label><br>
            <label><input type="radio" name="question_{{ $quiz->id }}" value="C"> {{ $quiz->option_c }}</label><br>
            <label><input type="radio" name="question_{{ $quiz->id }}" value="D"> {{ $quiz->option_d }}</label><br><br>
        </div>

        <button type="submit">Submit</button>
    </form>
</div>
@endsection
