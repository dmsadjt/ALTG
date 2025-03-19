<div class="mx-auto">
    <div class="m-3 d-grid gap-2">
        <div>
            <h1>Ships</h1>
            <div class="altona-sans-12">Manage the ships</div>
        </div>
        <div>
            <a href="ships/add"><button class="btn btn-primary">Add ships</button></a>
        </div>
        <div>
            <input class="form-control altona-sans-12" style="width: 100%" type="text" id="searchTerm"
                wire:model="searchTerm" placeholder="Search by name..">
        </div>
    </div>
    <div class="m-3 overflow-x" style="width: 90vw;">
        {{ $ships->links() }}
        <div class="card">
            <div class="card body">
                <table class="table w-100 table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Ship ID</th>
                            <th scope="col">Ship Name</th>
                            <th scope="col">Hull type</th>
                            <th scope="col">Faction</th>
                            <th scope="col">Rarity</th>
                            <th scope="col">Positions</th>
                            <th scope="col">Roles</th>
                            <th scope="col">Archetypes</th>
                            <th scope="col">Gears (General)</th>
                            <th scope="col">Gears (Light)</th>
                            <th scope="col">Gears (Medium)</th>
                            <th scope="col">Gears (Heavy)</th>
                            <th scope="col">Skills</th>
                            <th scope="col">Sprite</th>
                            <th scope="col">Chibi Sprite</th>
                            <th scope="col">Notes</th>
                            <th scope="col">Scores</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ships as $s)
                            <tr>
                                <td class="altona-sans-10">
                                    <div>{{ $s->id }}</div>
                                    <div>
                                        <a class="link-none altona-sans-10"
                                            href="/admin/ships/edit/{{ $s->id }}"><button
                                                class="btn btn-outline-primary btn-sm"><i
                                                    class="bi bi-pencil-fill"></i></button></a>
                                    </div>
                                    <div>
                                        <a class="link-none altona-sans-10"
                                            href="/admin/ships/delete/{{ $s->id }}"><button
                                                class="btn btn-outline-danger btn-sm"><i
                                                    class="bi bi-trash3-fill"></i></button></a>
                                    </div>
                                </td>
                                <td class="altona-sans-10">{{ $s->name }}</td>
                                <td class="altona-sans-10">{{ $s->hull->hull_name }}</td>
                                <td class="altona-sans-10">{{ $s->faction->faction_name }}</td>
                                <td class="altona-sans-10">{{ $s->rarity->rarity_name }}</td>
                                <td class="altona-sans-10">
                                    <ul class="nav-style-none m-0 p-0">

                                        <li>{{ $s->positions->position_name }}</li>

                                    </ul>

                                </td>
                                <td class="altona-sans-10" style="width: 8em;">
                                    <ul class="nav-style-none  m-0 p-0">
                                        @foreach ($s->roles as $r)
                                            <li>{{ $r->role_name }}</li>
                                        @endforeach
                                    </ul>

                                </td>
                                <td class="altona-sans-10">
                                    <ul class="nav-style-none  m-0 p-0">
                                        @foreach ($s->archetypes as $a)
                                            <li>{{ $a->archetype_name }}</li>
                                        @endforeach
                                    </ul>

                                </td>

                                <td class="altona-sans-10" style="width: 20em;">
                                    <div>Template Name : {{ $s->general ? $s->general->name : '' }}</div>
                                    <div>Build : {{ $s->general ? $s->general->build : '' }}</div>

                                    <ul class="nav-style-none  m-0 p-0">
                                        @if ($s->general)
                                            @foreach ($s->general->gears as $g)
                                                <li>{{ $g->category->gear_category_name }} : {{ $g->gear_name }}</li>
                                            @endforeach
                                        @endif

                                    </ul>

                                </td>

                                <td class="altona-sans-10" style="width: 20em;">
                                    <div>Template Name : {{ $s->light ? $s->light->name : '' }}</div>
                                    <div>Build : {{ $s->light ? $s->light->build : '' }}</div>

                                    <ul class="nav-style-none  m-0 p-0">
                                        @if ($s->light)
                                            @foreach ($s->light->gears as $g)
                                                <li>{{ $g->category->gear_category_name }} : {{ $g->gear_name }}</li>
                                            @endforeach
                                        @endif

                                    </ul>

                                </td>

                                <td class="altona-sans-10" style="width: 20em;">
                                    <div>Template Name : {{ $s->medium ? $s->medium->name : '' }}</div>
                                    <div>Build : {{ $s->medium ? $s->medium->build : '' }}</div>

                                    <ul class="nav-style-none  m-0 p-0">
                                        @if ($s->medium)
                                            @foreach ($s->medium->gears as $g)
                                                <li>{{ $g->category->gear_category_name }} : {{ $g->gear_name }}</li>
                                            @endforeach
                                        @endif

                                    </ul>

                                </td>

                                <td class="altona-sans-10" style="width: 20em;">
                                    <div>Template Name : {{ $s->heavy ? $s->heavy->name : '' }}</div>
                                    <div>Build : {{ $s->heavy ? $s->heavy->build : '' }}</div>

                                    <ul class="nav-style-none  m-0 p-0">
                                        @if ($s->heavy)
                                            @foreach ($s->heavy->gears as $g)
                                                <li>{{ $g->category->gear_category_name }} : {{ $g->gear_name }}</li>
                                            @endforeach
                                        @endif

                                    </ul>

                                </td>

                                <td class="altona-sans-10" style="width: 10em;">
                                    <ul class="nav-style-none  m-0 p-0">
                                        @foreach ($s->skill as $g)
                                            <li>{{ $g->skill_name }}</li>
                                        @endforeach
                                    </ul>
                                </td>

                                <td><a class="altona-sans-10" href="{{ asset('storage/' . $s->sprite) }}">Sprite</a>
                                </td>
                                <td><a class="altona-sans-10"
                                        href="{{ asset('storage/' . $s->chibi_sprite) }}">Chibi</a>
                                </td>
                                <td class="altona-sans-10">{{ $s->notes }}</td>
                                <td class="altona-sans-10" style="width: 5em;">
                                    <ul class="nav-style-none m-0 p-0">
                                        <li>Mob</li>
                                        <li>9-11 : {{ $s->mobScore->mob_9_11 }}</li>
                                        <li>12-13 :{{ $s->mobScore->mob_12_13 }}</li>
                                        <li>14 : {{ $s->mobScore->mob_14 }}</li>
                                        <li>15 : {{ $s->mobScore->mob_15 }}</li>
                                        <li>Boss</li>
                                        <li>9-11 : {{ $s->bossScore->boss_9_11 }}</li>
                                        <li>12-13 :{{ $s->bossScore->boss_12_13 }}</li>
                                        <li>14 : {{ $s->bossScore->boss_14 }}</li>
                                        <li>15 : {{ $s->bossScore->boss_15 }}</li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>
