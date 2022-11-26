<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title')</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/css/app.css">

    <script src="/js/scripts.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="icon" href="/altg-logo.ico">

    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    @livewireStyles


</head>

<body>

    <nav class="navbar sticky-top navbar-expand-lg bg-nav">
        <div class="container-fluid">
            <a class="navbar-brand d-flex" href="/">
                <img src="{{ url('/img/web-assets/altg-logo.png') }}" class="brand-image align-text-middle"
                    alt="">
                <span class="swiss-font-24 my-auto text-white">ALTG</span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#submenus"
                aria-controls="submenus" aria-expanded="false">
                <i class="fa-solid fa-bars fa-inverse"></i>
            </button>
            <div class="collapse navbar-collapse content" id="submenus">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/ships"><span class="swiss-font-18">TIER LIST</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/siren"><span class="swiss-font-18">OS BOSS
                                STATS</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/blogs"><span class="swiss-font-18">POST</span></a>
                    </li>
                    <li class="nav-item">
                        <div>
                            <a class="nav-link text-white" id="search" href="#"><span
                                    class="swiss-font-18">SEARCH</span></a>

                            <div class="container-fluid d-none" id="searchBar">
                                <form class="d-flex" role="search" action="/search/results">
                                    <input class="form-control me-2 altona-sans-10" type="search" name="ship"
                                        placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-light" type="submit"><span
                                            class="altona-sans-10">Search</span></button>
                                </form>
                            </div>


                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><img class="navbar-image"
                                src="{{ url('/img/web-assets/discord-logo.png') }}" alt=""></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="altona-sans-12">
        @livewireScripts

        @yield('contents')

    </main>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
    </script>

</body>

<footer>
    <script>
        $(document).ready(function() {
            $("#search").click(function() {
                $("#search").addClass("d-none");
                $("#searchBar").removeClass("d-none");
            })
        })
    </script>
</footer>

</html>
