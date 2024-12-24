@extends('layouts.logged-navbar')

@section('content')
<div class="container-fluid mb-5">
    <div class="row p-4 pb-0 pt-5">
        <h4 style="color: #CA6035;" class="text-center">
            <b>
                Add Question to Your Test!
            </b>
        </h4>

        <div class="row mt-5">
            <form id="validate" method="post">
                @csrf
                <label for="Passage">
                    <b>
                        Passage
                    </b>
                </label>
                <p class="mt-2">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique corporis eveniet omnis soluta quod minima, doloremque commodi hic nostrum, earum aperiam labore id delectus, eos praesentium itaque aliquid. Officia, repellendus? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique corporis eveniet omnis soluta quod minima, doloremque commodi hic nostrum, earum aperiam labore id delectus, eos praesentium itaque aliquid. Officia, repellendus?Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique corporis eveniet omnis soluta quod minima, doloremque commodi hic nostrum, earum aperiam labore id delectus, eos praesentium itaque aliquid. Officia, repellendus?Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique corporis eveniet omnis soluta quod minima, doloremque commodi hic nostrum, earum aperiam labore id delectus, eos praesentium itaque aliquid. Officia, repellendus?Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique corporis eveniet omnis soluta quod minima, doloremque commodi hic nostrum, earum aperiam labore id delectus, eos praesentium itaque aliquid. Officia, repellendus?
                </p>

                <button type="button" class="btn text-light mt-4 ps-3 pe-3 bg-color-primary" id="tambah">Add question</button>
                <!-- <button type="button" class="btn btn-info" id="tambah">Add</button> -->


                <div class="mb-4 mt-4">
                    @csrf
                    <table id="emptbl" class="table table-borderless">
                        <tr>
                            <td colspan="4">
                                <label for="question" class="m-2">
                                    <b>
                                        Question 1
                                    </b>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <input class="form-control" type="text" name="question[]" id="question" placeholder="Input your question">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="option1[]" placeholder="Enter your option A" required>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="option2[]" placeholder="Enter your option B" required>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="option3[]" placeholder="Enter your option C" required>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="option4[]" placeholder="Enter your option D" required>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <input class="form-control" type="text" name="answer[]" id="answer" placeholder="Input your answer">
                            </td>
                        </tr>
                        <!-- <tr>
                            <td colspan="4">
                                <button type="button" class="btn btn-sm bg-color-secondary text-white" data-row="baris1" id="hapus">Delete</button>
                            </td>
                        </tr> -->
                    </table>
                    <!-- <td><button type="button" class="btn btn-sm btn-info" onclick="addRows()">Add</button></td> -->
                    <!-- <td><button type="button" class="btn btn-sm btn-danger" onclick="deleteRows()">Remore</button></td> -->
                </div>
            </form>
            <a href="{{ asset('/question-collection') }}">
                <button class="btn btn-block text-light mt-4 ps-5 pe-5" style="background-color: #3E6D81; float: right;">Save</button>
            </a>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        let baris = 1

        $(document).on('click', '#tambah', function() {
            baris++
            var html = "<tr>"
            html += "<td colspan='4'><label for='question' class='m-2'><b>Question " + baris + "</b></label></td>"
            html += "</tr>"
            html += "<td colspan='4'><input class='form-control' type='text' name='question[]' id='question' placeholder='Input your question'></td>"
            html += "</tr>"
            html += "<tr>"
            html += "<td><input type='text' class='form-control' name='option1[]' placeholder='Enter your option A' required></td>"
            html += "<td><input type='text' class='form-control' name='option2[]' placeholder='Enter your option B' required></td>"
            html += "<td><input type='text' class='form-control' name='option3[]' placeholder='Enter your option C' required></td>"
            html += "<td><input type='text' class='form-control' name='option4[]' placeholder='Enter your option D' required></td>"
            html += "</tr>"
            html += "<tr>"
            html += "<td colspan='4'><input class='form-control' type='text' name='answer[]' id='answer' placeholder='Input your answer'></td>"
            html += "</tr>"
            html += "<tr>"
            html += "<td colspan='4'><button type='button' class='btn btn-sm bg-color-secondary text-white' data-row='baris'" + baris + " id='hapus'>Delete</button></td>"
            html += "</tr>"
            $('#emptbl').append(html)
        })
    })

    $(document).on('click', '#hapus', function() {
        let hapus = $(this).data('row')
        $('#' + hapus).remove()
    })
</script>

<!-- <script>
    function addRows() {
        var table = document.getElementById('emptbl');
        var rowCount = table.rows.length;
        var cellCount = table.rows[0].cells.length;
        var row = table.insertRow(rowCount);
        for (var i = 0; i <= cellCount + 1; i++) {
            var cell = 'cell' + i;
            cell = row.insertCell(i);
            var copycel = document.getElementById('col' + i).innerHTML;
            cell.innerHTML = copycel;
            if (i == 2) {
                var radioinput = document.getElementById('col2').getElementsByTagName('input');
                for (var j = 0; j <= radioinput.length; j++) {
                    if (radioinput[j].type == 'radio') {
                        var rownum = rowCount;
                        radioinput[j].name = 'gender[' + rownum + ']';
                    }
                }
            }
        }
    }

    function deleteRows() {
        var table = document.getElementById('emptbl');
        var rowCount = table.rows.length;
        if (rowCount > '3') {
            var row = table.deleteRow(rowCount - 1);
            rowCount--;
        } else {
            alert('There should be atleast one row');
        }
    } -->
</script>
<!-- alert blink text -->
<!-- <script>
    function blink_text() {
        $('#message_error').fadeOut(700);
        $('#message_error').fadeIn(700);
    }
    setInterval(blink_text, 1000);
</script> -->
<!-- script validate form -->
<!-- <script>
    $('#validate').validate({
        reles: {
            'question[]': {
                required: true,
            },
            'option1[]': {
                required: true,
            },
            'option2[]': {
                required: true,
            },
            'option3[]': {
                required: true,
            },
            'option4[]': {
                required: true,
            },
            'answer[]': {
                required: true,
            },
        },
        messages: {
            'question[]': "Please input file*",
            'option1[]': "Please input file*",
            'option2[]': "Please input file*",
            'option3[]': "Please input file*",
            'option4[]': "Please input file*",
            'answer[]': "Please input file*",
        },
    });
</script> -->

@endsection