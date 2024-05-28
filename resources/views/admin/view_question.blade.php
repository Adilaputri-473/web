<!DOCTYPE html>
<html>

<head>
    @include('admin.css')

    <style type="text/css">
        .div_deg {
            display: flex;
            justify-content: center;
            align-item: center;
            margin-top: 60px
        }

        .table_deg {
            border: 2px solid greenyellow;
        }

        th {
            background-color: skyblue;
            color: white;
            font-size: 19px;
            font-weight: bold;
            padding: 15px;
        }

        td {
            border: 1px solid skyblue;
            text-align: center;
            color: white;
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

                <div class="div_deg">
                    <table class="table_deg">
                        <tr>
                            <th>Id</th>

                            <th>Topic</th>

                            <th>Questions</th>

                            <th>Edit</th>

                            <th>Delete</th>
                        </tr>

                        @foreach ($question as $questions)
                            <tr>
                                <td>{{ $questions->id }}</td>
                                <td>{{ $questions->lesson_id }}</td>
                                <td>{{ Str::limit($questions->question_text, 100) }}</td>
                                <td>
                                    <a class="btn btn-success"
                                        href="{{ url('update_question', $questions->id) }}">Edit</a>
                                </td>
                                <td>
                                    <a class="btn btn-danger" onclick="confirmation(event)"
                                        href="{{ url('delete_question', $questions->id) }}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>




                </div>

                <div class="div_deg">
                    {{ $question->onEachSide(1)->links() }}
                </div>


            </div>
        </div>
    </div>
    <!-- JavaScript files-->

    @include('admin.js')
</body>

</html>
