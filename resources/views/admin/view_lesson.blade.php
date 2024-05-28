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

                            <th>Topic Materi</th>

                            <th>Judul</th>

                            <th>Materi</th>

                            <th>Author</th>

                            <th>Image</th>

                            <th>Edit</th>

                            <th>Delete</th>
                        </tr>

                        @foreach ($lesson as $lessons)
                            <tr>
                                <td>{{ $lessons->id }}</td>
                                <td>{{ $lessons->topic }}</td>
                                <td>{{ $lessons->title }}</td>
                                <td>{{ Str::limit($lessons->materi, 100) }}</td>
                                <td>{{ $lessons->author }}</td>
                                <td>
                                    <img height="120" width="120" src="lessons/{{ $lessons->image }}">
                                </td>

                                <td>
                                    <a class="btn btn-success" href="{{ url('update_lesson', $lessons->id) }}">Edit</a>
                                </td>
                                <td>
                                    <a class="btn btn-danger" onclick="confirmation(event)"
                                        href="{{ url('delete_lesson', $lessons->id) }}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>




                </div>

                <div class="div_deg">
                    {{ $lesson->onEachSide(1)->links() }}
                </div>


            </div>
        </div>
    </div>
    <!-- JavaScript files-->

    @include('admin.js')
</body>

</html>
