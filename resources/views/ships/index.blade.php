@extends('layouts.layout')
@section('title', 'Tier List')
@section('contents')
    <section class="hero">
        <div class="container">

            <div class="bg-overlay rounded my-3">

                <div class="columns-two__5-1 text-white d-grid">
                    {{-- form --}}
                    <div>
                        <form action="/ships/filter" method="GET" autocomplete="off">
                            @csrf
                            <div class="columns-two__1-5 d-grid">
                                <h2 class="swiss-font-24">Filter Ships</h2>
                                <div></div>
                                {{-- Hull --}}
                                <div class="d-grid mb-2">

                                    <label for="hull">
                                        <h3 class=" swiss-font-12">Hull Type</h3>
                                    </label>
                                    <div class="wrapper bg-gray1 p-1 rounded">
                                        <img src="" alt="" id="changeImage">
                                        <select name="hull" id="hull"
                                            class="hull-type d-grid text-center altona-sans-12 mt-1 bg-gray1 text-white border-white rounded">
                                            @foreach ($hulls as $key => $h)
                                                @if ($key == 0)
                                                    @continue;
                                                @endif
                                                <option class="mx-auto mt-auto mb-2 altona-sans-12"
                                                    data-img="/img/hulls/{{ $h->hull_img }}" value="{{ $h->id }}"
                                                    {{ $selected['hull'] == $h->id ? 'selected' : '' }}>
                                                    {{ $h->hull_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <script>
                                            $(document).ready(function() {
                                                var src = $(this).find('option:selected').attr('data-img');
                                                $('img#changeImage').attr('src', src);

                                                $('#hull').change(function() {
                                                    var src = $(this).find('option:selected').attr('data-img');
                                                    $('img#changeImage').attr('src', src);
                                                    // $("#hull").attr('size', 0);
                                                });

                                                // $("#changeImage").click(function() {
                                                //     $("#hull").attr('size', 7);
                                                // })
                                            });
                                        </script>
                                    </div>



                                </div>

                                <div class="d-grid gap-3">

                                    <div class="autocomplete position-relative">
                                        <label for="role">
                                            <h3 class="swiss-font-12">Role Tags</h3>
                                        </label>
                                        <input type="text" name="role" id="role" class="text-form" value="{{ $selected['role'] }}">
                                    </div>

                                    <script>
                                        $(function() {
                                            var availableRole = @json($roles);


                                            $("#role")
                                                // don't navigate away from the field on tab when selecting an item
                                                .on("keydown", function(event) {
                                                    if (event.keyCode === $.ui.keyCode.TAB &&
                                                        $(this).autocomplete("instance").menu.active) {
                                                        event.preventDefault();
                                                    }
                                                })
                                                .autocomplete({
                                                    minLength: 0,
                                                    source: function(request, response) {
                                                        // delegate back to autocomplete, but extract the last term
                                                        response($.ui.autocomplete.filter(
                                                            availableRole, extractLast(request.term)));
                                                    },
                                                    focus: function() {
                                                        // prevent value inserted on focus
                                                        return false;
                                                    },
                                                    select: function(event, ui) {
                                                        var terms = split(this.value);
                                                        // remove the current input
                                                        terms.pop();
                                                        // add the selected item
                                                        terms.push(ui.item.value);
                                                        // add placeholder to get the comma-and-space at the end
                                                        terms.push("");
                                                        this.value = terms.join(", ");
                                                        return false;
                                                    }
                                                });
                                        });
                                    </script>





                                    <div class="columns-two__4-2 gap-2 d-grid">

                                        <div>

                                            <div class="columns-two__1-5 d-grid">

                                                <div class="swiss-font-12">
                                                    Rarity
                                                </div>
                                                <div>
                                                    <ul class="filter-list bg-gray1 rounded d-flex fit-content">
                                                        @foreach ($rarity as $key => $r)
                                                            <li>
                                                                <input class="filter-option" type="checkbox" name="rarity[]"
                                                                    id="{{ $r->rarity_name }}" value="{{ $r->rarity_slug }}"
                                                                    {{ in_array($r->rarity_slug, $selected['rarity']) ? ' checked' : '' }}>
                                                                <label class="filter-label altona-sans-10 rounded px-2 m-1"
                                                                    for="{{ $r->rarity_name }}">{{ $r->rarity_tag }}
                                                                </label>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>

                                                <div class="swiss-font-12">
                                                    Faction
                                                </div>
                                                <div>
                                                    <ul class="filter-list bg-gray1 rounded d-flex flex-wrap fit-content">
                                                        @foreach ($factions as $key => $r)
                                                            @if ($key == 0)
                                                                @continue
                                                            @endif
                                                            <li>
                                                                <input class="filter-option" type="checkbox"
                                                                    name="faction[]" id="{{ $r->faction_tag }}"
                                                                    value="{{ $r->faction_slug }}" {{ in_array($r->faction_slug, $selected['faction']) ? ' checked' : '' }}>
                                                                <label class="filter-label altona-sans-10 m-1 rounded px-2"
                                                                    for="{{ $r->faction_tag }}">{{ $r->faction_tag }}
                                                                </label>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>

                                            </div>


                                        </div>

                                        <div class="d-grid">

                                            <span class="swiss-font-12">Select Position</span>
                                            <select name="position" id="position"
                                                class="pill-dark altona-sans-12 text-center button-square">
                                                <option value="">None</option>

                                                <option value="tank"
                                                    {{ $selected['position'] == 'tank' ? 'selected' : '' }}>Tank</option>
                                                <option value="offtank"
                                                    {{ $selected['position'] == 'offtank' ? 'selected' : '' }}>Offtank
                                                </option>
                                                <option value="mid"
                                                    {{ $selected['position'] == 'mid' ? 'selected' : '' }}>Mid</option>
                                                <option value="flagship"
                                                    {{ $selected['position'] == 'flagship' ? 'selected' : '' }}>Flagship
                                                </option>
                                                <option
                                                    value="offflag {{ $selected['position'] == 'offflag' ? 'selected' : '' }}">
                                                    Off Flag</option>
                                                <option value="any"
                                                    {{ $selected['position'] == 'any' ? 'selected' : '' }}>Any</option>
                                            </select>

                                        </div>

                                    </div>

                                    <div></div>
                                </div>

                                <div class="d-flex mt-2">
                                    <input type="submit" class="pill-dark px-5 altona-sans-10" value="Filter">
                                </div>

                            </div>
                        </form>

                    </div>

                    <div class="scores my-auto p-2">
                        <hr>

                        <h2 class="swiss-font-28">View Score by</h2>
                        <h3 class="swiss-font-12">Mob/Boss</h3>
                        <div class="columns-two mb-2 mob-boss">
                            <div>
                                <button class="button-square btn btn-dark d-grid score-type ms-auto score-link"
                                    onclick="openTab(event, 'mob-score', 'score-content', 'score-link','grid')"
                                    id="openDefault">
                                    <img class="mx-auto mt-auto img-small" src="{{ url('/img/web-assets/mob.png') }}"
                                        alt="">
                                    <div class="mx-auto my-auto altona-sans-12">Mob</div>
                                </button>
                            </div>
                            <div>
                                <button class="button-square btn btn-dark d-grid score-type me-auto score-link"
                                    onclick="openTab(event, 'boss-score', 'score-content', 'score-link','grid')">
                                    <img class="mx-auto mt-auto img-small" src="{{ url('/img/web-assets/boss.png') }}"
                                        alt="">
                                    <div class="mx-auto my-auto altona-sans-12">Boss</div>
                                </button>
                            </div>
                        </div>

                        <h3 class="swiss-font-12">View by Chapters</h3>
                        <div class="d-flex text-white gap-2 justify-content-center mt-3">

                            <button class="nav-link btn btn-dark score-link altona-sans-12 p-1"
                                onclick="openTab(event, 'score-911', 'score-content', 'score-link','grid')">W
                                9-11</button>

                            <button class="nav-link btn btn-dark score-link altona-sans-12 p-1"
                                onclick="openTab(event, 'score-1213', 'score-content', 'score-link','grid')">W
                                12-13</button>

                            <button class="nav-link btn btn-dark score-link altona-sans-12 p-1"
                                onclick="openTab(event, 'score-14', 'score-content', 'score-link','grid')">W 14</button>

                        </div>
                        <hr>
                    </div>

                </div>

                <div class="tierlist text-white my-5">


                    {{-- Mob Score --}}
                    <div class="score-content" id="mob-score">
                        <div class="columns-eight">
                            <h2 class="grid-col-span-4">Battleship Mob Score</h2>
                            <span class="grid-col-span-4"></span>
                        </div>

                        <div class="ships">
                            <table class=" ship-table" style="width:100%;">
                                <thead class="bg-gray1 text-white altona-sans-12">
                                    <th>&nbsp;</th>
                                    <th>@sortablelink('name')</th>
                                    <th class=""><a href="#" class="altona-sans-12 link-none">Archetype</a></th>
                                    <th class=""><a href="#" class="altona-sans-12 link-none">Role</a></th>
                                    <th class=""><span>@sortablelink('positions.position_name', 'Position')</span></th>
                                    <th class="">@sortablelink('mobScore.mob_9_11', '9-11')</th>
                                    <th class="">@sortablelink('mobScore.mob_12_13', '12-13')</th>
                                    <th class="">@sortablelink('mobScore.mob_14', '14')</th>
                                </thead>
                                <tbody>
                                    @foreach ($ships as $s)
                                        <tr class="text-white shadow">
                                            <td class="rarity-tag" id={{ $s->rarity->rarity_tag }}>
                                                <span
                                                    class="rotate--90 justify-content-center">{{ $s->rarity->rarity_tag }}</span>
                                            </td>
                                            <td class="bg-gray1 swiss-font-18"><img class="chibi-img r-hide"
                                                    src="/img/ships/chibi/{{ $s->chibi_sprite }}" alt=""> <a
                                                    href="/ships/{{ $s->id }}" class=" ms-1 link-none font-inherit">
                                                    {{ $s->name }}
                                                </a></td>
                                            <td class="bg-gray1 altona-sans-10 border-left-white text-align-center ">
                                                @foreach ($s->archetypes as $a)
                                                    <div>{{ $a->archetype_name }}</div>
                                                @endforeach
                                            </td>
                                            <td class="bg-gray1 altona-sans-10 border-left-white text-align-center ">
                                                @foreach ($s->roles as $a)
                                                    <div>{{ $a->role_name }}</div>
                                                @endforeach
                                            </td>
                                            <td class="bg-gray1 altona-sans-10 border-left-white text-align-center ">
                                                <div>
                                                    {{ $s->positions->position_name }}
                                                </div>
                                                <div class="mx-auto">
                                                    <img class="position-row-img"
                                                        src="/img/positions/{{ $s->positions->position_image }}"
                                                        alt="position">
                                                </div>
                                            </td>
                                            <td class="bg-gray1 border-left-white ">
                                                <div class="score-box mx-auto sac"
                                                    id="{{ number_format($s->mobScore->mob_9_11, 1) }}">
                                                    <div class="score swiss-font-18">
                                                        {{ number_format($s->mobScore->mob_9_11, 1) }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="bg-gray1  ">
                                                <div class="score-box mx-auto sac"
                                                    id="{{ number_format($s->mobScore->mob_12_13, 1) }}">
                                                    <div class="score swiss-font-18">
                                                        {{ number_format($s->mobScore->mob_12_13, 1) }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="bg-gray1 ">
                                                <div class="score-box mx-auto sac"
                                                    id="{{ number_format($s->mobScore->mob_14, 1) }}">
                                                    <div class="score swiss-font-18">
                                                        {{ number_format($s->mobScore->mob_14, 1) }}
                                                    </div>
                                                </div>
                                            </td>
                                            <script>
                                                idTag = document.getElementsByClassName('rarity-tag')[0].id;
                                                changeLabel(idTag);
                                                for (i = 0; i < 3; i++) {
                                                    scoreId = document.getElementsByClassName('sac')[0].id;
                                                    changeScoreColor(scoreId);
                                                }
                                            </script>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                    {{-- Boss Score --}}
                    <div class="score-content overflow-x" id="boss-score">

                        <div class="columns-eight">
                            <h2 class="grid-col-span-4">Battleship Boss Score</h2>
                            <span class="grid-col-span-4"></span>
                        </div>
                        <div class="ships">
                            <table class=" ship-table" style="width:100%;">
                                <thead class="bg-gray1 text-white altona-sans-12">
                                    <th>&nbsp;</th>
                                    <th>@sortablelink('name')</th>
                                    <th class=""><a href="#" class="altona-sans-12 link-none">Archetype</a></th>
                                    <th class=""><a href="#" class="altona-sans-12 link-none">Role</a></th>
                                    <th class="">@sortablelink('positions.position_name', 'Position')</th>
                                    <th class="">@sortablelink('bossScore.boss_9_11', '9-11')</th>
                                    <th class="">@sortablelink('bossScore.boss_12_13', '12-13')</th>
                                    <th class="">@sortablelink('bossScore.boss_14', '14')</th>
                                </thead>
                                <tbody>
                                    @foreach ($ships as $s)
                                        <tr class="text-white shadow">
                                            <td class="rarity-tag" id={{ $s->rarity->rarity_tag }}>
                                                <span
                                                    class="rotate--90 justify-content-center">{{ $s->rarity->rarity_tag }}</span>
                                            </td>
                                            <td class="bg-gray1 swiss-font-18"><img class="chibi-img r-hide"
                                                    src="/img/ships/chibi/{{ $s->chibi_sprite }}" alt=""> <a
                                                    href="/ships/{{ $s->id }}" class=" ms-1 link-none font-inherit">
                                                    {{ $s->name }}
                                                </a></td>
                                            <td class="bg-gray1 altona-sans-10 border-left-white text-align-center ">
                                                @foreach ($s->archetypes as $a)
                                                    <div>{{ $a->archetype_name }}</div>
                                                @endforeach
                                            </td>
                                            <td class="bg-gray1 altona-sans-10 border-left-white text-align-center ">
                                                @foreach ($s->roles as $a)
                                                    <div>{{ $a->role_name }}</div>
                                                @endforeach
                                            </td>
                                            <td class="bg-gray1 altona-sans-10 border-left-white text-align-center ">
                                                <div>

                                                    {{ $s->positions->position_name }}

                                                </div>
                                                <div class="mx-auto">
                                                    <img class="position-row-img"
                                                        src="/img/positions/{{ $s->positions->position_image }}"
                                                        alt="position">
                                                </div>
                                            </td>
                                            <td class="bg-gray1 border-left-white ">
                                                <div class="score-box mx-auto sac"
                                                    id="{{ number_format($s->bossScore->boss_9_11, 1) }}">
                                                    <div class="score swiss-font-18">
                                                        {{ number_format($s->bossScore->boss_9_11, 1) }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="bg-gray1  ">
                                                <div class="score-box mx-auto sac"
                                                    id="{{ number_format($s->bossScore->boss_12_13, 1) }}">
                                                    <div class="score swiss-font-18">
                                                        {{ number_format($s->bossScore->boss_12_13, 1) }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="bg-gray1 ">
                                                <div class="score-box mx-auto sac"
                                                    id="{{ number_format($s->bossScore->boss_14, 1) }}">
                                                    <div class="score swiss-font-18">
                                                        {{ number_format($s->bossScore->boss_14, 1) }}
                                                    </div>
                                                </div>
                                            </td>
                                            <script>
                                                idTag = document.getElementsByClassName('rarity-tag')[0].id;
                                                changeLabel(idTag);
                                                for (i = 0; i < 3; i++) {
                                                    scoreId = document.getElementsByClassName('sac')[0].id;
                                                    changeScoreColor(scoreId);
                                                }
                                            </script>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>


                    </div>

                    {{-- Score 9-11 --}}
                    <div class="score-content overflow-x" id="score-911">

                        <div class="columns-eight">
                            <h2 class="grid-col-span-4">Battleship W 9-11 Score</h2>
                            <span class="grid-col-span-4"></span>
                        </div>

                        <div class="ships">
                            <table class=" ship-table two-score" style="width:100%;">
                                <thead class="bg-gray1 text-white altona-sans-12">
                                    <th>&nbsp;</th>
                                    <th>@sortablelink('name')</th>
                                    <th class=""><a href="#" class="altona-sans-12 link-none">Archetype</a></th>
                                    <th class=""><a href="#" class="altona-sans-12 link-none">Role</a></th>
                                    <th class=""><span>@sortablelink('positions.position_name', 'Position')</span></th>
                                    <th class="">@sortablelink('mobScore.mob_9_11', 'Mob')</th>
                                    <th class="">@sortablelink('bossScore.boss_9_11', 'Boss')</th>
                                </thead>
                                <tbody>
                                    @foreach ($ships as $s)
                                        <tr class="text-white shadow">
                                            <td class="rarity-tag" id={{ $s->rarity->rarity_tag }}>
                                                <span
                                                    class="rotate--90 justify-content-center">{{ $s->rarity->rarity_tag }}</span>
                                            </td>
                                            <td class="bg-gray1 swiss-font-18"><img class="chibi-img r-hide"
                                                    src="/img/ships/chibi/{{ $s->chibi_sprite }}" alt=""> <a
                                                    href="/ships/{{ $s->id }}" class="ms-1 link-none font-inherit">
                                                    {{ $s->name }}
                                                </a></td>
                                            <td class="bg-gray1 altona-sans-10 border-left-white text-align-center ">
                                                @foreach ($s->archetypes as $a)
                                                    <div>{{ $a->archetype_name }}</div>
                                                @endforeach
                                            </td>
                                            <td class="bg-gray1 altona-sans-10 border-left-white text-align-center ">
                                                @foreach ($s->roles as $a)
                                                    <div>{{ $a->role_name }}</div>
                                                @endforeach
                                            </td>
                                            <td class="bg-gray1 altona-sans-10 border-left-white text-align-center ">
                                                <div>

                                                    {{ $s->positions->position_name }}

                                                </div>
                                                <div class="mx-auto">
                                                    <img class="position-row-img"
                                                        src="/img/positions/{{ $s->positions->position_image }}"
                                                        alt="position">
                                                </div>
                                            </td>
                                            <td class="bg-gray1 border-left-white ">
                                                <div class="score-box mx-auto sac"
                                                    id="{{ number_format($s->mobScore->mob_9_11, 1) }}">
                                                    <div class="score swiss-font-18">
                                                        {{ number_format($s->mobScore->mob_9_11, 1) }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="bg-gray1  ">
                                                <div class="score-box mx-auto sac"
                                                    id="{{ number_format($s->bossScore->boss_9_11, 1) }}">
                                                    <div class="score swiss-font-18">
                                                        {{ number_format($s->bossScore->boss_9_11, 1) }}
                                                    </div>
                                                </div>
                                            </td>
                                            <script>
                                                idTag = document.getElementsByClassName('rarity-tag')[0].id;
                                                changeLabel(idTag);
                                                for (i = 0; i < 2; i++) {
                                                    scoreId = document.getElementsByClassName('sac')[0].id;
                                                    changeScoreColor(scoreId);
                                                }
                                            </script>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>

                    {{-- Score 12-13 --}}
                    <div class="score-content overflow-x" id="score-1213">

                        <div class="columns-eight">
                            <h2 class="grid-col-span-4">Battleship W 12-13 Score</h2>
                            <span class="grid-col-span-4"></span>
                        </div>

                        <div class="ships">
                            <table class=" ship-table two-score" style="width:100%;">
                                <thead class="bg-gray1 text-white altona-sans-12">
                                    <th>&nbsp;</th>
                                    <th>@sortablelink('name')</th>
                                    <th class=""><a href="#" class="altona-sans-12 link-none">Archetype</a></th>
                                    <th class=""><a href="#" class="altona-sans-12 link-none">Role</a></th>
                                    <th class=""><span>@sortablelink('positions.position_name', 'Position')</span></th>
                                    <th class="">@sortablelink('mobScore.mob_12_13', 'Mob')</th>
                                    <th class="">@sortablelink('bossScore.boss_12_13', 'Boss')</th>
                                </thead>
                                <tbody>
                                    @foreach ($ships as $s)
                                        <tr class="text-white shadow">
                                            <td class="rarity-tag" id={{ $s->rarity->rarity_tag }}>
                                                <span
                                                    class="rotate--90 justify-content-center">{{ $s->rarity->rarity_tag }}</span>
                                            </td>
                                            <td class="bg-gray1 swiss-font-18"><img class="chibi-img r-hide"
                                                    src="/img/ships/chibi/{{ $s->chibi_sprite }}" alt=""> <a
                                                    href="/ships/{{ $s->id }}" class="ms-1 link-none font-inherit">
                                                    {{ $s->name }}
                                                </a></td>
                                            <td class="bg-gray1 altona-sans-10 border-left-white text-align-center ">
                                                @foreach ($s->archetypes as $a)
                                                    <div>{{ $a->archetype_name }}</div>
                                                @endforeach
                                            </td>
                                            <td class="bg-gray1 altona-sans-10 border-left-white text-align-center ">
                                                @foreach ($s->roles as $a)
                                                    <div>{{ $a->role_name }}</div>
                                                @endforeach
                                            </td>
                                            <td class="bg-gray1 altona-sans-10 border-left-white text-align-center ">
                                                <div>

                                                    {{ $s->positions->position_name }}

                                                </div>
                                                <div class="mx-auto">
                                                    <img class="position-row-img"
                                                        src="/img/positions/{{ $s->positions->position_image }}"
                                                        alt="position">
                                                </div>
                                            </td>
                                            <td class="bg-gray1 border-left-white ">
                                                <div class="score-box mx-auto sac"
                                                    id="{{ number_format($s->mobScore->mob_12_13, 1) }}">
                                                    <div class="score swiss-font-18">
                                                        {{ number_format($s->mobScore->mob_12_13, 1) }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="bg-gray1  ">
                                                <div class="score-box mx-auto sac"
                                                    id="{{ number_format($s->bossScore->boss_12_13, 1) }}">
                                                    <div class="score swiss-font-18">
                                                        {{ number_format($s->bossScore->boss_12_13, 1) }}
                                                    </div>
                                                </div>
                                            </td>
                                            <script>
                                                idTag = document.getElementsByClassName('rarity-tag')[0].id;
                                                changeLabel(idTag);
                                                for (i = 0; i < 2; i++) {
                                                    scoreId = document.getElementsByClassName('sac')[0].id;
                                                    changeScoreColor(scoreId);
                                                }
                                            </script>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                    {{-- Score 14 --}}
                    <div class="score-content overflow-x" id="score-14">

                        <div class="columns-eight">
                            <h2 class="grid-col-span-4">Battleship W 14 Score</h2>
                            <span class="grid-col-span-4"></span>
                        </div>

                        <div class="ships">
                            <table class=" ship-table two-score" style="width:100%;">
                                <thead class="bg-gray1 text-white altona-sans-12">
                                    <th>&nbsp;</th>
                                    <th>@sortablelink('name')</th>
                                    <th class=""><a href="#" class="altona-sans-12 link-none">Archetype</a></th>
                                    <th class=""><a href="#" class="altona-sans-12 link-none">Role</a></th>
                                    <th class=""><span>@sortablelink('positions.position_name', 'Position')</span></th>
                                    <th class="">@sortablelink('mobScore.mob_14', 'Mob')</th>
                                    <th class="">@sortablelink('bossScore.boss_14', 'Boss')</th>
                                </thead>
                                <tbody>
                                    @foreach ($ships as $s)
                                        <tr class="text-white shadow">
                                            <td class="rarity-tag" id={{ $s->rarity->rarity_tag }}>
                                                <span
                                                    class="rotate--90 justify-content-center">{{ $s->rarity->rarity_tag }}</span>
                                            </td>
                                            <td class="bg-gray1 swiss-font-18"><img class="chibi-img r-hide"
                                                    src="/img/ships/chibi/{{ $s->chibi_sprite }}" alt=""> <a
                                                    href="/ships/{{ $s->id }}" class="ms-1 link-none font-inherit">
                                                    {{ $s->name }}
                                                </a></td>
                                            <td class="bg-gray1 altona-sans-10 border-left-white text-align-center ">
                                                @foreach ($s->archetypes as $a)
                                                    <div>{{ $a->archetype_name }}</div>
                                                @endforeach
                                            </td>
                                            <td class="bg-gray1 altona-sans-10 border-left-white text-align-center ">
                                                @foreach ($s->roles as $a)
                                                    <div>{{ $a->role_name }}</div>
                                                @endforeach
                                            </td>
                                            <td class="bg-gray1 altona-sans-10 border-left-white text-align-center ">
                                                <div>

                                                    {{ $s->positions->position_name }}

                                                </div>
                                                <div class="mx-auto">
                                                    <img class="position-row-img"
                                                        src="/img/positions/{{ $s->positions->position_image }}"
                                                        alt="position">
                                                </div>
                                            </td>
                                            <td class="bg-gray1 border-left-white ">
                                                <div class="score-box mx-auto sac"
                                                    id="{{ number_format($s->mobScore->mob_14, 1) }}">
                                                    <div class="score swiss-font-18">
                                                        {{ number_format($s->mobScore->mob_14, 1) }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="bg-gray1  ">
                                                <div class="score-box mx-auto sac"
                                                    id="{{ number_format($s->bossScore->boss_14, 1) }}">
                                                    <div class="score swiss-font-18">
                                                        {{ number_format($s->bossScore->boss_14, 1) }}
                                                    </div>
                                                </div>
                                            </td>
                                            <script>
                                                idTag = document.getElementsByClassName('rarity-tag')[0].id;
                                                changeLabel(idTag);
                                                for (i = 0; i < 2; i++) {
                                                    scoreId = document.getElementsByClassName('sac')[0].id;
                                                    changeScoreColor(scoreId);
                                                }
                                            </script>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>

                </div>

                {{ $ships->appends(\Request::except('page'))->render() }}
            </div>

            <script>
                document.getElementById("openDefault").click();
            </script>
        </div>

        </div>

        </div>

    </section>
@endsection
