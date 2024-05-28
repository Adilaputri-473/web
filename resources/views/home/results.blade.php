<!DOCTYPE html>
<html>

<head>
    @include('home.css')
    <style type="text/css">
        .container {

            padding-top: 100px;

        }

        h1 {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->

        @include('home.header')

        <!-- end header section -->
    </div>
    <!-- end hero area -->

    <!-- result section -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>
                    Quiz End
                    <br>
                </h1>
                <div class="card">
                    <div class="card-header">Results of your test</div>
                    <div class="card-body">
                        <p class="mt-5">Total points: {{ $result->total_points }} points</p>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Question Text</th>
                                    <th>Points</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($result->questions as $question)
                                    <tr>
                                        <td>{{ $question->question_text }}</td>
                                        <td>{{ $question->pivot->points }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end result section -->


    <!-- info section -->

    @include('home.footer')

    <!-- end info section -->

</body>

</html>
