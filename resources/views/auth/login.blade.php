<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log-in</title>


    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/scripts.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>

    <main>
        <section class="d-grid _100vh-full">
            <div class="columns-two__4-2">
                <div class="bg-enterprise"></div>
                <div class=" d-grid">
                    <div class="m-auto">
                        <h1 class="text-white text-center">ALTG Website</h1>
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="card-title swiss-font-12">
                                    Administrator Login
                                </div>
                                <form class="d-grid" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label altona-sans-12" for="email">Email</label>
                                        <input class="form-control" type="text" name="email" id="email">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label altona-sans-12" for="password">Password</label>
                                        <input class="form-control" type="password" name="password" id="password">
                                    </div>
                                    <div class="mt-2 mx-auto">
                                        <input class="btn btn-outline-primary" type="submit" value="Log-in">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </section>
    </main>

</body>

</html>
