@extends('layouts.layout')
@section('title', 'Siren Stats')
@section('contents')
    <section class="hero ">
        <div class="container">
            <div class="bg-overlay">
                <div class="bosses text-white">

                    <div class="page-title">
                        <h1>Operation Siren Boss Stats</h1>
                        <span class="altona-sans-12">Last Updated: 27 March 2022</span>
                    </div>

                    <div class="stronghold">
                        <div class="columns-three gap-3 altona-sans-12">
                            <h2>Stronghold Boss</h2>
                            <div class="d-flex gap-3">
                                <span class="my-auto">Adaptability</span>
                                <div class="tab my-auto">
                                    <button class="tab__links"
                                        onclick="openTab(event, 'stronghold-none', 'tab__content', 'tab__links')"
                                        id="openByDefault">None</button>
                                    <button class="tab__links"
                                        onclick="openTab(event, 'stronghold-full', 'tab__content', 'tab__links')">Full</button>
                                </div>
                            </div>
                        </div>

                        <div class="tab__content mb-3" id="stronghold-none">
                            @foreach ($stronghold_none as $s)
                                <div class="boss-card rounded-4 background-primary">
                                    <div class="grid-col-span-3">
                                        <h3>{{ $s->name }}</h3>
                                    </div>
                                    <div>
                                        <img src="/img/siren/{{ $s->img }}" alt="siren-img">
                                    </div>
                                    <div class="grid-col-span-2 my-auto">
                                        <table class="grey-table">
                                            <tr>
                                                <td>Hull</td>
                                                <td>{{ $s->hull }}</td>
                                                <td>HP</td>
                                                <td>{{ $s->hull }}</td>
                                                <td>AA</td>
                                                <td>{{ $s->aa }}</td>
                                                <td>EVA</td>
                                                <td>{{ $s->eva }}</td>
                                            </tr>
                                            <tr>
                                                <td>Level</td>
                                                <td>{{ $s->level }}</td>
                                                <td>FP</td>
                                                <td>{{ $s->fp }}</td>
                                                <td>AVI</td>
                                                <td>{{ $s->avi }}</td>

                                                <td>LCK</td>
                                                <td>{{ $s->lck }}</td>
                                            </tr>
                                            <tr>
                                                <td>Armor</td>
                                                <td>{{ $s->armor }}</td>
                                                <td>TRP</td>
                                                <td>{{ $s->trp }}</td>
                                                <td>ACC</td>
                                                <td>{{ $s->acc }}</td>
                                                <td>SPD</td>
                                                <td>{{ $s->spd }}</td>
                                            </tr>

                                        </table>
                                    </div>
                                    <div>
                                    </div>
                                    <div class="grid-col-span-2">
                                        Weakness : {{ $s->weakness }}
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="tab__content " id="stronghold-full">

                            @foreach ($stronghold_full as $s)
                                <div class="boss-card rounded-4 background-primary">
                                    <div class="grid-col-span-3">
                                        <h3>{{ $s->name }}</h3>
                                    </div>
                                    <div>
                                        <img src="/img/siren/{{ $s->img }}" alt="siren-img">
                                    </div>
                                    <div class="grid-col-span-2 my-auto">
                                        <table class="grey-table">
                                            <tr>
                                                <td>Hull</td>
                                                <td>{{ $s->hull }}</td>
                                                <td>HP</td>
                                                <td>{{ $s->hull }}</td>
                                                <td>AA</td>
                                                <td>{{ $s->aa }}</td>
                                                <td>EVA</td>
                                                <td>{{ $s->eva }}</td>
                                            </tr>
                                            <tr>
                                                <td>Level</td>
                                                <td>{{ $s->level }}</td>
                                                <td>FP</td>
                                                <td>{{ $s->fp }}</td>
                                                <td>AVI</td>
                                                <td>{{ $s->avi }}</td>

                                                <td>LCK</td>
                                                <td>{{ $s->lck }}</td>
                                            </tr>
                                            <tr>
                                                <td>Armor</td>
                                                <td>{{ $s->armor }}</td>
                                                <td>TRP</td>
                                                <td>{{ $s->trp }}</td>
                                                <td>ACC</td>
                                                <td>{{ $s->acc }}</td>
                                                <td>SPD</td>
                                                <td>{{ $s->spd }}</td>
                                            </tr>

                                        </table>
                                    </div>
                                    <div>
                                    </div>
                                    <div class="grid-col-span-2">
                                        Weakness : {{ $s->weakness }}
                                    </div>
                                </div>
                            @endforeach

                        </div>

                    </div>

                    <div class="abyssal">
                        <div class="columns-three gap-3 altona-sans-12">
                            <h2>Abyssal Boss</h2>

                            <div class="d-flex gap-3">
                                <span class="my-auto">Adaptability</span>

                                <div class="tab my-auto">
                                    <button class="tab__links--2"
                                        onclick="openTab(event, 'abyssal-none','tab__content--2','tab__links--2')"
                                        id="openByDefault2">None</button>
                                    <button class="tab__links--2"
                                        onclick="openTab(event, 'abyssal-full','tab__content--2','tab__links--2')">Full</button>
                                </div>
                            </div>


                        </div>

                        <div class="tab__content--2 " id="abyssal-none">

                            @foreach ($abyssal_none as $s)
                                <div class="boss-card rounded-4 background-primary">
                                    <div class="grid-col-span-3">
                                        <h3>{{ $s->name }}</h3>
                                    </div>
                                    <div>
                                        <img src="/img/siren/{{ $s->img }}" alt="siren-img">
                                    </div>
                                    <div class="grid-col-span-2 my-auto">
                                        <table class="grey-table">
                                            <tr>
                                                <td>Hull</td>
                                                <td>{{ $s->hull }}</td>
                                                <td>HP</td>
                                                <td>{{ $s->hull }}</td>
                                                <td>AA</td>
                                                <td>{{ $s->aa }}</td>
                                                <td>EVA</td>
                                                <td>{{ $s->eva }}</td>
                                            </tr>
                                            <tr>
                                                <td>Level</td>
                                                <td>{{ $s->level }}</td>
                                                <td>FP</td>
                                                <td>{{ $s->fp }}</td>
                                                <td>AVI</td>
                                                <td>{{ $s->avi }}</td>

                                                <td>LCK</td>
                                                <td>{{ $s->lck }}</td>
                                            </tr>
                                            <tr>
                                                <td>Armor</td>
                                                <td>{{ $s->armor }}</td>
                                                <td>TRP</td>
                                                <td>{{ $s->trp }}</td>
                                                <td>ACC</td>
                                                <td>{{ $s->acc }}</td>
                                                <td>SPD</td>
                                                <td>{{ $s->spd }}</td>
                                            </tr>

                                        </table>
                                    </div>
                                    <div>
                                    </div>
                                    <div class="grid-col-span-2">
                                        Weakness : {{ $s->weakness }}
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="tab__content--2 " id="abyssal-full">

                            @foreach ($abyssal_full as $s)
                                <div class="boss-card rounded-4 background-primary">
                                    <div class="grid-col-span-3">
                                        <h3>{{ $s->name }}</h3>
                                    </div>
                                    <div>
                                        <img src="/img/siren/{{ $s->img }}" alt="siren-img">
                                    </div>
                                    <div class="grid-col-span-2 my-auto">
                                        <table class="grey-table">
                                            <tr>
                                                <td>Hull</td>
                                                <td>{{ $s->hull }}</td>
                                                <td>HP</td>
                                                <td>{{ $s->hull }}</td>
                                                <td>AA</td>
                                                <td>{{ $s->aa }}</td>
                                                <td>EVA</td>
                                                <td>{{ $s->eva }}</td>
                                            </tr>
                                            <tr>
                                                <td>Level</td>
                                                <td>{{ $s->level }}</td>
                                                <td>FP</td>
                                                <td>{{ $s->fp }}</td>
                                                <td>AVI</td>
                                                <td>{{ $s->avi }}</td>

                                                <td>LCK</td>
                                                <td>{{ $s->lck }}</td>
                                            </tr>
                                            <tr>
                                                <td>Armor</td>
                                                <td>{{ $s->armor }}</td>
                                                <td>TRP</td>
                                                <td>{{ $s->trp }}</td>
                                                <td>ACC</td>
                                                <td>{{ $s->acc }}</td>
                                                <td>SPD</td>
                                                <td>{{ $s->spd }}</td>
                                            </tr>

                                        </table>
                                    </div>
                                    <div>
                                    </div>
                                    <div class="grid-col-span-2">
                                        Weakness : {{ $s->weakness }}
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>

                    <div class="arbiter">

                        <div class="columns-three gap-3 altona-sans-12">
                            <h2>Arbiter Boss</h2>
                            <div class="d-flex gap-3">
                                <span class="my-auto">Adaptability</span>
                                <div class="tab my-auto">
                                    <button class="tab__links--3"
                                        onclick="openTab(event, 'arbiter-none', 'tab__content--3','tab__links--3')"
                                        id="openByDefault3">None</button>
                                    <button class="tab__links--3"
                                        onclick="openTab(event, 'arbiter-full', 'tab__content--3','tab__links--3')">Full</button>
                                </div>
                            </div>

                        </div>

                        <div class="tab__content--3 " id="arbiter-none">
                            <div class="boss-card rounded-4 background-primary">
                                <div class="grid-col-span-2">
                                    <h3>{{ $arbiter_none_normal[0]->name }}</h3>
                                </div>

                                <div class="tab-inside my-auto ms-auto">
                                    <button class="tab-inside__links"
                                        onclick="openTab(event,'arbiter-1-normal','tab-inside__content','tab-inside__links')"
                                        id="openDefault">Normal</button>
                                    <button class="tab-inside__links"
                                        onclick="openTab(event,'arbiter-1-hard','tab-inside__content','tab-inside__links')">Hard</button>
                                </div>

                                <div>
                                    <img src="/img/siren/{{ $arbiter_none_normal[0]->img }}" alt="siren-img">
                                </div>

                                <div class="grid-col-span-2 my-auto tab-inside__content" id="arbiter-1-normal">
                                    <table class="grey-table">
                                        <tr>
                                            <td>Hull</td>
                                            <td>{{ $arbiter_none_normal[0]->hull }}</td>
                                            <td>HP</td>
                                            <td>{{ $arbiter_none_normal[0]->hull }}</td>
                                            <td>AA</td>
                                            <td>{{ $arbiter_none_normal[0]->aa }}</td>
                                            <td>EVA</td>
                                            <td>{{ $arbiter_none_normal[0]->eva }}</td>
                                        </tr>
                                        <tr>
                                            <td>Level</td>
                                            <td>{{ $arbiter_none_normal[0]->level }}</td>
                                            <td>FP</td>
                                            <td>{{ $arbiter_none_normal[0]->fp }}</td>
                                            <td>AVI</td>
                                            <td>{{ $arbiter_none_normal[0]->avi }}</td>

                                            <td>LCK</td>
                                            <td>{{ $arbiter_none_normal[0]->lck }}</td>
                                        </tr>
                                        <tr>
                                            <td>Armor</td>
                                            <td>{{ $arbiter_none_normal[0]->armor }}</td>
                                            <td>TRP</td>
                                            <td>{{ $arbiter_none_normal[0]->trp }}</td>
                                            <td>ACC</td>
                                            <td>{{ $arbiter_none_normal[0]->acc }}</td>
                                            <td>SPD</td>
                                            <td>{{ $arbiter_none_normal[0]->spd }}</td>
                                        </tr>

                                    </table>
                                </div>

                                <div class="grid-col-span-2 my-auto tab-inside__content" id="arbiter-1-hard">
                                    <table class="grey-table">
                                        <tr>
                                            <td>Hull</td>
                                            <td>{{ $arbiter_none_hard[0]->hull }}</td>
                                            <td>HP</td>
                                            <td>{{ $arbiter_none_hard[0]->hull }}</td>
                                            <td>AA</td>
                                            <td>{{ $arbiter_none_hard[0]->aa }}</td>
                                            <td>EVA</td>
                                            <td>{{ $arbiter_none_hard[0]->eva }}</td>
                                        </tr>
                                        <tr>
                                            <td>Level</td>
                                            <td>{{ $arbiter_none_hard[0]->level }}</td>
                                            <td>FP</td>
                                            <td>{{ $arbiter_none_hard[0]->fp }}</td>
                                            <td>AVI</td>
                                            <td>{{ $arbiter_none_hard[0]->avi }}</td>

                                            <td>LCK</td>
                                            <td>{{ $arbiter_none_hard[0]->lck }}</td>
                                        </tr>
                                        <tr>
                                            <td>Armor</td>
                                            <td>{{ $arbiter_none_hard[0]->armor }}</td>
                                            <td>TRP</td>
                                            <td>{{ $arbiter_none_hard[0]->trp }}</td>
                                            <td>ACC</td>
                                            <td>{{ $arbiter_none_hard[0]->acc }}</td>
                                            <td>SPD</td>
                                            <td>{{ $arbiter_none_hard[0]->spd }}</td>
                                        </tr>

                                    </table>
                                </div>

                                <div>
                                </div>

                                <div class="grid-col-span-2">
                                    Weakness: {{ $arbiter_none_normal[1]->weakness }}
                                </div>

                            </div>

                            <div class="boss-card rounded-4 background-primary">
                                <div class="grid-col-span-2">
                                    <h3>{{ $arbiter_none_normal[1]->name }}</h3>
                                </div>

                                <div class="tab-inside my-auto ms-auto">
                                    <button class="tab-inside__links--2"
                                        onclick="openTab(event,'arbiter-2-normal','tab-inside__content--2','tab-inside__links--2')"
                                        id="openDefault2">Normal</button>
                                    <button class="tab-inside__links--2"
                                        onclick="openTab(event,'arbiter-2-hard','tab-inside__content--2','tab-inside__links--2')">Hard</button>
                                </div>

                                <div>
                                    <img src="/img/siren/{{ $arbiter_none_normal[1]->img }}" alt="siren-img">
                                </div>

                                <div class="grid-col-span-2 my-auto tab-inside__content--2" id="arbiter-2-normal">
                                    <table class="grey-table">
                                        <tr>
                                            <td>Hull</td>
                                            <td>{{ $arbiter_none_normal[1]->hull }}</td>
                                            <td>HP</td>
                                            <td>{{ $arbiter_none_normal[1]->hull }}</td>
                                            <td>AA</td>
                                            <td>{{ $arbiter_none_normal[1]->aa }}</td>
                                            <td>EVA</td>
                                            <td>{{ $arbiter_none_normal[1]->eva }}</td>
                                        </tr>
                                        <tr>
                                            <td>Level</td>
                                            <td>{{ $arbiter_none_normal[1]->level }}</td>
                                            <td>FP</td>
                                            <td>{{ $arbiter_none_normal[1]->fp }}</td>
                                            <td>AVI</td>
                                            <td>{{ $arbiter_none_normal[1]->avi }}</td>

                                            <td>LCK</td>
                                            <td>{{ $arbiter_none_normal[1]->lck }}</td>
                                        </tr>
                                        <tr>
                                            <td>Armor</td>
                                            <td>{{ $arbiter_none_normal[1]->armor }}</td>
                                            <td>TRP</td>
                                            <td>{{ $arbiter_none_normal[1]->trp }}</td>
                                            <td>ACC</td>
                                            <td>{{ $arbiter_none_normal[1]->acc }}</td>
                                            <td>SPD</td>
                                            <td>{{ $arbiter_none_normal[1]->spd }}</td>
                                        </tr>

                                    </table>
                                </div>

                                <div class="grid-col-span-2 my-auto tab-inside__content--2" id="arbiter-2-hard">
                                    <table class="grey-table">
                                        <tr>
                                            <td>Hull</td>
                                            <td>{{ $arbiter_none_hard[1]->hull }}</td>
                                            <td>HP</td>
                                            <td>{{ $arbiter_none_hard[1]->hull }}</td>
                                            <td>AA</td>
                                            <td>{{ $arbiter_none_hard[1]->aa }}</td>
                                            <td>EVA</td>
                                            <td>{{ $arbiter_none_hard[1]->eva }}</td>
                                        </tr>
                                        <tr>
                                            <td>Level</td>
                                            <td>{{ $arbiter_none_hard[1]->level }}</td>
                                            <td>FP</td>
                                            <td>{{ $arbiter_none_hard[1]->fp }}</td>
                                            <td>AVI</td>
                                            <td>{{ $arbiter_none_hard[1]->avi }}</td>

                                            <td>LCK</td>
                                            <td>{{ $arbiter_none_hard[1]->lck }}</td>
                                        </tr>
                                        <tr>
                                            <td>Armor</td>
                                            <td>{{ $arbiter_none_hard[1]->armor }}</td>
                                            <td>TRP</td>
                                            <td>{{ $arbiter_none_hard[1]->trp }}</td>
                                            <td>ACC</td>
                                            <td>{{ $arbiter_none_hard[1]->acc }}</td>
                                            <td>SPD</td>
                                            <td>{{ $arbiter_none_hard[1]->spd }}</td>
                                        </tr>

                                    </table>
                                </div>

                                <div>
                                </div>
                                <div class="grid-col-span-2">
                                    Weakness: {{ $arbiter_none_normal[1]->weakness }}
                                </div>

                            </div>
                        </div>

                        <div class="tab__content--3 " id="arbiter-full">
                            <div class="boss-card rounded-4 background-primary">
                                <div class="grid-col-span-2">
                                    <h3>{{ $arbiter_full_normal[0]->name }}</h3>
                                </div>
                                <div class="tab-inside my-auto ms-auto">
                                    <button class="tab-inside__links--3"
                                        onclick="openTab(event,'arbiter-3-normal','tab-inside__content--3','tab-inside__links--3')"
                                        id="openDefault3">Normal</button>
                                    <button class="tab-inside__links--3"
                                        onclick="openTab(event,'arbiter-3-hard','tab-inside__content--3','tab-inside__links--3')">Hard</button>
                                </div>

                                <div>
                                    <img src="/img/siren/{{ $arbiter_full_normal[0]->img }}" alt="siren-img">
                                </div>

                                <div class="grid-col-span-2 my-auto tab-inside__content--3" id="arbiter-3-normal">
                                    <table class="grey-table">
                                        <tr>
                                            <td>Hull</td>
                                            <td>{{ $arbiter_full_normal[0]->hull }}</td>
                                            <td>HP</td>
                                            <td>{{ $arbiter_full_normal[0]->hull }}</td>
                                            <td>AA</td>
                                            <td>{{ $arbiter_full_normal[0]->aa }}</td>
                                            <td>EVA</td>
                                            <td>{{ $arbiter_full_normal[0]->eva }}</td>
                                        </tr>
                                        <tr>
                                            <td>Level</td>
                                            <td>{{ $arbiter_full_normal[0]->level }}</td>
                                            <td>FP</td>
                                            <td>{{ $arbiter_full_normal[0]->fp }}</td>
                                            <td>AVI</td>
                                            <td>{{ $arbiter_full_normal[0]->avi }}</td>

                                            <td>LCK</td>
                                            <td>{{ $arbiter_full_normal[0]->lck }}</td>
                                        </tr>
                                        <tr>
                                            <td>Armor</td>
                                            <td>{{ $arbiter_full_normal[0]->armor }}</td>
                                            <td>TRP</td>
                                            <td>{{ $arbiter_full_normal[0]->trp }}</td>
                                            <td>ACC</td>
                                            <td>{{ $arbiter_full_normal[0]->acc }}</td>
                                            <td>SPD</td>
                                            <td>{{ $arbiter_full_normal[0]->spd }}</td>
                                        </tr>

                                    </table>
                                </div>

                                <div class="grid-col-span-2 my-auto tab-inside__content--3" id="arbiter-3-hard">
                                    <table class="grey-table">
                                        <tr>
                                            <td>Hull</td>
                                            <td>{{ $arbiter_full_hard[0]->hull }}</td>
                                            <td>HP</td>
                                            <td>{{ $arbiter_full_hard[0]->hull }}</td>
                                            <td>AA</td>
                                            <td>{{ $arbiter_full_hard[0]->aa }}</td>
                                            <td>EVA</td>
                                            <td>{{ $arbiter_full_hard[0]->eva }}</td>
                                        </tr>
                                        <tr>
                                            <td>Level</td>
                                            <td>{{ $arbiter_full_hard[0]->level }}</td>
                                            <td>FP</td>
                                            <td>{{ $arbiter_full_hard[0]->fp }}</td>
                                            <td>AVI</td>
                                            <td>{{ $arbiter_full_hard[0]->avi }}</td>

                                            <td>LCK</td>
                                            <td>{{ $arbiter_full_hard[0]->lck }}</td>
                                        </tr>
                                        <tr>
                                            <td>Armor</td>
                                            <td>{{ $arbiter_full_hard[0]->armor }}</td>
                                            <td>TRP</td>
                                            <td>{{ $arbiter_full_hard[0]->trp }}</td>
                                            <td>ACC</td>
                                            <td>{{ $arbiter_full_hard[0]->acc }}</td>
                                            <td>SPD</td>
                                            <td>{{ $arbiter_full_hard[0]->spd }}</td>
                                        </tr>

                                    </table>
                                </div>

                                <div>
                                </div>

                                <div class="grid-col-span-2">
                                    Weakness: {{ $arbiter_full_normal[0]->weakness }}
                                </div>

                            </div>

                            <div class="boss-card rounded-4 background-primary">
                                <div class="grid-col-span-2">
                                    <h3>{{ $arbiter_full_normal[1]->name }}</h3>
                                </div>
                                <div class="tab-inside my-auto ms-auto">
                                    <button class="tab-inside__links--4"
                                        onclick="openTab(event,'arbiter-4-normal','tab-inside__content--4','tab-inside__links--4')"
                                        id="openDefault4">Normal</button>
                                    <button class="tab-inside__links--4"
                                        onclick="openTab(event,'arbiter-4-hard','tab-inside__content--4','tab-inside__links--4')">Hard</button>
                                </div>

                                <div>
                                    <img src="/img/siren/{{ $arbiter_full_normal[1]->img }}" alt="siren-img">
                                </div>

                                <div class="grid-col-span-2 my-auto tab-inside__content--4" id="arbiter-4-normal">
                                    <table class="grey-table">
                                        <tr>
                                            <td>Hull</td>
                                            <td>{{ $arbiter_full_normal[1]->hull }}</td>
                                            <td>HP</td>
                                            <td>{{ $arbiter_full_normal[1]->hull }}</td>
                                            <td>AA</td>
                                            <td>{{ $arbiter_full_normal[1]->aa }}</td>
                                            <td>EVA</td>
                                            <td>{{ $arbiter_full_normal[1]->eva }}</td>
                                        </tr>
                                        <tr>
                                            <td>Level</td>
                                            <td>{{ $arbiter_full_normal[1]->level }}</td>
                                            <td>FP</td>
                                            <td>{{ $arbiter_full_normal[1]->fp }}</td>
                                            <td>AVI</td>
                                            <td>{{ $arbiter_full_normal[1]->avi }}</td>

                                            <td>LCK</td>
                                            <td>{{ $arbiter_full_normal[1]->lck }}</td>
                                        </tr>
                                        <tr>
                                            <td>Armor</td>
                                            <td>{{ $arbiter_full_normal[1]->armor }}</td>
                                            <td>TRP</td>
                                            <td>{{ $arbiter_full_normal[1]->trp }}</td>
                                            <td>ACC</td>
                                            <td>{{ $arbiter_full_normal[1]->acc }}</td>
                                            <td>SPD</td>
                                            <td>{{ $arbiter_full_normal[1]->spd }}</td>
                                        </tr>

                                    </table>
                                </div>

                                <div class="grid-col-span-2 my-auto tab-inside__content--4" id="arbiter-4-hard">
                                    <table class="grey-table">
                                        <tr>
                                            <td>Hull</td>
                                            <td>{{ $arbiter_full_hard[1]->hull }}</td>
                                            <td>HP</td>
                                            <td>{{ $arbiter_full_hard[1]->hull }}</td>
                                            <td>AA</td>
                                            <td>{{ $arbiter_full_hard[1]->aa }}</td>
                                            <td>EVA</td>
                                            <td>{{ $arbiter_full_hard[1]->eva }}</td>
                                        </tr>
                                        <tr>
                                            <td>Level</td>
                                            <td>{{ $arbiter_full_hard[1]->level }}</td>
                                            <td>FP</td>
                                            <td>{{ $arbiter_full_hard[1]->fp }}</td>
                                            <td>AVI</td>
                                            <td>{{ $arbiter_full_hard[1]->avi }}</td>

                                            <td>LCK</td>
                                            <td>{{ $arbiter_full_hard[1]->lck }}</td>
                                        </tr>
                                        <tr>
                                            <td>Armor</td>
                                            <td>{{ $arbiter_full_hard[1]->armor }}</td>
                                            <td>TRP</td>
                                            <td>{{ $arbiter_full_hard[1]->trp }}</td>
                                            <td>ACC</td>
                                            <td>{{ $arbiter_full_hard[1]->acc }}</td>
                                            <td>SPD</td>
                                            <td>{{ $arbiter_full_hard[1]->spd }}</td>
                                        </tr>

                                    </table>
                                </div>

                                <div>
                                </div>

                                <div class="grid-col-span-2">
                                    Weakness: {{ $arbiter_full_normal[1]->weakness }}
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="guild">
                        <div class="columns-three gap-3 altona-sans-12">
                            <h2>Guild Boss</h2>
                        </div>

                        <div>
                            @foreach ($guild as $g)
                                <div class="boss-card rounded-4 background-primary">
                                    <div class="grid-col-span-3">
                                        <h3>{{ $g->name }}</h3>
                                    </div>
                                    <div>
                                        <img src="/img/siren/{{ $g->img }}" alt="">
                                    </div>
                                    <div class="grid-col-span-2 my-auto">
                                        <table class="grey-table">
                                            <tr>
                                                <td>Hull</td>
                                                <td>{{ $g->hull }}</td>
                                                <td>HP</td>
                                                <td>{{ $g->hull }}</td>
                                                <td>AA</td>
                                                <td>{{ $g->aa }}</td>
                                                <td>EVA</td>
                                                <td>{{ $g->eva }}</td>
                                            </tr>
                                            <tr>
                                                <td>Level</td>
                                                <td>{{ $g->level }}</td>
                                                <td>FP</td>
                                                <td>{{ $g->fp }}</td>
                                                <td>AVI</td>
                                                <td>{{ $g->avi }}</td>

                                                <td>LCK</td>
                                                <td>{{ $g->lck }}</td>
                                            </tr>
                                            <tr>
                                                <td>Armor</td>
                                                <td>{{ $g->armor }}</td>
                                                <td>TRP</td>
                                                <td>{{ $g->trp }}</td>
                                                <td>ACC</td>
                                                <td>{{ $g->acc }}</td>
                                                <td>SPD</td>
                                                <td>{{ $g->spd }}</td>
                                            </tr>

                                        </table>
                                    </div>
                                </div>
                            @endforeach


                        </div>

                    </div>

                    <div class="meta">
                        <div class="columns-three gap-3 altona-sans-12">
                            <h2>META Boss</h2>
                        </div>

                        <div class="d-grid gap-3">
                            @foreach ($meta as $g)
                                <div class="boss-card rounded-4 background-primary">
                                    <div class="grid-col-span-3">
                                        <h3>{{ $g->name }}</h3>
                                    </div>
                                    <div>
                                        <img src="/img/siren/{{ $g->img }}" alt="">
                                    </div>
                                    <div class="grid-col-span-2 my-auto">
                                        <table class="grey-table">
                                            <tr>
                                                <td>Hull</td>
                                                <td>{{ $g->hull }}</td>
                                                <td>HP</td>
                                                <td>{{ $g->hull }}</td>
                                                <td>AA</td>
                                                <td>{{ $g->aa }}</td>
                                                <td>EVA</td>
                                                <td>{{ $g->eva }}</td>
                                            </tr>
                                            <tr>
                                                <td>Level</td>
                                                <td>{{ $g->level }}</td>
                                                <td>FP</td>
                                                <td>{{ $g->fp }}</td>
                                                <td>AVI</td>
                                                <td>{{ $g->avi }}</td>

                                                <td>LCK</td>
                                                <td>{{ $g->lck }}</td>
                                            </tr>
                                            <tr>
                                                <td>Armor</td>
                                                <td>{{ $g->armor }}</td>
                                                <td>TRP</td>
                                                <td>{{ $g->trp }}</td>
                                                <td>ACC</td>
                                                <td>{{ $g->acc }}</td>
                                                <td>SPD</td>
                                                <td>{{ $g->spd }}</td>
                                            </tr>

                                        </table>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <script>
                        document.getElementById("openByDefault").click();
                        document.getElementById("openByDefault2").click();
                        document.getElementById("openByDefault3").click();
                        document.getElementById("openDefault").click();
                        document.getElementById("openDefault2").click();
                        document.getElementById("openDefault3").click();
                        document.getElementById("openDefault4").click();
                    </script>

    </section>

@endsection
