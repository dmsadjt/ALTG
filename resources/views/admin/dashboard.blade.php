@extends('layouts.admin')
@section('title', 'Dashboard')
@section('contents')
    <div class="container">
        <div class="m-3 p-3 bg-white text-black rounded">
            <h1>Dashboard</h1>
            <h2>Welcome back, (nama user)</h2>
            <span class="altona-sans-10 text-black-50">{{ $dateTime->toDateString() }}</span>
            <hr>
            <div class="columns-two">

                <div>
                    <h3 class="swiss-font-24 mb-0">Total ships</h3>
                <small class="altona-sans-12 text-black-50">Total of ships as of {{$dateTime->toDateString()}}</small>
                </div>

                <div class="ms-auto">
                    <div class=" swiss-font-24 ">{{$totalShips}}</div>
                    <small class="altona-sans-12 text-black-50">Ships</small>
                </div>


            </div>
            <hr>

            <h2 class="mb-0">Database Statistics </h2>
            <small class="mt-0 text-black-50 altona-sans-12">Some numbers</small>
            <div class="columns-eight">
                <div>
                    <h3 class="swiss-font-12">Posts</h3>
                    <div class="altona-sans-12 ms-1">
                        {{$totalPosts}}
                    </div>
                </div>
                <div>
                    <h3 class="swiss-font-12">Factions</h3>
                    <div class="altona-sans-12">
                        {{$totalFactions}}
                    </div>
                </div>
                <div>
                    <h3 class="swiss-font-12">Archetypes</h3>
                    <div class="altona-sans- ms-1">
                        {{$totalArchetypes}}
                    </div>
                </div>
                <div>
                    <h3 class="swiss-font-12">Roles</h3>
                    <div class="altona-sans-12 ms-1">
                        {{$totalRoles}}
                    </div>
                </div>
                <div>
                    <h3 class="swiss-font-12">Positions</h3>
                    <div class="altona-sans-12 ms-1">
                        {{$totalPositions}}
                    </div>
                </div>
                <div>
                    <h3 class="swiss-font-12">Gears</h3>
                    <div class="altona-sans-12 ms-1">
                        {{$totalGears}}
                    </div>
                </div>
                <div>
                    <h3 class="swiss-font-12">Hulls</h3>
                    <div class="altona-sans-12 ms-1">
                        {{$totalHulls}}
                    </div>
                </div>
                <div>
                    <h3 class="swiss-font-12">Gear Templates</h3>
                    <div class="altona-sans-12 ms-1">
                        {{$totalTemplates}}
                    </div>
                </div>
            </div>

        </div>

    </div>




    {{-- <div class="m-3 columns-two gap-2">
        <div class="d-grid text-black">
            <div class="card w-75 shadow mb-3">
                <div class="card-body columns-two">
                    <div class="my-auto">
                        <div class="card-subtitle text-muted">Logged in as</div>
                        <div class="card-title swiss-font-18 ">
                            {{$user->name}}
                        </div>
                    </div>
                    <div>
                        <div class="text-center swiss-font-36">
                            {{ $user->id }}
                        </div>
                        <div class="text-center text-muted altona-sans-12">
                            User id
                        </div>
                    </div>
                </div>
            </div>


            <div class="card w-75 shadow mb-3">
                <div class="card-body columns-two">
                    <div class="my-auto">
                        <div class="card-title swiss-font-18 ">
                            Ships
                        </div>
                        <div class="card-subtitle text-muted">Total ships</div>
                    </div>
                    <div>
                        <div class="text-center swiss-font-36">
                            {{ $totalShips }}
                        </div>
                        <div class="text-center text-muted altona-sans-12">
                            Ships
                        </div>
                    </div>
                </div>
            </div>

            <div class="card w-75 shadow mb-3">
                <div class="card-body columns-two">
                    <div class="my-auto">
                        <div class="card-title swiss-font-18 ">
                            Siren Boss
                        </div>
                        <div class="card-subtitle text-muted">Total bosses</div>
                    </div>
                    <div>
                        <div class="text-center swiss-font-36">
                            {{ $totalSirens }}
                        </div>
                        <div class="text-center text-muted altona-sans-12">
                            Bosses
                        </div>
                    </div>
                </div>
            </div>

            <div class="card w-75 shadow mb-3">
                <div class="card-body columns-two">
                    <div class="my-auto">
                        <div class="card-title swiss-font-18 ">
                            Posts
                        </div>
                        <div class="card-subtitle text-muted">Total posts</div>
                    </div>
                    <div>
                        <div class="text-center swiss-font-36">
                            {{ $totalPosts }}
                        </div>
                        <div class="text-center text-muted altona-sans-12">
                            Posts
                        </div>
                    </div>
                </div>
            </div>

            <div class="card w-75 shadow mb-3">
                <div class="card-body columns-two">
                    <div class="my-auto">
                        <div class="card-title swiss-font-18 ">
                            Factions
                        </div>
                        <div class="card-subtitle text-muted">Total factions</div>
                    </div>
                    <div>
                        <div class="text-center swiss-font-36">
                            {{ $totalFactions }}
                        </div>
                        <div class="text-center text-muted altona-sans-12">
                            Factions
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div class="d-grid text-black">
            <div class="card w-75 shadow mb-3">
                <div class="card-body columns-two">
                    <div class="my-auto">
                        <div class="card-title swiss-font-18 ">
                            Archetypes
                        </div>
                        <div class="card-subtitle text-muted">Total archetypes</div>
                    </div>
                    <div>
                        <div class="text-center swiss-font-36">
                            {{ $totalArchetypes }}
                        </div>
                        <div class="text-center text-muted altona-sans-12">
                            Archetypes
                        </div>
                    </div>
                </div>
            </div>
            <div class="card w-75 shadow mb-3">
                <div class="card-body columns-two">
                    <div class="my-auto">
                        <div class="card-title swiss-font-18 ">
                            Roles
                        </div>
                        <div class="card-subtitle text-muted">Total roles</div>
                    </div>
                    <div>
                        <div class="text-center swiss-font-36">
                            {{ $totalRoles }}
                        </div>
                        <div class="text-center text-muted altona-sans-12">
                            Roles
                        </div>
                    </div>
                </div>
            </div>
            <div class="card w-75 shadow mb-3">
                <div class="card-body columns-two">
                    <div class="my-auto">
                        <div class="card-title swiss-font-18 ">
                            Positions
                        </div>
                        <div class="card-subtitle text-muted">Total positions</div>
                    </div>
                    <div>
                        <div class="text-center swiss-font-36">
                            {{ $totalPositions }}
                        </div>
                        <div class="text-center text-muted altona-sans-12">
                            Positions
                        </div>
                    </div>
                </div>
            </div>
            <div class="card w-75 shadow mb-3">
                <div class="card-body columns-two">
                    <div class="my-auto">
                        <div class="card-title swiss-font-18 ">
                            Gears
                        </div>
                        <div class="card-subtitle text-muted">Total gears</div>
                    </div>
                    <div>
                        <div class="text-center swiss-font-36">
                            {{ $totalGears }}
                        </div>
                        <div class="text-center text-muted altona-sans-12">
                            Gears
                        </div>
                    </div>
                </div>

            </div>

            <div class="card w-75 shadow mb-3">
                <div class="card-body columns-two">
                    <div class="my-auto">
                        <div class="card-title swiss-font-18 ">
                            Hulls
                        </div>
                        <div class="card-subtitle text-muted">Total hulls</div>
                    </div>
                    <div>
                        <div class="text-center swiss-font-36">
                            {{ $totalHulls }}
                        </div>
                        <div class="text-center text-muted altona-sans-12">
                            Hulls
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div> --}}

@endsection
