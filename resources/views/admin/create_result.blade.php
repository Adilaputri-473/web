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

        input[type = 'text'] {
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

    <!-- Sidebar Navigation-->

    @include('admin.sidebar')

    <!-- Sidebar Navigation end-->
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

                <h1>Add Materi</h1>

                <div class="div_deg">

                    <form id="form" action="{{ url('upload_result') }}" method="Post" enctype="multipart/form-data">

                        @csrf
                        <div class="input_deg">
                            <label>Question</label>
                            <select name="question" required>
                                <option>Select a Question</option>
                                @foreach ($questions as $id => $question)
                                    <option value="{{ $id }}">{{ $question }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input_deg">
                            <label>Total Point</label>
                            <input type="number" name="total_points" min="0">
                        </div>

                        <div class="input_deg">
                            <input class="btn btn-success" type="submit" value="Add Product">
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')

    <!-- JavaScript for formatting text-->
</body>

</html>
