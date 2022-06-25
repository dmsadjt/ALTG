@extends('layouts.layout')
@section('title', 'Azur Lane Tierlist Guide')
@section('contents')
    <section class="hero">
        <div class="container">
            <div class="d-grid mx-auto mt-4">
                <button class="text-white orange-button">
                    <h1 class="p-3">GO TO TIERLIST</h1>
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
                            <img src="/img/posts/{{ $posts[0]->img }}" class="d-block" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>{{ $posts[0]->title }}</h5>
                                <p>Some representative placeholder content for the first slide.</p>
                            </div>
                        </div>
                        @for ($i = 1; $i < 5; $i++)
                            <div class="carousel-item">
                                <img src="/img/posts/{{ $posts[$i]->img }}" class="d-block" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>{{ $posts[$i]->title }}</h5>
                                    <p>Some representative placeholder content for the first slide.</p>
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
                                    <td>Archetype</td>
                                    <td class="altona-sans-12">{{ $ships[$i]->roles }}</td>
                                </tr>
                                <tr>
                                    <td class="vertical-align-top">Roles</td>
                                    <td class="altona-sans-12">
                                        <ul class="ul-roles">
                                            <li>Zombie</li>
                                            <li>Preload Enabler</li>
                                            <li>Damage Absorb</li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">Preferred Position</td>
                                </tr>
                                <tr>
                                    <td class="altona-font-18 align-end">{{ $ships[$i]->position->position_name }}</td>
                                    <td><img src="/img/positions/{{ $ships[$i]->position->position_image }}"
                                            alt="position"></td>
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
                                        <div class="score-box score-6">
                                            <span class=" score swiss-font-24">
                                                8.3
                                            </span>
                                        </div>

                                    </td>
                                </tr>

                                <tr>
                                    <td>Boss</td>
                                    <td>
                                        <div class="score-box score-7">
                                            <span class=" score swiss-font-24">
                                                10
                                            </span>
                                        </div>
                                    </td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>

                <div class="columns-four">
                    <div class="grid-col-span-2"></div>
                    <div>
                        <button class="mt-5 orange-btn swiss-font-12 text-white" href="#">Read more details
                            >></button>
                    </div>
                </div>

                <script>
                    idCard = document.getElementsByClassName('character-card')[0].id;
                    changeFrame(idCard);
                </script>
            @endfor

    </section>


@endsection
