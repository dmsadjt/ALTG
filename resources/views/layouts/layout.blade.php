<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>


    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/scripts.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
    </script>

    <nav class="navbar sticky-top navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand d-flex" href="/">
                <img src="{{ url('/img/web-assets/altg-logo.png') }}" class="brand-image align-text-middle"
                    alt="">
                <span class="swiss-font-24 my-auto">ALTG</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse content" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/ships">TIER LIST</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/siren">OS BOSS STATS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/blogs">POST</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">SEARCH</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><img class="navbar-image"
                                src="/resource/image/discord_logo1600.png" alt=""></a>
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
