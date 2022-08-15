@extends('layouts.admin')
@section('title', 'Gear Templates')
@section('contents')
    <div class="m-3 columns-two">
        <div>
            <h1>Templates</h1>
            <p class="altona-sans-12">Manage Templates</p>
            <a href="/admin/templates/add"><button class="btn btn-primary">Add Templates</button></a>
        </div>
    </div>
    <div class="m-3 overflow-x w-50">
        <div class="card">
            <div class="card body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Template Name</th>
                            <th scope="col">Template Build</th>
                            <th>Gears</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($templates as $s)
                            <tr>
                                <td class="altona-sans-10 d-flex gap-3">
                                    <span>{{ $s->id }}</span>

                                    <a class="link-none altona-sans-10"
                                        href="/admin/templates/edit/{{ $s->id }}"><button
                                            class="btn btn-outline-primary btn-sm">Edit</button></a>

                                    <a class="link-none altona-sans-10"
                                        href="/admin/templates/delete/{{ $s->id }}"><button
                                            class="btn btn-outline-danger btn-sm">Delete</button></a>

                                </td>
                                <td class="altona-sans-10">{{ $s->name }}</td>
                                <td class="altona-sans-10">{{ $s->build }}</td>
                                <td>

                                    <ul class="nav-style-none">
                                        @foreach ($s->gears as $g)
                                            <li class="altona-sans-10"> {{$g->category->gear_category_name}}:  {{ $g->gear_name }}</li>
                                        @endforeach
                                    </ul>

                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                    {{ $templates->links() }}
                </table>
            </div>
        </div>
    </div>

@endsection
