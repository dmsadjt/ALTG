<div class="text-white">

    <div class="columns-two__4-2">

        <div class="columns-two__1-5">
            <div class="d-grid mb-2">

                <label for="hull">
                    <h3 class=" swiss-font-12">Hull Type</h3>
                </label>
                <div class="wrapper bg-gray1 p-1 rounded">
                    <img src="img/hulls/{{ $shipImage->hull_img }}" alt="{{ $byHull }}">
                    <select wire:model="byHull" name="hull" id="hull"
                        class="hull-type d-grid text-center altona-sans-12 mt-1 bg-gray1 text-white border-white rounded">
                        @foreach ($hulls as $key => $h)
                            @if ($key == 0)
                                @continue;
                            @endif
                            <option class="mx-auto mt-auto mb-2 altona-sans-12"
                                hull-img="/img/hulls/{{ $h->hull_img }}" value="{{ $h->id }}">
                                {{ $h->hull_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div>
                <div class="autocomplete">
                    <label for="role">
                        <h3 class="swiss-font-12">Role Tags</h3>
                    </label>
                    <input wire:model="byRole" type="text" name="role" id="role" class="text-form">
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
                                    this.value = terms.join(",");
                                    return false;
                                }
                            });
                    });
                </script>
                <div class="columns-two__4-2 mt-2">
                    <div class="me-2">
                        <div>
                            <div class="swiss-font-12">
                                Rarity
                            </div>
                            <div>
                                <ul class="filter-list bg-gray1 rounded d-flex fit-content">
                                    @foreach ($rarity as $key => $r)
                                        <li>
                                            <input wire:model="rarities" class="filter-option" type="checkbox"
                                                id="{{ $r->rarity_name }}" value="{{ $r->rarity_slug }}">
                                            <label class="filter-label altona-sans-10 rounded px-2 m-1"
                                                for="{{ $r->rarity_name }}">{{ $r->rarity_tag }}
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div>
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
                                            <input wire:model="byFactions" class="filter-option" type="checkbox"
                                                id="{{ $r->faction_tag }}" value="{{ $r->faction_slug }}">
                                            <label class="filter-label altona-sans-10 m-1 rounded px-2"
                                                for="{{ $r->faction_tag }}">{{ $r->faction_tag }}
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex mt-2">
                        <select wire:model="position" name="position" id="position"
                            class="pill-dark altona-sans-12 text-center button-square">
                            <option value="">None</option>
                            <option value="tank">Tank</option>
                            <option value="offtank">Offtank</option>
                            <option value="flagship">Flagship</option>
                            <option value="mid">Mid</option>
                            <option value="any">Any</option>
                        </select>
                    </div>

                </div>
            </div>
        </div>

        <div class="px-5">
            <hr>
            <h2 class="swiss-font-18">View Scores by</h2>
            <h3 class="swiss-font-12">Mob/Boss</h2>
                <div class="columns-two mb-2 mob-boss">
                    <div class="button-square btn btn-dark d-grid score-type ms-auto">
                        <label for="mob">
                            <img class="mx-auto mt-auto img-small" src="{{ url('/img/web-assets/mob.png') }}"
                                alt="">
                            Mob
                        </label>
                        <input type="radio" wire:model="score" value="Mob" id="mob" class="filter-option">
                    </div>
                    <div class="button-square btn btn-dark d-grid score-type me-auto">

                        <label for="boss">
                            <img class="mx-auto mt-auto img-small" src="{{ url('/img/web-assets/boss.png') }}"
                                alt="">
                            Boss
                        </label>
                        <input type="radio" wire:model="score" value="Boss" id="boss" class="filter-option">
                    </div>
                </div>
                <h3 class="swiss-font-12">Chapters</h2>
                    <div class="columns-three">
                        <div class="nav-link btn btn-dark score-link altona-sans-12 p-1">
                            <label for="911">W 9-11</label>
                            <input type="radio" wire:model="score" value="W 9-11" id="911"
                                class="filter-option">
                        </div>
                        <div class="nav-link btn btn-dark score-link altona-sans-12 p-1">
                            <label for="1213">W 12-13</label>
                            <input type="radio" wire:model="score" value="W 12-13" id="1213"
                                class="filter-option">
                        </div>
                        <div class="nav-link btn btn-dark score-link altona-sans-12 p-1">
                            <label for="14">W 14</label>
                            <input type="radio" wire:model="score" value="W 14" id="14"
                                class="filter-option">
                        </div>
                    </div>
                    <hr>
        </div>
    </div>

    {{ var_export($byHull) }}
    {{ var_export($rarities) }}
    {{ var_export($byFactions) }}
    {{ var_export($position) }}
    {{ var_export($byRole) }}

    <div wire:loading class="d-grid"><span wire:loading class="mx-auto altona-sans-18">Loading...</span></div>
    <div wire:loading.remove>
        <h1>{{ $shipImage->hull_name }} {{ $score }} Score</h1>
        <table class="ship-table">
            <thead class="bg-gray1 text-white altona-sans-12">
                <th class="text-black-50">#</th>
                <th>Ship name</th>
                <th>Ship role</th>
                <th>Ship archetype</th>
                <th>Position</th>

                @if ($score == 'Mob')
                    <th class="">@sortablelink('mobScore.mob_9_11', '9-11')</th>
                    <th class="">@sortablelink('mobScore.mob_12_13', '12-13')</th>
                    <th class="">@sortablelink('mobScore.mob_14', '14')</th>
                @elseif ($score == 'Boss')
                    <th class="">@sortablelink('bossScore.boss_9_11', '9-11')</th>
                    <th class="">@sortablelink('bossScore.boss_12_13', '12-13')</th>
                    <th class="">@sortablelink('bossScore.boss_14', '14')</th>
                @elseif ($score = 'W 9-11')
                    <th class="">@sortablelink('mobScore.mob_9_11', 'Mob')</th>
                    <th class="">@sortablelink('bossScore.boss_9_11', 'Boss')</th>
                @elseif ($score = 'W 12-13')
                    <th class="">@sortablelink('mobScore.mob_12_13', 'Mob')</th>
                    <th class="">@sortablelink('bossScore.boss_12_13', 'Boss')</th>
                @elseif ($score = 'W 14')
                    <th class="">@sortablelink('mobScore.mob_14', 'Mob')</th>
                    <th class="">@sortablelink('bossScore.boss_14', 'Boss')</th>
                @endif
            </thead>
            <tbody>
                @foreach ($ships as $s)
                    <tr class="text-white shadow">
                        <td class="rarity-tag" data-rarity="{{ $s->rarity->rarity_tag }}">
                            <span class="rotate--90 justify-content-center">{{ $s->rarity->rarity_tag }}</span>
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
                                    src="/img/positions/{{ $s->positions->position_image }}" alt="position">
                            </div>
                        </td>

                        {{-- Mob Score --}}
                        @if ($score == 'Mob')
                            <td class="bg-gray1 border-left-white ">
                                <div class="score-box mx-auto"
                                    data-score="{{ number_format($s->mobScore->mob_9_11, 1) }}">
                                    <div class="score swiss-font-18">
                                        {{ number_format($s->mobScore->mob_9_11, 1) }}
                                    </div>
                                </div>
                            </td>
                            <td class="bg-gray1  ">
                                <div class="score-box mx-auto"
                                    data-score="{{ number_format($s->mobScore->mob_12_13, 1) }}">
                                    <div class="score swiss-font-18">
                                        {{ number_format($s->mobScore->mob_12_13, 1) }}
                                    </div>
                                </div>
                            </td>
                            <td class="bg-gray1 ">
                                <div class="score-box mx-auto"
                                    data-score="{{ number_format($s->mobScore->mob_14, 1) }}">
                                    <div class="score swiss-font-18">
                                        {{ number_format($s->mobScore->mob_14, 1) }}
                                    </div>
                                </div>
                            </td>

                            {{-- Boss Score --}}
                        @elseif ($score == 'Boss')
                            <td class="bg-gray1 border-left-white ">
                                <div class="score-box mx-auto"
                                    data-score="{{ number_format($s->bossScore->boss_9_11, 1) }}">
                                    <div class="score swiss-font-18">
                                        {{ number_format($s->bossScore->boss_9_11, 1) }}
                                    </div>
                                </div>
                            </td>
                            <td class="bg-gray1  ">
                                <div class="score-box mx-auto"
                                    data-score="{{ number_format($s->bossScore->boss_12_13, 1) }}">
                                    <div class="score swiss-font-18">
                                        {{ number_format($s->bossScore->boss_12_13, 1) }}
                                    </div>
                                </div>
                            </td>
                            <td class="bg-gray1 ">
                                <div class="score-box mx-auto"
                                    data-score="{{ number_format($s->bossScore->boss_14, 1) }}">
                                    <div class="score swiss-font-18">
                                        {{ number_format($s->bossScore->boss_14, 1) }}
                                    </div>
                                </div>
                            </td>

                            {{-- 9-11 Score --}}
                        @elseif ($score = 'W 9-11')
                            <td class="bg-gray1 border-left-white ">
                                <div class="score-box mx-auto"
                                    data-score="{{ number_format($s->mobScore->mob_9_11, 1) }}">
                                    <div class="score swiss-font-18">
                                        {{ number_format($s->mobScore->mob_9_11, 1) }}
                                    </div>
                                </div>
                            </td>
                            <td class="bg-gray1 border-left-white ">
                                <div class="score-box mx-auto"
                                    data-score="{{ number_format($s->bossScore->boss_9_11, 1) }}">
                                    <div class="score swiss-font-18">
                                        {{ number_format($s->bossScore->boss_9_11, 1) }}
                                    </div>
                                </div>
                            </td>

                            {{-- 12-13 Score --}}
                        @elseif ($score = 'W 12-13')
                            <td class="bg-gray1  ">
                                <div class="score-box mx-auto"
                                    data-score="{{ number_format($s->mobScore->mob_12_13, 1) }}">
                                    <div class="score swiss-font-18">
                                        {{ number_format($s->mobScore->mob_12_13, 1) }}
                                    </div>
                                </div>
                            </td>
                            <td class="bg-gray1  ">
                                <div class="score-box mx-auto"
                                    data-score="{{ number_format($s->bossScore->boss_12_13, 1) }}">
                                    <div class="score swiss-font-18">
                                        {{ number_format($s->bossScore->boss_12_13, 1) }}
                                    </div>
                                </div>
                            </td>
                            {{-- 14 Score --}}
                        @elseif ($score = 'W 14')
                            <td class="bg-gray1 ">
                                <div class="score-box mx-auto"
                                    data-score="{{ number_format($s->mobScore->mob_14, 1) }}">
                                    <div class="score swiss-font-18">
                                        {{ number_format($s->mobScore->mob_14, 1) }}
                                    </div>
                                </div>
                            </td>
                            <td class="bg-gray1 ">
                                <div class="score-box mx-auto"
                                    data-score="{{ number_format($s->bossScore->boss_14, 1) }}">
                                    <div class="score swiss-font-18">
                                        {{ number_format($s->bossScore->boss_14, 1) }}
                                    </div>
                                </div>
                            </td>
                        @endif

                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <script>
        document.addEventListener('livewire:load', function() {
            x = document.getElementsByClassName('rarity-tag');
            for (i = 0; i < x.length; i++) {
                changeTag(x[i]);
            }

            y = document.getElementsByClassName('score-box');
            for (i = 0; i < y.length; i++) {
                changeScore(y[i]);
            }

        })

        document.addEventListener('test', function() {
            x = document.getElementsByClassName('rarity-tag');
            for (i = 0; i < x.length; i++) {
                changeTag(x[i]);
            }

            y = document.getElementsByClassName('score-box');
            for (i = 0; i < y.length; i++) {
                changeScore(y[i]);
            }
        })
    </script>

    {{ $ships->links() }}

</div>
