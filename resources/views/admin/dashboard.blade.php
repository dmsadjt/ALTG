@extends('layouts.admin')
@section('title', 'Dashboard')
@section('contents')
    <div class="m-3">
        <h1>Dashboard</h1>
        <p class="altona-sans-10">{{ $dateTime->toDateString() }}</p>
    </div>
    <div class="m-3 columns-two gap-2">
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
    </div>

@endsection
