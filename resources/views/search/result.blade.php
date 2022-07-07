@extends('layouts.layout')
@section('title', 'Search page')
@section('contents')
    <section class="d-grid">
        <div class="container text-white mx-auto w-75 gap-1 d-grid p-5 shadow">
            <h1>Search Results for '{{$result}}'</h1>

            <form action="/search/results" class="d-grid">
                <input type="text" name="ship" id="ship" class="form-control my-3 shadow">
                <input type="submit" value="Search" class="pill altona-sans-12 w-25 text-center">
            </form>

            <hr>

            @foreach ($ships as $s)
                        <div class="ship-row columns-eight mb-3 shadow">
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

                    {{$ships->links()}}
        </div>
    </section>
@endsection
