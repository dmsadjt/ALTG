@extends('layouts.admin')
@section('title', 'Roles')
@section('contents')
    <div class="m-3 d-grid gap-1">
        <div>
            <h1>Roles</h1>
            <p class="altona-sans-12">Manage Roles</p>
        </div>
        <div>
            <a href="/admin/roles/add"><button class="btn btn-primary">Add roles</button></a>
        </div>
    </div>
    <div class="m-3 overflow-x" style="width: 90vw">
        {{ $roles->links() }}
        <div class="card">
            <div class="card body">
                <table class="table w-100 table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Faction</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $s)
                            <tr>
                                <td class="altona-sans-10 w-25">
                                    <span>{{ $s->id }}</span>
                                    <span>
                                        <a class="link-none altona-sans-10"
                                            href="/admin/roles/edit/{{ $s->id }}"><button
                                                class="btn btn-outline-primary btn-sm">Edit</button></a>
                                    </span>
                                    <span>
                                        <a class="link-none altona-sans-10"
                                            href="/admin/roles/delete/{{ $s->id }}"><button
                                                class="btn btn-outline-danger btn-sm">Delete</button></a>
                                    </span>
                                </td>
                                <td class="altona-sans-10">{{ $s->role_name }}</td>
                                <td class="altona-sans-10">{{ $s->role_slug }}</td>
                                <td class="altona-sans-10">
                                    <ul style="list-style: none; padding:0">
                                        @foreach ($s->factions as $f)
                                            <li>{{ $f->faction_name }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
