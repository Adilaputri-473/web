<!DOCTYPE html>
<html>

<head>
    @include('home.css')

    <style type="text/css">
        .div_center {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
        }

        detail-box {
            padding: 15px;
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

    <!-- lesson details start -->

    <section class="shop_section layout_padding">
        <div class="container">

            <div class="row">


                <div class="col-md-12">
                    <div class="box">

                        <div class="div_center">
                            <img width="400" src="/lessons/{{ $data->image }}" alt="">
                        </div>

                        <div class="detail-box">
                            <h6>
                                {{ $data->topic }}
                            </h6>
                            <h6> Author :
                                <span>{{ $data->author }}</span>
                            </h6>
                        </div>
                        <div class="div_center">
                            <h6>
                                {{ $data->title }}
                            </h6>
                        </div>
                        <div class="detail-box">
                            <p><br>{!! nl2br(e($data->materi)) !!}</p>

                        </div>


                    </div>
                </div>

            </div>

        </div>
    </section>


    <!-- lesson details end -->



    <!-- info section -->

    @include('home.footer')

    <!-- end info section -->

</body>

</html>
