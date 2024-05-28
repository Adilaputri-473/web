<section class="shop_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Materi Kita
            </h2>
        </div>
        <div class="row">

            @foreach ($lesson as $lessons)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="box">

                        <div class="img-box">
                            <img src="lessons/{{ $lessons->image }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h6>
                                {{ $lessons->topic }}
                            </h6>

                        </div>
                        <div style="padding:15px">
                            <a class= "btn btn-danger" href="{{ url('lesson_details', $lessons->id) }}">Start Study</a>
                        </div>


                    </div>
                </div>
            @endforeach
        </div>

        @if (Route::has('login'))
            @auth
                <div class="btn-box">
                    <a href="{{ url('/materi') }}">
                        View All Materi
                    </a>
                </div>
                <div class="btn-box">
                    <a href="{{ url('test') }}">
                        <span>
                            Test
                        </span>
                    </a>
                </div>
            @else
                <div class="btn-box">
                    <a href="{{ url('/materi') }}">
                        View All Materi
                    </a>
                </div>
            @endauth
        @endif

    </div>
</section>
