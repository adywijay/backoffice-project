<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <script src="{{ asset('assets/js/jquery-1.11.2.min.js') }}"></script>
    @include('super-admin/layout/load_css')
    <title>{{ $judul }}</title>

</head>

<body>

    <div id="mytask-layout" class="theme-indigo">

        <!-- ====================================== Start Side Nav ================================================== -->
        <section>
            @include('super-admin/content/side_nav/list_side_nav')
            @yield('sidenav-content')
        </section>

        <!-- ====================================== End Side Nav ================================================== -->


        <div class="main px-lg-4 px-md-4">

            <!-- ====================================== Start Top Nav ================================================== -->
            <section>
                <div class="header">
                    @include('super-admin/content/top_nav/list_top_nav')
                    @yield('topnav-content')
                </div>
            </section>
            <!-- ====================================== End Top Nav ================================================== -->


            <!-- ====================================== Start list Content Body ================================================== -->
            <section>
                @yield('body-content')
            </section>


        </div>
        <!-- ====================================== End list Content Body ================================================== -->
    </div>


    @include('super-admin/layout/load_js')
</body>

</html>
