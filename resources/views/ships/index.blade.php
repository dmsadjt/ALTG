@extends('layouts.layout')
@section('title', 'Tier List')
@section('contents')
    <section class="hero">
        <div class="container">
            <div class="bg-overlay">
                <div>

                    <div class="tab-links pill-dark button-square d-grid score-type">
                        <img class="mx-auto mt-auto img-small" src="{{ url('/img/web-assets/mob.png') }}" alt="">
                        <div class="mx-auto my-auto altona-sans-12">Mob</div>
                    </div>

                    <div class="tab-links pill-dark button-square d-grid score-type">
                        <img class="mx-auto mt-auto img-small" src="{{ url('/img/web-assets/boss.png') }}" alt="">
                        <div class="mx-auto my-auto altona-sans-12">Boss</div>
                    </div>

                    <div class="columns-two__4-2">
                        <div>
                            <form action="/ships/filter" method="GET">
                                @csrf
                                <div class="columns-two__1-5 text-white filter">

                                    <div>
                                        <label for="hull"><span class="swiss-font-18">Hull Type</span></label>
                                        <select name="hull" id="hull"
                                            class="pill-dark hull-type d-grid text-center altona-sans-12">
                                            <option value="" selected><span
                                                    class="mx-auto mt-auto mb-2 altona-sans-12">Select
                                                    Hull Type</span> </option>
                                            @foreach ($hulls as $h)
                                                <option class="mx-auto mt-auto mb-2 altona-sans-12"
                                                    value="{{ $h->id }}">
                                                    <span
                                                        class="mx-auto mt-auto mb-2 altona-sans-12">{{ $h->hull_name }}</span>
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div>
                                        <div class="mb-2 d-grid">
                                            <div>
                                                <label for="role"><span class="swiss-font-18">Role Tags</span></label>
                                                <input type="text" name="role" id="role" class="text-form">
                                            </div>
                                        </div>

                                        <div class="columns-two__4-2 gap-2">

                                            <div class="d-grid">

                                                <div class="columns-two__1-5">
                                                    <div class="swiss-font-12">
                                                        Rarity
                                                    </div>
                                                    <div class="d-flex flex-wrap">
                                                        <ul class="filter-list pill-dark w-100 justify-content-center">
                                                            @foreach ($rarity as $r)
                                                                <li>
                                                                    <input type="radio" class="filter-radio"
                                                                        name="rarity" id="{{ $r->rarity_slug }}"
                                                                        value="{{ $r->rarity_slug }}">
                                                                    <label
                                                                        class="filter-label py-1 px-2 rounded altona-sans-10"
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
                                                    <div class="d-flex flex-wrap">
                                                        <ul class="filter-list pill-dark w-100">
                                                            @foreach ($factions as $f)
                                                                <li>
                                                                    <input type="radio" class="filter-radio"
                                                                        name="faction" id="{{ $f->faction_slug }}"
                                                                        value="{{ $f->faction_slug }}">
                                                                    <label for="{{ $f->faction_slug }}"
                                                                        class="filter-label rounded py-1 px-2"><img
                                                                            src="/img/faction-logo/{{ $f->faction_img }}"
                                                                            class="small-img"
                                                                            alt="{{ $f->faction_tag }}"></label>
                                                                </li>
                                                            @endforeach
                                                        </ul>
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
                                                            <option value="{{ $p->id }}">Backline :
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



                                </div>
                                <div class="d-flex justify-content-end mt-2 gap-2">
                                    <input type="reset" class="pill px-3 altona-sans-10" value="Reset">
                                    <input type="submit" class="pill-dark px-5 altona-sans-10" value="Filter">

                                </div>
                        </div>

                        </form>
                        <div>
                            <p>aa</p>
                        </div>
                    </div>

                </div>


            </div>


            <div class="tierlist text-white">
                <div class="columns-eight">
                    <h2 class="grid-col-span-4">Battleship Mob Score</h2>
                    <span class="grid-col-span-4"></span>
                </div>
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



                            <img src="/img/ships/chibi/{{ $s->chibi_sprite }}" alt="chibi-sprite" class="chibi-img">
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

                            <div class="d-flex h-100 justify-content-around align-items-center ">
                                <div class="score-box sac" id="{{ number_format($s->mobScore->mob_9_11, 1) }}">
                                    <div class="score swiss-font-18">
                                        {{ number_format($s->mobScore->mob_9_11, 1) }}
                                    </div>
                                </div>
                                <div class="score-box sac" id="{{ number_format($s->mobScore->mob_12_13, 1) }}">
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




                {{ $ships->links() }}
            </div>
        </div>
        </div>
    </section>
@endsection
