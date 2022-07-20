@extends('layouts.admin')
@section('title', 'Edit Archetype')
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

        <h1 class="mx-5 my-2">Edit Archetype</h1>
        <form action="/admin/archetypes/update" class="mx-5 p-1 d-grid gap-1" method="POST" enctype="multipart/form-data">
            @csrf
            @foreach ($archetype as $f)
                <input type="hidden" name="id" value="{{ $f->id }}">
                <div>
                    <label class="form-label altona-sans-12" for="name">Archetype Name</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{ $f->archetype_name }}">
                </div>
                <div>
                    <label class="form-label altona-sans-12" for="slug">
                        <div>Archetype Slug</div>
                    </label>
                    <input class="form-control" type="text" name="slug" id="slug" value="{{ $f->archetype_slug }}"
                        disabled>
                </div>
            @endforeach

            <div class="d-grid">
                <input type="submit" class="btn btn-success mx-auto my-3 btn-lg" value="Edit Archetype">
            </div>
        </form>
    </div>

@endsection
