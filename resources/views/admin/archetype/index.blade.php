@extends('layouts.admin')
@section('title', 'Archetypes')
@section('contents')
    <div class="m-3 d-grid gap-1">
        <div>
            <h1>Archetypes</h1>
            <p class="altona-sans-12">Manage Archetypes</p>
        </div>
        <div>
            <a href="/admin/archetypes/add"><button class="btn btn-primary">Add archetypes</button></a>
        </div>
    </div>
    <div class="m-3 overflow-x" style="width: 90vw">
        {{ $archetypes->links() }}
        <div class="card">
            <div class="card body">
                <table class="table w-100 table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Slug</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($archetypes as $s)
                            <tr>
                                <td class="altona-sans-10 w-25">
                                    <span>{{ $s->id }}</span>
                                    <span>
                                        <a class="link-none altona-sans-10"
                                            href="/admin/archetypes/edit/{{ $s->id }}"><button
                                                class="btn btn-outline-primary btn-sm"><i
                                                    class="bi bi-pencil-fill"></i></button></a>
                                    </span>
                                    <span>
                                        <a class="link-none altona-sans-10"
                                            href="/admin/archetypes/delete/{{ $s->id }}"><button
                                                class="btn btn-outline-danger btn-sm"><i
                                                    class="bi bi-trash3-fill"></i></button></a>
                                    </span>
                                </td>
                                <td class="altona-sans-10">{{ $s->archetype_name }}</td>
                                <td class="altona-sans-10">{{ $s->archetype_slug }}</td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    </div>

@endsection
