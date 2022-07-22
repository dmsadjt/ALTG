@extends('layouts.admin')
@section('title', 'Siren Bosses')
@section('contents')
    <div class="m-3 columns-two">
        <div>
            <h1>Siren Bosses</h1>
            <p class="altona-sans-12">Manage the bosses</p>
        </div>
    </div>
    <div class="m-3 overflow-x">
        <div class="card">
            <div class="card body">
                <table class="table w-100 table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Boss ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Type</th>
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
                    <tbody >
                        @foreach ($siren as $s)
                            <tr>
                                <td class="altona-sans-10">
                                    <div>{{ $s->id }}</div>
                                    <div>
                                        <a class="link-none altona-sans-10" href="/admin/sirens/edit/{{$s->id}}"><button class="btn btn-outline-primary btn-sm">Edit</button></a>
                                    </div>
                            </td>
                                <td class="altona-sans-10">{{ $s->name }}</td>
                                <td class="altona-sans-10">{{ $s->boss_type }}</td>
                                <td class="altona-sans-10">{{ $s->difficulty}}</td>
                                <td class="altona-sans-10">{{ $s->hull}}</td>
                                <td class="altona-sans-10">{{ $s->level}}</td>
                                <td class="altona-sans-10">{{ $s->armor}}</td>
                                <td class="altona-sans-10">{{ $s->hp}}</td>
                                <td class="altona-sans-10">{{ $s->fp}}</td>
                                <td class="altona-sans-10">{{ $s->trp}}</td>
                                <td class="altona-sans-10">{{ $s->aa}}</td>
                                <td class="altona-sans-10">{{ $s->avi}}</td>
                                <td class="altona-sans-10">{{ $s->acc}}</td>
                                <td class="altona-sans-10">{{ $s->eva}}</td>
                                <td class="altona-sans-10">{{ $s->lck}}</td>
                                <td class="altona-sans-10">{{ $s->spd}}</td>
                                <td class="altona-sans-10">{{ $s->weakness}}</td>
                                <td><a class="altona-sans-10" href="/img/siren/{{$s->img}}">Image</a></td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
            {{$siren->links()}}
        </div>
    </div>

@endsection
