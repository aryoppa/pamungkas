@extends('layouts.logged-navbar')

@section('content')
<div class="container">
    <div class="row mb-4 pt-5 px-3 mt-3 text-justify">
        <h4 class="text-center mb-3 text-md">
            <b>
                {{$passage[0]->title}}
            </b>
        </h4>
        <div class="card p-4">
            <div style="height: 400px; overflow-y: scroll;">
                <p class="p-3">
                    {!! nl2br(e($passage[0]->passage)) !!}
                </p>
            </div>
        </div>
    </div>
    <?php $i = 1; ?>
    @foreach ($questions as $question)
    <div class="card p-4 shadow-md" style="color: #555555;">
        <div>{{$i}}. {!!$question->question!!}</div>
        @if ($questions[0]->category != "5W+1H")
        <div class="row ps-3">
            A. {{$question->option1}} <br>
            B. {{$question->option2}} <br>
            C. {{$question->option3}} <br>
            D. {{$question->option4}} <br>
        </div>
        @endif
        <div class="row">
            <b class="pt-2 ps-3">
                <button class="text-color-secondary mb-0 pb-0" type="button" style="background-color: transparent; border: none; margin-left: -6px;" onclick="view_function({{$i}}, this)">Lihat Jawaban</button>
                <div id="view-answer-{{$i}}" class="ps-0 pt-0 mt-0" style="display: none;">
                    Jawaban: {{$question->answer}}
                </div>
            </b>
        </div>
        <div class="mt-3 gap-1" style="display: flex; align-items: center;">
            <span>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$question->id}}" style="background-color: #3E6D81;">
                    <iconify-icon inline icon="akar-icons:edit" style="color: white; font-size: 17px;"></iconify-icon>
                </button>
            </span>
            <div class="modal fade" id="exampleModal-{{$question->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <?php
                    $modalQuestion = str_replace('<b><u>', '', $question->question);
                    $modalQuestion = str_replace('</u></b>', '', $modalQuestion);
                    ?>
                    <form action="/save-edit-question-collection" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$question->id}}" />
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Detail Pertanyaan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" style="text-align: justify">
                                <table class="table">
                                    <tr>
                                        <td>
                                            Pertanyaan
                                        </td>
                                        <td>
                                            <pre>
                                                <textarea type="textarea" name="question" name="id" rows="3" class="form-control">{{$modalQuestion}}</textarea>
                                            </pre>
                                        </td>
                                    </tr>
                                    @if ($questions[0]->category != "5W+1H")
                                    <tr>
                                        <td>
                                            Opsi A
                                        </td>
                                        <td>
                                            <input type="text" name="option1" class="form-control" value="{{$question->option1}}" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Opsi B
                                        </td>
                                        <td>
                                            <input type="text" name="option2" class="form-control" value="{{$question->option2}}" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Opsi C
                                        </td>
                                        <td>
                                            <input type="text" name="option3" class="form-control" value="{{$question->option3}}" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Opsi D
                                        </td>
                                        <td>
                                            <input type="text" name="option4" class="form-control" value="{{$question->option4}}" />
                                        </td>
                                    </tr>
                                    <td>
                                        Jawaban
                                    </td>
                                    <td>
                                        <!-- <input type="text" name="answer" class="form-control" value="{{$question->answer}}" /> -->
                                        <?php
                                        if ($question->answer == 'A') {
                                            $answer = 'A';
                                        } else if ($question->answer == 'B') {
                                            $answer = 'B';
                                        } else if ($question->answer == 'C') {
                                            $answer = 'C';
                                        } else if ($question->answer == 'D') {
                                            $answer = 'D';
                                        }
                                        ?>
                                        <select type="text" name="answer" class="form-select" aria-label="Default select example">
                                            <option value="A" {{$answer == 'A' ? 'selected' : ''}}>{{$question->option1}}</option>
                                            <option value="B" {{$answer == 'B' ? 'selected' : ''}}>{{$question->option2}}</option>
                                            <option value="C" {{$answer == 'C' ? 'selected' : ''}}>{{$question->option3}}</option>
                                            <option value="D" {{$answer == 'D' ? 'selected' : ''}}>{{$question->option4}}</option>
                                        </select>
                                    </td>
                                    </tr>
                                    @else
                                    <tr>
                                        <td>
                                            Jawaban
                                        </td>
                                        <td>
                                            <input type="text" name="answer" class="form-control" value="{{$question->answer}}" />
                                        </td>
                                    </tr>
                                    @endif
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn bg-color-secondary text-white" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn bg-color-primary text-white">Simpan Perubahan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </form>
            <button type="button" class="btn bg-color-secondary" data-bs-toggle="modal" data-bs-target="#exampleDeleteModal-{{$question->id}}">
                <iconify-icon inline icon="fluent:delete-20-regular" style="color: white; font-size: 17px;"></iconify-icon>
            </button>
            <div class="modal fade" id="exampleDeleteModal-{{$question->id}}" tabindex="-1" aria-labelledby="exampleDeleteModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleDeleteModalLabel">Hapus Pertanyaan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="text-align: justify">
                            <p>
                                Apakah anda yakin ingin menghapus data ini?
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-color-secondary text-white" data-bs-dismiss="modal">Batal</button>
                            <a href="/remove-question/{{$question->id}}">
                                <button type="button" class="btn bg-color-primary text-white">Hapus</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $i++; ?>
    @endforeach
    <div class="text-center my-5">
        <a href="{{ redirect()->getUrlGenerator()->previous() }}" class="text-color-secondary">
            <h5><i class="bi bi-arrow-left-square"></i> kembali</h5>
        </a>
    </div>
</div>
</div>

<script>
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function() {
        myInput.focus()
    })

    function view_function(id, btnElement) {
        var get_id = "view-answer-" + id;
        var x = document.getElementById(get_id);
        if (x.style.display === "none") {
            x.style.display = "block";
            btnElement.textContent = "Sembunyikan Jawaban";
        } else {
            x.style.display = "none";
            btnElement.textContent = "Lihat Jawaban";
        }
    }
</script>
@endsection
