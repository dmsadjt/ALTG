<div class="ships">

    <table class=" ship-table" style="width:100%;">
        <thead class="bg-gray1 text-white altona-sans-12">
            <th>&nbsp;</th>
            <th>@sortablelink('name')</th>
            <th class=""><a href="#" class="altona-sans-12 link-none">Archetype</a>
            </th>
            <th class=""><a href="#" class="altona-sans-12 link-none">Role</a></th>
            <th class=""><span>@sortablelink('positions.position_name', 'Position')</span></th>

            @if ($scoreType == 'mob')
                <th class="">@sortablelink('mobScore.mob_9_11', '9-11')</th>
                <th class="">@sortablelink('mobScore.mob_12_13', '12-13')</th>
                <th class="">@sortablelink('mobScore.mob_14', '14')</th>
            @elseif ($scoreType == 'boss')
                <th class="">@sortablelink('bossScore.boss_9_11', '9-11')</th>
                <th class="">@sortablelink('bossScore.boss_12_13', '12-13')</th>
                <th class="">@sortablelink('bossScore.boss_14', '14')</th>
            @elseif ($scoreType == '911')
                <th class="">@sortablelink('mobScore.mob_9_11', 'Mob')</th>
                <th class="">@sortablelink('bossScore.boss_9_11', 'Boss')</th>
            @elseif ($scoreType == '1213')
                <th class="">@sortablelink('mobScore.mob_12_13', 'Mob')</th>
                <th class="">@sortablelink('bossScore.boss_12_13', 'Boss')</th>
            @elseif ($scoreType == '14')
                <th class="">@sortablelink('mobScore.mob_14', 'Mob')</th>
                <th class="">@sortablelink('bossScore.boss_14', 'Boss')</th>
            @endif

        </thead>
        <tbody>
            @foreach ($ships as $s)
                <tr class="text-white shadow">
                    <td class="rarity-tag" id={{ $s->rarity->rarity_tag }}>
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
                            <img class="position-row-img" src="/img/positions/{{ $s->positions->position_image }}"
                                alt="position">
                        </div>
                    </td>

                    @if ($scoreType == 'mob')
                        <td class="bg-gray1 border-left-white ">
                            <div class="score-box mx-auto sac" id="{{ number_format($s->mobScore->mob_9_11, 1) }}">
                                <div class="score swiss-font-18">
                                    {{ number_format($s->mobScore->mob_9_11, 1) }}
                                </div>
                            </div>
                        </td>
                        <td class="bg-gray1  ">
                            <div class="score-box mx-auto sac" id="{{ number_format($s->mobScore->mob_12_13, 1) }}">
                                <div class="score swiss-font-18">
                                    {{ number_format($s->mobScore->mob_12_13, 1) }}
                                </div>
                            </div>
                        </td>
                        <td class="bg-gray1 ">
                            <div class="score-box mx-auto sac" id="{{ number_format($s->mobScore->mob_14, 1) }}">
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
                    @elseif ($scoreType == 'boss')
                        <td class="bg-gray1 border-left-white ">
                            <div class="score-box mx-auto sac" id="{{ number_format($s->bossScore->boss_9_11, 1) }}">
                                <div class="score swiss-font-18">
                                    {{ number_format($s->bossScore->boss_9_11, 1) }}
                                </div>
                            </div>
                        </td>
                        <td class="bg-gray1  ">
                            <div class="score-box mx-auto sac" id="{{ number_format($s->bossScore->boss_12_13, 1) }}">
                                <div class="score swiss-font-18">
                                    {{ number_format($s->bossScore->boss_12_13, 1) }}
                                </div>
                            </div>
                        </td>
                        <td class="bg-gray1 ">
                            <div class="score-box mx-auto sac" id="{{ number_format($s->bossScore->boss_14, 1) }}">
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
                    @elseif ($scoreType == '911')
                        <td class="bg-gray1 border-left-white ">
                            <div class="score-box mx-auto sac" id="{{ number_format($s->mobScore->mob_9_11, 1) }}">
                                <div class="score swiss-font-18">
                                    {{ number_format($s->mobScore->mob_9_11, 1) }}
                                </div>
                            </div>
                        </td>
                        <td class="bg-gray1  ">
                            <div class="score-box mx-auto sac" id="{{ number_format($s->bossScore->boss_9_11, 1) }}">
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
                    @elseif ($scoreType == '1213')
                        <td class="bg-gray1 border-left-white ">
                            <div class="score-box mx-auto sac" id="{{ number_format($s->mobScore->mob_12_13, 1) }}">
                                <div class="score swiss-font-18">
                                    {{ number_format($s->mobScore->mob_12_13, 1) }}
                                </div>
                            </div>
                        </td>
                        <td class="bg-gray1  ">
                            <div class="score-box mx-auto sac" id="{{ number_format($s->bossScore->boss_12_13, 1) }}">
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
                    @elseif ($scoreType == '14')
                        <td class="bg-gray1 border-left-white ">
                            <div class="score-box mx-auto sac" id="{{ number_format($s->mobScore->mob_14, 1) }}">
                                <div class="score swiss-font-18">
                                    {{ number_format($s->mobScore->mob_14, 1) }}
                                </div>
                            </div>
                        </td>
                        <td class="bg-gray1  ">
                            <div class="score-box mx-auto sac" id="{{ number_format($s->bossScore->boss_14, 1) }}">
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
                    @endif


                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $ships->appends(\Request::except('page'))->render() }}

</div>
