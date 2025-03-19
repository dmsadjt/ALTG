@extends('layouts.admin')
@section('title', 'Gears')
@section('contents')
    <div class="m-3 d-grid gap-1">
        <div>
            <h1>Gears</h1>
            <p class="altona-sans-12">Manage Gears</p>
        </div>
        <div>
            <a href="/admin/gears/add"><button class="btn btn-primary">Add gears</button></a>
        </div>
    </div>
    <div class="m-3" style="width: 90vw">
        {{ $gears->links() }}
        <div class="card">
            <div class="card body">
                <table class="table w-100 table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Type</th>
                            <th scope="col">Rarity</th>
                            <th scope="col">Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gears as $s)
                            <tr>
                                <td class="altona-sans-10 w-25">
                                    <span>{{ $s->id }}</span>
                                    <span>
                                        <a class="link-none altona-sans-10"
                                            href="/admin/gears/edit/{{ $s->id }}"><button
                                                class="btn btn-outline-primary btn-sm"><i
                                                    class="bi bi-pencil-fill"></i></button></a>
                                    </span>
                                    <span>
                                        <a class="link-none altona-sans-10"
                                            href="/admin/gears/delete/{{ $s->id }}"><button
                                                class="btn btn-outline-danger btn-sm"><i
                                                    class="bi bi-trash3-fill"></i></button></a>
                                    </span>
                                </td>
                                <td class="altona-sans-10">{{ $s->gear_name }}</td>
                                <td class="altona-sans-10">{{ $s->category->gear_category_name }}</td>
                                <td class="altona-sans-10">{{ strtoupper($s->gear_rarity) }}</td>
                                <td><a class="altona-sans-10" href="{{ asset('storage/' . $s->gear_img) }}">Image</a></td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
