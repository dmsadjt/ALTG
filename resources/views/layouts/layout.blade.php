<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title')</title>


    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/scripts.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="icon" href="/altg-logo.ico">

    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

</head>

<body>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
    </script>

    <nav class="navbar sticky-top navbar-expand-lg bg-nav">
        <div class="container-fluid">
            <a class="navbar-brand d-flex" href="/">
                <img src="{{ url('/img/web-assets/altg-logo.png') }}" class="brand-image align-text-middle"
                    alt="">
                <span class="swiss-font-24 my-auto text-white">ALTG</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#submenus"
                aria-controls="submenus" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse content" id="submenus">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/ships">TIER LIST</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/siren">OS BOSS STATS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/blogs">POST</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/search">SEARCH</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><img class="navbar-image"
                                src="{{ url('/img/web-assets/discord-logo.png') }}" alt=""></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('contents')
    </main>
</body>

</html>
