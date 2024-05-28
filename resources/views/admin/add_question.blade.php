<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style type="text/css">
        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;
        }

        h1 {
            color: white;
        }

        label {
            display: inline-block;
            width: 200px;
            font-size: 18px !important;
            color: white !important;
        }

        input[type='text'] {
            width: 350px;
            height: 50px;
        }

        textarea {
            width: 450px;
            height: 80px;
        }

        .input_deg {
            padding: 15px;
        }
    </style>
</head>

<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h1>Add Question</h1>
                <div class="div_deg">
                    <form id="form" action="{{ url('upload_question') }}" method="Post" enctype="multipart/form-data">
                        @csrf
                        <div class="input_deg">
                            <label>Topik Materi</label>
                            <select name="lesson" required>
                                <option>Select an Option</option>
                                @foreach ($lessons as $lesson)
                                    <!-- Ubah $lessons ke $lesson -->
                                    <option value="{{ $lesson->id }}">{{ $lesson->topic }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input_deg">
                            <label>Question</label>
                            <textarea id="question_text" name="question_text"></textarea>
                        </div>
                        <div class="input_deg">
                            <input class="btn btn-success" type="submit" value="Add Question">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('admin.js')
</body>

</html>
