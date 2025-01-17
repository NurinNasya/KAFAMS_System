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
    <h1>Available Quizzes</h1>

    <!-- Check if there are quizzes -->
    @if($quizzes->count() > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Question</th>
                    <th>Options</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($quizzes as $quiz)
                    <tr>
                        <td>{{ $quiz->subject }}</td>
                        <td>{{ $quiz->question }}</td>
                        <td>
                            <ul>
                                <li>{{ $quiz->option_a }}</li>
                                <li>{{ $quiz->option_b }}</li>
                                <li>{{ $quiz->option_c }}</li>
                                <li>{{ $quiz->option_d }}</li>
                            </ul>
                        </td>
                        <td>
                            <!-- Link to start the quiz for the subject -->
                            <a href="{{ route('activities.show', $quiz->id) }}" class="btn btn-primary">Take Quiz</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No quizzes available at the moment.</p>
    @endif
</div>
@endsection
