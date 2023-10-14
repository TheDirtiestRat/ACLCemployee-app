<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>

    @vite(['resources/js/app.js'])
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        /*
 * Globals
 */
        /* Custom default button */
        .btn-secondary,
        .btn-secondary:hover,
        .btn-secondary:focus {
            color: #333;
            text-shadow: none;
            /* Prevent inheritance from `body` */
        }


        /*
 * Base structure
 */

        body {
            /* text-shadow: 0 .05rem .1rem rgba(0, 0, 0, .5); */
            /* box-shadow: inset 0 0 5rem rgba(0, 0, 0, .5); */
            /* /* background-image: url('../storage/images/aclc.png'); */
            background-image: linear-gradient(to bottom, #ffffff, #ffffffd2),
                url('../storage/images/aclc_building.png');
            */
        }

        .cover-container {
            max-width: 42em;
        }


        /*
        * Header
        */

        .nav-masthead .nav-link {
            color: rgba(255, 255, 255, .5);
            border-bottom: .25rem solid transparent;
        }

        .nav-masthead .nav-link:hover,
        .nav-masthead .nav-link:focus {
            /* border-bottom-color: rgba(255, 255, 255, .25); */
        }

        .nav-masthead .nav-link+.nav-link {
            margin-left: 1rem;
        }

        .nav-masthead .active {
            color: #fff;
            border-bottom-color: #fff;
        }

        .cover_whole_page {
            height: 100vh;
        }

        .img-filter {
            filter: grayscale(100%)
        }
    </style>
</head>

<body class="d-flex cover_whole_page text-center">

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        {{-- header --}}
        <header class="mb-auto">
            <div>
                <h3 class="float-md-start mb-0">
                    <img src="{{ asset('/storage/images/aclc.png') }}" class="img-filter" alt="" width="50">
                    Employee Manager App
                </h3>
                <nav class="nav nav-masthead justify-content-center float-md-end">
                    <a class="nav-link py-1 px-0 text-dark" href="{{ url('employeeLogin') }}">Employee Login</a>
                    <a class="nav-link py-1 px-0 text-dark" href="{{ url('login') }}">Log in</a>
                </nav>
            </div>
        </header>

        {{-- body content --}}
        <main class="px-3">
            <h1>@include('components.systemTitle')</h1>
            <p class="lead">
                This system is develop to be used to test the load testing
                methods to practice the ability of us working in the work
                environment.
            </p>
            <p class="lead">
                <a href="{{ url('employeeLogin') }}" class="btn btn-lg btn-dark fw-bold border-white">
                    Log as Employee
                </a>
            </p>
        </main>

        {{-- footer --}}
        <footer class="mt-auto text-dark-50">
            <p>
                <a href="https://web.facebook.com/aclccollegeoformoc/?_rdc=1&_rdr" class="text-dark">ACLC Ormoc</a>, by
                <a href="https://www.tiktok.com/@thedirtiestrat" class="text-dark" target="_blank">Mr. Dirty Rat</a>.
            </p>
        </footer>
    </div>

</body>

</html>
