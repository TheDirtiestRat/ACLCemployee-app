<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee App</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ url('bootstrap-icons/font/bootstrap-icons.css') }}">

    <style>
        .img-filter {
            filter: grayscale(100%)
        }

        .bg-img-gr {
            background-image: linear-gradient(to bottom, #ffffff, #ffffffd2),
                url('../storage/images/aclc_building.png');
            background-position: center;
            background-size: cover;
        }
    </style>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        @include('components.sidebar')

        <!-- Page content wrapper-->
        <div class="ps-3 pe-3 pb-3 content-fixed" id="page-content-wrapper">
            <!-- Top navigation-->
            @include('components.topbar')

            <!-- Page content-->
            <div class=" bg-light container-fluid rounded-4 p-3 shadow">
                {{-- contents to be put --}}
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>
