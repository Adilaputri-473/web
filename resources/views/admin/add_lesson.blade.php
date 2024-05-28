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

                    <form id="form" action="{{ url('upload_lesson') }}" method="Post" enctype="multipart/form-data">

                        @csrf
                        <div class="input_deg">
                            <label>Topik Materi</label>
                            <input type="text" name="topic" required>
                        </div>

                        <div class="input_deg">
                            <label>Judul</label>
                            <input type="text" name="title" required>
                        </div>

                        <div class="input_deg">
                            <label>Materi</label>
                            <textarea id="materi" name="materi"></textarea>
                        </div>

                        <div class="input_deg">
                            <label>Author</label>
                            <input type="text" name="author">
                        </div>

                        <div class="input_deg">
                            <label>Image</label>
                            <input type="file" name="image">
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
