@extends('layouts.admin')
@section('title', 'Factions')
@section('contents')
    <div class="m-3 d-grid gap-1">
        <div>
            <h1>Factions</h1>
            <p class="altona-sans-12">Manage Factions</p>
        </div>
        <div>
            <a href="/admin/factions/add"><button class="btn btn-primary">Add factions</button></a>
        </div>
    </div>
    <div class="m-3 overflow-x" style="width: 90vw">
        {{ $factions->links() }}
        <div class="card">
            <div class="card body">
                <table class="table w-100 table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Tag</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($factions as $s)
                            <tr>
                                <td class="altona-sans-10">
                                    <div>{{ $s->id }}</div>
                                    <div>
                                        <a class="link-none altona-sans-10"
                                            href="/admin/factions/edit/{{ $s->id }}"><button
                                                class="btn btn-outline-primary btn-sm">Edit</button></a>
                                    </div>
                                    @if ($s->id != 1)
                                        <div>
                                            <a class="link-none altona-sans-10"
                                                href="/admin/factions/delete/{{ $s->id }}"><button
                                                    class="btn btn-outline-danger btn-sm">Delete</button></a>
                                        </div>
                                    @endif

                                </td>
                                <td class="altona-sans-10">{{ $s->faction_name }}</td>
                                <td class="altona-sans-10">{{ $s->faction_tag }}</td>
                                <td class="altona-sans-10">{{ $s->faction_slug }}</td>
                                <td><a class="altona-sans-10" href="{{ asset('storage/' . $s->faction_img) }}">Image</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    </div>

@endsection
