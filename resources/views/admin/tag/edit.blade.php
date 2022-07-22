@extends('layouts.admin')
@section('title', 'Edit Tags')
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

        <h1 class="mx-5 my-2">Edit Tags</h1>
        <form action="/admin/tags/update" class="mx-5 p-1 d-grid gap-1" method="POST" enctype="multipart/form-data">
            @csrf
            @foreach ($tag as $t)
                <input type="hidden" name="id" value={{$t->id}}>

                <div class="mt-2">
                    <label class="form-label altona-sans-12" for="label">Tag Label</label>
                    <input class="form-control" type="text" name="label" id="label" value="{{ $t->tag_label }}">
                </div>
                <div class="mt-2">
                    <label class="form-label altona-sans-12" for="slug">Tag Slug</label>
                    <input class="form-control" type="text" name="slug" id="slug" value="{{ $t->tag_slug }}">
                </div>
            @endforeach

            <div class="d-grid">
                <input type="submit" class="btn btn-success mx-auto my-3 btn-lg" value="Edit Tag">
            </div>
        </form>
    </div>

@endsection
