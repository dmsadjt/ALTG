@extends('layouts.admin')
@section('title', 'Roles')
@section('contents')
    <div class="m-3 columns-two">
        <div>
            <h1>Roles</h1>
            <p class="altona-sans-12">Manage Roles</p>
        </div>
        <div class="ms-auto mt-auto">
            <a href="/roles/add"><button class="btn btn-primary">Add roles</button></a>
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
                        @foreach ($roles as $s)
                            <tr>
                                <td class="altona-sans-10 w-25">
                                    <span>{{ $s->id }}</span>
                                    <span>
                                        <a class="link-none altona-sans-10" href="/roles/edit/{{$s->id}}"><button class="btn btn-outline-primary btn-sm">Edit</button></a>
                                    </span>
                                    <span>
                                        <a class="link-none altona-sans-10" href="/roles/delete/{{$s->id}}"><button class="btn btn-outline-danger btn-sm" >Delete</button></a>
                                    </span>
                            </td>
                                <td class="altona-sans-10">{{ $s->role_name }}</td>
                                <td class="altona-sans-10">{{ $s->role_slug }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                    {{$roles->links()}}
                </table>
            </div>
        </div>
    </div>

@endsection