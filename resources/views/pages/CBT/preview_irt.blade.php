@extends('layouts.logged-navbar')

@section('content')
<div class="p-5 pb-3 font-poppins">
    <form action="{{ route('irt.storeAnswers') }}" method="POST">
        @csrf
        
        @if (empty($questions))
            <p>No questions are available. Please contact the administrator.</p>
        @else
            <input type="hidden" name="flag" value="{{ $flag }}">
            <input type="hidden" name="theta" value="{{ $questions['theta'] ?? '' }}">
            <input type="hidden" name="a_value" value="{{ $questions['a_value'] ?? '' }}">
            <input type="hidden" name="b_value" value="{{ $questions['b_value'] ?? '' }}">
            <input type="hidden" name="c_value" value="{{ $questions['c_value'] ?? '' }}">
            <input type="hidden" name="questions" value="{{ $questions['question_text'] ?? '' }}">
            <input type="hidden" name="questions_id" value="{{ $questions['question_id'] ?? '' }}">
            <input type="hidden" name="key_answer" value="{{ $questions['key_answer'] ?? '' }}">
            <div class="col-lg-9 col-md-9 col-12 mx-auto mb-4" style="height: auto; padding: 20px; background-color: white; border-radius: 15px; box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);">
                <div class="row px-3">
                        <h5 class="p-3" style="font-weight: bold; color: #3e6d81;">
                            No {{ $flag+1 }}. {{ $questions['question_text'] }}
                        </h5>
                        @foreach(['A', 'B', 'C', 'D'] as $option)
                            <div class="form-check mb-2">
                                <input type="radio" class="form-check-input" name="answer" value="{{ $questions['option_' . $option] }}" required />
                                <label class="form-check-label" for="option_{{ $option }}" style="font-size: 18px;">
                                    {{ $questions['option_' . $option] ?? 'Option not available' }}
                                </label>
                            </div>
                        @endforeach

                    </div>
                </div>
        @endif
        <div class="col-6 text-end">
            <button type="submit" class="btn bg-color-primary" id="submitButton" style="width: 150px; color: white; border-radius: 25px;">
                {{ $flag < 9 ? 'Selanjutnya' : 'Selesai' }}
            </button>
        </div>
        
    </form>

</div>
@endsection
