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

        input[type='text'], textarea {
            width: 350px;
            height: 50px;
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
                <h1>Add Option</h1>
                <div class="div_deg">
                    <form id="form" action="{{ url('upload_option') }}" method="Post" enctype="multipart/form-data">
                        @csrf
                        <div class="input_deg">
                            <label>Question</label>
                            <select name="question" required>
                                <option>Select a Question</option>
                                @foreach($questions as $question)
                                    <option value="{{ $question->id }}">{{ $question->question_text }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input_deg">
                            <label>Option Text</label>
                            <textarea id="option_text" name="option_text"></textarea>
                        </div>
                        <div class="input_deg">
                            <label>Points</label>
                            <input type="number" name="points" min="0">
                        </div>
                        <div class="input_deg">
                            <input class="btn btn-success" type="submit" value="Add Option">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('admin.js')
</body>

</html>
