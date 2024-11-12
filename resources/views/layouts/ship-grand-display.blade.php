<div class="columns-four character-name">
    <div class="justify-right grid-col-span-2">
        <img class="relative-2 img-4em" src="/img/rarity/tag/{{ @yield('rarity-image') }}" alt="">
    </div>
    <div class="grid-col-span-2 mt-auto">
        <h1 style="font-size:2.5rem;color: white;">@yield('name')</h1>
    </div>
</div>

<div class="character-card columns-four" id="@yield('rarity-slug')">

    <div class="image-wrapper grid-col-span-2">
        <img class="image-out" src="{{ asset('storage/' . {{@yield('sprite')}}) }}" alt="">
    </div>

    <div class="mt-4">

        <table class="text-white">
            <tbody>
                <tr>
                    <td class='vertical-align-top'>Archetype</td>
                    <td class="altona-sans-12">
                        <div class="ul-roles">
                            @foreach ($ships[$i]->archetypes as $s)
                                <li>{{ $s->archetype_name }}</li>
                            @endforeach
                        </div>
                    </td>

                </tr>
                <tr>
                    <td class="vertical-align-top">Roles</td>
                    <td class="altona-sans-12">
                        <ul class="ul-roles">
                            @foreach ($ships[$i]->roles as $s)
                                <li>{{ $s->role_name }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">Preferred Position</td>
                </tr>
                <tr>
                    <td class="altona-font-18 align-end">

                        <span class="cl-hd" id="{{ $ships[$i]->positions->position_slug }}">
                            {{ $ships[$i]->positions->position_name }}
                        </span>


                        <script>
                            textId = document.getElementsByClassName('cl-hd')[0].id;
                            changeTextColor(textId);
                        </script>
                    </td>
                    <td>

                        <img src="{{ asset('storage/' . $ships[$i]->positions->position_image) }}" alt="position">


                    </td>
                </tr>
            </tbody>
        </table>

    </div>

    <div class="mt-4">

        <div class="text-white">
            <p class="text-center">
                Average Score
            </p>
        </div>

        <div>

            <table class="mx-auto text-white">
                <tr>
                    <td>Mob</td>
                    <td>
                        <div class="score-box sac"
                            id="{{ $score = number_format(($ships[$i]->bossScore->boss_9_11 + $ships[$i]->bossScore->boss_12_13 + $ships[$i]->bossScore->boss_14) / 3, 1) }}">
                            <span class="score swiss-font-18">
                                {{ intval($score) == $score ? intval($score) : $score }}
                            </span>
                        </div>

                    </td>
                </tr>

                <tr>
                    <td>Boss</td>
                    <td>
                        <div class="score-box sac"
                            id="{{ $score1 = number_format(($ships[$i]->mobScore->mob_9_11 + $ships[$i]->mobScore->mob_12_13 + $ships[$i]->mobScore->mob_14) / 3, 1) }}">
                            <span class=" score swiss-font-18">
                                {{ intval($score1) == $score1 ? intval($score) : $score1 }}
                            </span>
                        </div>
                    </td>
                </tr>

            </table>

            <script>
                for (i = 0; i < 2; i++) {
                    scoreId = document.getElementsByClassName('sac')[0].id;
                    changeScoreColor(scoreId);
                }
            </script>


        </div>
    </div>
</div>

<div class="columns-four">
    <div class="grid-col-span-2"></div>
    <div>

        <a href="/ships/{{ $ships[$i]->id }}" class="link-none text-white">
            <button class="mt-5 orange-btn swiss-font-12 text-white">
                Read more details>>
            </button>
        </a>

    </div>
</div>

<script>
    idCard = document.getElementsByClassName('character-card')[0].id;
    changeFrame(idCard);
</script>
