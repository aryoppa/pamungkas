@extends('layouts.logged-navbar')

@section('content')
<div class="container">
    <h1>IRT Preview</h1>

    @if(isset($data) && count($data) > 0)
        <form id="answerForm">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Question</th>
                        <th>Option A</th>
                        <th>Option B</th>
                        <th>Option C</th>
                        <th>Option D</th>
                        <th>Submit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item['question_text'] ?? 'N/A' }}</td>
                            <td>
                                <input type="radio" name="answer_{{ $item['question_id'] }}" value="A">
                                {{ $item['option_A'] ?? 'N/A' }}
                            </td>
                            <td>
                                <input type="radio" name="answer_{{ $item['question_id'] }}" value="B">
                                {{ $item['option_B'] ?? 'N/A' }}
                            </td>
                            <td>
                                <input type="radio" name="answer_{{ $item['question_id'] }}" value="C">
                                {{ $item['option_C'] ?? 'N/A' }}
                            </td>
                            <td>
                                <input type="radio" name="answer_{{ $item['question_id'] }}" value="D">
                                {{ $item['option_D'] ?? 'N/A' }}
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary submit-answer" data-question-id="{{ $item['question_id'] }}">
                                    Submit
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
    @else
        <p>No data available.</p>
    @endif
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.submit-answer').forEach(button => {
            button.addEventListener('click', function() {
                const questionId = this.getAttribute('data-question-id');
                const selectedAnswer = document.querySelector(`input[name="answer_${questionId}"]:checked`);

                if (!selectedAnswer) {
                    alert('Please select an answer!');
                    return;
                }

                const answerValue = selectedAnswer.value;
                const isCorrect = confirm('Is this answer correct?'); // Replace with real validation logic if needed

                fetch('/store-answer', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                    body: JSON.stringify({
                        question_id: questionId,
                        is_correct: isCorrect ? 1 : 0,
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(`Answer submitted successfully. Updated theta: ${data.theta}`);
                    } else {
                        alert(`Error submitting answer: ${data.error}`);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            });
        });
    });
</script>
@endsection
