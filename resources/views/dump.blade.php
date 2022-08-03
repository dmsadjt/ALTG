{{-- //Old ship list  --}}

<div class="columns-eight altona-sans-12 bg-gray1 border my-2">
    <span class="grid-col-span-4 mx-auto">
        <button class="btn text-white rounded-0">Name</button>
    </span>
    <span class="mx-auto">
        <button class="btn text-white rounded-0">Archetype</button>
    </span>
    <span class="mx-auto">
        <button class="btn text-white rounded-0">Position</button>
    </span>
    <span class="grid-col-span-2">
        <div class="d-flex justify-content-around">
            <span><button class="btn text-white rounded-0">9-11</button></span>
            <span><button class="btn text-white rounded-0">12-13</button></span>
            <span><button class="btn text-white rounded-0">14</button></span>
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
