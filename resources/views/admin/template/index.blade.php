@extends('layouts.admin')
@section('title', 'Gear Templates')
@section('contents')
    <div class="m-3 gap-1 d-grid">
        <div>
            <h1>Templates</h1>
            <p class="altona-sans-12">Manage Templates</p>
            <a href="/admin/templates/add"><button class="btn btn-primary">Add Templates</button></a>
        </div>
    </div>
    <div class="m-3 overflow-x " style="width: 90vw">
        <div class="card">
            <div class="card body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Template Name</th>
                            <th scope="col">Template Build</th>
                            <th scope="col">Slot 1</th>
                            <th scope="col">Slot 2</th>
                            <th scope="col">Slot 3</th>
                            <th scope="col">Slot 4</th>
                            <th scope="col">Slot 5</th>
                            <th scope="col">Augment</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($templates as $s)
                            <tr>
                                <td class="altona-sans-10 d-flex gap-3">
                                    <span>{{ $s->id }}</span>

                                    <div class="d-grid gap-1">
                                        <a class="link-none altona-sans-10"
                                            href="/admin/templates/edit/{{ $s->id }}"><button
                                                class="btn btn-outline-primary btn-sm">Edit</button></a>

                                        <a class="link-none altona-sans-10"
                                            href="/admin/templates/delete/{{ $s->id }}"><button
                                                class="btn btn-outline-danger btn-sm">Delete</button></a>
                                    </div>

                                </td>
                                <td class="altona-sans-10">{{ $s->name }}</td>
                                <td class="altona-sans-10">{{ $s->build }}</td>
                                <td>

                                    <ul class="nav-style-none">
                                        @foreach ($s->gears as $g)
                                            @if ($g->pivot->gear_slot == 1)
                                                <li class="altona-sans-10"> {{ $g->category->gear_category_name }}:
                                                    {{ $g->gear_name }}</li>
                                            @endif
                                        @endforeach
                                    </ul>

                                </td>
                                <td>

                                    <ul class="nav-style-none">
                                        @foreach ($s->gears as $g)
                                            @if ($g->pivot->gear_slot == 2)
                                                <li class="altona-sans-10"> {{ $g->category->gear_category_name }}:
                                                    {{ $g->gear_name }}</li>
                                            @endif
                                        @endforeach
                                    </ul>

                                </td>
                                <td>

                                    <ul class="nav-style-none">
                                        @foreach ($s->gears as $g)
                                            @if ($g->pivot->gear_slot == 3)
                                                <li class="altona-sans-10"> {{ $g->category->gear_category_name }}:
                                                    {{ $g->gear_name }}</li>
                                            @endif
                                        @endforeach
                                    </ul>

                                </td>
                                <td>

                                    <ul class="nav-style-none">
                                        @foreach ($s->gears as $g)
                                            @if ($g->pivot->gear_slot == 4)
                                                <li class="altona-sans-10"> {{ $g->category->gear_category_name }}:
                                                    {{ $g->gear_name }}</li>
                                            @endif
                                        @endforeach
                                    </ul>

                                </td>
                                <td>

                                    <ul class="nav-style-none">
                                        @foreach ($s->gears as $g)
                                            @if ($g->pivot->gear_slot == 5)
                                                <li class="altona-sans-10"> {{ $g->category->gear_category_name }}:
                                                    {{ $g->gear_name }}</li>
                                            @endif
                                        @endforeach
                                    </ul>

                                </td>
                                <td>

                                    <ul class="nav-style-none">
                                        @foreach ($s->gears as $g)
                                            @if ($g->pivot->gear_slot == 6)
                                                <li class="altona-sans-10"> {{ $g->category->gear_category_name }}:
                                                    {{ $g->gear_name }}</li>
                                            @endif
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
