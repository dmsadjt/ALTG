@extends('layouts.admin')
@section('title', 'Ships')
@section('contents')
    <div class="m-3 columns-two">
        <div>
            <h1>Ships</h1>
            <p class="altona-sans-12">Manage the ships</p>
        </div>
        <div class="ms-auto mt-auto">
            <a href="/ships/add"><button class="btn btn-primary">Add ships</button></a>
        </div>
    </div>
    <div class="m-3 overflow-x">
        <div class="card">
            <div class="card body">
                <table class="table w-100 table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Ship ID</th>
                            <th scope="col">Ship Name</th>
                            <th scope="col">Hull type</th>
                            <th scope="col">Rarity</th>
                            <th scope="col">Positions</th>
                            <th scope="col">Roles</th>
                            <th scope="col">Archetypes</th>
                            <th scope="col">Gears</th>
                            <th scope="col">Sprite</th>
                            <th scope="col">Chibi Sprite</th>
                            <th scope="col">Notes</th>
                        </tr>
                    </thead>
                    <tbody >
                        @foreach ($ships as $s)
                            <tr>
                                <td class="altona-sans-10">
                                    <div>{{ $s->id }}</div>
                                    <div>
                                        <a class="link-none altona-sans-10" href="/ships/edit/{{$s->id}}"><button class="btn btn-outline-primary btn-sm">Edit</button></a>
                                    </div>
                                    <div>
                                        <a class="link-none altona-sans-10" href="/ships/delete/{{$s->id}}"><button class="btn btn-outline-danger btn-sm" >Delete</button></a>
                                    </div>
                            </td>
                                <td class="altona-sans-10">{{ $s->name }}</td>
                                <td class="altona-sans-10">{{ $s->hull->hull_name }}</td>
                                <td class="altona-sans-10">{{ $s->rarity->rarity_name }}</td>
                                <td class="altona-sans-10">
                                    <ul class="nav-style-none m-0 p-0">
                                        @foreach ($s->positions as $p)
                                            <li>{{ $p->position_name }}</li>
                                        @endforeach
                                    </ul>

                                </td>
                                <td class="altona-sans-10" style="width: 8em;">
                                    <ul class="nav-style-none  m-0 p-0">
                                        @foreach ($s->roles as $r)
                                            <li>{{ $r->role_name }}</li>
                                        @endforeach
                                    </ul>

                                </td>
                                <td class="altona-sans-10">
                                    <ul class="nav-style-none  m-0 p-0">
                                        @foreach ($s->archetypes as $a)
                                            <li>{{ $a->archetype_name }}</li>
                                        @endforeach
                                    </ul>

                                </td>

                                <td class="altona-sans-10" style="width: 10em;">
                                    <ul class="nav-style-none  m-0 p-0">
                                        @foreach ($s->gears as $g)
                                            <li>{{ $g->gear_name }}</li>
                                        @endforeach
                                    </ul>

                                </td>

                                <td><a class="altona-sans-10" href="/img/ships/sprites/{{$s->sprite}}">{{ $s->sprite }}</a></td>
                                <td><a class="altona-sans-10" href="/img/ships/chibi/{{$s->chibi_sprite}}">{{ $s->chibi_sprite }}</a></td>
                                <td class="altona-sans-10">{{ $s->notes }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                    {{$ships->links()}}
                </table>
            </div>
        </div>
    </div>

@endsection