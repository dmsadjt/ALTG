@extends('layouts.admin')
@section('title', 'Posts')
@section('contents')
    <div class="m-3 columns-two">
        <div>
            <h1>Posts</h1>
            <p class="altona-sans-12">Manage posts</p>
        </div>
        <div class="ms-auto mt-auto">
            <a href="/admin/blogs/add"><button class="btn btn-primary">Add Posts</button></a>
        </div>
    </div>
    <div class="m-3 overflow-x">
        <div class="card">
            <div class="card body">
                <table class="table w-100 table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Body</th>
                            <th scope="col">Tags</th>
                            <th scope="col">Images</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($post as $s)
                            <tr>
                                <td class="altona-sans-10">
                                    <div>{{ $s->id }}</div>
                                    <div>
                                        <a class="link-none altona-sans-10"
                                            href="/admin/blogs/edit/{{ $s->id }}"><button
                                                class="btn btn-outline-primary btn-sm">Edit</button></a>
                                    </div>
                                    <div>
                                        <a class="link-none altona-sans-10"
                                            href="/admin/blogs/delete/{{ $s->id }}"><button
                                                class="btn btn-outline-danger btn-sm">Delete</button></a>
                                    </div>
                                </td>
                                <td class="altona-sans-10">{{ $s->title }}</td>
                                <td class="altona-sans-10"> {{ Str::limit(strip_tags($s->body), 200) }}</td>

                                <td>
                                    <ul style="list-style: none; padding:0">
                                        @foreach ($s->tags as $t)
                                            <li class="altona-sans-10">{{ $t->tag_label }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <ul style="list-style: none; padding:0">
                                        @foreach ($s->images as $i)
                                            <li><a class="altona-sans-10" href="/img/posts/{{ $i->image }}">Image</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                    {{ $post->links() }}
                </table>
            </div>
        </div>
    </div>

@endsection
