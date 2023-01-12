@extends('layouts.layout')
@section('title', 'Siren Stats')
@section('contents')
    <section class="hero ">
        <div class="container">
            <div class="bg-overlay">
                <div class="bosses text-white">

                    <div class="page-title">
                        <h1>Operation Siren Boss Stats</h1>
                        {{-- <span class="altona-sans-12">Last Updated: {{ $last_updated->updated_at }}</span> --}}
                    </div>

                    <div class="bg-nav p-4 rounded border">
                        <div class="columns-two__2-4">
                            <h2>Stronghold Boss</h2>
                            <div class="tab r-grid gap-3">
                                <div class="my-auto">Adaptability</div>
                                <button onclick="openTab(event, 'stronghold-none',  'stronghold', 'tab__links', 'block')"
                                    class="bossLink altona-sans-12 border tab__links active">None</button>
                                <button onclick="openTab(event, 'stronghold-full',  'stronghold', 'tab__links', 'block')"
                                    class="bossLink altona-sans-12 border tab__links">Full</button>
                            </div>
                        </div>

                        <div class="stronghold" id="stronghold-none" style="display:none;">
                            @foreach ($sirens as $s)
                                @if ($s->boss_type == 'stronghold')
                                    <div class="r-show card">
                                        <div class="card-body bg-gray1">
                                            <img src="{{ asset('storage/' . $s->img) }}" class="siren-img mb-2 rounded"
                                                alt="siren-img">
                                            <h3>{{ $s->name }}</h3>
                                            <hr>
                                            <div class="row altona-sans-10">
                                                <div class="col-4">
                                                    Hull
                                                </div>
                                                <div class="col-6">
                                                    {{ $s->normal->hull->hull_name }}
                                                </div>
                                                <div class="col-4">
                                                    Level
                                                </div>
                                                <div class="col-6">
                                                    {{ $s->normal->level }}
                                                </div>
                                                <div class="col-4">
                                                    Armor
                                                </div>
                                                <div class="col-6">
                                                    {{ $s->normal->armor }}
                                                </div>

                                                <div class="d-flex justify-content-end mt-3">
                                                    <button class="btn btn-sm btn-outline-light altona-sans-10 "
                                                        id="button-{{ $s->id }}" data-id="{{ $s->normal->id }}"
                                                        onclick="dropdown(this)">
                                                        More details
                                                    </button>
                                                </div>


                                                <div class="d-none row mt-1 altona-sans-10" id="{{ $s->normal->id }}">
                                                    <div class="col-4">
                                                        FP
                                                    </div>
                                                    <div class="col-6">
                                                        {{ $s->normal->fp }}
                                                    </div>
                                                    <div class="col-4">
                                                        HP
                                                    </div>
                                                    <div class="col-6">
                                                        {{ $s->normal->hp }}
                                                    </div>
                                                    <div class="col-4">
                                                        TRP
                                                    </div>
                                                    <div class="col-6">
                                                        {{ $s->normal->trp }}
                                                    </div>
                                                    <div class="col-4">
                                                        AA
                                                    </div>
                                                    <div class="col-6">
                                                        {{ $s->normal->aa }}
                                                    </div>
                                                    <div class="col-4">
                                                        AVI
                                                    </div>
                                                    <div class="col-6">
                                                        {{ $s->normal->avi }}
                                                    </div>
                                                    <div class="col-4">
                                                        ACC
                                                    </div>
                                                    <div class="col-6">
                                                        {{ $s->normal->acc }}
                                                    </div>
                                                    <div class="col-4">
                                                        EVA
                                                    </div>
                                                    <div class="col-6">
                                                        {{ $s->normal->eva }}
                                                    </div>
                                                    <div class="col-4">
                                                        LCK
                                                    </div>
                                                    <div class="col-6">
                                                        {{ $s->normal->lck }}
                                                    </div>
                                                    <div class="col-4">
                                                        SPD
                                                    </div>
                                                    <div class="col-6">
                                                        {{ $s->normal->spd }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="r-hide">
                                        <h3 class="mt-3">{{ $s->name }}</h3>
                                        <div class="columns-two__1-5 bg-nav">
                                            <div>
                                                <img src="{{ asset('storage/' . $s->img) }}" class="siren-img rounded"
                                                    alt="siren-img">
                                            </div>
                                            <div class="columns-four gap-0 ">
                                                <div>
                                                    <table class="grey-table">
                                                        <tbody>
                                                            <tr>
                                                                <td>Hull</td>
                                                                <td>{{ $s->normal->hull->hull_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Level</td>
                                                                <td>{{ $s->normal->level }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Armor</td>
                                                                <td>{{ $s->normal->armor }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div>
                                                    <table class="grey-table">
                                                        <tbody>
                                                            <tr>
                                                                <td>FP</td>
                                                                <td>{{ $s->normal->fp }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>HP</td>
                                                                <td>{{ $s->normal->hp }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>TRP</td>
                                                                <td>{{ $s->normal->trp }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div>
                                                    <table class="grey-table">
                                                        <tbody>
                                                            <tr>
                                                                <td>AA</td>
                                                                <td>{{ $s->normal->aa }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>AVI</td>
                                                                <td>{{ $s->normal->avi }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>ACC</td>
                                                                <td>{{ $s->normal->acc }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div>
                                                    <table class="grey-table">
                                                        <tbody>
                                                            <tr>
                                                                <td>EVA</td>
                                                                <td>{{ $s->normal->eva }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>LCK</td>
                                                                <td>{{ $s->normal->lck }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>SPD</td>
                                                                <td>{{ $s->normal->spd }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                        </div>


                        <div class="stronghold" id="stronghold-full" style="display:none;">
                            @foreach ($sirens as $s)
                                @if ($s->boss_type == 'stronghold')
                                    <div>
                                        <h3 class="mt-3">{{ $s->name }}</h3>
                                        <div class="columns-two__1-5 bg-nav">
                                            <div>
                                                <img src="{{ asset('storage/' . $s->img) }}" class="siren-img rounded"
                                                    alt="siren-img">
                                            </div>
                                            <div class="columns-four gap-0">
                                                <div>
                                                    <table class="grey-table">
                                                        <tbody>
                                                            <tr>
                                                                <td>Hull</td>
                                                                <td>{{ $s->fullNormal->hull->hull_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Level</td>
                                                                <td>{{ $s->fullNormal->level }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Armor</td>
                                                                <td>{{ $s->fullNormal->armor }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div>
                                                    <table class="grey-table">
                                                        <tbody>
                                                            <tr>
                                                                <td>FP</td>
                                                                <td>{{ $s->fullNormal->fp }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>HP</td>
                                                                <td>{{ $s->fullNormal->hp }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>TRP</td>
                                                                <td>{{ $s->fullNormal->trp }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div>
                                                    <table class="grey-table">
                                                        <tbody>
                                                            <tr>
                                                                <td>AA</td>
                                                                <td>{{ $s->fullNormal->aa }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>AVI</td>
                                                                <td>{{ $s->fullNormal->avi }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>ACC</td>
                                                                <td>{{ $s->fullNormal->acc }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div>
                                                    <table class="grey-table">
                                                        <tbody>
                                                            <tr>
                                                                <td>EVA</td>
                                                                <td>{{ $s->fullNormal->eva }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>LCK</td>
                                                                <td>{{ $s->fullNormal->lck }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>SPD</td>
                                                                <td>{{ $s->fullNormal->spd }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                    </div>

                    <div class="bg-nav p-4 rounded border">
                        <div class="columns-two__2-4">
                            <h2>Abyssal Boss</h2>
                            <div class="tab r-grid gap-3">
                                <div class="my-auto">Adaptability</div>
                                <button onclick="openTab(event, 'abyssal-none',  'abyssal', 'tab__links--2', 'block')"
                                    class="bossLink altona-sans-12 border tab__links--2 active">None</button>
                                <button onclick="openTab(event, 'abyssal-full',  'abyssal', 'tab__links--2', 'block')"
                                    class="bossLink altona-sans-12 border tab__links--2">Full</button>
                            </div>
                        </div>
                        <div class="abyssal" id="abyssal-none" style="display:none;">

                            @foreach ($sirens as $s)
                                @if ($s->boss_type == 'abyssal')
                                    <div>
                                        <h3 class="mt-3">{{ $s->name }}</h3>
                                        <div class="columns-two__1-5 bg-nav">
                                            <div>
                                                <img src="{{ asset('storage/' . $s->img) }}" class="siren-img rounded"
                                                    alt="siren-img">
                                            </div>
                                            <div class="columns-four gap-0">
                                                <div>
                                                    <table class="grey-table">
                                                        <tbody>
                                                            <tr>
                                                                <td>Hull</td>
                                                                <td>{{ $s->normal->hull->hull_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Level</td>
                                                                <td>{{ $s->normal->level }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Armor</td>
                                                                <td>{{ $s->normal->armor }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div>
                                                    <table class="grey-table">
                                                        <tbody>
                                                            <tr>
                                                                <td>FP</td>
                                                                <td>{{ $s->normal->fp }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>HP</td>
                                                                <td>{{ $s->normal->hp }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>TRP</td>
                                                                <td>{{ $s->normal->trp }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div>
                                                    <table class="grey-table">
                                                        <tbody>
                                                            <tr>
                                                                <td>AA</td>
                                                                <td>{{ $s->normal->aa }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>AVI</td>
                                                                <td>{{ $s->normal->avi }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>ACC</td>
                                                                <td>{{ $s->normal->acc }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div>
                                                    <table class="grey-table">
                                                        <tbody>
                                                            <tr>
                                                                <td>EVA</td>
                                                                <td>{{ $s->normal->eva }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>LCK</td>
                                                                <td>{{ $s->normal->lck }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>SPD</td>
                                                                <td>{{ $s->normal->spd }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>



                        <div class="abyssal" id="abyssal-full" style="display:none;">
                            @foreach ($sirens as $s)
                                @if ($s->boss_type == 'abyssal')
                                    <div>
                                        <h3 class="mt-3">{{ $s->name }}</h3>
                                        <div class="columns-two__1-5 bg-nav">
                                            <div>
                                                <img src="{{ asset('storage/' . $s->img) }}" class="siren-img rounded"
                                                    alt="siren-img">
                                            </div>
                                            <div class="columns-four gap-0">
                                                <div>
                                                    <table class="grey-table">
                                                        <tbody>
                                                            <tr>
                                                                <td>Hull</td>
                                                                <td>{{ $s->fullNormal->hull->hull_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Level</td>
                                                                <td>{{ $s->fullNormal->level }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Armor</td>
                                                                <td>{{ $s->fullNormal->armor }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div>
                                                    <table class="grey-table">
                                                        <tbody>
                                                            <tr>
                                                                <td>FP</td>
                                                                <td>{{ $s->fullNormal->fp }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>HP</td>
                                                                <td>{{ $s->fullNormal->hp }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>TRP</td>
                                                                <td>{{ $s->fullNormal->trp }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div>
                                                    <table class="grey-table">
                                                        <tbody>
                                                            <tr>
                                                                <td>AA</td>
                                                                <td>{{ $s->fullNormal->aa }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>AVI</td>
                                                                <td>{{ $s->fullNormal->avi }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>ACC</td>
                                                                <td>{{ $s->fullNormal->acc }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div>
                                                    <table class="grey-table">
                                                        <tbody>
                                                            <tr>
                                                                <td>EVA</td>
                                                                <td>{{ $s->fullNormal->eva }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>LCK</td>
                                                                <td>{{ $s->fullNormal->lck }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>SPD</td>
                                                                <td>{{ $s->fullNormal->spd }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="bg-nav p-4 rounded border">
                        <div class="columns-two__2-4">
                            <h2>Arbiter Boss</h2>
                            <div class="tab r-grid gap-3">
                                <div class="my-auto">Adaptability</div>
                                <button
                                    onclick="openTab(event, 'arbiter-none',  'arbiter', 'tab__links--3 border', 'grid')"
                                    class="tab__links--3 altona-sans-12 border active">None</button>
                                <button
                                    onclick="openTab(event, 'arbiter-full',  'arbiter', 'tab__links--3 border', 'grid')"
                                    class="tab__links--3 altona-sans-12 border">Full</button>
                            </div>
                        </div>
                        <div class="arbiter" id="arbiter-none" style="display:none;">
                            @foreach ($sirens as $key => $s)
                                @if ($s->boss_type == 'arbiter')
                                    <div class="columns-two__4-2">
                                        <h3 class="mt-3">{{ $s->name }}</h3>
                                        <div class="tab ms-auto mb-2">
                                            <button
                                                onclick="openTab(event, 'arbiter-none-normal-{{ $key }}',  'arbiter-d-{{ $key }}', 'bossLink-none-{{ $key }}', 'grid')"
                                                class="bossLink-none-{{ $key }} active tab__links border">Normal</button>

                                            <button
                                                onclick="openTab(event, 'arbiter-none-hard-{{ $key }}',  'arbiter-d-{{ $key }}', 'bossLink-none-{{ $key }}', 'grid')"
                                                class="bossLink-none-{{ $key }} tab__links border">Hard</button>
                                        </div>
                                    </div>
                                    <div class="columns-two__1-5 bg-nav">
                                        <div>
                                            <img src="{{ asset('storage/' . $s->img) }}" class="siren-img rounded"
                                                alt="siren-img">

                                        </div>
                                        <div class="columns-four gap-0 arbiter-d-{{ $key }}"
                                            id="arbiter-none-normal-{{ $key }}">
                                            <div>
                                                <table class="grey-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Hull</td>
                                                            <td>{{ $s->normal->hull->hull_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Level</td>
                                                            <td>{{ $s->normal->level }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Armor</td>
                                                            <td>{{ $s->normal->armor }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div>
                                                <table class="grey-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>FP</td>
                                                            <td>{{ $s->normal->fp }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>HP</td>
                                                            <td>{{ $s->normal->hp }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>TRP</td>
                                                            <td>{{ $s->normal->trp }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div>
                                                <table class="grey-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>AA</td>
                                                            <td>{{ $s->normal->aa }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>AVI</td>
                                                            <td>{{ $s->normal->avi }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>ACC</td>
                                                            <td>{{ $s->normal->acc }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div>
                                                <table class="grey-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>EVA</td>
                                                            <td>{{ $s->normal->eva }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>LCK</td>
                                                            <td>{{ $s->normal->lck }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>SPD</td>
                                                            <td>{{ $s->normal->spd }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="columns-four gap-0 arbiter-d-{{ $key }}"
                                            id="arbiter-none-hard-{{ $key }}">
                                            <div>
                                                <table class="grey-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Hull</td>
                                                            <td>{{ $s->hard->hull->hull_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Level</td>
                                                            <td>{{ $s->hard->level }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Armor</td>
                                                            <td>{{ $s->hard->armor }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div>
                                                <table class="grey-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>FP</td>
                                                            <td>{{ $s->hard->fp }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>HP</td>
                                                            <td>{{ $s->hard->hp }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>TRP</td>
                                                            <td>{{ $s->hard->trp }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div>
                                                <table class="grey-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>AA</td>
                                                            <td>{{ $s->hard->aa }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>AVI</td>
                                                            <td>{{ $s->hard->avi }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>ACC</td>
                                                            <td>{{ $s->hard->acc }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div>
                                                <table class="grey-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>EVA</td>
                                                            <td>{{ $s->hard->eva }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>LCK</td>
                                                            <td>{{ $s->hard->lck }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>SPD</td>
                                                            <td>{{ $s->hard->spd }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        <div class="arbiter" id="arbiter-full" style="display:none;">
                            @foreach ($sirens as $key => $s)
                                @if ($s->boss_type == 'arbiter')
                                    <div class="columns-two__4-2">
                                        <h3 class="mt-3">{{ $s->name }}</h3>
                                        <div class="tab ms-auto mb-2">
                                            <button
                                                onclick="openTab(event, 'arbiter-full-normal-{{ $key }}',  'arbiter-d-full-{{ $key }}', 'bossLink-full-{{ $key }}', 'grid')"
                                                class="bossLink-full-{{ $key }} active tab__links border">Normal</button>

                                            <button
                                                onclick="openTab(event, 'arbiter-full-hard-{{ $key }}',  'arbiter-d-full-{{ $key }}', 'bossLink-full-{{ $key }}', 'grid')"
                                                class="bossLink-full-{{ $key }} tab__links border">Hard</button>
                                        </div>
                                    </div>
                                    <div class="columns-two__1-5 bg-nav">
                                        <div>
                                            <img src="{{ asset('storage/' . $s->img) }}" class="siren-img rounded"
                                                alt="siren-img">

                                        </div>
                                        <div class="columns-four gap-0 arbiter-d-full-{{ $key }}"
                                            id="arbiter-full-normal-{{ $key }}">
                                            <div>
                                                <table class="grey-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Hull</td>
                                                            <td>{{ $s->fullNormal->hull->hull_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Level</td>
                                                            <td>{{ $s->fullNormal->level }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Armor</td>
                                                            <td>{{ $s->fullNormal->armor }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div>
                                                <table class="grey-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>FP</td>
                                                            <td>{{ $s->fullNormal->fp }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>HP</td>
                                                            <td>{{ $s->fullNormal->hp }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>TRP</td>
                                                            <td>{{ $s->fullNormal->trp }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div>
                                                <table class="grey-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>AA</td>
                                                            <td>{{ $s->fullNormal->aa }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>AVI</td>
                                                            <td>{{ $s->fullNormal->avi }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>ACC</td>
                                                            <td>{{ $s->fullNormal->acc }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div>
                                                <table class="grey-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>EVA</td>
                                                            <td>{{ $s->fullNormal->eva }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>LCK</td>
                                                            <td>{{ $s->fullNormal->lck }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>SPD</td>
                                                            <td>{{ $s->fullNormal->spd }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="columns-four gap-0 arbiter-d-full-{{ $key }}"
                                            id="arbiter-full-hard-{{ $key }}">
                                            <div>
                                                <table class="grey-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Hull</td>
                                                            <td>{{ $s->fullHard->hull->hull_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Level</td>
                                                            <td>{{ $s->fullHard->level }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Armor</td>
                                                            <td>{{ $s->fullHard->armor }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div>
                                                <table class="grey-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>FP</td>
                                                            <td>{{ $s->fullHard->fp }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>HP</td>
                                                            <td>{{ $s->fullHard->hp }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>TRP</td>
                                                            <td>{{ $s->fullHard->trp }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div>
                                                <table class="grey-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>AA</td>
                                                            <td>{{ $s->fullHard->aa }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>AVI</td>
                                                            <td>{{ $s->fullHard->avi }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>ACC</td>
                                                            <td>{{ $s->fullHard->acc }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div>
                                                <table class="grey-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>EVA</td>
                                                            <td>{{ $s->fullHard->eva }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>LCK</td>
                                                            <td>{{ $s->fullHard->lck }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>SPD</td>
                                                            <td>{{ $s->fullHard->spd }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                    </div>

                    <div class="bg-nav p-4 rounded border">
                        <h2>Guild Boss</h2>
                        @foreach ($sirens as $s)
                            @if ($s->boss_type == 'guild')
                                <h3 class="mt-3">{{ $s->name }}</h3>
                                <div class="columns-two__1-5 bg-nav">
                                    <div>
                                        <img src="{{ asset('storage/' . $s->img) }}" class="siren-img rounded"
                                            alt="siren-img">
                                    </div>
                                    <div class="columns-four gap-0">
                                        <div>
                                            <table class="grey-table">
                                                <tbody>
                                                    <tr>
                                                        <td>Hull</td>
                                                        <td>{{ $s->normal->hull->hull_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Level</td>
                                                        <td>{{ $s->normal->level }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Armor</td>
                                                        <td>{{ $s->normal->armor }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div>
                                            <table class="grey-table">
                                                <tbody>
                                                    <tr>
                                                        <td>FP</td>
                                                        <td>{{ $s->normal->fp }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>HP</td>
                                                        <td>{{ $s->normal->hp }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>TRP</td>
                                                        <td>{{ $s->normal->trp }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div>
                                            <table class="grey-table">
                                                <tbody>
                                                    <tr>
                                                        <td>AA</td>
                                                        <td>{{ $s->normal->aa }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>AVI</td>
                                                        <td>{{ $s->normal->avi }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>ACC</td>
                                                        <td>{{ $s->normal->acc }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div>
                                            <table class="grey-table">
                                                <tbody>
                                                    <tr>
                                                        <td>EVA</td>
                                                        <td>{{ $s->normal->eva }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>LCK</td>
                                                        <td>{{ $s->normal->lck }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>SPD</td>
                                                        <td>{{ $s->normal->spd }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <div class="bg-nav p-4 rounded border">
                        <h2>Meta Boss</h2>
                        @foreach ($sirens as $s)
                            @if ($s->boss_type == 'meta')
                                <h3 class="mt-3">{{ $s->name }}</h3>
                                <div class="columns-two__1-5 bg-nav">
                                    <div>
                                        <img src="{{ asset('storage/' . $s->img) }}" class="siren-img rounded"
                                            alt="siren-img">
                                    </div>
                                    <div class="columns-four gap-0">
                                        <div>
                                            <table class="grey-table">
                                                <tbody>
                                                    <tr>
                                                        <td>Hull</td>
                                                        <td>{{ $s->normal->hull->hull_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Level</td>
                                                        <td>{{ $s->normal->level }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Armor</td>
                                                        <td>{{ $s->normal->armor }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div>
                                            <table class="grey-table">
                                                <tbody>
                                                    <tr>
                                                        <td>FP</td>
                                                        <td>{{ $s->normal->fp }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>HP</td>
                                                        <td>{{ $s->normal->hp }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>TRP</td>
                                                        <td>{{ $s->normal->trp }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div>
                                            <table class="grey-table">
                                                <tbody>
                                                    <tr>
                                                        <td>AA</td>
                                                        <td>{{ $s->normal->aa }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>AVI</td>
                                                        <td>{{ $s->normal->avi }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>ACC</td>
                                                        <td>{{ $s->normal->acc }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div>
                                            <table class="grey-table">
                                                <tbody>
                                                    <tr>
                                                        <td>EVA</td>
                                                        <td>{{ $s->normal->eva }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>LCK</td>
                                                        <td>{{ $s->normal->lck }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>SPD</td>
                                                        <td>{{ $s->normal->spd }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>

                </div>
            </div>
        </div>


    </section>

@endsection
