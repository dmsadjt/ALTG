@extends('layouts.layout')
@section('title', 'Tier List')
@section('contents')
    <section class="hero">
        <div class="container">
            <div class="bg-overlay">
                <div class="columns-two__1-5 text-white filter">
                    <div>
                        <span class="swiss-font-18">Hull Type</span>
                        <div class="pill hull-type battleship d-grid">
                            <span class="mx-auto mt-auto mb-2 altona-sans-12">Battleship</span>
                        </div>
                    </div>
                    <div>
                        <div class="mb-2">
                            <label for="role"><span class="swiss-font-18">Role Tags</span></label>
                            <input type="text" class="text-form" name="role" id="role">
                        </div>

                        <div class="columns-two__5-1">
                            <div class="d-grid">
                                <span class="swiss-font-18">View Score</span>
                                <div class="columns-two__3-6">
                                    <div class="columns-two">
                                        <div class="pill-dark button-square d-grid score-type">
                                            <img class="mx-auto mt-auto img-small" src="{{url('/img/web-assets/mob.png')}}" alt="">
                                            <div class="mx-auto my-auto altona-sans-12">Mob</div>
                                        </div>
                                        <div class="pill-dark button-square d-grid score-type">
                                            <img class="mx-auto mt-auto img-small" src="{{url('/img/web-assets/boss.png')}}" alt="">
                                            <div class="mx-auto my-auto altona-sans-12">Boss</div>
                                        </div>
                                    </div>
                                    <div>
                                        <table>
                                            <tr>
                                                <td>Chapter</td>
                                                <td class="altona-sans-10">
                                                    <button class="pill-dark">
                                                        W 9-11
                                                    </button>
                                                    <button class="pill-dark">
                                                        W 12-13
                                                    </button>
                                                    <button class="pill-dark">
                                                        W 12-13
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Rarity</td>
                                                <td class="altona-sans-10">
                                                    <button class="pill-dark">
                                                        UR
                                                    </button>
                                                    <button class="pill-dark">
                                                        SR
                                                    </button>
                                                    <button class="pill-dark">
                                                        E
                                                    </button>
                                                    <button class="pill-dark">
                                                        R
                                                    </button>
                                                    <button class="pill-dark">
                                                        N
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Faction</td>
                                                <td>
                                                    <button class="pill-dark">
                                                        <img class="small-img" src="/resource/image/iron-blood.png"
                                                            alt="">
                                                    </button>
                                                    <button class="pill-dark">
                                                        <img class="small-img" src="/resource/image/iron-blood.png"
                                                            alt="">
                                                    </button>
                                                    <button class="pill-dark">
                                                        <img class="small-img" src="/resource/image/iron-blood.png"
                                                            alt="">

                                                    </button>
                                                    <button class="pill-dark">
                                                        <img class="small-img" src="/resource/image/iron-blood.png"
                                                            alt="">

                                                    </button>
                                                    <button class="pill-dark">
                                                        <img class="small-img" src="/resource/image/iron-blood.png"
                                                            alt="">

                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <button class="pill-dark">
                                                        <img class="small-img" src="/resource/image/iron-blood.png"
                                                            alt="">

                                                    </button>
                                                    <button class="pill-dark">
                                                        <img class="small-img" src="/resource/image/iron-blood.png"
                                                            alt="">

                                                    </button>
                                                    <button class="pill-dark">
                                                        <img class="small-img" src="/resource/image/iron-blood.png"
                                                            alt="">

                                                    </button>
                                                    <button class="pill-dark">
                                                        <img class="small-img" src="/resource/image/iron-blood.png"
                                                            alt="">

                                                    </button>
                                                    <button class="pill-dark">
                                                        <img class="small-img" src="/resource/image/iron-blood.png"
                                                            alt="">

                                                    </button>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <span class="swiss-font-18">Position</span>
                                <div class="pill-dark button-square ">
                                    <span class="altona-sans-18">All</span>
                                </div>
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



                                <img src="/img/ships/chibi/{{$s->chibi_sprite}}" alt="chibi-sprite" class="chibi-img">
                                <span class="swiss-font-18 my-auto">
                                    <a href="/ships/{{$s->id}}" class="link-none font-inherit">
                                        {{ $s->name }}
                                    </a>

                                </span>
                            </div>
                            <div class="border-left-white d-grid">
                                <div class="m-auto altona-sans-10">
                                    @foreach ($s->archetypes as $a)
                                        <div class="text-center">
                                            {{$a->archetype_name}}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="border-left-white d-grid">
                                @foreach ($s->positions as $p)
                                    <div class="m-auto altona-sans-10">{{ $p->position_name }}</div>
                                    <div class="mx-auto">
                                        <img class="position-row-img"
                                            src="/img/positions/{{ $p->position_image }}" alt="position">
                                    </div>
                                @endforeach
                            </div>
                            <div class="border-left-white grid-col-span-2">

                                <div class="d-flex h-100 justify-content-around align-items-center">
                                    <div class="score-box sac" id="{{ number_format(($s->mobScore->mob_9_11 + $s->bossScore->boss_9_11) / 2, 1) }}">
                                        <div class="score swiss-font-18">
                                            {{ number_format(($s->mobScore->mob_9_11 + $s->bossScore->boss_9_11) / 2, 1) }}
                                        </div>
                                    </div>
                                    <div class="score-box sac" id="{{ number_format(($s->mobScore->mob_12_13 + $s->bossScore->boss_12_13) / 2, 1) }}">
                                        <div class="score swiss-font-18">
                                            {{ number_format(($s->mobScore->mob_12_13 + $s->bossScore->boss_12_13) / 2, 1) }}
                                        </div>
                                    </div>
                                    <div class="score-box sac" id="{{ number_format(($s->mobScore->mob_14 + $s->bossScore->boss_14) / 2, 1) }}">
                                        <div class="score swiss-font-18">
                                            {{ number_format(($s->mobScore->mob_14 + $s->bossScore->boss_14) / 2, 1) }}
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
            </div>
        </div>
    </section>
@endsection
