<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/css/app.css">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/js/scripts.js" type="text/javascript"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/super-build/ckeditor.js"></script>
    <link href="https://fonts.cdnfonts.com/css/altona-sans" rel="stylesheet">

    @livewireStyles

</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
    </script>

    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>

    <nav class="navbar navbar-expand-lg navbar-light sticky-top bg-nav">
        <div class="container-fluid">
            <a class="navbar-brand d-flex text-white" href="/admin/dashboard">
                <img src="{{ url('/img/web-assets/altg-logo.png') }}" class="brand-image align-text-middle"
                    alt="">
                <span class="swiss-font-24 my-auto">ALTG</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars fa-inverse"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav text-white gap-2">
                    <li class="nav-item">
                        <a class="link-none altona-sans-12 {{ request()->is('admin/ships') ? 'selected' : '' }}"
                            href="/admin/ships">Ships</a>
                    </li>
                    <li class="nav-item">
                        <a class="link-none altona-sans-12 {{ request()->is('admin/sirens') ? 'selected' : '' }}"
                            href="/admin/sirens">Sirens</a>
                    </li>
                    <li class="nav-item">
                        <a class="link-none altona-sans-12 {{ request()->is('admin/blogs') ? 'selected' : '' }}"
                            href="/admin/blogs">Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="link-none altona-sans-12 {{ request()->is('admin/tags') ? 'selected' : '' }}"
                            href="/admin/tags">Post tags</a>
                    </li>
                    <li class="nav-item">
                        <a class="link-none altona-sans-12 {{ request()->is('admin/factions') ? 'selected' : '' }}"
                            href="/admin/factions">Factions</a>
                    </li>
                    <li class="nav-item">
                        <a class="link-none altona-sans-12 {{ request()->is('admin/archetypes') ? 'selected' : '' }}"
                            href="/admin/archetypes">Archetypes</a>
                    </li>
                    <li class="nav-item">
                        <a class="link-none altona-sans-12 {{ request()->is('admin/roles') ? 'selected' : '' }}"
                            href="/admin/roles">Roles</a>
                    </li>
                    <li class="nav-item">
                        <a class="link-none altona-sans-12 {{ request()->is('admin/positions') ? 'selected' : '' }}"
                            href="/admin/positions">Positions</a>
                    </li>
                    <li class="nav-item">
                        <a class="link-none altona-sans-12 {{ request()->is('admin/gears') ? 'selected' : '' }}"
                            href="/admin/gears">Gears</a>
                    </li>
                    <li class="nav-item">
                        <a class="link-none altona-sans-12 {{ request()->is('admin/hulls') ? 'selected' : '' }}"
                            href="/admin/hulls">Hulls</a>
                    </li>
                    <li class="nav-item">
                        <a class="link-none altona-sans-12 {{ request()->is('admin/templates') ? 'selected' : '' }}"
                            href="/admin/templates">Gear Templates</a>
                    </li>
                </ul>
            </div>


            <div class="collapse navbar-collapse content" id="navbarSupportedContent">
                <form action="/logout" method="POST">
                    @csrf
                    <input type="submit" class="btn btn-outline-light" value="Log-out">
                </form>
            </div>
        </div>
    </nav>

    <main>
        <section class="_100vh">
            <div class="text-white">
                @yield('contents')
            </div>
        </section>
    </main>
    @livewireScripts

</body>

</html>
