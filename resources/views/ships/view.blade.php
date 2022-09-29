@extends('layouts.layout')
@section('title', $ship->name)
@section('contents')
    <section class="hero">
        <div class="container">
            <div class="bg-overlay">

                {{-- ship name --}}
                <div class="columns-five">
                    <div class="grid-col-span-2"></div>
                    <h1 class="text-white grid-col-span-3">{{ $ship->name }}</h1>
                </div>

                {{-- character card --}}
                <div class="columns-five character-card" id="{{ $ship->rarity->rarity_slug }}">
                    <div class="image-wrapper grid-col-span-2">
                        <img src="{{ asset('storage/' . $ship->sprite) }}" class="image-out" alt="">
                    </div>
                    <div class="text-white my-5 grid-col-span-2 score-table">
                        <table class="score-table">
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

                    {{-- script for scores --}}
                    <script>
                        for (i = 0; i < 6; i++) {
                            scoreId = document.getElementsByClassName('sac')[0].id;
                            changeScoreColor(scoreId);
                        }
                    </script>
                    {{-- faction img and chibis --}}
                    <div class="faction-content">
                        <div class="faction" id="{{ $ship->faction->faction_slug }}">
                            <img src="{{ asset('storage/' . $ship->chibi_sprite) }}" alt="chibi">
                        </div>
                    </div>

                    {{-- script for changing faction imgs --}}
                    <script>
                        faction = document.getElementsByClassName('faction')[0].id;
                        changeFaction(faction);
                    </script>
                </div>

                {{-- skill and explanation for roles archetypes and positions --}}
                <div class="columns-two__3-6">
                    {{-- skills --}}

                    @if (count($skill) == 3)
                        <div class="d-grid my-auto">
                            <h2 class="text-white mt-2">Skill leveling prio</h2>
                            <div class="d-flex gap-3 text-white">
                                <div class="d-grid one shadow" id="{{ $skill[2]->skill_priority }}">
                                    <img src="{{ asset('storage/' . $skill[2]->skill_img) }}" alt=""
                                        class="skill-img mx-auto">
                                </div>
                                <div class="d-grid ">
                                    <span class="my-auto swiss-font-18 evaluator-1" id="evaluator-1"></span>
                                    <span></span>
                                </div>
                                <div class="d-grid two shadow" id="{{ $skill[1]->skill_priority }}">
                                    <img src="{{ asset('storage/' . $skill[1]->skill_img) }}" alt=""
                                        class="skill-img mx-auto">
                                </div>
                                <div class="d-grid">
                                    <span class="my-auto swiss-font-18 evaluator-2" id="evaluator-2"></span>
                                    <span></span>
                                </div>
                                <div class="d-grid three shadow" id="{{ $skill[0]->skill_priority }}">
                                    <img src="{{ asset('storage/' . $skill[0]->skill_img) }}" alt=""
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
                    @elseif (count($skill) == 2)
                        <div class="d-grid my-auto">
                            <h2 class="text-white mt-2">Skill leveling prio</h2>
                            <div class="d-flex gap-3 text-white">
                                <div class="d-grid one shadow" id="{{ $skill[1]->skill_priority }}">
                                    <img src="{{ asset('storage/' . $skill[1]->skill_img) }}" alt=""
                                        class="skill-img mx-auto">
                                </div>
                                <div class="d-grid">
                                    <span class="my-auto swiss-font-18 evaluator-1" id="evaluator-1"></span>
                                    <span></span>
                                </div>
                                <div class="d-grid two shadow" id="{{ $skill[0]->skill_priority }}">
                                    <img src="{{ asset('storage/' . $skill[0]->skill_img) }}" alt=""
                                        class="skill-img mx-auto">
                                </div>
                            </div>
                        </div>
                        <script>
                            one = document.getElementsByClassName('one')[0].id;
                            two = document.getElementsByClassName('two')[0].id;
                            evaluateSkills(one, two, 'evaluator-1');
                            evaluateSkills(two, three, 'evaluator-2');
                        </script>
                    @elseif (count($skill) == 1)
                        <div class="d-grid my-auto">
                            <h2 class="text-white mt-2">Skill leveling prio</h2>
                            <div class="d-flex gap-3 text-white">
                                <div class="d-grid one shadow" id="{{ $skill[0]->skill_priority }}">
                                    <img src="{{ asset('storage/' . $skill[0]->skill_img) }}" alt=""
                                        class="skill-img mx-auto">
                                </div>
                            </div>
                        </div>
                    @endif




                    {{-- details --}}
                    <div class="details-table">
                        <div class="columns-two__2-6 mt-3 gap-2 altona-sans-12 text-white">
                            <div class="swiss-font-12 mt-1">Archetype</div>
                            <div class="r-grid gap-1 flex-wrap">
                                @foreach ($ship->archetypes as $a)
                                    <div><span class="pill-dark">{{ $a->archetype_name }}</span></div>
                                @endforeach
                            </div>
                            <div class="swiss-font-12 mt-1">
                                Roles
                            </div>
                            <div class="r-grid gap-1 flex-wrap">
                                @foreach ($ship->roles as $key => $r)
                                    <div>
                                        <span class="pill-dark" style="position: relative;">{{ $r->role_name }}</span>
                                        @foreach ($r->factions as $key => $f)
                                            <span class="pl-hd" id="{{ $f->faction_tag }}"
                                                style="position: relative;left: calc({{ $key + 1 }}* -1 * .4em );">{{ $f->faction_tag }}</span>

                                            <script>
                                                var zin = (10 - {!! json_encode($key) !!});
                                                document.getElementById({!! json_encode($f->faction_tag) !!}).style.zIndex = zin;
                                                tag = document.getElementsByClassName('pl-hd')[0].id;
                                                changeFactionTag(tag);
                                            </script>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiss-font-12 mt-1">
                                Position
                            </div>
                            <div>
                                <div class="d-grid">
                                    @if ($ship->positions->position_type == 'single')
                                        <div class="pill-dark d-flex mb-1">
                                            <div class="my-auto p-3">1</div>
                                            <div class="border-left-white">
                                                <div class="d-grid">
                                                    <h5 class="mx-auto text-center altona-sans-12">
                                                        {{ $ship->positions->position_name }}
                                                    </h5>
                                                    <img src="{{ asset('storage/' . $ship->positions->position_image) }}"
                                                        alt="">
                                                </div>
                                            </div>
                                            <div class="my-auto">
                                                <p class="altona-sans-10">{{ $ship->positions->explanation }} </p>
                                            </div>
                                        </div>
                                    @else
                                        @foreach ($ship->positions->children as $c)
                                            <div class="pill-dark d-flex mb-1">
                                                <div class="my-auto p-3">1</div>
                                                <div class="border-left-white">
                                                    <div class="d-grid">
                                                        <h5 class="mx-auto mt-2 text-center altona-sans-12 cl-hd"
                                                            id="{{ $c->position_slug }}">
                                                            {{ $c->position_name }}
                                                        </h5>
                                                        <img src="{{ asset('storage/' . $c->position_image) }}"
                                                            alt="">
                                                        <script>
                                                            textId = document.getElementsByClassName('cl-hd')[0].id;
                                                            changeTextColor(textId);
                                                        </script>

                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <p class="altona-sans-10">{{ $c->explanation }} </p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- gears --}}
                <div class="text-white">

                    <div class="gears mt-2">

                        <h2 class="altona-sans-18">Gear Reccomendations</h2>
                        <hr>
                        <div class="tab__blue grid-col-span-3 mb-3">
                            <button class="tab-links__blue tab-link"
                                onclick="openTab(event, 'general', 'tab-content', 'tab-link','grid')"
                                id="openByDefault">General</button>
                            <button class="tab-links__blue tab-link"
                                onclick="openTab(event, 'light', 'tab-content', 'tab-link','grid')">Light</button>
                            <button class="tab-links__blue tab-link"
                                onclick="openTab(event, 'med', 'tab-content', 'tab-link','grid')">Med</button>
                            <button class="tab-links__blue tab-link"
                                onclick="openTab(event, 'heavy', 'tab-content', 'tab-link','grid')">Heavy</button>
                        </div>

                        <div class="tab-content" id="general">
                            @for ($i = 1; $i < 7; $i++)
                                <div class="columns-six">
                                    @if ($i == 6)
                                        <h3 class="altona-sans-12 mt-1">
                                            Augment
                                        </h3>
                                    @else
                                        <h3 class="altona-sans-12 mt-1">
                                            Slot {{ $i }}
                                        </h3>
                                    @endif

                                    <div class="fadeIn grid-col-span-4">
                                        <div class="d-flex gap-3 r-overflow-x flex-wrap" style="min-height: 10em;">
                                            @foreach ($ship->template->gears as $g)
                                                @if ($g->pivot->gear_slot == $i && $g->pivot->gear_category == 'General')
                                                    <div class="text-center d-grid">
                                                        <div class="pill-dark pl-hd mx-auto shadow"
                                                            id="{{ $g->gear_rarity }}">
                                                            <img src="{{ asset('storage/' . $g->gear_img) }}"
                                                                class="rounded-2 img-small m-1" alt="img1">
                                                        </div>

                                                        <div class="medium-label altona-sans-10">
                                                            {{ $g->gear_name }}
                                                        </div>
                                                    </div>

                                                    <script>
                                                        gearR = document.getElementsByClassName('pl-hd')[0].id;
                                                        changeGear(gearR);
                                                    </script>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>


                            @endfor
                        </div>

                        <div class="tab-content" id="light">
                            @for ($i = 1; $i < 7; $i++)
                                <div class="columns-six">
                                    @if ($i == 6)
                                        <h3 class="altona-sans-12 mt-1">
                                            Augment
                                        </h3>
                                    @else
                                        <h3 class="altona-sans-12 mt-1">
                                            Slot {{ $i }}
                                        </h3>
                                    @endif

                                    <div class="fadeIn grid-col-span-4 ">
                                        <div class="d-flex gap-3 r-overflow-x flex-wrap" style="min-height: 10em;">
                                            @foreach ($ship->template->gears as $g)
                                                @if ($g->pivot->gear_slot == $i && $g->pivot->gear_category == 'Light')
                                                    <div class="text-center d-grid">
                                                        <div class="pill-dark pl-hd mx-auto shadow"
                                                            id="{{ $g->gear_rarity }}">
                                                            <img src="{{ asset('storage/' . $g->gear_img) }}"
                                                                class="rounded-2 img-small m-1" alt="img1">
                                                        </div>

                                                        <div class="medium-label altona-sans-10">
                                                            {{ $g->gear_name }}
                                                        </div>

                                                    </div>

                                                    <script>
                                                        gearR = document.getElementsByClassName('pl-hd')[0].id;
                                                        changeGear(gearR);
                                                    </script>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>

                        <div class="tab-content" id="med">
                            @for ($i = 1; $i < 7; $i++)
                                <div class="columns-six">
                                    @if ($i == 6)
                                        <h3 class="altona-sans-12 mt-1">
                                            Augment
                                        </h3>
                                    @else
                                        <h3 class="altona-sans-12 mt-1">
                                            Slot {{ $i }}
                                        </h3>
                                    @endif

                                    <div class="fadeIn grid-col-span-4 ">
                                        <div class="d-flex gap-3 r-overflow-x flex-wrap" style="min-height: 10em;">
                                            @foreach ($ship->template->gears as $g)
                                                @if ($g->pivot->gear_slot == $i && $g->pivot->gear_category == 'Medium')
                                                    <div class="text-center d-grid">
                                                        <div class="pill-dark pl-hd mx-auto shadow"
                                                            id="{{ $g->gear_rarity }}">
                                                            <img src="{{ asset('storage/' . $g->gear_img) }}"
                                                                class="rounded-2 img-small m-1" alt="img1">
                                                        </div>

                                                        <div class="medium-label altona-sans-10">
                                                            {{ $g->gear_name }}
                                                        </div>

                                                    </div>

                                                    <script>
                                                        gearR = document.getElementsByClassName('pl-hd')[0].id;
                                                        changeGear(gearR);
                                                    </script>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>

                        <div class="tab-content" id="heavy">
                            @for ($i = 1; $i < 7; $i++)
                                <div class="columns-six">
                                    @if ($i == 6)
                                        <h3 class="altona-sans-12 mt-1">
                                            Augment
                                        </h3>
                                    @else
                                        <h3 class="altona-sans-12 mt-1">
                                            Slot {{ $i }}
                                        </h3>
                                    @endif

                                    <div class="fadeIn grid-col-span-4 ">
                                        <div class="d-flex gap-3 r-overflow-x flex-wrap" style="min-height: 10em;">
                                            @foreach ($ship->template->gears as $g)
                                                @if ($g->pivot->gear_slot == $i && $g->pivot->gear_category == 'Heavy')
                                                    <div class="text-center d-grid">
                                                        <div class="pill-dark pl-hd mx-auto shadow"
                                                            id="{{ $g->gear_rarity }}">
                                                            <img src="{{ asset('storage/' . $g->gear_img) }}"
                                                                class="rounded-2 img-small m-1" alt="img1">
                                                        </div>

                                                        <div class="medium-label altona-sans-10">
                                                            {{ $g->gear_name }}
                                                        </div>

                                                    </div>

                                                    <script>
                                                        gearR = document.getElementsByClassName('pl-hd')[0].id;
                                                        changeGear(gearR);
                                                    </script>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>

                    </div>
                    <hr>
                    <div class="explanation mt-5">

                        <h2 class="altona-sans-18">Explanation</h2>

                        <p class="altona-sans-12">
                            {{ $ship->notes }}
                        </p>
                    </div>

                </div>
            </div>
        </div>

        <script>
            idCard = document.getElementsByClassName('character-card')[0].id;
            changeFrame(idCard);
            document.getElementById('openByDefault').click();
        </script>

    </section>

@endsection
