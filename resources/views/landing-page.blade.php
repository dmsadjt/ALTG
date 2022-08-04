@extends('layouts.layout')
@section('title', 'Azur Lane Tierlist Guide')
@section('contents')
    <section class="hero">
        <div class="container">
            <div class="d-grid mx-auto mt-4">
                <button class="text-white orange-button">
                    <a href="/ships" class="link-none">
                        <h1 class="p-3">GO TO TIERLIST</h1>
                    </a>
                </button>

            </div>
            <div class="d-grid mx-auto">
                <a class="text-white text-center" href="#"><b>Read our tiering guidelines here</b></a>
            </div>
            <div class="columns-two text-center mx-auto">
                <div id="carouselExampleCaptions" class="carousel rounded-3 slide" data-bs-ride="false">
                    <div class="carousel-title text-center">
                        <h1 style="color:#f39736" class="my-auto">LATEST POST</h1>
                    </div>
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
                            aria-label="Slide 4"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4"
                            aria-label="Slide 5"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            {{-- <img src="/img/posts/{{ $posts[0]->images->image ? $posts[0]->images[0]->image : 'no-pictures.png' }}" class="d-block" alt="post-img"> --}}
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="swiss-font-12">{{ $posts[0]->title }}</h5>
                                <p class="short-text altona-sans-10">{{ $posts[0]->body }}</p>
                            </div>
                        </div>
                        @for ($i = 1; $i < 5; $i++)
                            <div class="carousel-item">
                                {{-- <img src="/img/posts/{{ $posts[$i]->img }}" class="d-block" alt="post-img"> --}}
                                <div class="carousel-caption d-none d-md-block">
                                    <h5 class="swiss-font-12">{{ $posts[$i]->title }}</h5>
                                    <p class="short-text altona-sans-10">{{ $posts[$i]->body }}</p>
                                </div>
                            </div>
                        @endfor

                    </div>
                </div>
                <div>
                    <img src="{{ url('/img/web-assets/altg-logo.png') }}" class="brand-image-page" alt="">
                </div>
            </div>

            <div class="row mt-5 text-center text-white">
                <h1>CHECK OUT THE LATEST SHIPS</h1>
                <div class="text-center mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="418.315px"
                        height="35px">
                        <path fill-rule="evenodd" stroke="rgb(0, 0, 0)" stroke-width="0.50px" stroke-linecap="butt"
                            stroke-linejoin="miter" fill="rgb(255, 255, 255)"
                            d="M0.162,0.103 L209.081,17.973 L418.083,0.176 L418.054,15.304 L209.052,33.102 L0.133,15.231 L0.162,0.103 Z" />
                    </svg>
                </div>
            </div>
        </div>


    </section>
    <section class="ships">
        <div class="container">
            <div class="row mt-5 text-center text-white">
                <p class="as">Click on <span class="orange-btn">Read more details >></span> to learn about
                    individual world score, gear guides and more</p>
            </div>

            @for ($i = 0; $i < 2; $i++)
                <div class="columns-four character-name">
                    <div class="justify-right grid-col-span-2">
                        <img class="relative-2 img-4em" src="/img/rarity/tag/{{ $ships[$i]->rarity->rarity_image }}"
                            alt="">
                    </div>
                    <div class="grid-col-span-2">
                        <h1 style="font-size:4rem;color: white;">{{ $ships[$i]->name }}</h1>
                    </div>
                </div>

                <div class="character-card columns-four" id="{{ $ships[$i]->rarity->rarity_slug }}">
                    <div class="image-wrapper grid-col-span-2">
                        <img class="image-out" src="/img/ships/sprites/{{ $ships[$i]->sprite }}" alt="">
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
                                    <td class="altona-font-18 align-end" >

                                        <span class="cl-hd" id="{{$ships[$i]->positions->position_slug}}">
                                            {{ $ships[$i]->positions->position_name }}
                                        </span>


                                        <script>
                                            textId = document.getElementsByClassName('cl-hd')[0].id;
                                            changeTextColor(textId);
                                        </script>
                                    </td>
                                    <td>

                                            <img src="/img/positions/{{ $ships[$i]->positions->position_image }}" alt="position">


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
                                            id="{{ number_format(($ships[$i]->bossScore->boss_9_11 + $ships[$i]->bossScore->boss_12_13 + $ships[$i]->bossScore->boss_14) / 3, 1) }}">
                                            <span class="score swiss-font-24">
                                                {{ number_format(($ships[$i]->bossScore->boss_9_11 + $ships[$i]->bossScore->boss_12_13 + $ships[$i]->bossScore->boss_14) / 3, 1) }}
                                            </span>
                                        </div>

                                    </td>
                                </tr>

                                <tr>
                                    <td>Boss</td>
                                    <td>
                                        <div class="score-box sac"
                                            id="{{ number_format(($ships[$i]->mobScore->mob_9_11 + $ships[$i]->mobScore->mob_12_13 + $ships[$i]->mobScore->mob_14) / 3, 1) }}">
                                            <span class=" score swiss-font-24">
                                                {{ number_format(($ships[$i]->mobScore->mob_9_11 + $ships[$i]->mobScore->mob_12_13 + $ships[$i]->mobScore->mob_14) / 3, 1) }}
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

                        <a href="/ships/{{ $ships[$i]->id }}" class="link-none">
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
            @endfor

    </section>


@endsection
