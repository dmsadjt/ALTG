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
                                        <span class="pill-dark">{{ $r->role_name }}</span>
                                    @endforeach
                                    <span class="pill-dark">Crit. Damage Buffer <small class="pill-tag--IB">WIP</small>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="vertical-align-top">Position</td>
                                <td class="ps-5">
                                    @foreach ($ship->positions as $p)
                                        <div class="pill-dark d-flex mb-1">
                                            <div class="my-auto p-3">1</div>
                                            <div class="border-left-white">
                                                <div class="d-grid">
                                                    <h5 class="mx-auto text-center altona-sans-12">
                                                        {{ $p->position_name }}
                                                    </h5>
                                                    <img src="/img/positions/{{ $p->position_image }}" alt="">
                                                </div>
                                            </div>
                                            <div class="my-auto">
                                                <p class="altona-sans-10">Lorem ipsum dolor sit amet, consectetur
                                                    adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                                    dolore magna aliqua. </p>
                                            </div>
                                        </div>
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
                        {{-- Battleship Gun --}}
                        <div class="columns-six battleship-gun" id="battleship-gun">
                            <h3 class="altona-sans-12 mt-1">Battleship Gun</h3>
                            <div class="tab__blue grid-col-span-3">
                                <button class="tab-links__blue battleship-link"
                                    onclick="openTab(event, 'mob-general', 'tab-content__battleship', 'battleship-link')"
                                    id="openByDefault">General</button>
                                <button class="tab-links__blue battleship-link"
                                    onclick="openTab(event, 'boss-light', 'tab-content__battleship', 'battleship-link')">Light</button>
                                <button class="tab-links__blue battleship-link"
                                    onclick="openTab(event, 'boss-med', 'tab-content__battleship', 'battleship-link')">Med</button>
                                <button class="tab-links__blue battleship-link"
                                    onclick="openTab(event, 'boss-heavy', 'tab-content__battleship', 'battleship-link')">Heavy</button>
                            </div>
                            <div class="grid-col-span-2"></div>
                            <div></div>
                            <div class="grid-col-span-3">
                                <div class="columns-eight mb-3 altona-sans-12">
                                    <div class="mx-auto">Mob</div>
                                    <div class="grid-col-span-2 mx-auto">Boss (Armor)</div>
                                </div>
                                <div class="tab-content__battleship  fadeIn" id="mob-general">
                                    <div class="d-flex gap-3">
                                        @foreach ($ship->gears as $g)
                                            @if ($g->gear_type == 'Battleship Gun' && $g->pivot->gear_category == 'General')
                                                <div class="text-center">
                                                    <div class="pill-dark">
                                                        <img src="/img/gears/{{ $g->gear_img }}"
                                                            class="rounded-2 img-small m-1" alt="img1">
                                                    </div>

                                                    <div>
                                                        {{ $g->gear_name }}
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                                <div class="tab-content__battleship fadeIn" id="boss-light">
                                    <div class="d-flex gap-3">
                                        <div class="text-center">
                                            @foreach ($ship->gears as $g)
                                                @if ($g->gear_type == 'Battleship Gun' && $g->pivot->gear_category == 'Light')
                                                    <div class="text-center">
                                                        <div class="pill-dark">
                                                            <img src="/img/gears/{{ $g->gear_img }}"
                                                                class="rounded-2 img-small m-1" alt="img1">
                                                        </div>

                                                        <div>
                                                            {{ $g->gear_name }}
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-content__battleship fadeIn" id="boss-med">
                                    <div class="d-flex gap-3">
                                        @foreach ($ship->gears as $g)
                                            @if ($g->gear_type == 'Battleship Gun' && $g->pivot->gear_category == 'Medium')
                                                <div class="text-center">
                                                    <div class="pill-dark">
                                                        <img src="/img/gears/{{ $g->gear_img }}"
                                                            class="rounded-2 img-small m-1" alt="img1">
                                                    </div>
                                                    <div>
                                                        {{ $g->gear_name }}
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                                <div class="tab-content__battleship fadeIn" id="boss-heavy">
                                    <div class="d-flex gap-3">
                                        @foreach ($ship->gears as $g)
                                            @if ($g->gear_type == 'Battleship Gun' && $g->pivot->gear_category == 'Heavy')
                                                <div class="text-center">
                                                    <div class="pill-dark">
                                                        <img src="/img/gears/{{ $g->gear_img }}"
                                                            class="rounded-2 img-small m-1" alt="img1">
                                                    </div>

                                                    <div>
                                                        {{ $g->gear_name }}
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                            <div></div>
                        </div>

                        {{-- Heavy Cruiser Gun --}}
                        <div class="columns-six heavy-cruiser" id="heavy-cruiser">
                            <h3 class="altona-sans-12 mt-1">Heavy Cruiser Gun</h3>
                            <div class="tab__blue grid-col-span-3">
                                <button class="tab-links__blue heavy-link"
                                    onclick="openTab(event, 'heavy-general', 'tab-content__heavy', 'heavy-link')"
                                    id="openByDefault">General</button>
                                <button class="tab-links__blue heavy-link"
                                    onclick="openTab(event, 'heavy-light', 'tab-content__heavy', 'heavy-link')">Light</button>
                                <button class="tab-links__blue heavy-link"
                                    onclick="openTab(event, 'heavy-med', 'tab-content__heavy', 'heavy-link')">Med</button>
                                <button class="tab-links__blue heavy-link"
                                    onclick="openTab(event, 'heavy-heavy', 'tab-content__heavy', 'heavy-link')">Heavy</button>
                            </div>
                            <div class="grid-col-span-2"></div>
                            <div></div>
                            <div class="grid-col-span-3">
                                <div class="columns-eight mb-3 altona-sans-12">
                                    <div class="mx-auto">Mob</div>
                                    <div class="grid-col-span-2 mx-auto">Boss (Armor)</div>
                                </div>
                                <div class="tab-content__heavy  fadeIn" id="heavy-general">
                                    <div class="d-flex gap-3">
                                        @foreach ($ship->gears as $g)
                                            @if ($g->gear_type == 'Heavy Cruiser Gun' && $g->pivot->gear_category == 'General')
                                                <div class="text-center">
                                                    <div class="pill-dark">
                                                        <img src="/img/gears/{{ $g->gear_img }}"
                                                            class="rounded-2 img-small m-1" alt="img1">
                                                    </div>

                                                    <div>
                                                        {{ $g->gear_name }}
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                                <div class="tab-content__heavy fadeIn" id="heavy-light">
                                    <div class="d-flex gap-3">
                                        <div class="text-center">
                                            @foreach ($ship->gears as $g)
                                                @if ($g->gear_type == 'Heavy Cruiser Gun' && $g->pivot->gear_category == 'Light')
                                                    <div class="text-center">
                                                        <div class="pill-dark">
                                                            <img src="/img/gears/{{ $g->gear_img }}"
                                                                class="rounded-2 img-small m-1" alt="img1">
                                                        </div>

                                                        <div>
                                                            {{ $g->gear_name }}
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-content__heavy fadeIn" id="heavy-med">
                                    <div class="d-flex gap-3">
                                        @foreach ($ship->gears as $g)
                                            @if ($g->gear_type == 'Heavy Cruiser Gun' && $g->pivot->gear_category == 'Medium')
                                                <div class="text-center">
                                                    <div class="pill-dark">
                                                        <img src="/img/gears/{{ $g->gear_img }}"
                                                            class="rounded-2 img-small m-1" alt="img1">
                                                    </div>
                                                    <div>
                                                        {{ $g->gear_name }}
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                                <div class="tab-content__heavy fadeIn" id="heavy-heavy">
                                    <div class="d-flex gap-3">
                                        @foreach ($ship->gears as $g)
                                            @if ($g->gear_type == 'Heavy Cruiser Gun' && $g->pivot->gear_category == 'Heavy')
                                                <div class="text-center">
                                                    <div class="pill-dark">
                                                        <img src="/img/gears/{{ $g->gear_img }}"
                                                            class="rounded-2 img-small m-1" alt="img1">
                                                    </div>

                                                    <div>
                                                        {{ $g->gear_name }}
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                            <div></div>
                        </div>

                        {{-- Light Cruiser Gun --}}
                        <div class="columns-six light-cruiser" id="light-cruiser">
                            <h3 class="altona-sans-12 mt-1">Heavy Cruiser Gun</h3>
                            <div class="tab__blue grid-col-span-3">
                                <button class="tab-links__blue light-link"
                                    onclick="openTab(event, 'light-general', 'tab-content__light', 'light-link')"
                                    id="openByDefault">General</button>
                                <button class="tab-links__blue light-link"
                                    onclick="openTab(event, 'light-light', 'tab-content__light', 'light-link')">Light</button>
                                <button class="tab-links__blue light-link"
                                    onclick="openTab(event, 'light-med', 'tab-content__light', 'light-link')">Med</button>
                                <button class="tab-links__blue light-link"
                                    onclick="openTab(event, 'light-heavy', 'tab-content__light', 'light-link')">Heavy</button>
                            </div>
                            <div class="grid-col-span-2"></div>
                            <div></div>
                            <div class="grid-col-span-3">
                                <div class="columns-eight mb-3 altona-sans-12">
                                    <div class="mx-auto">Mob</div>
                                    <div class="grid-col-span-2 mx-auto">Boss (Armor)</div>
                                </div>
                                <div class="tab-content__light  fadeIn" id="light-general">
                                    <div class="d-flex gap-3">
                                        @foreach ($ship->gears as $g)
                                            @if ($g->gear_type == 'Light Cruiser Gun' && $g->pivot->gear_category == 'General')
                                                <div class="text-center">
                                                    <div class="pill-dark">
                                                        <img src="/img/gears/{{ $g->gear_img }}"
                                                            class="rounded-2 img-small m-1" alt="img1">
                                                    </div>

                                                    <div>
                                                        {{ $g->gear_name }}
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                                <div class="tab-content__light fadeIn" id="light-light">
                                    <div class="d-flex gap-3">
                                        <div class="text-center">
                                            @foreach ($ship->gears as $g)
                                                @if ($g->gear_type == 'Light Cruiser Gun' && $g->pivot->gear_category == 'Light')
                                                    <div class="text-center">
                                                        <div class="pill-dark">
                                                            <img src="/img/gears/{{ $g->gear_img }}"
                                                                class="rounded-2 img-small m-1" alt="img1">
                                                        </div>

                                                        <div>
                                                            {{ $g->gear_name }}
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-content__light fadeIn" id="light-med">
                                    <div class="d-flex gap-3">
                                        @foreach ($ship->gears as $g)
                                            @if ($g->gear_type == 'Light Cruiser Gun' && $g->pivot->gear_category == 'Medium')
                                                <div class="text-center">
                                                    <div class="pill-dark">
                                                        <img src="/img/gears/{{ $g->gear_img }}"
                                                            class="rounded-2 img-small m-1" alt="img1">
                                                    </div>
                                                    <div>
                                                        {{ $g->gear_name }}
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                                <div class="tab-content__light fadeIn" id="light-heavy">
                                    <div class="d-flex gap-3">
                                        @foreach ($ship->gears as $g)
                                            @if ($g->gear_type == 'Light Cruiser Gun' && $g->pivot->gear_category == 'Heavy')
                                                <div class="text-center">
                                                    <div class="pill-dark">
                                                        <img src="/img/gears/{{ $g->gear_img }}"
                                                            class="rounded-2 img-small m-1" alt="img1">
                                                    </div>

                                                    <div>
                                                        {{ $g->gear_name }}
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                            <div></div>
                        </div>

                        {{-- Destroyer Gun --}}
                        <div class="columns-six light-cruiser" id="light-cruiser">
                            <h3 class="altona-sans-12 mt-1">Heavy Cruiser Gun</h3>
                            <div class="tab__blue grid-col-span-3">
                                <button class="tab-links__blue light-link"
                                    onclick="openTab(event, 'light-general', 'tab-content__light', 'light-link')"
                                    id="openByDefault">General</button>
                                <button class="tab-links__blue light-link"
                                    onclick="openTab(event, 'light-light', 'tab-content__light', 'light-link')">Light</button>
                                <button class="tab-links__blue light-link"
                                    onclick="openTab(event, 'light-med', 'tab-content__light', 'light-link')">Med</button>
                                <button class="tab-links__blue light-link"
                                    onclick="openTab(event, 'light-heavy', 'tab-content__light', 'light-link')">Heavy</button>
                            </div>
                            <div class="grid-col-span-2"></div>
                            <div></div>
                            <div class="grid-col-span-3">
                                <div class="columns-eight mb-3 altona-sans-12">
                                    <div class="mx-auto">Mob</div>
                                    <div class="grid-col-span-2 mx-auto">Boss (Armor)</div>
                                </div>
                                <div class="tab-content__light  fadeIn" id="light-general">
                                    <div class="d-flex gap-3">
                                        @foreach ($ship->gears as $g)
                                            @if ($g->gear_type == 'Light Cruiser Gun' && $g->pivot->gear_category == 'General')
                                                <div class="text-center">
                                                    <div class="pill-dark">
                                                        <img src="/img/gears/{{ $g->gear_img }}"
                                                            class="rounded-2 img-small m-1" alt="img1">
                                                    </div>

                                                    <div>
                                                        {{ $g->gear_name }}
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                                <div class="tab-content__light fadeIn" id="light-light">
                                    <div class="d-flex gap-3">
                                        <div class="text-center">
                                            @foreach ($ship->gears as $g)
                                                @if ($g->gear_type == 'Light Cruiser Gun' && $g->pivot->gear_category == 'Light')
                                                    <div class="text-center">
                                                        <div class="pill-dark">
                                                            <img src="/img/gears/{{ $g->gear_img }}"
                                                                class="rounded-2 img-small m-1" alt="img1">
                                                        </div>

                                                        <div>
                                                            {{ $g->gear_name }}
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-content__light fadeIn" id="light-med">
                                    <div class="d-flex gap-3">
                                        @foreach ($ship->gears as $g)
                                            @if ($g->gear_type == 'Light Cruiser Gun' && $g->pivot->gear_category == 'Medium')
                                                <div class="text-center">
                                                    <div class="pill-dark">
                                                        <img src="/img/gears/{{ $g->gear_img }}"
                                                            class="rounded-2 img-small m-1" alt="img1">
                                                    </div>
                                                    <div>
                                                        {{ $g->gear_name }}
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                                <div class="tab-content__light fadeIn" id="light-heavy">
                                    <div class="d-flex gap-3">
                                        @foreach ($ship->gears as $g)
                                            @if ($g->gear_type == 'Light Cruiser Gun' && $g->pivot->gear_category == 'Heavy')
                                                <div class="text-center">
                                                    <div class="pill-dark">
                                                        <img src="/img/gears/{{ $g->gear_img }}"
                                                            class="rounded-2 img-small m-1" alt="img1">
                                                    </div>

                                                    <div>
                                                        {{ $g->gear_name }}
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                            <div></div>
                        </div>

                        {{-- Surface Torpedo --}}
                        <div class="columns-six light-cruiser" id="light-cruiser">
                            <h3 class="altona-sans-12 mt-1">Heavy Cruiser Gun</h3>
                            <div class="tab__blue grid-col-span-3">
                                <button class="tab-links__blue light-link"
                                    onclick="openTab(event, 'light-general', 'tab-content__light', 'light-link')"
                                    id="openByDefault">General</button>
                                <button class="tab-links__blue light-link"
                                    onclick="openTab(event, 'light-light', 'tab-content__light', 'light-link')">Light</button>
                                <button class="tab-links__blue light-link"
                                    onclick="openTab(event, 'light-med', 'tab-content__light', 'light-link')">Med</button>
                                <button class="tab-links__blue light-link"
                                    onclick="openTab(event, 'light-heavy', 'tab-content__light', 'light-link')">Heavy</button>
                            </div>
                            <div class="grid-col-span-2"></div>
                            <div></div>
                            <div class="grid-col-span-3">
                                <div class="columns-eight mb-3 altona-sans-12">
                                    <div class="mx-auto">Mob</div>
                                    <div class="grid-col-span-2 mx-auto">Boss (Armor)</div>
                                </div>
                                <div class="tab-content__light  fadeIn" id="light-general">
                                    <div class="d-flex gap-3">
                                        @foreach ($ship->gears as $g)
                                            @if ($g->gear_type == 'Light Cruiser Gun' && $g->pivot->gear_category == 'General')
                                                <div class="text-center">
                                                    <div class="pill-dark">
                                                        <img src="/img/gears/{{ $g->gear_img }}"
                                                            class="rounded-2 img-small m-1" alt="img1">
                                                    </div>

                                                    <div>
                                                        {{ $g->gear_name }}
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                                <div class="tab-content__light fadeIn" id="light-light">
                                    <div class="d-flex gap-3">
                                        <div class="text-center">
                                            @foreach ($ship->gears as $g)
                                                @if ($g->gear_type == 'Light Cruiser Gun' && $g->pivot->gear_category == 'Light')
                                                    <div class="text-center">
                                                        <div class="pill-dark">
                                                            <img src="/img/gears/{{ $g->gear_img }}"
                                                                class="rounded-2 img-small m-1" alt="img1">
                                                        </div>

                                                        <div>
                                                            {{ $g->gear_name }}
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-content__light fadeIn" id="light-med">
                                    <div class="d-flex gap-3">
                                        @foreach ($ship->gears as $g)
                                            @if ($g->gear_type == 'Light Cruiser Gun' && $g->pivot->gear_category == 'Medium')
                                                <div class="text-center">
                                                    <div class="pill-dark">
                                                        <img src="/img/gears/{{ $g->gear_img }}"
                                                            class="rounded-2 img-small m-1" alt="img1">
                                                    </div>
                                                    <div>
                                                        {{ $g->gear_name }}
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                                <div class="tab-content__light fadeIn" id="light-heavy">
                                    <div class="d-flex gap-3">
                                        @foreach ($ship->gears as $g)
                                            @if ($g->gear_type == 'Light Cruiser Gun' && $g->pivot->gear_category == 'Heavy')
                                                <div class="text-center">
                                                    <div class="pill-dark">
                                                        <img src="/img/gears/{{ $g->gear_img }}"
                                                            class="rounded-2 img-small m-1" alt="img1">
                                                    </div>

                                                    <div>
                                                        {{ $g->gear_name }}
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                            <div></div>
                        </div>

                        {{-- Submarine Torpedo --}}
                        <div class="columns-six light-cruiser" id="light-cruiser">
                            <h3 class="altona-sans-12 mt-1">Heavy Cruiser Gun</h3>
                            <div class="tab__blue grid-col-span-3">
                                <button class="tab-links__blue light-link"
                                    onclick="openTab(event, 'light-general', 'tab-content__light', 'light-link')"
                                    id="openByDefault">General</button>
                                <button class="tab-links__blue light-link"
                                    onclick="openTab(event, 'light-light', 'tab-content__light', 'light-link')">Light</button>
                                <button class="tab-links__blue light-link"
                                    onclick="openTab(event, 'light-med', 'tab-content__light', 'light-link')">Med</button>
                                <button class="tab-links__blue light-link"
                                    onclick="openTab(event, 'light-heavy', 'tab-content__light', 'light-link')">Heavy</button>
                            </div>
                            <div class="grid-col-span-2"></div>
                            <div></div>
                            <div class="grid-col-span-3">
                                <div class="columns-eight mb-3 altona-sans-12">
                                    <div class="mx-auto">Mob</div>
                                    <div class="grid-col-span-2 mx-auto">Boss (Armor)</div>
                                </div>
                                <div class="tab-content__light  fadeIn" id="light-general">
                                    <div class="d-flex gap-3">
                                        @foreach ($ship->gears as $g)
                                            @if ($g->gear_type == 'Light Cruiser Gun' && $g->pivot->gear_category == 'General')
                                                <div class="text-center">
                                                    <div class="pill-dark">
                                                        <img src="/img/gears/{{ $g->gear_img }}"
                                                            class="rounded-2 img-small m-1" alt="img1">
                                                    </div>

                                                    <div>
                                                        {{ $g->gear_name }}
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                                <div class="tab-content__light fadeIn" id="light-light">
                                    <div class="d-flex gap-3">
                                        <div class="text-center">
                                            @foreach ($ship->gears as $g)
                                                @if ($g->gear_type == 'Light Cruiser Gun' && $g->pivot->gear_category == 'Light')
                                                    <div class="text-center">
                                                        <div class="pill-dark">
                                                            <img src="/img/gears/{{ $g->gear_img }}"
                                                                class="rounded-2 img-small m-1" alt="img1">
                                                        </div>

                                                        <div>
                                                            {{ $g->gear_name }}
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-content__light fadeIn" id="light-med">
                                    <div class="d-flex gap-3">
                                        @foreach ($ship->gears as $g)
                                            @if ($g->gear_type == 'Light Cruiser Gun' && $g->pivot->gear_category == 'Medium')
                                                <div class="text-center">
                                                    <div class="pill-dark">
                                                        <img src="/img/gears/{{ $g->gear_img }}"
                                                            class="rounded-2 img-small m-1" alt="img1">
                                                    </div>
                                                    <div>
                                                        {{ $g->gear_name }}
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                                <div class="tab-content__light fadeIn" id="light-heavy">
                                    <div class="d-flex gap-3">
                                        @foreach ($ship->gears as $g)
                                            @if ($g->gear_type == 'Light Cruiser Gun' && $g->pivot->gear_category == 'Heavy')
                                                <div class="text-center">
                                                    <div class="pill-dark">
                                                        <img src="/img/gears/{{ $g->gear_img }}"
                                                            class="rounded-2 img-small m-1" alt="img1">
                                                    </div>

                                                    <div>
                                                        {{ $g->gear_name }}
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                            <div></div>
                        </div>

                        {{-- Fighter --}}
                        <div class="columns-six light-cruiser" id="light-cruiser">
                            <h3 class="altona-sans-12 mt-1">Heavy Cruiser Gun</h3>
                            <div class="tab__blue grid-col-span-3">
                                <button class="tab-links__blue light-link"
                                    onclick="openTab(event, 'light-general', 'tab-content__light', 'light-link')"
                                    id="openByDefault">General</button>
                                <button class="tab-links__blue light-link"
                                    onclick="openTab(event, 'light-light', 'tab-content__light', 'light-link')">Light</button>
                                <button class="tab-links__blue light-link"
                                    onclick="openTab(event, 'light-med', 'tab-content__light', 'light-link')">Med</button>
                                <button class="tab-links__blue light-link"
                                    onclick="openTab(event, 'light-heavy', 'tab-content__light', 'light-link')">Heavy</button>
                            </div>
                            <div class="grid-col-span-2"></div>
                            <div></div>
                            <div class="grid-col-span-3">
                                <div class="columns-eight mb-3 altona-sans-12">
                                    <div class="mx-auto">Mob</div>
                                    <div class="grid-col-span-2 mx-auto">Boss (Armor)</div>
                                </div>
                                <div class="tab-content__light  fadeIn" id="light-general">
                                    <div class="d-flex gap-3">
                                        @foreach ($ship->gears as $g)
                                            @if ($g->gear_type == 'Light Cruiser Gun' && $g->pivot->gear_category == 'General')
                                                <div class="text-center">
                                                    <div class="pill-dark">
                                                        <img src="/img/gears/{{ $g->gear_img }}"
                                                            class="rounded-2 img-small m-1" alt="img1">
                                                    </div>

                                                    <div>
                                                        {{ $g->gear_name }}
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                                <div class="tab-content__light fadeIn" id="light-light">
                                    <div class="d-flex gap-3">
                                        <div class="text-center">
                                            @foreach ($ship->gears as $g)
                                                @if ($g->gear_type == 'Light Cruiser Gun' && $g->pivot->gear_category == 'Light')
                                                    <div class="text-center">
                                                        <div class="pill-dark">
                                                            <img src="/img/gears/{{ $g->gear_img }}"
                                                                class="rounded-2 img-small m-1" alt="img1">
                                                        </div>

                                                        <div>
                                                            {{ $g->gear_name }}
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-content__light fadeIn" id="light-med">
                                    <div class="d-flex gap-3">
                                        @foreach ($ship->gears as $g)
                                            @if ($g->gear_type == 'Light Cruiser Gun' && $g->pivot->gear_category == 'Medium')
                                                <div class="text-center">
                                                    <div class="pill-dark">
                                                        <img src="/img/gears/{{ $g->gear_img }}"
                                                            class="rounded-2 img-small m-1" alt="img1">
                                                    </div>
                                                    <div>
                                                        {{ $g->gear_name }}
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                                <div class="tab-content__light fadeIn" id="light-heavy">
                                    <div class="d-flex gap-3">
                                        @foreach ($ship->gears as $g)
                                            @if ($g->gear_type == 'Light Cruiser Gun' && $g->pivot->gear_category == 'Heavy')
                                                <div class="text-center">
                                                    <div class="pill-dark">
                                                        <img src="/img/gears/{{ $g->gear_img }}"
                                                            class="rounded-2 img-small m-1" alt="img1">
                                                    </div>

                                                    <div>
                                                        {{ $g->gear_name }}
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                            <div></div>
                        </div>

                        {{-- Dive Bomber --}}
                        <div class="columns-six light-cruiser" id="light-cruiser">
                            <h3 class="altona-sans-12 mt-1">Heavy Cruiser Gun</h3>
                            <div class="tab__blue grid-col-span-3">
                                <button class="tab-links__blue light-link"
                                    onclick="openTab(event, 'light-general', 'tab-content__light', 'light-link')"
                                    id="openByDefault">General</button>
                                <button class="tab-links__blue light-link"
                                    onclick="openTab(event, 'light-light', 'tab-content__light', 'light-link')">Light</button>
                                <button class="tab-links__blue light-link"
                                    onclick="openTab(event, 'light-med', 'tab-content__light', 'light-link')">Med</button>
                                <button class="tab-links__blue light-link"
                                    onclick="openTab(event, 'light-heavy', 'tab-content__light', 'light-link')">Heavy</button>
                            </div>
                            <div class="grid-col-span-2"></div>
                            <div></div>
                            <div class="grid-col-span-3">
                                <div class="columns-eight mb-3 altona-sans-12">
                                    <div class="mx-auto">Mob</div>
                                    <div class="grid-col-span-2 mx-auto">Boss (Armor)</div>
                                </div>
                                <div class="tab-content__light  fadeIn" id="light-general">
                                    <div class="d-flex gap-3">
                                        @foreach ($ship->gears as $g)
                                            @if ($g->gear_type == 'Light Cruiser Gun' && $g->pivot->gear_category == 'General')
                                                <div class="text-center">
                                                    <div class="pill-dark">
                                                        <img src="/img/gears/{{ $g->gear_img }}"
                                                            class="rounded-2 img-small m-1" alt="img1">
                                                    </div>

                                                    <div>
                                                        {{ $g->gear_name }}
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                                <div class="tab-content__light fadeIn" id="light-light">
                                    <div class="d-flex gap-3">
                                        <div class="text-center">
                                            @foreach ($ship->gears as $g)
                                                @if ($g->gear_type == 'Light Cruiser Gun' && $g->pivot->gear_category == 'Light')
                                                    <div class="text-center">
                                                        <div class="pill-dark">
                                                            <img src="/img/gears/{{ $g->gear_img }}"
                                                                class="rounded-2 img-small m-1" alt="img1">
                                                        </div>

                                                        <div>
                                                            {{ $g->gear_name }}
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-content__light fadeIn" id="light-med">
                                    <div class="d-flex gap-3">
                                        @foreach ($ship->gears as $g)
                                            @if ($g->gear_type == 'Light Cruiser Gun' && $g->pivot->gear_category == 'Medium')
                                                <div class="text-center">
                                                    <div class="pill-dark">
                                                        <img src="/img/gears/{{ $g->gear_img }}"
                                                            class="rounded-2 img-small m-1" alt="img1">
                                                    </div>
                                                    <div>
                                                        {{ $g->gear_name }}
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                                <div class="tab-content__light fadeIn" id="light-heavy">
                                    <div class="d-flex gap-3">
                                        @foreach ($ship->gears as $g)
                                            @if ($g->gear_type == 'Light Cruiser Gun' && $g->pivot->gear_category == 'Heavy')
                                                <div class="text-center">
                                                    <div class="pill-dark">
                                                        <img src="/img/gears/{{ $g->gear_img }}"
                                                            class="rounded-2 img-small m-1" alt="img1">
                                                    </div>

                                                    <div>
                                                        {{ $g->gear_name }}
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                            <div></div>
                        </div>

                        {{-- Seaplane --}}
                        <div class="columns-six light-cruiser" id="light-cruiser">
                            <h3 class="altona-sans-12 mt-1">Heavy Cruiser Gun</h3>
                            <div class="tab__blue grid-col-span-3">
                                <button class="tab-links__blue light-link"
                                    onclick="openTab(event, 'light-general', 'tab-content__light', 'light-link')"
                                    id="openByDefault">General</button>
                                <button class="tab-links__blue light-link"
                                    onclick="openTab(event, 'light-light', 'tab-content__light', 'light-link')">Light</button>
                                <button class="tab-links__blue light-link"
                                    onclick="openTab(event, 'light-med', 'tab-content__light', 'light-link')">Med</button>
                                <button class="tab-links__blue light-link"
                                    onclick="openTab(event, 'light-heavy', 'tab-content__light', 'light-link')">Heavy</button>
                            </div>
                            <div class="grid-col-span-2"></div>
                            <div></div>
                            <div class="grid-col-span-3">
                                <div class="columns-eight mb-3 altona-sans-12">
                                    <div class="mx-auto">Mob</div>
                                    <div class="grid-col-span-2 mx-auto">Boss (Armor)</div>
                                </div>
                                <div class="tab-content__light  fadeIn" id="light-general">
                                    <div class="d-flex gap-3">
                                        @foreach ($ship->gears as $g)
                                            @if ($g->gear_type == 'Light Cruiser Gun' && $g->pivot->gear_category == 'General')
                                                <div class="text-center">
                                                    <div class="pill-dark">
                                                        <img src="/img/gears/{{ $g->gear_img }}"
                                                            class="rounded-2 img-small m-1" alt="img1">
                                                    </div>

                                                    <div>
                                                        {{ $g->gear_name }}
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                                <div class="tab-content__light fadeIn" id="light-light">
                                    <div class="d-flex gap-3">
                                        <div class="text-center">
                                            @foreach ($ship->gears as $g)
                                                @if ($g->gear_type == 'Light Cruiser Gun' && $g->pivot->gear_category == 'Light')
                                                    <div class="text-center">
                                                        <div class="pill-dark">
                                                            <img src="/img/gears/{{ $g->gear_img }}"
                                                                class="rounded-2 img-small m-1" alt="img1">
                                                        </div>

                                                        <div>
                                                            {{ $g->gear_name }}
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-content__light fadeIn" id="light-med">
                                    <div class="d-flex gap-3">
                                        @foreach ($ship->gears as $g)
                                            @if ($g->gear_type == 'Light Cruiser Gun' && $g->pivot->gear_category == 'Medium')
                                                <div class="text-center">
                                                    <div class="pill-dark">
                                                        <img src="/img/gears/{{ $g->gear_img }}"
                                                            class="rounded-2 img-small m-1" alt="img1">
                                                    </div>
                                                    <div>
                                                        {{ $g->gear_name }}
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                                <div class="tab-content__light fadeIn" id="light-heavy">
                                    <div class="d-flex gap-3">
                                        @foreach ($ship->gears as $g)
                                            @if ($g->gear_type == 'Light Cruiser Gun' && $g->pivot->gear_category == 'Heavy')
                                                <div class="text-center">
                                                    <div class="pill-dark">
                                                        <img src="/img/gears/{{ $g->gear_img }}"
                                                            class="rounded-2 img-small m-1" alt="img1">
                                                    </div>

                                                    <div>
                                                        {{ $g->gear_name }}
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                            <div></div>
                        </div>

                        {{-- AA Gun --}}
                        <div class="columns-six light-cruiser" id="light-cruiser">
                            <h3 class="altona-sans-12 mt-1">Heavy Cruiser Gun</h3>
                            <div class="tab__blue grid-col-span-3">
                                <button class="tab-links__blue light-link"
                                    onclick="openTab(event, 'light-general', 'tab-content__light', 'light-link')"
                                    id="openByDefault">General</button>
                                <button class="tab-links__blue light-link"
                                    onclick="openTab(event, 'light-light', 'tab-content__light', 'light-link')">Light</button>
                                <button class="tab-links__blue light-link"
                                    onclick="openTab(event, 'light-med', 'tab-content__light', 'light-link')">Med</button>
                                <button class="tab-links__blue light-link"
                                    onclick="openTab(event, 'light-heavy', 'tab-content__light', 'light-link')">Heavy</button>
                            </div>
                            <div class="grid-col-span-2"></div>
                            <div></div>
                            <div class="grid-col-span-3">
                                <div class="columns-eight mb-3 altona-sans-12">
                                    <div class="mx-auto">Mob</div>
                                    <div class="grid-col-span-2 mx-auto">Boss (Armor)</div>
                                </div>
                                <div class="tab-content__light  fadeIn" id="light-general">
                                    <div class="d-flex gap-3">
                                        @foreach ($ship->gears as $g)
                                            @if ($g->gear_type == 'Light Cruiser Gun' && $g->pivot->gear_category == 'General')
                                                <div class="text-center">
                                                    <div class="pill-dark">
                                                        <img src="/img/gears/{{ $g->gear_img }}"
                                                            class="rounded-2 img-small m-1" alt="img1">
                                                    </div>

                                                    <div>
                                                        {{ $g->gear_name }}
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                                <div class="tab-content__light fadeIn" id="light-light">
                                    <div class="d-flex gap-3">
                                        <div class="text-center">
                                            @foreach ($ship->gears as $g)
                                                @if ($g->gear_type == 'Light Cruiser Gun' && $g->pivot->gear_category == 'Light')
                                                    <div class="text-center">
                                                        <div class="pill-dark">
                                                            <img src="/img/gears/{{ $g->gear_img }}"
                                                                class="rounded-2 img-small m-1" alt="img1">
                                                        </div>

                                                        <div>
                                                            {{ $g->gear_name }}
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-content__light fadeIn" id="light-med">
                                    <div class="d-flex gap-3">
                                        @foreach ($ship->gears as $g)
                                            @if ($g->gear_type == 'Light Cruiser Gun' && $g->pivot->gear_category == 'Medium')
                                                <div class="text-center">
                                                    <div class="pill-dark">
                                                        <img src="/img/gears/{{ $g->gear_img }}"
                                                            class="rounded-2 img-small m-1" alt="img1">
                                                    </div>
                                                    <div>
                                                        {{ $g->gear_name }}
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                                <div class="tab-content__light fadeIn" id="light-heavy">
                                    <div class="d-flex gap-3">
                                        @foreach ($ship->gears as $g)
                                            @if ($g->gear_type == 'Light Cruiser Gun' && $g->pivot->gear_category == 'Heavy')
                                                <div class="text-center">
                                                    <div class="pill-dark">
                                                        <img src="/img/gears/{{ $g->gear_img }}"
                                                            class="rounded-2 img-small m-1" alt="img1">
                                                    </div>

                                                    <div>
                                                        {{ $g->gear_name }}
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                            <div></div>
                        </div>

                        {{-- Auxiliary Equipment --}}
                        <div class="columns-six light-cruiser" id="light-cruiser">
                            <h3 class="altona-sans-12 mt-1">Heavy Cruiser Gun</h3>
                            <div class="tab__blue grid-col-span-3">
                                <button class="tab-links__blue light-link"
                                    onclick="openTab(event, 'light-general', 'tab-content__light', 'light-link')"
                                    id="openByDefault">General</button>
                                <button class="tab-links__blue light-link"
                                    onclick="openTab(event, 'light-light', 'tab-content__light', 'light-link')">Light</button>
                                <button class="tab-links__blue light-link"
                                    onclick="openTab(event, 'light-med', 'tab-content__light', 'light-link')">Med</button>
                                <button class="tab-links__blue light-link"
                                    onclick="openTab(event, 'light-heavy', 'tab-content__light', 'light-link')">Heavy</button>
                            </div>
                            <div class="grid-col-span-2"></div>
                            <div></div>
                            <div class="grid-col-span-3">
                                <div class="columns-eight mb-3 altona-sans-12">
                                    <div class="mx-auto">Mob</div>
                                    <div class="grid-col-span-2 mx-auto">Boss (Armor)</div>
                                </div>
                                <div class="tab-content__light  fadeIn" id="light-general">
                                    <div class="d-flex gap-3">
                                        @foreach ($ship->gears as $g)
                                            @if ($g->gear_type == 'Light Cruiser Gun' && $g->pivot->gear_category == 'General')
                                                <div class="text-center">
                                                    <div class="pill-dark">
                                                        <img src="/img/gears/{{ $g->gear_img }}"
                                                            class="rounded-2 img-small m-1" alt="img1">
                                                    </div>

                                                    <div>
                                                        {{ $g->gear_name }}
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                                <div class="tab-content__light fadeIn" id="light-light">
                                    <div class="d-flex gap-3">
                                        <div class="text-center">
                                            @foreach ($ship->gears as $g)
                                                @if ($g->gear_type == 'Light Cruiser Gun' && $g->pivot->gear_category == 'Light')
                                                    <div class="text-center">
                                                        <div class="pill-dark">
                                                            <img src="/img/gears/{{ $g->gear_img }}"
                                                                class="rounded-2 img-small m-1" alt="img1">
                                                        </div>

                                                        <div>
                                                            {{ $g->gear_name }}
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-content__light fadeIn" id="light-med">
                                    <div class="d-flex gap-3">
                                        @foreach ($ship->gears as $g)
                                            @if ($g->gear_type == 'Light Cruiser Gun' && $g->pivot->gear_category == 'Medium')
                                                <div class="text-center">
                                                    <div class="pill-dark">
                                                        <img src="/img/gears/{{ $g->gear_img }}"
                                                            class="rounded-2 img-small m-1" alt="img1">
                                                    </div>
                                                    <div>
                                                        {{ $g->gear_name }}
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                                <div class="tab-content__light fadeIn" id="light-heavy">
                                    <div class="d-flex gap-3">
                                        @foreach ($ship->gears as $g)
                                            @if ($g->gear_type == 'Light Cruiser Gun' && $g->pivot->gear_category == 'Heavy')
                                                <div class="text-center">
                                                    <div class="pill-dark">
                                                        <img src="/img/gears/{{ $g->gear_img }}"
                                                            class="rounded-2 img-small m-1" alt="img1">
                                                    </div>

                                                    <div>
                                                        {{ $g->gear_name }}
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                            <div></div>
                        </div>

                        {{-- Augment --}}
                        <div class="columns-six light-cruiser" id="light-cruiser">
                            <h3 class="altona-sans-12 mt-1">Heavy Cruiser Gun</h3>
                            <div class="tab__blue grid-col-span-3">
                                <button class="tab-links__blue light-link"
                                    onclick="openTab(event, 'light-general', 'tab-content__light', 'light-link')"
                                    id="openByDefault">General</button>
                                <button class="tab-links__blue light-link"
                                    onclick="openTab(event, 'light-light', 'tab-content__light', 'light-link')">Light</button>
                                <button class="tab-links__blue light-link"
                                    onclick="openTab(event, 'light-med', 'tab-content__light', 'light-link')">Med</button>
                                <button class="tab-links__blue light-link"
                                    onclick="openTab(event, 'light-heavy', 'tab-content__light', 'light-link')">Heavy</button>
                            </div>
                            <div class="grid-col-span-2"></div>
                            <div></div>
                            <div class="grid-col-span-3">
                                <div class="columns-eight mb-3 altona-sans-12">
                                    <div class="mx-auto">Mob</div>
                                    <div class="grid-col-span-2 mx-auto">Boss (Armor)</div>
                                </div>
                                <div class="tab-content__light  fadeIn" id="light-general">
                                    <div class="d-flex gap-3">
                                        @foreach ($ship->gears as $g)
                                            @if ($g->gear_type == 'Light Cruiser Gun' && $g->pivot->gear_category == 'General')
                                                <div class="text-center">
                                                    <div class="pill-dark">
                                                        <img src="/img/gears/{{ $g->gear_img }}"
                                                            class="rounded-2 img-small m-1" alt="img1">
                                                    </div>

                                                    <div>
                                                        {{ $g->gear_name }}
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                                <div class="tab-content__light fadeIn" id="light-light">
                                    <div class="d-flex gap-3">
                                        <div class="text-center">
                                            @foreach ($ship->gears as $g)
                                                @if ($g->gear_type == 'Light Cruiser Gun' && $g->pivot->gear_category == 'Light')
                                                    <div class="text-center">
                                                        <div class="pill-dark">
                                                            <img src="/img/gears/{{ $g->gear_img }}"
                                                                class="rounded-2 img-small m-1" alt="img1">
                                                        </div>

                                                        <div>
                                                            {{ $g->gear_name }}
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-content__light fadeIn" id="light-med">
                                    <div class="d-flex gap-3">
                                        @foreach ($ship->gears as $g)
                                            @if ($g->gear_type == 'Light Cruiser Gun' && $g->pivot->gear_category == 'Medium')
                                                <div class="text-center">
                                                    <div class="pill-dark">
                                                        <img src="/img/gears/{{ $g->gear_img }}"
                                                            class="rounded-2 img-small m-1" alt="img1">
                                                    </div>
                                                    <div>
                                                        {{ $g->gear_name }}
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                                <div class="tab-content__light fadeIn" id="light-heavy">
                                    <div class="d-flex gap-3">
                                        @foreach ($ship->gears as $g)
                                            @if ($g->gear_type == 'Light Cruiser Gun' && $g->pivot->gear_category == 'Heavy')
                                                <div class="text-center">
                                                    <div class="pill-dark">
                                                        <img src="/img/gears/{{ $g->gear_img }}"
                                                            class="rounded-2 img-small m-1" alt="img1">
                                                    </div>

                                                    <div>
                                                        {{ $g->gear_name }}
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                            <div></div>
                        </div>
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
        </script>

    </section>

@endsection
