<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>


    <link rel="stylesheet" href="/css/app.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="/js/scripts.js" type="text/javascript"></script>
</head>

<body>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
    </script>

    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand d-flex" href="/">
                <img src="{{ url('/img/web-assets/altg-logo.png') }}" class="brand-image align-text-middle"
                    alt="">
                <span class="swiss-font-24 my-auto">ALTG</span>
            </a>

            <div class="collapse navbar-collapse content" id="navbarSupportedContent">
                <form action="/logout" method="POST">
                    @csrf
                    <input type="submit" value="Log-out">
                </form>
            </div>
        </div>
    </nav>





    <main>
        <section class="_100vh">
            <div class="columns-two__1-5 _100vh">
                <div class="bg-nav d-grid">
                    <ul class="nav-style-none ul-h-3">
                        <li>
                            <a class="link-none" href="/admin/ships"><button
                                    class="btn-none text-white w-100 text-start">Ships</button></a>
                        </li>
                        <li>
                            <a class="link-none" href="/admin/sirens"><button
                                    class="btn-none text-white w-100 text-start">Sirens</button></a>
                        </li>
                        <li>
                            <a class="link-none" href="/admin/blogs"><button
                                    class="btn-none text-white w-100 text-start">Posts</button></a>
                        </li>
                        <li>
                            <a class="link-none" href="/admin/tags"><button
                                    class="btn-none text-white w-100 text-start">Post tags</button></a>
                        </li>
                        <li>
                            <a class="link-none" href="/admin/factions"><button
                                    class="btn-none text-white w-100 text-start">Factions</button></a>
                        </li>
                        <li>
                            <a class="link-none" href="/admin/archetypes"><button
                                    class="btn-none text-white w-100 text-start">Archetypes</button></a>
                        </li>
                        <li>
                            <a class="link-none" href="/admin/roles"><button
                                    class="btn-none text-white w-100 text-start">Roles</button></a>
                        </li>
                        <li>
                            <a class="link-none" href="/admin/positions"><button
                                    class="btn-none text-white w-100 text-start">Positions</button></a>
                        </li>
                        <li>
                            <a class="link-none" href="/admin/gears"><button
                                    class="btn-none text-white w-100 text-start">Gears</button></a>
                        </li>
                        <li>
                            <a class="link-none" href="/admin/hulls"><button
                                    class="btn-none text-white w-100 text-start">Hulls</button></a>
                        </li>
                    </ul>

                </div>
                <div class="text-white">
                    @yield('contents')
                </div>
            </div>

        </section>
    </main>




</body>

</html>
