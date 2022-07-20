@extends('layouts.admin')
@section('title', 'Edit Role')
@section('contents')
    <div class="d-grid pill-dark p-2 m-3">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h1 class="mx-5 my-2">Edit role</h1>
        <form action="/admin/roles/update" class="mx-5 p-1 d-grid gap-1" method="POST" enctype="multipart/form-data">
            @csrf
            @foreach ($role as $f)
                <input type="hidden" name="id" value="{{ $f->id }}">
                <div>
                    <label class="form-label altona-sans-12" for="name">Role Name</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{ $f->role_name }}">
                </div>
                <div>
                    <label class="form-label altona-sans-12" for="slug">
                        <div>Role Slug</div>
                    </label>
                    <input class="form-control" type="text" name="slug" id="slug" value="{{ $f->role_slug }}"
                        disabled>
                </div>

                @for ($i = 1 ; $i < 4; $i++)
                <label class="form-label altona-sans-12" for="faction-{{$i}}">Faction {{$i}}</label>
                    <select class="form-select altona-sans-12" name="faction-{{$i}}" id="faction-{{$i}}">
                        <option value="">Select Faction</option>
                        @foreach ($faction as $f)
                            <option value="{{$f->id}}" {{$selected['role-'.$i] == $f->id ? 'selected':'' }}>{{$f->faction_name}}</option>
                        @endforeach
                    </select>

                @endfor
            @endforeach

            <div class="d-grid">
                <input type="submit" class="btn btn-success mx-auto my-3 btn-lg" value="Edit Role">
            </div>
        </form>
    </div>

@endsection
