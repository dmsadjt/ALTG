@extends('layouts.layout')
@section('title', 'Tier List')
@section('contents')
    <section class="hero">
        <div class="container">
            <div class="bg-overlay">
                <div class="columns-two__1-5 text-white filter">
                    <div>
                        <span class="swiss-font-18">Hull Type</span>
                        <div class="pill hull-type battleship d-grid">
                            <span class="mx-auto mt-auto mb-2 altona-sans-12">Battleship</span>
                        </div>
                    </div>
                    <div>
                        <div class="mb-2">
                            <label for="role"><span class="swiss-font-18">Role Tags</span></label>
                            <input type="text" class="text-form" name="role" id="role">
                        </div>

                        <div class="columns-two__5-1">
                            <div class="d-grid">
                                <span class="swiss-font-18">View Score</span>
                                <div class="columns-two__3-6">
                                    <div class="columns-two">
                                        <div class="pill-dark button-square d-grid score-type">
                                            <img class="mx-auto mt-auto" src="https://unsplash.it/50/50" alt="">
                                            <div class="mx-auto my-auto altona-sans-12">Mob</div>
                                        </div>
                                        <div class="pill-dark button-square d-grid score-type">
                                            <img class="mx-auto mt-auto" src="https://unsplash.it/50/50" alt="">
                                            <div class="mx-auto my-auto altona-sans-12">Boss</div>
                                        </div>
                                    </div>
                                    <div>
                                        <table>
                                            <tr>
                                                <td>Chapter</td>
                                                <td class="altona-sans-10">
                                                    <button class="pill-dark">
                                                        W 9-11
                                                    </button>
                                                    <button class="pill-dark">
                                                        W 12-13
                                                    </button>
                                                    <button class="pill-dark">
                                                        W 12-13
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Rarity</td>
                                                <td class="altona-sans-10">
                                                    <button class="pill-dark">
                                                        UR
                                                    </button>
                                                    <button class="pill-dark">
                                                        SR
                                                    </button>
                                                    <button class="pill-dark">
                                                        E
                                                    </button>
                                                    <button class="pill-dark">
                                                        R
                                                    </button>
                                                    <button class="pill-dark">
                                                        N
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Faction</td>
                                                <td>
                                                    <button class="pill-dark">
                                                        <img class="small-img" src="/resource/image/iron-blood.png"
                                                            alt="">
                                                    </button>
                                                    <button class="pill-dark">
                                                        <img class="small-img" src="/resource/image/iron-blood.png"
                                                            alt="">
                                                    </button>
                                                    <button class="pill-dark">
                                                        <img class="small-img" src="/resource/image/iron-blood.png"
                                                            alt="">

                                                    </button>
                                                    <button class="pill-dark">
                                                        <img class="small-img" src="/resource/image/iron-blood.png"
                                                            alt="">

                                                    </button>
                                                    <button class="pill-dark">
                                                        <img class="small-img" src="/resource/image/iron-blood.png"
                                                            alt="">

                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <button class="pill-dark">
                                                        <img class="small-img" src="/resource/image/iron-blood.png"
                                                            alt="">

                                                    </button>
                                                    <button class="pill-dark">
                                                        <img class="small-img" src="/resource/image/iron-blood.png"
                                                            alt="">

                                                    </button>
                                                    <button class="pill-dark">
                                                        <img class="small-img" src="/resource/image/iron-blood.png"
                                                            alt="">

                                                    </button>
                                                    <button class="pill-dark">
                                                        <img class="small-img" src="/resource/image/iron-blood.png"
                                                            alt="">

                                                    </button>
                                                    <button class="pill-dark">
                                                        <img class="small-img" src="/resource/image/iron-blood.png"
                                                            alt="">

                                                    </button>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <span class="swiss-font-18">Position</span>
                                <div class="pill-dark button-square ">
                                    <span class="altona-sans-18">All</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tierlist text-white">
                    <div class="columns-eight">
                        <h2 class="grid-col-span-4">Battleship Mob Score</h2>
                        <span class="grid-col-span-4"></span>
                    </div>
                    <div class="columns-eight altona-sans-12">
                        <span class="grid-col-span-4 mx-auto">
                            Name
                        </span>
                        <span class="mx-auto">
                            Archetype
                        </span>
                        <span class="mx-auto">
                            Position
                        </span>
                        <span class="grid-col-span-2">
                            <div class="d-flex justify-content-around">
                                <span>9-11</span>
                                <span>12-13</span>
                                <span>14</span>
                            </div>
                        </span>
                    </div>

                    @foreach ($ships as $s)
                        <div class="ship-row columns-eight mb-3">
                            <div class="d-flex grid-col-span-4">
                                <div class="rarity-tag" id={{ $s->rarity->rarity_tag }}>
                                    <p class="rotate--90">{{ $s->rarity->rarity_tag }}</p>
                                </div>



                                <img src="" alt="" class="chibi-img">
                                <span class="swiss-font-18 my-auto">{{ $s->name }}</span>
                            </div>
                            <div class="border-left-white d-grid">
                                <div class="m-auto altona-sans-10">{{ $s->roles }}</div>
                            </div>
                            <div class="border-left-white d-grid">
                                <div class="m-auto altona-sans-10">{{ $s->position->position_name }}</div>
                                <div class="mx-auto">
                                    <img class="position-row-img" src="/img/positions/{{ $s->position->position_image }}"
                                        alt="position">
                                </div>
                            </div>
                            <div class="border-left-white grid-col-span-2">

                                <div class="d-flex h-100 justify-content-around align-items-center">
                                    <div class="score-box score-9">
                                        <div class="score swiss-font-18"></div>
                                    </div>
                                    <div class="score-box score-9">
                                        <div class="score swiss-font-18"></div>
                                    </div>
                                    <div class="score-box score-9">
                                        <div class="score swiss-font-18"></div>
                                    </div>

                                </div>

                            </div>

                            <script>
                                idTag = document.getElementsByClassName('rarity-tag')[0].id;
                                changeLabel(idTag);
                            </script>

                        </div>
                    @endforeach





                </div>
            </div>
        </div>
    </section>
@endsection
