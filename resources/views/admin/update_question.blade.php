<!DOCTYPE html>
<html>

<head>
    @include('admin.css')

    <style type="text/css">
        .div_deg {
            display: flex;
            justify-content: center;
            align-item: center;
        }

        label {
            display: inline-block;
            width: 200px;
            padding: 20px
        }

        input[type='text'] {
            width: 300px;
            height: 60px;
        }


        textarea {
            width: 450px;
            height: 100px;
        }
    </style>
</head>

<body>
    @include('admin.header')

    <!-- Sidebar Navigation-->

    @include('admin.sidebar')

    <!-- Sidebar Navigation end-->
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

                <h2>Update Question</h2>

                <div class="div_deg">
                    <form action="{{ url('edit_question', $question->id) }}" method="post" enctype="multipart/form-data">

                        @csrf
                        <div>
                            <label>Topik Materi</label>
                            <select name="lesson" required>
                                <option>Select an Option</option>
                                @foreach ($lessons as $lesson)
                                    <!-- Ubah $lessons ke $lesson -->
                                    <option value="{{ $lesson->id }}">{{ $lesson->topic }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label>Question</label>
                            <textarea id="question_text" name="question_text"></textarea>
                        </div>
                        <div>
                            <input class="btn btn-success" type="submit" value="Update Lesson">
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
</body>

</html>
