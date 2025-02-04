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
                    <form action="{{ url('edit_lesson', $data->id) }}" method="post" enctype="multipart/form-data">

                        @csrf
                        <div>
                            <label>Topic Materi</label>
                            <input type="text" name="topic" value="{{ $data->topic }}">
                        </div>
                        <div>
                            <label>Judul</label>
                            <input type="text" name="title" value="{{ $data->title }}">
                        </div>
                        <div>
                            <label>Materi</label>
                            <textarea name="materi">{{ $data->materi }}</textarea>
                        </div>
                        <div>
                            <label>Author</label>
                            <input type="text" name="author" value="{{ $data->author }}">
                        </div>
                        <div>
                            <label>Current Image</label>
                            <img width="150" src="/lessons/{{ $data->image }}">
                        </div>

                        <div>
                            <label>New Image</label>
                            <input type="file" name="image">
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
