@extends('layouts.admin')
@section('title', 'Add Faction')
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

        <h1 class="mx-5 my-2">Add Faction</h1>
        <form action="/admin/factions/post" class="mx-5 p-1 d-grid gap-1" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label class="form-label altona-sans-12" for="name">Faction Name</label>
                <input class="form-control" type="text" name="name" id="name" required>
            </div>
            <div>
                <label class="form-label altona-sans-12" for="tag">Faction Tag</label>
                <input class="form-control" type="text" name="tag" id="tag" required>
            </div>
            <div>
                <label class="form-label altona-sans-12" for="slug">
                    <div>Faction Slug</div>
                    <div class="altona-sans-10 ms-auto mt-0">example : 'iron-blood'</div>
                </label>
                <input class="form-control" type="text" name="slug" id="slug" required>
            </div>
            <div>
                <label class="form-label altona-sans-12" for="img">Faction image</label>
                <input class="form-control" type="file" name="img" id="img" required>
            </div>
            <div class="d-grid">
                <input type="submit" class="btn btn-success mx-auto my-3 btn-lg" value="Add Faction">
            </div>
        </form>
    </div>

@endsection
