@extends('layouts.admin')
@section('title', 'Dashboard')
@section('contents')
    <div class="container">
        <div class="m-3 p-3 bg-white text-black rounded">
            <h1>Dashboard</h1>
            <h2>Welcome back, {{$user->name}}</h2>
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


@endsection
