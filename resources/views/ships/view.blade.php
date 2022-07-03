@extends('layouts.layout')
@section('title', 'Ship Section')
@section('contents')
    <section class="hero">
        <div class="container">
            <div class="bg-overlay">
                <div class="columns-five">
                    <div class="grid-col-span-2"></div>
                    <h1 class="text-white grid-col-span-3">{{ $ship->name }}</h1>
                </div>
                <div class="columns-five character-card" id="{{ $ship->rarity->rarity_slug }}">
                    <div class="image-wrapper grid-col-span-2">
                        <img src="/img/ships/sprites/{{ $ship->sprite }}" class="image-out" alt="">
                    </div>
                    <div class="text-white my-5 grid-col-span-2">
                        <table>
                            <tr>
                                <td>Chapter</td>
                                <td class="text-center">9-11</td>
                                <td class="text-center">12-13</td>
                                <td class="text-center">14</td>
                            </tr>
                            <tr>
                                <td>Mob</td>
                                <td>
                                    <div class="score-box mx-auto sac" id="{{ $ship->mobScore->mob_9_11 }}">
                                        <span class=" score swiss-font-24">
                                            {{ $ship->mobScore->mob_9_11 }}
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <div class="score-box mx-auto sac" id="{{ $ship->mobScore->mob_12_13 }}">
                                        <span class=" score swiss-font-24">
                                            {{ $ship->mobScore->mob_12_13 }}
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <div class="score-box mx-auto sac" id="{{ $ship->mobScore->mob_14 }}">
                                        <span class=" score swiss-font-24">
                                            {{ $ship->mobScore->mob_14 }}
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Boss</td>
                                <td>
                                    <div class="score-box mx-auto sac" id="{{ $ship->bossScore->boss_9_11 }}">
                                        <span class=" score swiss-font-24">
                                            {{ $ship->bossScore->boss_9_11 }}
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <div class="score-box mx-auto sac" id="{{ $ship->bossScore->boss_12_13 }}">
                                        <span class=" score swiss-font-24">
                                            {{ $ship->bossScore->boss_12_13 }}
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <div class="score-box mx-auto sac" id="{{ $ship->bossScore->boss_14 }}">
                                        <span class=" score swiss-font-24">
                                            {{ $ship->bossScore->boss_14 }}
                                        </span>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <script>
                        for (i = 0; i < 6; i++) {
                            scoreId = document.getElementsByClassName('sac')[0].id;
                            changeScoreColor(scoreId);
                        }
                    </script>

                    <div class="faction-content">
                        <div class="faction" id="{{ $ship->faction->faction_slug }}">
                            <img src="/img/ships/chibi/{{ $ship->chibi_sprite }}" alt="chibi">
                        </div>
                    </div>

                    <script>
                        faction = document.getElementsByClassName('faction')[0].id;
                        changeFaction(faction);
                    </script>

                </div>

                <div class="columns-two__3-6">
                    <div class="d-grid my-auto">
                        <h2 class="text-white">Skill leveling prio</h2>
                        <div class="d-flex gap-4 text-white">
                            <div class="d-grid one" id="{{ $skill[2]->skill_priority }}">
                                <img src="/img/skills/{{ $skill[2]->skill_img }}" alt=""
                                    class="skill-img mx-auto">
                            </div>
                            <div class="d-grid ">
                                <span class="my-auto swiss-font-18 evaluator-1" id="evaluator-1"></span>
                                <span></span>
                            </div>
                            <div class="d-grid two" id="{{ $skill[1]->skill_priority }}">
                                <img src="/img/skills/{{ $skill[1]->skill_img }}" alt=""
                                    class="skill-img mx-auto">
                            </div>
                            <div class="d-grid">
                                <span class="my-auto swiss-font-18 evaluator-2" id="evaluator-2"></span>
                                <span></span>
                            </div>
                            <div class="d-grid three" id="{{ $skill[0]->skill_priority }}">
                                <img src="/img/skills/{{ $skill[0]->skill_img }}" alt=""
                                    class="skill-img mx-auto">
                            </div>
                        </div>
                    </div>

                    <script>
                        one = document.getElementsByClassName('one')[0].id;
                        two = document.getElementsByClassName('two')[0].id;
                        three = document.getElementsByClassName('three')[0].id;
                        evaluateSkills(one, two, 'evaluator-1');
                        evaluateSkills(two, three, 'evaluator-2');
                    </script>

                    <div>
                        <table class="text-white details-table altona-sans-12">
                            <tr>
                                <td>Archetype</td>
                                <td class="altona-sans-12 ps-5">
                                    @foreach ($ship->archetypes as $a)
                                        <span class="pill-dark">{{ $a->archetype_name }}</span>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td>Roles</td>
                                <td class="altona-sans-12 ps-5">
                                    @foreach ($ship->roles as $r)
                                        <d-flex>
                                            <span class="pill-dark">{{ $r->role_name }}</span>
                                            @foreach ($r->factions as $f)
                                                <span class="pl-hd"
                                                    id="{{ $f->faction_tag }}">{{ $f->faction_tag }}</span>
                                                <script>
                                                    tag = document.getElementsByClassName('pl-hd')[0].id;
                                                    changeFactionTag(tag);
                                                </script>
                                            @endforeach
                                        </d-flex>
                                    @endforeach
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="vertical-align-top">Position</td>
                                <td class="ps-5">
                                    @foreach ($ship->positions as $p)
                                        @if ($p->position_type == 'single')
                                            <div class="pill-dark d-flex mb-1">
                                                <div class="my-auto p-3">1</div>
                                                <div class="border-left-white">
                                                    <div class="d-grid">
                                                        <h5 class="mx-auto text-center altona-sans-12">
                                                            {{ $p->position_name }}
                                                        </h5>
                                                        <img src="/img/positions/{{ $p->position_image }}"
                                                            alt="">
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <p class="altona-sans-10">{{ $p->explanation }} </p>
                                                </div>
                                            </div>
                                        @else
                                            @foreach ($p->children as $c)
                                                <div class="pill-dark d-flex mb-1">
                                                    <div class="my-auto p-3">1</div>
                                                    <div class="border-left-white">
                                                        <div class="d-grid">
                                                            <h5 class="mx-auto text-center altona-sans-12">
                                                                {{ $c->position_name }}
                                                            </h5>
                                                            <img src="/img/positions/{{ $c->position_image }}"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                    <div class="my-auto">
                                                        <p class="altona-sans-10">{{ $c->explanation }} </p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="text-white">

                    <div class="gears">

                        <h2 class="altona-sans-18">Gear Reccomendations</h2>

                        @foreach ($category as $c)
                            <div class="columns-six d-none {{ $c->gear_category_slug }}"
                                id="{{ $c->gear_category_slug }}">
                                <h3 class="altona-sans-12 mt-1">{{ $c->gear_category_name }}</h3>
                                <div class="tab__blue grid-col-span-3">
                                    <button class="tab-links__blue {{ $c->gear_category_slug }}-link"
                                        onclick="openTab(event, '{{ $c->gear_category_slug }}-general', 'tab-content__{{ $c->gear_category_slug }}', '{{ $c->gear_category_slug }}-link')"
                                        id="openByDefault-{{ $c->id }}">General</button>
                                    <button class="tab-links__blue {{ $c->gear_category_slug }}-link"
                                        onclick="openTab(event, '{{ $c->gear_category_slug }}-light', 'tab-content__{{ $c->gear_category_slug }}', '{{ $c->gear_category_slug }}-link')">Light</button>
                                    <button class="tab-links__blue {{ $c->gear_category_slug }}-link"
                                        onclick="openTab(event, '{{ $c->gear_category_slug }}-med', 'tab-content__{{ $c->gear_category_slug }}', '{{ $c->gear_category_slug }}-link')">Med</button>
                                    <button class="tab-links__blue {{ $c->gear_category_slug }}-link"
                                        onclick="openTab(event, '{{ $c->gear_category_slug }}-heavy', 'tab-content__{{ $c->gear_category_slug }}', '{{ $c->gear_category_slug }}-link')">Heavy</button>
                                </div>
                                <div class="grid-col-span-2"></div>
                                <div></div>
                                <div class="grid-col-span-3">
                                    <div class="columns-eight mb-3 altona-sans-12">
                                        <div class="mx-auto">Mob</div>
                                        <div class="grid-col-span-2 mx-auto">Boss (Armor)</div>
                                    </div>
                                    <div class="tab-content__{{ $c->gear_category_slug }}  fadeIn"
                                        id="{{ $c->gear_category_slug }}-general">
                                        <div class="d-flex gap-3">
                                            @foreach ($ship->gears as $g)
                                                @if ($g->gear_type == $c->id && $g->pivot->gear_category == 'General')
                                                    <div class="text-center d-grid">
                                                        <div class="pill-dark pl-hd mx-auto"
                                                            id="{{ $g->gear_rarity }}">
                                                            <img src="/img/gears/{{ $g->gear_img }}"
                                                                class="rounded-2 img-small m-1" alt="img1">
                                                        </div>

                                                        <div class="medium-label altona-sans-10">
                                                            {{ $g->gear_name }}
                                                        </div>
                                                        <script>
                                                            divId = document.getElementsByClassName('d-none')[0].id;
                                                            displayItem(divId);
                                                        </script>
                                                    </div>
                                                @endif

                                                <script>
                                                    gearR = document.getElementsByClassName('pl-hd')[0].id;
                                                    changeGear(gearR);
                                                </script>
                                            @endforeach
                                        </div>


                                    </div>

                                    <div class="tab-content__{{ $c->gear_category_slug }} fadeIn"
                                        id="{{ $c->gear_category_slug }}-light">
                                        <div class="d-flex gap-3">
                                            <div class="text-center">
                                                @foreach ($ship->gears as $g)
                                                    @if ($g->gear_type == $c->id && $g->pivot->gear_category == 'Light')
                                                        <div class="text-center d-grid">
                                                            <div class="pill-dark mx-auto pl-hd"
                                                                id="{{ $g->gear_rarity }}">
                                                                <img src="/img/gears/{{ $g->gear_img }}"
                                                                    class="rounded-2 img-small m-1" alt="img1">
                                                            </div>

                                                            <div class="medium-label altona-sans-10">
                                                                {{ $g->gear_name }}
                                                            </div>
                                                        </div>
                                                    @endif

                                                    <script>
                                                        gearR = document.getElementsByClassName('pl-hd')[0].id;
                                                        changeGear(gearR);
                                                    </script>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-content__{{ $c->gear_category_slug }} fadeIn"
                                        id="{{ $c->gear_category_slug }}-med">
                                        <div class="d-flex gap-3">
                                            @foreach ($ship->gears as $g)
                                                @if ($g->gear_type == $c->id && $g->pivot->gear_category == 'Medium')
                                                    <div class="text-center d-grid">
                                                        <div class="pill-dark mx-auto pl-hd"
                                                            id="{{ $g->gear_rarity }}">
                                                            <img src="/img/gears/{{ $g->gear_img }}"
                                                                class="rounded-2 img-small m-1" alt="img1">
                                                        </div>
                                                        <div class="medium-label mx-auto altona-sans-10">
                                                            {{ $g->gear_name }}
                                                        </div>
                                                    </div>
                                                @endif

                                                <script>
                                                    gearR = document.getElementsByClassName('pl-hd')[0].id;
                                                    changeGear(gearR);
                                                </script>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="tab-content__{{ $c->gear_category_slug }} fadeIn"
                                        id="{{ $c->gear_category_slug }}-heavy">
                                        <div class="d-flex gap-3">
                                            @foreach ($ship->gears as $g)
                                                @if ($g->gear_type == $c->id && $g->pivot->gear_category == 'Heavy')
                                                    <div class="text-center mx-auto d-grid">
                                                        <div class="pill-dark pl-hd" id="{{ $g->gear_rarity }}">
                                                            <img src="/img/gears/{{ $g->gear_img }}"
                                                                class="rounded-2 img-small m-1" alt="img1">
                                                        </div>

                                                        <div class="medium-label altona-sans-10">
                                                            {{ $g->gear_name }}
                                                        </div>
                                                    </div>
                                                @endif

                                                <script>
                                                    gearR = document.getElementsByClassName('pl-hd')[0].id;
                                                    changeGear(gearR);
                                                </script>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                                <div></div>
                            </div>
                        @endforeach

                    </div>

                    <div class="explanation mt-5">

                        <h2 class="altona-sans-18">Explanation</h2>

                        <p class="altona-sans-12">
                            {{ $ship->explanation }}
                        </p>
                    </div>

                </div>
            </div>
        </div>

        <script>
            idCard = document.getElementsByClassName('character-card')[0].id;
            changeFrame(idCard);

            document.getElementById('openByDefault-1').click();
            document.getElementById('openByDefault-2').click();
            document.getElementById('openByDefault-3').click();
            document.getElementById('openByDefault-4').click();
            document.getElementById('openByDefault-5').click();
            document.getElementById('openByDefault-6').click();
            document.getElementById('openByDefault-7').click();
            document.getElementById('openByDefault-8').click();
            document.getElementById('openByDefault-9').click();
            document.getElementById('openByDefault-10').click();
            document.getElementById('openByDefault-11').click();
            document.getElementById('openByDefault-12').click();
            document.getElementById('openByDefault-13').click();
        </script>

    </section>

@endsection
