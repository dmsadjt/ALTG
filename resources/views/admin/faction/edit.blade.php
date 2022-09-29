@extends('layouts.admin')
@section('title', 'Edit Faction')
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

        <h1 class="mx-5 my-2">Edit Faction</h1>
        <form action="/admin/factions/update" class="mx-5 p-1 d-grid gap-1" method="POST" enctype="multipart/form-data">
            @csrf
            @foreach ($faction as $f)
                <input type="hidden" name="id" value="{{ $f->id }}">
                <div>
                    <label class="form-label altona-sans-12" for="name">Faction Name</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{ $f->faction_name }}">
                </div>
                <div>
                    <label class="form-label altona-sans-12" for="tag">Faction Tag</label>
                    <input class="form-control" type="text" name="tag" id="tag" value="{{ $f->faction_tag }}">
                </div>
                <div>
                    <label class="form-label altona-sans-12" for="slug">
                        <div>Faction Slug</div>
                    </label>
                    <input class="form-control" type="text" name="slug" id="slug" value="{{ $f->faction_slug }}"
                        disabled>
                </div>
                <div class="my-3">
                    <img src="{{ asset('storage/' . $f->faction_img) }}" class="medium-img d-block shadow" alt="">
                    <i class="d-block altona-sans-10">Current image</i>
                    <label class="form-label altona-sans-12" for="img">Faction image</label>
                    <input class="form-control" type="file" name="img" id="img">
                </div>
            @endforeach

            <div class="d-grid">
                <input type="submit" class="btn btn-success mx-auto my-3 btn-lg" value="Edit Faction">
            </div>
        </form>
    </div>

@endsection
