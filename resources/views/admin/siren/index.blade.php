@extends('layouts.admin')
@section('title', 'Siren Bosses')
@section('contents')
    <div class="m-3 d-grid gap-1">
        <div>
            <h1>Siren Bosses</h1>
            <p class="altona-sans-12">Manage the bosses</p>
        </div>
        <div>
            <a href="/admin/sirens/add">
                <button class="btn btn-primary"><span class="altona-sans-12">Add boss</span></button></a>
        </div>
    </div>

    <div class="m-3 overflow-x" style="width: 90vw">
        {{ $siren->links() }}
        <div class="card">
            <div class="card body">
                <table class="table w-100 table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Boss ID</th>
                            <th scope="col">Name <small>(Type)</small></th>
                            <th scope="col">Difficulty</th>
                            <th scope="col">Hull</th>
                            <th scope="col">Level</th>
                            <th scope="col">Armor</th>
                            <th scope="col">HP</th>
                            <th scope="col">FP</th>
                            <th scope="col">TRP</th>
                            <th scope="col">AA</th>
                            <th scope="col">AVI</th>
                            <th scope="col">ACC</th>
                            <th scope="col">EVA</th>
                            <th scope="col">LCK</th>
                            <th scope="col">SPD</th>
                            <th scope="col">Weakness</th>
                            <th scope="col">Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siren as $s)
                            <tr>
                                <td class="altona-sans-10">
                                    <div>{{ $s->id }}</div>
                                    <div>
                                        <a class="link-none altona-sans-10"
                                            href="/admin/sirens/edit/{{ $s->id }}"><button
                                                class="btn btn-outline-primary btn-sm">Edit</button></a>
                                    </div>
                                    <div>
                                        <a class="link-none altona-sans-10"
                                            href="/admin/sirens/delete/{{ $s->id }}"><button
                                                class="btn btn-outline-danger btn-sm">Delete</button></a>
                                    </div>
                                </td>
                                <td class="altona-sans-10">{{ $s->name }} <small>({{ $s->boss_type }})</small></td>
                                <td class="altona-sans-10">
                                    @if ($s->normal)
                                        Normal
                                    @endif
                                    @if ($s->hard)
                                        and Hard
                                    @endif
                                </td>
                                <td class="altona-sans-10">
                                    <div><b>None:</b></div>
                                    <div>{{ $s->normal->hull->hull_name }}</div>
                                    <div>{{ $s->hard?->hull->hull_name }}</div>
                                    <div><b>Full:</b></div>
                                    <div>{{ $s->fullNormal?->hull->hull_name }}</div>
                                    <div>{{ $s->fullHard?->hull->hull_name }}</div>
                                </td>
                                <td class="altona-sans-10">
                                    <div><b>None:</b></div>
                                    <div>{{ $s->normal->level }}</div>
                                    <div>{{ $s->hard?->level }}</div>
                                    <div><b>Full:</b></div>
                                    <div>{{ $s->fullNormal?->level }}</div>
                                    <div>{{ $s->fullHard?->level }}</div>
                                </td>
                                <td class="altona-sans-10">
                                    <div><b>None:</b></div>
                                    <div>{{ $s->normal->armor }}</div>
                                    <div>{{ $s->hard?->armor }}</div>
                                    <div><b>Full:</b></div>
                                    <div>{{ $s->fullNormal?->armor }}</div>
                                    <div>{{ $s->fullHard?->armor }}</div>
                                </td>
                                <td class="altona-sans-10">
                                    <div><b>None:</b></div>
                                    <div>{{ $s->normal->hp }}</div>
                                    <div>{{ $s->hard?->hp }}</div>
                                    <div><b>Full:</b></div>
                                    <div>{{ $s->fullNormal?->hp }}</div>
                                    <div>{{ $s->fullHard?->hp }}</div>
                                </td>
                                <td class="altona-sans-10">
                                    <div><b>None:</b></div>
                                    <div>{{ $s->normal->fp }}</div>
                                    <div>{{ $s->hard?->fp }}</div>
                                    <div><b>Full:</b></div>
                                    <div>{{ $s->fullNormal?->fp }}</div>
                                    <div>{{ $s->fullHard?->fp }}</div>
                                </td>
                                <td class="altona-sans-10">
                                    <div><b>None:</b></div>
                                    <div>{{ $s->normal->trp }}</div>
                                    <div>{{ $s->hard?->trp }}</div>
                                    <div><b>Full:</b></div>
                                    <div>{{ $s->fullNormal?->trp }}</div>
                                    <div>{{ $s->fullHard?->trp }}</div>
                                </td>
                                <td class="altona-sans-10">
                                    <div><b>None:</b></div>
                                    <div>{{ $s->normal->aa }}</div>
                                    <div>{{ $s->hard?->aa }}</div>
                                    <div><b>Full:</b></div>
                                    <div>{{ $s->fullNormal?->aa }}</div>
                                    <div>{{ $s->fullHard?->aa }}</div>
                                </td>
                                <td class="altona-sans-10">
                                    <div><b>None:</b></div>
                                    <div>{{ $s->normal->avi }}</div>
                                    <div>{{ $s->hard?->avi }}</div>
                                    <div><b>Full:</b></div>
                                    <div>{{ $s->fullNormal?->avi }}</div>
                                    <div>{{ $s->fullHard?->avi }}</div>
                                </td>
                                <td class="altona-sans-10">
                                    <div><b>None:</b></div>
                                    <div>{{ $s->normal->acc }}</div>
                                    <div>{{ $s->hard?->acc }}</div>
                                    <div><b>Full:</b></div>
                                    <div>{{ $s->fullNormal?->acc }}</div>
                                    <div>{{ $s->fullHard?->acc }}</div>
                                </td>
                                <td class="altona-sans-10">
                                    <div><b>None:</b></div>
                                    <div>{{ $s->normal->eva }}</div>
                                    <div>{{ $s->hard?->eva }}</div>
                                    <div><b>Full:</b></div>
                                    <div>{{ $s->fullNormal?->eva }}</div>
                                    <div>{{ $s->fullHard?->eva }}</div>
                                </td>
                                <td class="altona-sans-10">
                                    <div><b>None:</b></div>
                                    <div>{{ $s->normal->lck }}</div>
                                    <div>{{ $s->hard?->lck }}</div>
                                    <div><b>Full:</b></div>
                                    <div>{{ $s->fullNormal?->lck }}</div>
                                    <div>{{ $s->fullHard?->lck }}</div>
                                </td>
                                <td class="altona-sans-10">
                                    <div><b>None:</b></div>
                                    <div>{{ $s->normal->spd }}</div>
                                    <div>{{ $s->hard?->spd }}</div>
                                    <div><b>Full:</b></div>
                                    <div>{{ $s->fullNormal?->spd }}</div>
                                    <div>{{ $s->fullHard?->spd }}</div>
                                </td>

                                <td class="altona-sans-10">{{ $s->weakness }}</td>

                                <td><a class="altona-sans-10" href="{{ asset('storage/' . $s->img) }}">Image</a></td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>

        </div>
    </div>

@endsection
