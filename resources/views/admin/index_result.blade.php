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
                            <th>No</th>
                            <th>User</th>
                            <th>Points</th>
                            <th>Questions</th>
                            <th>Delette</th>
                        </tr>

                        @foreach ($results as $result)
                            <tr data-entry-id="{{ $result->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $result->user->name }}</td>
                                <td>{{ $result->total_points }}</td>
                                <td>{{ $result->question_text }}
                                <td>
                                <td>
                                    <a class="btn btn-danger" onclick="confirmation(event)"
                                        href="{{ url('delete_result', $result->id) }}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>

                <div class="div_deg">
                    {{ $results->onEachSide(1)->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
</body>

</html>
