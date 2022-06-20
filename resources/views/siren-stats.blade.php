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

                    <div class="tab__content " id="stronghold-none">
                        <div class="boss-card rounded-4 background-primary">
                            <div class="grid-col-span-3">
                                <h3>Defense Module : Stronghold Defender XII NONE</h3>
                            </div>
                            <div>
                                <img src="/resource/image/ALTG LOGO.png" alt="">
                            </div>
                            <div class="grid-col-span-2 my-auto">
                                <table class="grey-table">
                                    <tr>
                                        <td>Hull</td>
                                        <td>data</td>
                                        <td>HP</td>
                                        <td>data</td>
                                        <td>AA</td>
                                        <td>data</td>
                                        <td>EVA</td>
                                        <td>data</td>
                                    </tr>
                                    <tr>
                                        <td>Level</td>
                                        <td>data</td>
                                        <td>FP</td>
                                        <td>data</td>
                                        <td>AVI</td>
                                        <td>data</td>

                                        <td>LCK</td>
                                        <td>data</td>
                                    </tr>
                                    <tr>
                                        <td>Armor</td>
                                        <td>data</td>
                                        <td>TRP</td>
                                        <td>data</td>
                                        <td>ACC</td>
                                        <td>data</td>
                                        <td>SPD</td>
                                        <td>data</td>
                                    </tr>

                                </table>
                            </div>
                            <div>
                            </div>
                            <div class="grid-col-span-2">
                                Weakness: data
                            </div>
                        </div>

                        <div class="boss-card rounded-4 background-primary">
                            <div class="grid-col-span-3">
                                <h3>Defense Module : Stronghold Defender XII</h3>
                            </div>
                            <div>
                                <img src="/resource/image/ALTG LOGO.png" alt="">
                            </div>
                            <div class="grid-col-span-2 my-auto">
                                <table class="grey-table">
                                    <tr>
                                        <td>Hull</td>
                                        <td>data</td>
                                        <td>HP</td>
                                        <td>data</td>
                                        <td>AA</td>
                                        <td>data</td>
                                        <td>EVA</td>
                                        <td>data</td>
                                    </tr>
                                    <tr>
                                        <td>Level</td>
                                        <td>data</td>
                                        <td>FP</td>
                                        <td>data</td>
                                        <td>AVI</td>
                                        <td>data</td>

                                        <td>LCK</td>
                                        <td>data</td>
                                    </tr>
                                    <tr>
                                        <td>Armor</td>
                                        <td>data</td>
                                        <td>TRP</td>
                                        <td>data</td>
                                        <td>ACC</td>
                                        <td>data</td>
                                        <td>SPD</td>
                                        <td>data</td>
                                    </tr>

                                </table>
                            </div>
                            <div>
                            </div>
                            <div class="grid-col-span-2">
                                Weakness: data
                            </div>
                        </div>
                    </div>

                    <div class="tab__content " id="stronghold-full">
                        <div class="boss-card rounded-4 background-primary">
                            <div class="grid-col-span-3">
                                <h3>Defense Module : Stronghold Defender XII FULL</h3>
                            </div>
                            <div>
                                <img src="/resource/image/ALTG LOGO.png" alt="">
                            </div>
                            <div class="grid-col-span-2 my-auto">
                                <table class="grey-table">
                                    <tr>
                                        <td>Hull</td>
                                        <td>data</td>
                                        <td>HP</td>
                                        <td>data</td>
                                        <td>AA</td>
                                        <td>data</td>
                                        <td>EVA</td>
                                        <td>data</td>
                                    </tr>
                                    <tr>
                                        <td>Level</td>
                                        <td>data</td>
                                        <td>FP</td>
                                        <td>data</td>
                                        <td>AVI</td>
                                        <td>data</td>

                                        <td>LCK</td>
                                        <td>data</td>
                                    </tr>
                                    <tr>
                                        <td>Armor</td>
                                        <td>data</td>
                                        <td>TRP</td>
                                        <td>data</td>
                                        <td>ACC</td>
                                        <td>data</td>
                                        <td>SPD</td>
                                        <td>data</td>
                                    </tr>

                                </table>
                            </div>
                            <div>
                            </div>
                            <div class="grid-col-span-2">
                                Weakness: data
                            </div>
                        </div>

                        <div class="boss-card rounded-4 background-primary">
                            <div class="grid-col-span-3">
                                <h3>Defense Module : Stronghold Defender XII</h3>
                            </div>
                            <div>
                                <img src="/resource/image/ALTG LOGO.png" alt="">
                            </div>
                            <div class="grid-col-span-2 my-auto">
                                <table class="grey-table">
                                    <tr>
                                        <td>Hull</td>
                                        <td>data</td>
                                        <td>HP</td>
                                        <td>data</td>
                                        <td>AA</td>
                                        <td>data</td>
                                        <td>EVA</td>
                                        <td>data</td>
                                    </tr>
                                    <tr>
                                        <td>Level</td>
                                        <td>data</td>
                                        <td>FP</td>
                                        <td>data</td>
                                        <td>AVI</td>
                                        <td>data</td>

                                        <td>LCK</td>
                                        <td>data</td>
                                    </tr>
                                    <tr>
                                        <td>Armor</td>
                                        <td>data</td>
                                        <td>TRP</td>
                                        <td>data</td>
                                        <td>ACC</td>
                                        <td>data</td>
                                        <td>SPD</td>
                                        <td>data</td>
                                    </tr>

                                </table>
                            </div>
                            <div>
                            </div>
                            <div class="grid-col-span-2">
                                Weakness: data
                            </div>
                        </div>
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
                        <div class="boss-card rounded-4 background-primary">
                            <div class="grid-col-span-3">
                                <h3>Defense Module : Stronghold Defender XII NONE</h3>
                            </div>
                            <div>
                                <img src="/resource/image/ALTG LOGO.png" alt="">
                            </div>
                            <div class="grid-col-span-2 my-auto">
                                <table class="grey-table">
                                    <tr>
                                        <td>Hull</td>
                                        <td>data</td>
                                        <td>HP</td>
                                        <td>data</td>
                                        <td>AA</td>
                                        <td>data</td>
                                        <td>EVA</td>
                                        <td>data</td>
                                    </tr>
                                    <tr>
                                        <td>Level</td>
                                        <td>data</td>
                                        <td>FP</td>
                                        <td>data</td>
                                        <td>AVI</td>
                                        <td>data</td>

                                        <td>LCK</td>
                                        <td>data</td>
                                    </tr>
                                    <tr>
                                        <td>Armor</td>
                                        <td>data</td>
                                        <td>TRP</td>
                                        <td>data</td>
                                        <td>ACC</td>
                                        <td>data</td>
                                        <td>SPD</td>
                                        <td>data</td>
                                    </tr>

                                </table>
                            </div>
                            <div>
                            </div>
                            <div class="grid-col-span-2">
                                Weakness: data
                            </div>
                        </div>

                        <div class="boss-card rounded-4 background-primary">
                            <div class="grid-col-span-3">
                                <h3>Defense Module : Stronghold Defender XII</h3>
                            </div>
                            <div>
                                <img src="/resource/image/ALTG LOGO.png" alt="">
                            </div>
                            <div class="grid-col-span-2 my-auto">
                                <table class="grey-table">
                                    <tr>
                                        <td>Hull</td>
                                        <td>data</td>
                                        <td>HP</td>
                                        <td>data</td>
                                        <td>AA</td>
                                        <td>data</td>
                                        <td>EVA</td>
                                        <td>data</td>
                                    </tr>
                                    <tr>
                                        <td>Level</td>
                                        <td>data</td>
                                        <td>FP</td>
                                        <td>data</td>
                                        <td>AVI</td>
                                        <td>data</td>

                                        <td>LCK</td>
                                        <td>data</td>
                                    </tr>
                                    <tr>
                                        <td>Armor</td>
                                        <td>data</td>
                                        <td>TRP</td>
                                        <td>data</td>
                                        <td>ACC</td>
                                        <td>data</td>
                                        <td>SPD</td>
                                        <td>data</td>
                                    </tr>

                                </table>
                            </div>
                            <div>
                            </div>
                            <div class="grid-col-span-2">
                                Weakness: data
                            </div>
                        </div>
                    </div>

                    <div class="tab__content--2 " id="abyssal-full">
                        <div class="boss-card rounded-4 background-primary">
                            <div class="grid-col-span-3">
                                <h3>Defense Module : Stronghold Defender XII FULL</h3>
                            </div>
                            <div>
                                <img src="/resource/image/ALTG LOGO.png" alt="">
                            </div>
                            <div class="grid-col-span-2 my-auto">
                                <table class="grey-table">
                                    <tr>
                                        <td>Hull</td>
                                        <td>data</td>
                                        <td>HP</td>
                                        <td>data</td>
                                        <td>AA</td>
                                        <td>data</td>
                                        <td>EVA</td>
                                        <td>data</td>
                                    </tr>
                                    <tr>
                                        <td>Level</td>
                                        <td>data</td>
                                        <td>FP</td>
                                        <td>data</td>
                                        <td>AVI</td>
                                        <td>data</td>

                                        <td>LCK</td>
                                        <td>data</td>
                                    </tr>
                                    <tr>
                                        <td>Armor</td>
                                        <td>data</td>
                                        <td>TRP</td>
                                        <td>data</td>
                                        <td>ACC</td>
                                        <td>data</td>
                                        <td>SPD</td>
                                        <td>data</td>
                                    </tr>

                                </table>
                            </div>
                            <div>
                            </div>
                            <div class="grid-col-span-2">
                                Weakness: data
                            </div>
                        </div>

                        <div class="boss-card rounded-4 background-primary">
                            <div class="grid-col-span-3">
                                <h3>Defense Module : Stronghold Defender XII</h3>
                            </div>
                            <div>
                                <img src="/resource/image/ALTG LOGO.png" alt="">
                            </div>
                            <div class="grid-col-span-2 my-auto">
                                <table class="grey-table">
                                    <tr>
                                        <td>Hull</td>
                                        <td>data</td>
                                        <td>HP</td>
                                        <td>data</td>
                                        <td>AA</td>
                                        <td>data</td>
                                        <td>EVA</td>
                                        <td>data</td>
                                    </tr>
                                    <tr>
                                        <td>Level</td>
                                        <td>data</td>
                                        <td>FP</td>
                                        <td>data</td>
                                        <td>AVI</td>
                                        <td>data</td>

                                        <td>LCK</td>
                                        <td>data</td>
                                    </tr>
                                    <tr>
                                        <td>Armor</td>
                                        <td>data</td>
                                        <td>TRP</td>
                                        <td>data</td>
                                        <td>ACC</td>
                                        <td>data</td>
                                        <td>SPD</td>
                                        <td>data</td>
                                    </tr>

                                </table>
                            </div>
                            <div>
                            </div>
                            <div class="grid-col-span-2">
                                Weakness: data
                            </div>
                        </div>
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
                                <h3>Defense Module : Stronghold Defender XII NONE</h3>
                            </div>

                            <div class="tab-inside my-auto ms-auto">
                                <button class="tab-inside__links"
                                    onclick="openTab(event,'arbiter-1-normal','tab-inside__content','tab-inside__links')"
                                    id="openDefault">Normal</button>
                                <button class="tab-inside__links"
                                    onclick="openTab(event,'arbiter-1-hard','tab-inside__content','tab-inside__links')">Hard</button>
                            </div>

                            <div>
                                <img src="/resource/image/ALTG LOGO.png" alt="">
                            </div>

                            <div class="grid-col-span-2 my-auto tab-inside__content" id="arbiter-1-normal">
                                <table class="grey-table">
                                    <tr>
                                        <td>Hull</td>
                                        <td>NORMAL</td>
                                        <td>HP</td>
                                        <td>data</td>
                                        <td>AA</td>
                                        <td>data</td>
                                        <td>EVA</td>
                                        <td>data</td>
                                    </tr>
                                    <tr>
                                        <td>Level</td>
                                        <td>data</td>
                                        <td>FP</td>
                                        <td>data</td>
                                        <td>AVI</td>
                                        <td>data</td>

                                        <td>LCK</td>
                                        <td>data</td>
                                    </tr>
                                    <tr>
                                        <td>Armor</td>
                                        <td>data</td>
                                        <td>TRP</td>
                                        <td>data</td>
                                        <td>ACC</td>
                                        <td>data</td>
                                        <td>SPD</td>
                                        <td>data</td>
                                    </tr>

                                </table>
                            </div>

                            <div class="grid-col-span-2 my-auto tab-inside__content" id="arbiter-1-hard">
                                <table class="grey-table">
                                    <tr>
                                        <td>Hull</td>
                                        <td>HARD</td>
                                        <td>HP</td>
                                        <td>data</td>
                                        <td>AA</td>
                                        <td>data</td>
                                        <td>EVA</td>
                                        <td>data</td>
                                    </tr>
                                    <tr>
                                        <td>Level</td>
                                        <td>data</td>
                                        <td>FP</td>
                                        <td>data</td>
                                        <td>AVI</td>
                                        <td>data</td>

                                        <td>LCK</td>
                                        <td>data</td>
                                    </tr>
                                    <tr>
                                        <td>Armor</td>
                                        <td>data</td>
                                        <td>TRP</td>
                                        <td>data</td>
                                        <td>ACC</td>
                                        <td>data</td>
                                        <td>SPD</td>
                                        <td>data</td>
                                    </tr>

                                </table>
                            </div>

                            <div>
                            </div>

                            <div class="grid-col-span-2">
                                Weakness: data
                            </div>

                        </div>

                        <div class="boss-card rounded-4 background-primary">
                            <div class="grid-col-span-2">
                                <h3>Defense Module : Stronghold Defender XII</h3>
                            </div>

                            <div class="tab-inside my-auto ms-auto">
                                <button class="tab-inside__links--2"
                                    onclick="openTab(event,'arbiter-2-normal','tab-inside__content--2','tab-inside__links--2')"
                                    id="openDefault2">Normal</button>
                                <button class="tab-inside__links--2"
                                    onclick="openTab(event,'arbiter-2-hard','tab-inside__content--2','tab-inside__links--2')">Hard</button>
                            </div>

                            <div>
                                <img src="/resource/image/ALTG LOGO.png" alt="">
                            </div>

                            <div class="grid-col-span-2 my-auto tab-inside__content--2" id="arbiter-2-normal">
                                <table class="grey-table">
                                    <tr>
                                        <td>Hull</td>
                                        <td>NORMAL</td>
                                        <td>HP</td>
                                        <td>data</td>
                                        <td>AA</td>
                                        <td>data</td>
                                        <td>EVA</td>
                                        <td>data</td>
                                    </tr>
                                    <tr>
                                        <td>Level</td>
                                        <td>data</td>
                                        <td>FP</td>
                                        <td>data</td>
                                        <td>AVI</td>
                                        <td>data</td>

                                        <td>LCK</td>
                                        <td>data</td>
                                    </tr>
                                    <tr>
                                        <td>Armor</td>
                                        <td>data</td>
                                        <td>TRP</td>
                                        <td>data</td>
                                        <td>ACC</td>
                                        <td>data</td>
                                        <td>SPD</td>
                                        <td>data</td>
                                    </tr>

                                </table>
                            </div>

                            <div class="grid-col-span-2 my-auto tab-inside__content--2" id="arbiter-2-hard">
                                <table class="grey-table">
                                    <tr>
                                        <td>Hull</td>
                                        <td>HARD</td>
                                        <td>HP</td>
                                        <td>data</td>
                                        <td>AA</td>
                                        <td>data</td>
                                        <td>EVA</td>
                                        <td>data</td>
                                    </tr>
                                    <tr>
                                        <td>Level</td>
                                        <td>data</td>
                                        <td>FP</td>
                                        <td>data</td>
                                        <td>AVI</td>
                                        <td>data</td>

                                        <td>LCK</td>
                                        <td>data</td>
                                    </tr>
                                    <tr>
                                        <td>Armor</td>
                                        <td>data</td>
                                        <td>TRP</td>
                                        <td>data</td>
                                        <td>ACC</td>
                                        <td>data</td>
                                        <td>SPD</td>
                                        <td>data</td>
                                    </tr>

                                </table>
                            </div>

                            <div>
                            </div>
                            <div class="grid-col-span-2">
                                Weakness: data
                            </div>

                        </div>
                    </div>

                    <div class="tab__content--3 " id="arbiter-full">
                        <div class="boss-card rounded-4 background-primary">
                            <div class="grid-col-span-2">
                                <h3>Defense Module : Stronghold Defender XII FULL</h3>
                            </div>
                            <div class="tab-inside my-auto ms-auto">
                                <button class="tab-inside__links--3"
                                    onclick="openTab(event,'arbiter-3-normal','tab-inside__content--3','tab-inside__links--3')"
                                    id="openDefault3">Normal</button>
                                <button class="tab-inside__links--3"
                                    onclick="openTab(event,'arbiter-3-hard','tab-inside__content--3','tab-inside__links--3')">Hard</button>
                            </div>

                            <div>
                                <img src="/resource/image/ALTG LOGO.png" alt="">
                            </div>

                            <div class="grid-col-span-2 my-auto tab-inside__content--3" id="arbiter-3-normal">
                                <table class="grey-table">
                                    <tr>
                                        <td>Hull</td>
                                        <td>NORMAL</td>
                                        <td>HP</td>
                                        <td>data</td>
                                        <td>AA</td>
                                        <td>data</td>
                                        <td>EVA</td>
                                        <td>data</td>
                                    </tr>
                                    <tr>
                                        <td>Level</td>
                                        <td>data</td>
                                        <td>FP</td>
                                        <td>data</td>
                                        <td>AVI</td>
                                        <td>data</td>

                                        <td>LCK</td>
                                        <td>data</td>
                                    </tr>
                                    <tr>
                                        <td>Armor</td>
                                        <td>data</td>
                                        <td>TRP</td>
                                        <td>data</td>
                                        <td>ACC</td>
                                        <td>data</td>
                                        <td>SPD</td>
                                        <td>data</td>
                                    </tr>

                                </table>
                            </div>

                            <div class="grid-col-span-2 my-auto tab-inside__content--3" id="arbiter-3-hard">
                                <table class="grey-table">
                                    <tr>
                                        <td>Hull</td>
                                        <td>HARD</td>
                                        <td>HP</td>
                                        <td>data</td>
                                        <td>AA</td>
                                        <td>data</td>
                                        <td>EVA</td>
                                        <td>data</td>
                                    </tr>
                                    <tr>
                                        <td>Level</td>
                                        <td>data</td>
                                        <td>FP</td>
                                        <td>data</td>
                                        <td>AVI</td>
                                        <td>data</td>

                                        <td>LCK</td>
                                        <td>data</td>
                                    </tr>
                                    <tr>
                                        <td>Armor</td>
                                        <td>data</td>
                                        <td>TRP</td>
                                        <td>data</td>
                                        <td>ACC</td>
                                        <td>data</td>
                                        <td>SPD</td>
                                        <td>data</td>
                                    </tr>

                                </table>
                            </div>

                            <div>
                            </div>

                            <div class="grid-col-span-2">
                                Weakness: data
                            </div>

                        </div>

                        <div class="boss-card rounded-4 background-primary">
                            <div class="grid-col-span-2">
                                <h3>Defense Module : Stronghold Defender XII FULL</h3>
                            </div>
                            <div class="tab-inside my-auto ms-auto">
                                <button class="tab-inside__links--4"
                                    onclick="openTab(event,'arbiter-4-normal','tab-inside__content--4','tab-inside__links--4')"
                                    id="openDefault4">Normal</button>
                                <button class="tab-inside__links--4"
                                    onclick="openTab(event,'arbiter-4-hard','tab-inside__content--4','tab-inside__links--4')">Hard</button>
                            </div>

                            <div>
                                <img src="/resource/image/ALTG LOGO.png" alt="">
                            </div>

                            <div class="grid-col-span-2 my-auto tab-inside__content--4" id="arbiter-4-normal">
                                <table class="grey-table">
                                    <tr>
                                        <td>Hull</td>
                                        <td>NORMAL</td>
                                        <td>HP</td>
                                        <td>data</td>
                                        <td>AA</td>
                                        <td>data</td>
                                        <td>EVA</td>
                                        <td>data</td>
                                    </tr>
                                    <tr>
                                        <td>Level</td>
                                        <td>data</td>
                                        <td>FP</td>
                                        <td>data</td>
                                        <td>AVI</td>
                                        <td>data</td>

                                        <td>LCK</td>
                                        <td>data</td>
                                    </tr>
                                    <tr>
                                        <td>Armor</td>
                                        <td>data</td>
                                        <td>TRP</td>
                                        <td>data</td>
                                        <td>ACC</td>
                                        <td>data</td>
                                        <td>SPD</td>
                                        <td>data</td>
                                    </tr>

                                </table>
                            </div>

                            <div class="grid-col-span-2 my-auto tab-inside__content--4" id="arbiter-4-hard">
                                <table class="grey-table">
                                    <tr>
                                        <td>Hull</td>
                                        <td>hard</td>
                                        <td>HP</td>
                                        <td>data</td>
                                        <td>AA</td>
                                        <td>data</td>
                                        <td>EVA</td>
                                        <td>data</td>
                                    </tr>
                                    <tr>
                                        <td>Level</td>
                                        <td>data</td>
                                        <td>FP</td>
                                        <td>data</td>
                                        <td>AVI</td>
                                        <td>data</td>

                                        <td>LCK</td>
                                        <td>data</td>
                                    </tr>
                                    <tr>
                                        <td>Armor</td>
                                        <td>data</td>
                                        <td>TRP</td>
                                        <td>data</td>
                                        <td>ACC</td>
                                        <td>data</td>
                                        <td>SPD</td>
                                        <td>data</td>
                                    </tr>

                                </table>
                            </div>

                            <div>
                            </div>

                            <div class="grid-col-span-2">
                                Weakness: data
                            </div>

                        </div>
                    </div>

                </div>

                <div class="guild">
                    <div class="columns-three gap-3 altona-sans-12">
                        <h2>Guild Boss</h2>
                    </div>

                    <div>
                        <div class="boss-card rounded-4 background-primary">
                            <div class="grid-col-span-3">
                                <h3>Defense Module : Stronghold Defender XII</h3>
                            </div>
                            <div>
                                <img src="/resource/image/ALTG LOGO.png" alt="">
                            </div>
                            <div class="grid-col-span-2 my-auto">
                                <table class="grey-table">
                                    <tr>
                                        <td>Hull</td>
                                        <td>data</td>
                                        <td>HP</td>
                                        <td>data</td>
                                        <td>AA</td>
                                        <td>data</td>
                                        <td>EVA</td>
                                        <td>data</td>
                                    </tr>
                                    <tr>
                                        <td>Level</td>
                                        <td>data</td>
                                        <td>FP</td>
                                        <td>data</td>
                                        <td>AVI</td>
                                        <td>data</td>

                                        <td>LCK</td>
                                        <td>data</td>
                                    </tr>
                                    <tr>
                                        <td>Armor</td>
                                        <td>data</td>
                                        <td>TRP</td>
                                        <td>data</td>
                                        <td>ACC</td>
                                        <td>data</td>
                                        <td>SPD</td>
                                        <td>data</td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>



                </div>

                <div class="meta">
                    <div class="columns-three gap-3 altona-sans-12">
                        <h2>META Boss</h2>
                    </div>

                    <div class="d-grid gap-3">
                        <div class="boss-card rounded-4 background-primary">
                            <div class="grid-col-span-3">
                                <h3>Defense Module : Stronghold Defender XII</h3>
                            </div>
                            <div>
                                <img src="/resource/image/ALTG LOGO.png" alt="">
                            </div>
                            <div class="grid-col-span-2 my-auto">
                                <table class="grey-table">
                                    <tr>
                                        <td>Hull</td>
                                        <td>data</td>
                                        <td>HP</td>
                                        <td>data</td>
                                        <td>AA</td>
                                        <td>data</td>
                                        <td>EVA</td>
                                        <td>data</td>
                                    </tr>
                                    <tr>
                                        <td>Level</td>
                                        <td>data</td>
                                        <td>FP</td>
                                        <td>data</td>
                                        <td>AVI</td>
                                        <td>data</td>

                                        <td>LCK</td>
                                        <td>data</td>
                                    </tr>
                                    <tr>
                                        <td>Armor</td>
                                        <td>data</td>
                                        <td>TRP</td>
                                        <td>data</td>
                                        <td>ACC</td>
                                        <td>data</td>
                                        <td>SPD</td>
                                        <td>data</td>
                                    </tr>

                                </table>
                            </div>
                        </div>

                        <div class="boss-card rounded-4 background-primary">
                            <div class="grid-col-span-3">
                                <h3>Defense Module : Stronghold Defender XII</h3>
                            </div>
                            <div>
                                <img src="/resource/image/ALTG LOGO.png" alt="">
                            </div>
                            <div class="grid-col-span-2 my-auto">
                                <table class="grey-table">
                                    <tr>
                                        <td>Hull</td>
                                        <td>data</td>
                                        <td>HP</td>
                                        <td>data</td>
                                        <td>AA</td>
                                        <td>data</td>
                                        <td>EVA</td>
                                        <td>data</td>
                                    </tr>
                                    <tr>
                                        <td>Level</td>
                                        <td>data</td>
                                        <td>FP</td>
                                        <td>data</td>
                                        <td>AVI</td>
                                        <td>data</td>

                                        <td>LCK</td>
                                        <td>data</td>
                                    </tr>
                                    <tr>
                                        <td>Armor</td>
                                        <td>data</td>
                                        <td>TRP</td>
                                        <td>data</td>
                                        <td>ACC</td>
                                        <td>data</td>
                                        <td>SPD</td>
                                        <td>data</td>
                                    </tr>

                                </table>
                            </div>
                        </div>
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
