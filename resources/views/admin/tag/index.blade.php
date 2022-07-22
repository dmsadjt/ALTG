@extends('layouts.admin')
@section('title', 'Post Tags')
@section('contents')
    <div class="m-3 columns-two">
        <div>
            <h1>Post Tags</h1>
            <p class="altona-sans-12">Manage Post Tags</p>
            <a href="/admin/tags/add"><button class="btn btn-primary">Add Post Tags</button></a>
        </div>
    </div>
    <div class="m-3 overflow-x w-50">
        <div class="card">
            <div class="card body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tag Label</th>
                            <th scope="col">Tag Slug</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tags as $s)
                            <tr>
                                <td class="altona-sans-10 d-flex gap-3">
                                    <span>{{ $s->id }}</span>

                                    <a class="link-none altona-sans-10" href="/admin/tags/edit/{{ $s->id }}"><button
                                            class="btn btn-outline-primary btn-sm">Edit</button></a>

                                    <a class="link-none altona-sans-10"
                                        href="/admin/tags/delete/{{ $s->id }}"><button
                                            class="btn btn-outline-danger btn-sm">Delete</button></a>

                                </td>
                                <td class="altona-sans-10">{{ $s->tag_label }}</td>
                                <td class="altona-sans-10">{{ $s->tag_slug }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                    {{ $tags->links() }}
                </table>
            </div>
        </div>
    </div>

@endsection
