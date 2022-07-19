@extends('layouts.admin')
@section('title', 'Archetypes')
@section('contents')
    <div class="m-3 columns-two">
        <div>
            <h1>Archetypes</h1>
            <p class="altona-sans-12">Manage Archetypes</p>
        </div>
        <div class="ms-auto mt-auto">
            <a href="/archetypes/add"><button class="btn btn-primary">Add archetypes</button></a>
        </div>
    </div>
    <div class="m-3 overflow-x">
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
                    <tbody >
                        @foreach ($archetypes as $s)
                            <tr>
                                <td class="altona-sans-10 w-25">
                                    <span>{{ $s->id }}</span>
                                    <span>
                                        <a class="link-none altona-sans-10" href="/archetypes/edit/{{$s->id}}"><button class="btn btn-outline-primary btn-sm">Edit</button></a>
                                    </span>
                                    <span>
                                        <a class="link-none altona-sans-10" href="/admin/archetypes/delete/{{$s->id}}"><button class="btn btn-outline-danger btn-sm" >Delete</button></a>
                                    </span>
                            </td>
                                <td class="altona-sans-10">{{ $s->archetype_name }}</td>
                                <td class="altona-sans-10">{{ $s->archetype_slug }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                    {{$archetypes->links()}}
                </table>
            </div>
        </div>
    </div>

@endsection
