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

    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand d-flex" href="/">
                <img src="{{ url('/img/web-assets/altg-logo.png') }}" class="brand-image align-text-middle"
                    alt="">
                <span class="swiss-font-24 my-auto">ALTG</span>
            </a>
        </div>
    </nav>





    <main>
        <section class="_100vh">
            <div class="columns-two__1-5 _100vh">
                <div class="bg-nav d-grid">
                    <ul class="nav-style-none ul-h-3">
                        <li>
                            <button class="btn-none text-white w-100 text-start"><a class="link-none" href="/admin/ships">Ships</a></button>
                        </li>
                        <li>
                            <button class="btn-none text-white w-100 text-start"><a class="link-none" href="/admin/sirens">Sirens</a></button>
                        </li>
                        <li>
                            <button class="btn-none text-white w-100 text-start"><a class="link-none" href="/admin/blogs">Posts</a></button>
                        </li>
                        <li>
                            <button class="btn-none text-white w-100 text-start"><a class="link-none" href="/admin/factions">Factions</a></button>
                        </li>
                        <li>
                            <button class="btn-none text-white w-100 text-start"><a class="link-none" href="/admin/archetypes">Archetypes</a></button>
                        </li>
                        <li>
                            <button class="btn-none text-white w-100 text-start"><a class="link-none" href="/admin/roles">Roles</a></button>
                        </li>
                        <li>
                            <button class="btn-none text-white w-100 text-start"><a class="link-none" href="/admin/positions">Positions</a></button>
                        </li>
                        <li>
                            <button class="btn-none text-white w-100 text-start"><a class="link-none" href="/admin/gears">Gears</a></button>
                        </li>
                        <li>
                            <button class="btn-none text-white w-100 text-start"><a class="link-none" href="/admin/hulls">Hulls</a></button>
                        </li>
                    </ul>

                </div>
            </div>
            <div>
                @yield('contents')
            </div>
        </section>
    </main>




</body>

</html>
