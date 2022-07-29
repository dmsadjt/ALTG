@extends('layouts.layout')
@section('title', 'Tier List')
@section('contents')
    <section class="hero">

        <div class="container">

            <div class="bg-overlay rounded my-3">

                <div class="columns-two__5-1 text-white">
                    {{-- form --}}
                    <div>
                        <form action="/ships/filter" method="GET">
                            @csrf
                            <div class="columns-two__1-5">
                                <h2>Filter Ships</h2>
                                <div></div>
                                {{-- Hull --}}
                                <div>

                                    <label for="hull">
                                        <h3 class="swiss-font-18">Hull Type</h3>
                                    </label>

                                    <select name="hull" id="hull"
                                        class="pill-dark hull-type d-grid text-center altona-sans-12">
                                        <option value="" selected data-img_src="/img/posts/no-pictures.png">
                                            Select Hull Type</option>
                                        @foreach ($hulls as $h)
                                            <option class="mx-auto mt-auto mb-2 altona-sans-12"
                                                data-img_src="/img/posts/no-pictures.png" value="{{ $h->id }}">
                                                {{ $h->hull_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.js"></script>
                                    <script script type="text/javascript">
                                        function custom_template(obj) {
                                            var data = $(obj.element).data();
                                            var text = $(obj.element).text();
                                            if (data && data['img_src']) {
                                                img_src = data['img_src'];
                                                template = $("<div><img src=\"" + img_src +
                                                    "\"class=\"my-2\" style=\"width:100%;height:10em;\"/><p class=\"altona-sans-12 text-white text-center\">" +
                                                    text + "</p></div>");

                                                return template;
                                            }
                                        }

                                        var options = {
                                            'templateSelection': custom_template,
                                            'templateResult': custom_template,
                                        }

                                        $('#hull').select2(options);
                                        $('.select2-container--default .select2-selection--single').css({
                                            'height': '100%'
                                        });
                                    </script>

                                </div>

                                <div class="d-grid gap-3">

                                    <div>
                                        <label for="role">
                                            <h3 class="swiss-font-18">Role Tags</h3>
                                        </label>
                                        <input type="text" name="role" id="role" class="text-form">
                                    </div>


                                    <div class="columns-two__4-2 gap-2">

                                        <div>

                                            <div class="columns-two__1-5">

                                                <div class="swiss-font-12">
                                                    Rarity
                                                </div>
                                                <div class="d-flex flex-wrap">
                                                    <ul class="filter-list pill-dark justify-content-center">
                                                        @foreach ($rarity as $r)
                                                            <li>
                                                                <input type="radio" class="filter-radio" name="rarity"
                                                                    id="{{ $r->rarity_slug }}"
                                                                    value="{{ $r->rarity_slug }}">
                                                                <label class="filter-label py-1 px-2 rounded altona-sans-10"
                                                                    for="{{ $r->rarity_slug }}">{{ $r->rarity_tag }}</label>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>

                                            </div>

                                            <div class="columns-two__1-5">

                                                <div class="swiss-font-12">
                                                    Faction
                                                </div>

                                                <div class="columns-five pill-dark">
                                                    @foreach ($factions as $key => $f)
                                                        @if ($key == 0)
                                                            @continue
                                                        @endif
                                                        <div class="mx-auto">
                                                            <input type="radio" class="filter-radio" name="faction"
                                                                id="{{ $f->faction_slug }}"
                                                                value="{{ $f->faction_slug }}">
                                                            <label for="{{ $f->faction_slug }}"
                                                                class="filter-label rounded"><img
                                                                    src="/img/faction-logo/{{ $f->faction_img }}"
                                                                    class="small-img m-1"
                                                                    alt="{{ $f->faction_tag }}"></label>
                                                        </div>
                                                    @endforeach
                                                </div>

                                            </div>

                                        </div>

                                        <div>

                                            <span class="swiss-font-12">Select Position ></span>
                                            <select name="position" id="position"
                                                class="w-100 h-100 pill-dark altona-sans-12 text-center">
                                                <option value="" selected>Select Position</option>
                                                @foreach ($positions as $p)
                                                    @if ($p->position_category == 'backline')
                                                        <option value="{{ $p->id }}">
                                                            Backline :
                                                            {{ $p->position_name }}</option>
                                                    @elseif ($p->position_category == 'submarine')
                                                        <option value="{{ $p->id }}">Submarine :
                                                            {{ $p->position_name }}</option>
                                                    @elseif ($p->position_category == 'vanguard')
                                                        <option value="{{ $p->id }}">Vanguard :
                                                            {{ $p->position_name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>

                                        </div>

                                    </div>

                                </div>

                                <div class="d-flex justify-content-end mt-2 gap-2">
                                    <input type="reset" class="pill px-3 altona-sans-10" value="Reset">
                                    <input type="submit" class="pill-dark px-5 altona-sans-10" value="Filter">
                                </div>

                            </div>
                        </form>

                    </div>

                    <div class="scores my-auto p-2">

                        <h2>View Score by</h2>
                        <h3 class="swiss-font-12">Mob/Boss</h3>
                        <div class="columns-two mb-2">
                            <button class="button-square btn btn-dark d-grid score-type ms-auto score-link"
                                onclick="openTab(event, 'mob-score', 'score-content', 'score-link','grid')"
                                id="openDefault">
                                <img class="mx-auto mt-auto img-small" src="{{ url('/img/web-assets/mob.png') }}"
                                    alt="">
                                <div class="mx-auto my-auto altona-sans-12">Mob</div>
                            </button>
                            <button class="button-square btn btn-dark d-grid score-type me-auto score-link"
                                onclick="openTab(event, 'boss-score', 'score-content', 'score-link','grid')">
                                <img class="mx-auto mt-auto img-small" src="{{ url('/img/web-assets/boss.png') }}"
                                    alt="">
                                <div class="mx-auto my-auto altona-sans-12">Boss</div>
                            </button>
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

                    </div>

                </div>

                <div class="tierlist text-white my-5">

                    <div class="columns-eight">
                        <h2 class="grid-col-span-4">Battleship Mob Score</h2>
                        <span class="grid-col-span-4"></span>
                    </div>
                    {{-- Mob Score --}}
                    <div class="score-content" id="mob-score">

                        <div class="columns-eight altona-sans-12">
                            <span class="grid-col-span-4 mx-auto">
                                Name
                            </span>
                            <span class="mx-auto">
                                Archetype
                            </span>
                            <span class="mx-auto">
                                Position
                            </span>
                            <span class="grid-col-span-2">
                                <div class="d-flex justify-content-around">
                                    <span>9-11</span>
                                    <span>12-13</span>
                                    <span>14</span>
                                </div>
                            </span>

                        </div>
                        @foreach ($ships as $s)
                            <div class="ship-row columns-eight mb-3 shadow-lg">
                                <div class="d-flex grid-col-span-4">
                                    <div class="rarity-tag" id={{ $s->rarity->rarity_tag }}>
                                        <p class="rotate--90">{{ $s->rarity->rarity_tag }}</p>
                                    </div>
                                    <img src="/img/ships/chibi/{{ $s->chibi_sprite }}" alt="chibi-sprite"
                                        class="chibi-img">
                                    <span class="swiss-font-18 my-auto">
                                        <a href="/ships/{{ $s->id }}" class="link-none font-inherit">
                                            {{ $s->name }}
                                        </a>
                                    </span>
                                </div>
                                <div class="border-left-white d-grid">
                                    <div class="m-auto altona-sans-10">
                                        @foreach ($s->archetypes as $a)
                                            <div class="text-center">
                                                {{ $a->archetype_name }}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="border-left-white d-grid">
                                    @foreach ($s->positions as $p)
                                        <div class="m-auto altona-sans-10">{{ $p->position_name }}</div>
                                        <div class="mx-auto">
                                            <img class="position-row-img" src="/img/positions/{{ $p->position_image }}"
                                                alt="position">
                                        </div>
                                    @endforeach
                                </div>
                                <div class="border-left-white grid-col-span-2">

                                    <div class="d-flex h-100 justify-content-around align-items-center">
                                        <div class="score-box sac" id="{{ number_format($s->mobScore->mob_9_11, 1) }}">
                                            <div class="score swiss-font-18">
                                                {{ number_format($s->mobScore->mob_9_11, 1) }}
                                            </div>
                                        </div>
                                        <div class="score-box sac"
                                            id="{{ number_format($s->mobScore->mob_12_13, 1) }}">
                                            <div class="score swiss-font-18">
                                                {{ number_format($s->mobScore->mob_12_13, 1) }}
                                            </div>
                                        </div>
                                        <div class="score-box sac" id="{{ number_format($s->mobScore->mob_14, 1) }}">
                                            <div class="score swiss-font-18">
                                                {{ number_format($s->mobScore->mob_14, 1) }}
                                            </div>
                                        </div>
                                        <script>
                                            for (i = 0; i < 3; i++) {
                                                scoreId = document.getElementsByClassName('sac')[0].id;
                                                changeScoreColor(scoreId);
                                            }
                                        </script>
                                    </div>

                                </div>
                                <script>
                                    idTag = document.getElementsByClassName('rarity-tag')[0].id;
                                    changeLabel(idTag);
                                </script>
                            </div>
                        @endforeach

                    </div>
                    {{-- Boss Score --}}
                    <div class="score-content" id="boss-score">

                        <div class="columns-eight altona-sans-12">
                            <span class="grid-col-span-4 mx-auto">
                                Name
                            </span>
                            <span class="mx-auto">
                                Archetype
                            </span>
                            <span class="mx-auto">
                                Position
                            </span>
                            <span class="grid-col-span-2">
                                <div class="d-flex justify-content-around">
                                    <span>9-11</span>
                                    <span>12-13</span>
                                    <span>14</span>
                                </div>
                            </span>

                        </div>
                        @foreach ($ships as $s)
                            <div class="ship-row columns-eight mb-3">
                                <div class="d-flex grid-col-span-4">
                                    <div class="rarity-tag" id={{ $s->rarity->rarity_tag }}>
                                        <p class="rotate--90">{{ $s->rarity->rarity_tag }}</p>
                                    </div>
                                    <img src="/img/ships/chibi/{{ $s->chibi_sprite }}" alt="chibi-sprite"
                                        class="chibi-img">
                                    <span class="swiss-font-18 my-auto">
                                        <a href="/ships/{{ $s->id }}" class="link-none font-inherit">
                                            {{ $s->name }}
                                        </a>
                                    </span>
                                </div>
                                <div class="border-left-white d-grid">
                                    <div class="m-auto altona-sans-10">
                                        @foreach ($s->archetypes as $a)
                                            <div class="text-center">
                                                {{ $a->archetype_name }}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="border-left-white d-grid">
                                    @foreach ($s->positions as $p)
                                        <div class="m-auto altona-sans-10">{{ $p->position_name }}</div>
                                        <div class="mx-auto">
                                            <img class="position-row-img" src="/img/positions/{{ $p->position_image }}"
                                                alt="position">
                                        </div>
                                    @endforeach
                                </div>
                                <div class="border-left-white grid-col-span-2" id="myTabContent">

                                    <div class="d-flex h-100 justify-content-around align-items-center">
                                        <div class="score-box sac"
                                            id="{{ number_format($s->bossScore->boss_9_11, 1) }}">
                                            <div class="score swiss-font-18">
                                                {{ number_format($s->bossScore->boss_9_11, 1) }}
                                            </div>
                                        </div>
                                        <div class="score-box sac"
                                            id="{{ number_format($s->bossScore->boss_12_13, 1) }}">
                                            <div class="score swiss-font-18">
                                                {{ number_format($s->bossScore->boss_12_13, 1) }}
                                            </div>
                                        </div>
                                        <div class="score-box sac" id="{{ number_format($s->bossScore->boss_14, 1) }}">
                                            <div class="score swiss-font-18">
                                                {{ number_format($s->bossScore->boss_14, 1) }}
                                            </div>
                                        </div>
                                        <script>
                                            for (i = 0; i < 3; i++) {
                                                scoreId = document.getElementsByClassName('sac')[0].id;
                                                changeScoreColor(scoreId);
                                            }
                                        </script>
                                    </div>

                                </div>
                                <script>
                                    idTag = document.getElementsByClassName('rarity-tag')[0].id;
                                    changeLabel(idTag);
                                </script>
                            </div>
                        @endforeach

                    </div>

                    {{-- Score 9-11 --}}
                    <div class="score-content" id="score-911">

                        <div class="columns-eight altona-sans-12">
                            <span class="grid-col-span-4 mx-auto">
                                Name
                            </span>
                            <span class="mx-auto">
                                Archetype
                            </span>
                            <span class="mx-auto">
                                Position
                            </span>
                            <span class="grid-col-span-2">
                                <div class="d-flex justify-content-around">
                                    <span>Mob</span>
                                    <span>Boss</span>
                                </div>
                            </span>

                        </div>
                        @foreach ($ships as $s)
                            <div class="ship-row columns-eight mb-3">
                                <div class="d-flex grid-col-span-4">
                                    <div class="rarity-tag" id={{ $s->rarity->rarity_tag }}>
                                        <p class="rotate--90">{{ $s->rarity->rarity_tag }}</p>
                                    </div>
                                    <img src="/img/ships/chibi/{{ $s->chibi_sprite }}" alt="chibi-sprite"
                                        class="chibi-img">
                                    <span class="swiss-font-18 my-auto">
                                        <a href="/ships/{{ $s->id }}" class="link-none font-inherit">
                                            {{ $s->name }}
                                        </a>
                                    </span>
                                </div>
                                <div class="border-left-white d-grid">
                                    <div class="m-auto altona-sans-10">
                                        @foreach ($s->archetypes as $a)
                                            <div class="text-center">
                                                {{ $a->archetype_name }}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="border-left-white d-grid">
                                    @foreach ($s->positions as $p)
                                        <div class="m-auto altona-sans-10">{{ $p->position_name }}</div>
                                        <div class="mx-auto">
                                            <img class="position-row-img" src="/img/positions/{{ $p->position_image }}"
                                                alt="position">
                                        </div>
                                    @endforeach
                                </div>
                                <div class="border-left-white grid-col-span-2">

                                    <div class="d-flex h-100 justify-content-around align-items-center">

                                        <div class="score-box sac" id="{{ number_format($s->mobScore->mob_9_11, 1) }}">
                                            <div class="score swiss-font-18">
                                                {{ number_format($s->mobScore->mob_9_11, 1) }}
                                            </div>
                                        </div>

                                        <div class="score-box sac"
                                            id="{{ number_format($s->bossScore->boss_9_11, 1) }}">
                                            <div class="score swiss-font-18">
                                                {{ number_format($s->bossScore->boss_9_11, 1) }}
                                            </div>
                                        </div>

                                        <script>
                                            for (i = 0; i < 2; i++) {
                                                scoreId = document.getElementsByClassName('sac')[0].id;
                                                changeScoreColor(scoreId);
                                            }
                                        </script>
                                    </div>

                                </div>

                                <script>
                                    idTag = document.getElementsByClassName('rarity-tag')[0].id;
                                    changeLabel(idTag);
                                </script>
                            </div>
                        @endforeach

                    </div>

                    {{-- Score 12-13 --}}
                    <div class="score-content" id="score-1213">

                        <div class="columns-eight altona-sans-12">
                            <span class="grid-col-span-4 mx-auto">
                                Name
                            </span>
                            <span class="mx-auto">
                                Archetype
                            </span>
                            <span class="mx-auto">
                                Position
                            </span>
                            <span class="grid-col-span-2">
                                <div class="d-flex justify-content-around">
                                    <span>Mob</span>
                                    <span>Boss</span>
                                </div>
                            </span>

                        </div>
                        @foreach ($ships as $s)
                            <div class="ship-row columns-eight mb-3">
                                <div class="d-flex grid-col-span-4">
                                    <div class="rarity-tag" id={{ $s->rarity->rarity_tag }}>
                                        <p class="rotate--90">{{ $s->rarity->rarity_tag }}</p>
                                    </div>
                                    <img src="/img/ships/chibi/{{ $s->chibi_sprite }}" alt="chibi-sprite"
                                        class="chibi-img">
                                    <span class="swiss-font-18 my-auto">
                                        <a href="/ships/{{ $s->id }}" class="link-none font-inherit">
                                            {{ $s->name }}
                                        </a>
                                    </span>
                                </div>
                                <div class="border-left-white d-grid">
                                    <div class="m-auto altona-sans-10">
                                        @foreach ($s->archetypes as $a)
                                            <div class="text-center">
                                                {{ $a->archetype_name }}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="border-left-white d-grid">
                                    @foreach ($s->positions as $p)
                                        <div class="m-auto altona-sans-10">{{ $p->position_name }}</div>
                                        <div class="mx-auto">
                                            <img class="position-row-img" src="/img/positions/{{ $p->position_image }}"
                                                alt="position">
                                        </div>
                                    @endforeach
                                </div>
                                <div class="border-left-white grid-col-span-2">

                                    <div class="d-flex h-100 justify-content-around align-items-center">

                                        <div class="score-box sac"
                                            id="{{ number_format($s->mobScore->mob_12_13, 1) }}">
                                            <div class="score swiss-font-18">
                                                {{ number_format($s->mobScore->mob_12_13, 1) }}
                                            </div>
                                        </div>

                                        <div class="score-box sac"
                                            id="{{ number_format($s->bossScore->boss_12_13, 1) }}">
                                            <div class="score swiss-font-18">
                                                {{ number_format($s->bossScore->boss_12_13, 1) }}
                                            </div>
                                        </div>

                                        <script>
                                            for (i = 0; i < 2; i++) {
                                                scoreId = document.getElementsByClassName('sac')[0].id;
                                                changeScoreColor(scoreId);
                                            }
                                        </script>
                                    </div>

                                </div>

                                <script>
                                    idTag = document.getElementsByClassName('rarity-tag')[0].id;
                                    changeLabel(idTag);
                                </script>
                            </div>
                        @endforeach

                    </div>

                    {{-- Score 14 --}}
                    <div class="score-content" id="score-14">

                        <div class="columns-eight altona-sans-12">
                            <span class="grid-col-span-4 mx-auto">
                                Name
                            </span>
                            <span class="mx-auto">
                                Archetype
                            </span>
                            <span class="mx-auto">
                                Position
                            </span>
                            <span class="grid-col-span-2">
                                <div class="d-flex justify-content-around">
                                    <span>Mob</span>
                                    <span>Boss</span>
                                </div>
                            </span>

                        </div>
                        @foreach ($ships as $s)
                            <div class="ship-row columns-eight mb-3">
                                <div class="d-flex grid-col-span-4">
                                    <div class="rarity-tag" id={{ $s->rarity->rarity_tag }}>
                                        <p class="rotate--90">{{ $s->rarity->rarity_tag }}</p>
                                    </div>
                                    <img src="/img/ships/chibi/{{ $s->chibi_sprite }}" alt="chibi-sprite"
                                        class="chibi-img">
                                    <span class="swiss-font-18 my-auto">
                                        <a href="/ships/{{ $s->id }}" class="link-none font-inherit">
                                            {{ $s->name }}
                                        </a>
                                    </span>
                                </div>
                                <div class="border-left-white d-grid">
                                    <div class="m-auto altona-sans-10">
                                        @foreach ($s->archetypes as $a)
                                            <div class="text-center">
                                                {{ $a->archetype_name }}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="border-left-white d-grid">
                                    @foreach ($s->positions as $p)
                                        <div class="m-auto altona-sans-10">{{ $p->position_name }}</div>
                                        <div class="mx-auto">
                                            <img class="position-row-img" src="/img/positions/{{ $p->position_image }}"
                                                alt="position">
                                        </div>
                                    @endforeach
                                </div>
                                <div class="border-left-white grid-col-span-2">

                                    <div class="d-flex h-100 justify-content-around align-items-center">

                                        <div class="score-box sac" id="{{ number_format($s->mobScore->mob_14, 1) }}">
                                            <div class="score swiss-font-18">
                                                {{ number_format($s->mobScore->mob_14, 1) }}
                                            </div>
                                        </div>

                                        <div class="score-box sac" id="{{ number_format($s->bossScore->boss_14, 1) }}">
                                            <div class="score swiss-font-18">
                                                {{ number_format($s->bossScore->boss_14, 1) }}
                                            </div>
                                        </div>

                                        <script>
                                            for (i = 0; i < 2; i++) {
                                                scoreId = document.getElementsByClassName('sac')[0].id;
                                                changeScoreColor(scoreId);
                                            }
                                        </script>
                                    </div>

                                </div>

                                <script>
                                    idTag = document.getElementsByClassName('rarity-tag')[0].id;
                                    changeLabel(idTag);
                                </script>
                            </div>
                        @endforeach

                    </div>

                </div>


            </div>






            {{ $ships->links() }}
            <script>
                document.getElementById("openDefault").click();
            </script>
        </div>

        </div>

        </div>

    </section>
@endsection
