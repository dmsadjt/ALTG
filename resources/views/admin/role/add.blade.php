@extends('layouts.admin')
@section('title', 'Add Role')
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

        <h1 class="mx-5 my-2">Add Role</h1>
        <form action="/admin/roles/post" class="mx-5 p-1 d-grid gap-1" method="POST">

            @csrf
            <div>
                <label class="form-label altona-sans-12" for="name">Role Name</label>
                <input class="form-control" type="text" name="name" id="name">
            </div>

            <div>
                @for ($i = 1; $i < 4; $i++)
                    <label class="form-label altona-sans-12" for="faction-{{ $i }}">Faction
                        {{ $i }}</label>
                    <select class="form-select altona-sans-12" name="faction-{{ $i }}"
                        id="faction-{{ $i }}">
                        <option value="">Select Faction</option>
                        @foreach ($faction as $f)
                            <option value="{{ $f->id }}">{{ $f->faction_name }}</option>
                        @endforeach
                    </select>
                @endfor
            </div>

            <div class="d-grid">
                <input type="submit" class="btn btn-success mx-auto my-3 btn-lg" value="Add Role">
            </div>
        </form>
    </div>

@endsection
