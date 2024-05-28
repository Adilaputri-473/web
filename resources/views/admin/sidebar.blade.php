<div class="d-flex align-items-stretch">

    <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
            <div class="avatar"><img src="{{ asset('admincss/img/avatar-6.jpg') }}" alt="..."
                    class="img-fluid rounded-circle">
            </div>
            <div class="title">
                <h1 class="h5">Aisyah</h1>
                <p>Student</p>
            </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
            <li class="active"><a href="{{ url('index_result') }}"> <i class="icon-home"></i>Home </a></li>



            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i
                        class="icon-windows"></i>Materi </a>
                <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="{{ url('add_lesson') }}">Add Materi</a></li>
                    <li><a href="{{ url('view_lesson') }}">View Materi</a></li>

                </ul>
            </li>

            <li>
                <a href="#questionsDropdown" aria-expanded="false" data-toggle="collapse">
                    <i class="icon-windows"></i>Questions
                </a>
                <ul id="questionsDropdown" class="collapse list-unstyled">
                    <li><a href="{{ url('add_question') }}">Add Questions</a></li>
                    <li><a href="{{ url('view_question') }}">View Questions</a></li>
                </ul>
            </li>

            <li>
                <a href="#optionsDropdown" aria-expanded="false" data-toggle="collapse">
                    <i class="icon-windows"></i>Options
                </a>
                <ul id="optionsDropdown" class="collapse list-unstyled">
                    <li><a href="{{ url('add_option') }}">Add Options</a></li>
                    <li><a href="{{ url('view_option') }}">View Options</a></li>
                </ul>
            </li>

            <li>
                <a href="#resultsDropdown" aria-expanded="false" data-toggle="collapse">
                    <i class="icon-windows"></i>Results
                </a>
                <ul id="resultsDropdown" class="collapse list-unstyled">
                    <li><a href="{{ url('create_result') }}">Add Results</a></li>
                    <li><a href="{{ url('view_result') }}">View Results</a></li>
                </ul>
            </li>

    </nav>
