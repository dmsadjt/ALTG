@extends('layouts.admin')
@section('title', 'Hulls')
@section('contents')
    <div class="m-3 columns-two">
        <div>
            <h1>Hulls</h1>
            <p class="altona-sans-12">Manage Hulls</p>
        </div>
        <div class="ms-auto mt-auto">
            <a href="/hulls/add"><button class="btn btn-primary">Add hulls</button></a>
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
                            <th scope="col">Tag</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Image</th>
                        </tr>
                    </thead>
                    <tbody >
                        @foreach ($hulls as $s)
                            <tr>
                                <td class="altona-sans-10">
                                    <span>{{ $s->id }}</span>
                                    <span>
                                        <a class="link-none altona-sans-10" href="/hulls/edit/{{$s->id}}"><button class="btn btn-outline-primary btn-sm">Edit</button></a>
                                    </span>
                                    <span>
                                        <a class="link-none altona-sans-10" href="/hulls/delete/{{$s->id}}"><button class="btn btn-outline-danger btn-sm" >Delete</button></a>
                                    </span>
                            </td>
                                <td class="altona-sans-10">{{ $s->hull_name }}</td>
                                <td class="altona-sans-10">{{ $s->hull_tag }}</td>
                                <td class="altona-sans-10">{{ $s->hull_slug }}</td>
                                <td><a class="altona-sans-10" href="/img/hulls/{{$s->hull_img}}">{{ $s->hull_img }}</a></td>
                            </tr>
                        @endforeach

                    </tbody>
                    {{$hulls->links()}}
                </table>
            </div>
        </div>
    </div>

@endsection