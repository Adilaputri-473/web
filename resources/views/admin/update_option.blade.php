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

                <h2>Update Materi</h2>

                <div class="div_deg">
                    <form action="{{ url('edit_option', $option->id) }}" method="post" enctype="multipart/form-data">

                        @csrf
                        <div>
                            <label>Question</label>
                            <select name="question" required>
                                <option>Select a Question</option>
                                @foreach ($questions as $question)
                                    <option value="{{ $question->id }}">{{ $question->question_text }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label>Option Text</label>
                            <textarea id="option_text" name="option_text"></textarea>
                        </div>
                        <div>
                            <label>Points</label>
                            <input type="number" name="points" min="0">
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
