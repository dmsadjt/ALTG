@extends('layouts.layout')
@section('title', 'Ship Section')
@section('contents')
    <section class="hero">
        <div class="container">
            <div class="bg-overlay">
                <div class="columns-five">
                    <div class="grid-col-span-2"></div>
                    <h1 class="text-white grid-col-span-3">Ulrich von Hutten</h1>
                </div>
                <div class="columns-five character-card">
                    <div class="image-wrapper grid-col-span-2">
                        <img src="/resource/image/Ulrich_von_Hutten.png" class="image-out" alt="">
                    </div>
                    <div class="text-white mt-5 grid-col-span-2">
                        <table>
                            <tr>
                                <td>Chapter</td>
                                <td class="text-center">9-11</td>
                                <td class="text-center">12-13</td>
                                <td class="text-center">14</td>
                            </tr>
                            <tr>
                                <td>Mob</td>
                                <td>
                                    <div class="score-box mx-auto score-9">
                                        <span class=" score swiss-font-24">
                                            11
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <div class="score-box mx-auto score-9">
                                        <span class=" score swiss-font-24">
                                            11
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <div class="score-box mx-auto score-9">
                                        <span class=" score swiss-font-24">
                                            11
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Boss</td>
                                <td>
                                    <div class="score-box mx-auto score-9">
                                        <span class=" score swiss-font-24">
                                            11
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <div class="score-box mx-auto score-9">
                                        <span class=" score swiss-font-24">
                                            11
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <div class="score-box mx-auto score-9">
                                        <span class=" score swiss-font-24">
                                            11
                                        </span>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="faction-content">
                        <div class="iron-blood">
                            <img src="/resource/image/Ulrich_von_HuttenChibi.png" alt="chibi">
                        </div>
                    </div>
                </div>

                <div class="columns-two__3-6">
                    <div class="d-grid my-auto">
                        <h2 class="text-white">Skill leveling prio</h2>
                        <div class="d-flex gap-3 swiss-font-12 text-white">
                            <div><img src="https://unsplash.it/200/200" alt="" class="skill-img"></div>
                            <div class="my-auto">=</div>
                            <div><img src="https://unsplash.it/50/50" alt="" class="skill-img"></div>
                            <div class="my-auto">></div>
                            <div><img src="https://unsplash.it/50/50" alt="" class="skill-img"></div>
                        </div>
                    </div>
                    <div>
                        <table class="text-white details-table altona-sans-12">
                            <tr>
                                <td>Archetype</td>
                                <td class="altona-sans-12 ps-5">
                                    <span class="pill-dark">On-fire Barrager</span>
                                    <span class="pill-dark">Proximity Barrager</span>
                                    <span class="pill-dark">Rapid Fire</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Roles</td>
                                <td class="altona-sans-12 ps-5">
                                    <span class="pill-dark">Cross Fleet Barrager</span>
                                    <span class="pill-dark">Crit. Damage Buffer <small class="pill-tag--IB">WIP</small>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="vertical-align-top">Position</td>
                                <td class="ps-5">
                                    <div class="pill-dark d-flex mb-1">
                                        <div class="my-auto p-3">1</div>
                                        <div class="border-left-white ms-1">
                                            <div class="ms-3">
                                                <h5 class="ms-3 mb-0 altona-sans-12">Flagship</h5>
                                                <img src="/resource/image/Flagship.png" alt="">
                                            </div>
                                        </div>
                                        <div class="my-auto">
                                            <p class="altona-sans-10">Lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                                dolore magna aliqua. </p>
                                        </div>
                                    </div>
                                    <div class="pill-dark d-flex">
                                        <div class="my-auto p-3">2</div>
                                        <div class="border-left-white ms-1">
                                            <div class="ms-3">
                                                <h5 class="ms-3 mb-0 altona-sans-12">Flagship</h5>
                                                <img src="/resource/image/Flagship.png" alt="">
                                            </div>
                                        </div>
                                        <div class="my-auto">
                                            <p class="altona-sans-10">Lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                                dolore magna aliqua. </p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="text-white">

                    <div class="gears">

                        <h2 class="altona-sans-18">Gear Reccomendations</h2>

                        <div class="columns-six">
                            <h3 class="altona-sans-12">Main Gun</h3>
                            <div class="tab__blue grid-col-span-3">
                                <button class="tab-links__blue"
                                    onclick="openTab(event, 'mob-general', 'tab-content__blue', 'tab-links__blue')"
                                    id="openByDefault">General</button>
                                <button class="tab-links__blue"
                                    onclick="openTab(event, 'boss-light', 'tab-content__blue', 'tab-links__blue')">Light</button>
                                <button class="tab-links__blue"
                                    onclick="openTab(event, 'boss-med', 'tab-content__blue', 'tab-links__blue')">Med</button>
                                <button class="tab-links__blue"
                                    onclick="openTab(event, 'boss-heavy', 'tab-content__blue', 'tab-links__blue')">Heavy</button>
                            </div>
                            <div class="grid-col-span-2"></div>
                            <div></div>
                            <div class="grid-col-span-3">
                                <div class="columns-eight mb-3 altona-sans-12">
                                    <div class="mx-auto">Mob</div>
                                    <div class="grid-col-span-2 mx-auto">Boss (Armor)</div>
                                </div>
                                <div class="tab-content__blue  fadeIn" id="mob-general">
                                    <div class="d-flex gap-3">
                                        <div class="text-center">
                                            <img src="https://unsplash.it/200/100" class="rounded-2" alt="img1">
                                            <div>
                                                Test
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <img src="https://unsplash.it/200/100" class="rounded-2" alt="img1">
                                            <div>
                                                Test
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <img src="https://unsplash.it/200/100" class="rounded-2" alt="img1">
                                            <div>
                                                Test
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-content__blue fadeIn" id="boss-light">
                                    <div class="d-flex gap-3">
                                        <div class="text-center">
                                            <img src="https://unsplash.it/190/100" class="rounded-2" alt="img1">
                                            <div>
                                                Test
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <img src="https://unsplash.it/190/100" class="rounded-2" alt="img1">
                                            <div>
                                                Test
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <img src="https://unsplash.it/190/100" class="rounded-2" alt="img1">
                                            <div>
                                                Test
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-content__blue fadeIn" id="boss-med">
                                    <div class="d-flex gap-3">
                                        <div class="text-center">
                                            <img src="https://unsplash.it/180/100" class="rounded-2" alt="img1">
                                            <div>
                                                Test
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <img src="https://unsplash.it/180/100" class="rounded-2" alt="img1">
                                            <div>
                                                Test
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <img src="https://unsplash.it/180/100" class="rounded-2" alt="img1">
                                            <div>
                                                Test
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-content__blue fadeIn" id="boss-heavy">
                                    <div class="d-flex gap-3">
                                        <div class="text-center">
                                            <img src="https://unsplash.it/170/100" class="rounded-2" alt="img1">
                                            <div>
                                                Test
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <img src="https://unsplash.it/170/100" class="rounded-2" alt="img1">
                                            <div>
                                                Test
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <img src="https://unsplash.it/170/100" class="rounded-2" alt="img1">
                                            <div>
                                                Test
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div></div>
                        </div>
                        <div class="columns-six">
                            <h3 class="altona-sans-12">Aux Gun</h3>
                            <div class="grid-col-span-3">
                                <div class="d-flex gap-3">
                                    <div class="text-center">
                                        <img src="https://unsplash.it/100/100" class="rounded-2" alt="img1">
                                        <div>
                                            Test
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <img src="https://unsplash.it/100/100" class="rounded-2" alt="img1">
                                        <div>
                                            Test
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <img src="https://unsplash.it/100/100" class="rounded-2" alt="img1">
                                        <div>
                                            Test
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="columns-six">
                            <h3 class="altona-sans-12">AA Gun</h3>
                            <div class="grid-col-span-3">
                                <div class="d-flex gap-3">
                                    <div class="text-center">
                                        <img src="https://unsplash.it/100/100" class="rounded-2" alt="img1">
                                        <div>
                                            Test
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <img src="https://unsplash.it/100/100" class="rounded-2" alt="img1">
                                        <div>
                                            Test
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <img src="https://unsplash.it/100/100" class="rounded-2" alt="img1">
                                        <div>
                                            Test
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="columns-six">
                            <h3 class="altona-sans-12">Aux 1</h3>
                            <div class="grid-col-span-3">
                                <div class="d-flex gap-3">
                                    <div class="text-center">
                                        <img src="https://unsplash.it/100/100" class="rounded-2" alt="img1">
                                        <div>
                                            Test
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <img src="https://unsplash.it/100/100" class="rounded-2" alt="img1">
                                        <div>
                                            Test
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <img src="https://unsplash.it/100/100" class="rounded-2" alt="img1">
                                        <div>
                                            Test
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="columns-six">
                            <h3 class="altona-sans-12">Aux 2</h3>
                            <div class="grid-col-span-3">
                                <div class="d-flex gap-3">
                                    <div class="text-center">
                                        <img src="https://unsplash.it/100/100" class="rounded-2" alt="img1">
                                        <div>
                                            Test
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <img src="https://unsplash.it/100/100" class="rounded-2" alt="img1">
                                        <div>
                                            Test
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <img src="https://unsplash.it/100/100" class="rounded-2" alt="img1">
                                        <div>
                                            Test
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="columns-six">
                            <h3 class="altona-sans-12">Augment</h3>
                            <div class="grid-col-span-3">
                                <div class="d-flex gap-3">
                                    <div class="text-center">
                                        <img src="https://unsplash.it/100/100" class="rounded-2" alt="img1">
                                        <div>
                                            Test
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <img src="https://unsplash.it/100/100" class="rounded-2" alt="img1">
                                        <div>
                                            Test
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <img src="https://unsplash.it/100/100" class="rounded-2" alt="img1">
                                        <div>
                                            Test
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="explanation mt-5">

                        <h2 class="altona-sans-18">Explanation</h2>

                        <p class="altona-sans-12">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor incididunt
                            ut labore et dolore magna aliqua. Fames ac turpis egestas sed tempus urna et. Neque
                            egestas congue quisque egestas diam. Fringilla ut morbi tincidunt augue interdum velit
                            euismod. Vulputate sapien nec sagittis aliquam malesuada bibendum arcu vitae. Gravida
                            neque convallis a cras semper auctor neque. Cum sociis natoque penatibus et magnis.
                            Sapien eget mi proin sed libero enim sed faucibus turpis. Ut tristique et egestas quis
                            ipsum suspendisse ultrices. Vivamus at augue eget arcu dictum varius duis at. Ut aliquam
                            purus sit amet luctus venenatis lectus. Nec ullamcorper sit amet risus nullam eget
                            felis. Adipiscing vitae proin sagittis nisl rhoncus. Consectetur purus ut faucibus
                            pulvinar elementum integer. Maecenas pharetra convallis posuere morbi.</p>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
