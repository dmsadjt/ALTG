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



                    <div class="bg-gray1 p-4 rounded border">
                        <h2>Stronghold Boss</h2>
                        @foreach ($sirens as $s)
                            @if ($s->boss_type == 'stronghold')
                                <h3 class="mt-3">{{ $s->name }}</h3>
                                <div class="columns-two__1-5 bg-nav">
                                    <div>
                                        <img src="{{ asset('storage/' . $s->img) }}" class="siren-img rounded"
                                            alt="siren-img">
                                    </div>
                                    <div class="columns-four">
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

                    <div class="bg-gray1 p-4 rounded border">
                        <h2>Abyssal Boss</h2>
                        @foreach ($sirens as $s)
                            @if ($s->boss_type == 'abyssal')
                                <h3 class="mt-3">{{ $s->name }}</h3>
                                <div class="columns-two__1-5 bg-nav">
                                    <div>
                                        <img src="{{ asset('storage/' . $s->img) }}" class="siren-img rounded"
                                            alt="siren-img">
                                    </div>
                                    <div class="columns-four">
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

                    <div class="bg-gray1 p-4 rounded border">
                        <h2>Arbiter Boss</h2>
                        @foreach ($sirens as $s)
                            @if ($s->boss_type == 'arbiter')
                                <h3 class="mt-3">{{ $s->name }}</h3>
                                <div class="columns-two__1-5 bg-nav">
                                    <div>
                                        <img src="{{ asset('storage/' . $s->img) }}" class="siren-img rounded"
                                            alt="siren-img">
                                    </div>
                                    <div class="columns-four">
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

                    <div class="bg-gray1 p-4 rounded border">
                        <h2>Guild Boss</h2>
                        @foreach ($sirens as $s)
                            @if ($s->boss_type == 'guild')
                                <h3 class="mt-3">{{ $s->name }}</h3>
                                <div class="columns-two__1-5 bg-nav">
                                    <div>
                                        <img src="{{ asset('storage/' . $s->img) }}" class="siren-img rounded"
                                            alt="siren-img">
                                    </div>
                                    <div class="columns-four">
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

                    <div class="bg-gray1 p-4 rounded border">
                        <h2>Meta Boss</h2>
                        @foreach ($sirens as $s)
                            @if ($s->boss_type == 'stronghold')
                                <h3 class="mt-3">{{ $s->name }}</h3>
                                <div class="columns-two__1-5 bg-nav">
                                    <div>
                                        <img src="{{ asset('storage/' . $s->img) }}" class="siren-img rounded"
                                            alt="siren-img">
                                    </div>
                                    <div class="columns-four">
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
