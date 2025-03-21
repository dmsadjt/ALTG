@extends('layouts.admin')
@section('title', 'Hulls')
@section('contents')
    <div class="m-3 d-grid gap-1">
        <div>
            <h1>Hulls</h1>
            <p class="altona-sans-12">Manage Hulls</p>
        </div>
        <div>
            <a href="/admin/hulls/add"><button class="btn btn-primary">Add hulls</button></a>
        </div>
    </div>
    <div class="m-3 overflow-x" style="width: 90vw">
        {{ $hulls->links() }}
        <div class="card">
            <div class="card body">
                <table class="table w-100 table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Sub-classes</th>
                            <th scope="col">Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hulls as $s)
                            <tr>
                                <td class="altona-sans-10">
                                    <span>{{ $s->id }}</span>
                                    <span>
                                        <a class="link-none altona-sans-10"
                                            href="/admin/hulls/edit/{{ $s->id }}"><button
                                                class="btn btn-outline-primary btn-sm"><i
                                                    class="bi bi-pencil-fill"></i></button></a>
                                    </span>
                                    @if ($s->id != 1)
                                        <span>
                                            <a class="link-none altona-sans-10"
                                                href="/admin/hulls/delete/{{ $s->id }}"><button
                                                    class="btn btn-outline-danger btn-sm"><i
                                                        class="bi bi-trash3-fill"></i></button></a>
                                        </span>
                                    @endif
                                </td>
                                <td class="altona-sans-10">{{ $s->hull_name }}</td>
                                <td class="altona-sans-10">{{ $s->hull_slug }}</td>
                                <td class="altona-sans-10">
                                    <ul class="nav-style-none ps-0">
                                        @foreach ($s->subs as $c)
                                            <li>{{ $c->sub_name }} ({{ $c->sub_tag }})</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td><a class="altona-sans-10" href="{{ asset('storage/' . $s->hull_img) }}">Image</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    </div>

@endsection
