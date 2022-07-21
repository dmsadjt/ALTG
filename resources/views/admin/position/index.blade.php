@extends('layouts.admin')
@section('title', 'Positions')
@section('contents')
    <div class="m-3 columns-two">
        <div>
            <h1>Positions</h1>
            <p class="altona-sans-12">Manage Positions</p>
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
                            <th scope="col">Category</th>
                            <th scope="col">Type</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Explanation</th>
                            <th scope="col">Image</th>
                            <th scope="col">Childrens</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($positions as $s)
                            <tr>
                                <td class="altona-sans-10">
                                    <span>{{ $s->id }}</span>
                                    <span>
                                        <a class="link-none altona-sans-10"
                                            href="/admin/positions/edit/{{ $s->id }}"><button
                                                class="btn btn-outline-primary btn-sm">Edit</button></a>
                                    </span>
                                </td>
                                <td class="altona-sans-10">{{ $s->position_name }}</td>
                                <td class="altona-sans-10">{{ $s->position_category }}</td>
                                <td class="altona-sans-10">{{ $s->position_type }}</td>
                                <td class="altona-sans-10">{{ $s->position_slug }}</td>
                                <td class="altona-sans-10">{{ $s->explanation }}</td>
                                <td class="altona-sans-10"><a class="altona-sans-10"
                                        href="/img/positions/{{ $s->position_image }}">Image</a></td>
                                <td class="altona-sans-10">
                                    <ul class="nav-style-none p-0 m-0">
                                        @foreach ($s->children as $c)
                                            <li>{{ $c->position_name }}</li>
                                        @endforeach
                                    </ul>

                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                    {{ $positions->links() }}
                </table>
            </div>
        </div>
    </div>

@endsection
