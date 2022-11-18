<div class="container text-white">
    <div class="columns-two__4-2">
        <div class="columns-two__1-5">
            <h2 class="swiss-font-24">Filter Ships</h2>
            <div></div>
            <div class="d-grid mb-2">
                <label for="hull">
                    <h3 class=" swiss-font-12">Hull Type</h3>
                </label>
                <div class="wrapper bg-gray1 p-1 rounded">
                    <img src="{{ asset('storage/' . $shipImage->hull_img) }}" alt="{{ $byHull }}"
                        style="width: 192px;height:256px;">
                    <select wire:model="byHull" name="hull" id="hull"
                        class="hull-type d-grid text-center altona-sans-12 mt-1 bg-gray1 text-white border-white rounded">
                        @foreach ($hulls as $key => $h)
                            @if ($key == 0)
                                @continue;
                            @endif
                            <option class="mx-auto mt-auto mb-2 altona-sans-12"
                                hull-img="{{ asset('storage/' . $h->hull_img) }}" value="{{ $h->id }}">
                                {{ $h->hull_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="d-grid mb-2">
                <div class="autocomplete position-relative">
                    <label for="role">
                        <h3 class="swiss-font-12">Role Tags</h3>
                    </label>
                    <input wire:model.lazy="byRole" type="text" name="role" id="role" class="text-form">
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
                                                for="{{ $r->faction_tag }}"><img
                                                    src="{{ asset('storage/' . $r->faction_img) }}" class="small-img"
                                                    alt="">
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

        <div class="ms-2">
            <h2 class="swiss-font-24">View Scores by</h2>
            <hr>
            <h3 class="swiss-font-12">Mob/Boss</h2>
                <div class="d-flex mb-2 mob-boss">
                    <div class="d-grid score-type">
                        <input type="radio" wire:model="score" value="Mob" id="mob"
                            class="filter-option d-none">
                        <label for="mob" class="filter-label d-grid">
                            <img class="mx-auto img-small" src="{{ url('/img/web-assets/mob.png') }}" alt="">
                            <span class="mx-auto">Mob</span>
                        </label>
                    </div>


                    <div class="d-grid score-type">
                        <input type="radio" wire:model="score" value="Boss" id="boss"
                            class="filter-option d-none">

                        <label for="boss" class="filter-label d-grid">
                            <img class="mx-auto mt-auto img-small" src="{{ url('/img/web-assets/boss.png') }}"
                                alt="">
                            <span class="mx-auto">Boss</span>
                        </label>
                    </div>
                </div>
                <h3 class="swiss-font-12">Chapters</h2>
                    <div class="d-grid">
                        <div class="nav-link altona-sans-12 p-1">
                            <input type="radio" wire:model="score" value="W 9-11" id="911"
                                class="filter-option d-none">
                            <label for="911" class="filter-label p-2">W 9-11</label>

                        </div>
                        <div class="nav-link altona-sans-12 p-1">
                            <input type="radio" wire:model="score" value="W 12-13" id="1213"
                                class="filter-option d-none">
                            <label for="1213" class="filter-label p-2">W 12-13</label>

                        </div>
                        <div class="nav-link altona-sans-12 p-1">
                            <input type="radio" wire:model="score" value="W 14" id="14"
                                class="filter-option d-none">
                            <label for="14" class="filter-label p-2">W 14</label>

                        </div>
                    </div>
                    <hr>
        </div>
    </div>

    <div wire:loading class="d-grid"><span wire:loading class="mx-auto altona-sans-18">Loading...</span></div>
    <div class="ships w-80" wire:loading.remove>
        <h1>{{ $shipImage->hull_name }} {{ $score }} Score</h1>
        <table class="ship-table">
            <thead class="bg-gray1 text-white altona-sans-12">
                <th>#</th>
                <th><button class="btn text-white" style="font-weight:600;" wire:click="sort('name','simple')">Ship
                        Name</button>
                    @if ($sortBy == 'name')
                        <u class="altona-sans-10 p-1">{{ $sortDirection }}</u>
                    @endif
                </th>
                <th class="altona-sans-10">Ship role</th>
                <th class="altona-sans-10">Ship archetype</th>
                <th><button class="btn text-white" style="font-weight:600;"
                        wire:click="sort('position_id','simple')">Position</button>
                    @if ($sortBy == 'position_id')
                        <u class="altona-sans-10 p-1">{{ $sortDirection }}</u>
                    @endif
                </th>

                @if ($score == 'Mob')
                    <th class=""><button class="btn text-white" style="font-weight:600;"
                            wire:click="sort('mob_9_11','complex')">9-11 </button>
                        @if ($sortBy == 'mob_9_11')
                            <u class="altona-sans-10 p-1">{{ $sortDirection }}</u>
                        @endif
                    </th>
                    <th class=""><button class="btn text-white" style="font-weight:600;"
                            wire:click="sort('mob_12_13','complex')">12-13</button>
                        @if ($sortBy == 'mob_12_13')
                            <u class="altona-sans-10 p-1">{{ $sortDirection }}</u>
                        @endif
                    </th>
                    <th class=""><button class="btn text-white" style="font-weight:600;"
                            wire:click="sort('mob_14','complex')">14</button>
                        @if ($sortBy == 'mob_14')
                            <u class="altona-sans-10 p-1">{{ $sortDirection }}</u>
                        @endif
                    </th>
                @elseif ($score == 'Boss')
                    <th class=""><button class="btn text-white" style="font-weight:600;"
                            wire:click="sort('boss_9_11','complex')">9-11</button>
                        @if ($sortBy == 'boss_9_11')
                            <u class="altona-sans-10 shadow p-1">{{ $sortDirection }}</u>
                        @endif
                    </th>
                    <th class=""><button class="btn text-white" style="font-weight:600;"
                            wire:click="sort('boss_12_13','complex')">12-13</button>
                        @if ($sortBy == 'boss_12_13')
                            <u class="altona-sans-10 shadow p-1">{{ $sortDirection }}</u>
                        @endif
                    </th>
                    <th class=""><button class="btn text-white" style="font-weight:600;"
                            wire:click="sort('boss_14','complex')">14</button>
                        @if ($sortBy == 'boss_14')
                            <u class="altona-sans-10 shadow p-1">{{ $sortDirection }}</u>
                        @endif
                    </th>
                @elseif ($score == 'W 9-11')
                    <th class=""><button class="btn text-white" style="font-weight:600;"
                            wire:click="sort('mob_9_11','complex')">Mob</button>
                        @if ($sortBy == 'mob_9_11')
                            <u class="altona-sans-10 shadow p-1">{{ $sortDirection }}</u>
                        @endif
                    </th>
                    <th class=""><button class="btn text-white" style="font-weight:600;"
                            wire:click="sort('boss_9_11','complex')">Boss</button>
                        @if ($sortBy == 'boss_9_11')
                            <u class="altona-sans-10 shadow p-1">{{ $sortDirection }}</u>
                        @endif
                    </th>
                @elseif ($score == 'W 12-13')
                    <th class=""><button class="btn text-white" style="font-weight:600;"
                            wire:click="sort('mob_12_13','complex')">Mob</button>
                        @if ($sortBy == 'mob_12_13')
                            <u class="altona-sans-10 shadow p-1">{{ $sortDirection }}</u>
                        @endif
                    </th>
                    <th class=""><button class="btn text-white" style="font-weight:600;"
                            wire:click="sort('mob_12_13','complex')">Boss</button>
                        @if ($sortBy == 'boss_12_13')
                            <u class="altona-sans-10 shadow p-1">{{ $sortDirection }}</u>
                        @endif
                    </th>
                @elseif ($score == 'W 14')
                    <th class=""><button class="btn text-white" style="font-weight:600;"
                            wire:click="sort('mob_14','complex')">Mob</button>
                        @if ($sortBy == 'mob_14')
                            <u class="altona-sans-10 shadow p-1">{{ $sortDirection }}</u>
                        @endif
                    </th>
                    <th class=""><button class="btn text-white" style="font-weight:600;"
                            wire:click="sort('boss_14','complex')">Boss</button>
                        @if ($sortBy == 'boss_14')
                            <u class="altona-sans-10 shadow p-1">{{ $sortDirection }}</u>
                        @endif
                    </th>
                @endif
            </thead>
            <tbody>
                @foreach ($ships as $s)
                    <tr class="text-white shadow">
                        <td class="rarity-tag" data-rarity="{{ $s->rarity->rarity_tag }}">
                            <span class="rotate--90 justify-content-center">{{ $s->rarity->rarity_tag }}</span>
                        </td>
                        <td class="bg-gray1 swiss-font-18"><img class="chibi-img r-hide"
                                src="{{ asset('storage/' . $s->chibi_sprite) }}" alt=""> <a
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
                                    src=" {{ asset('storage/' . $s->positions->position_image) }}" alt="position">
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

    <div class="r-overflow-x">{{ $ships->links() }}</div>

</div>
