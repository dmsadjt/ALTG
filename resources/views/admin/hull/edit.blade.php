@extends('layouts.admin')
@section('title', 'Edit Hull')
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

        <h1 class="mx-5 my-2">Edit Hull</h1>
        <form action="/admin/hulls/update" class="mx-5 p-1 d-grid gap-1" method="POST" enctype="multipart/form-data">
            @csrf
            @foreach ($hull as $item)
                <input type="hidden" name="id" value={{ $item->id }}>
                <div>
                    <label class="form-label altona-sans-12" for="name">Hull Name</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{ $item->hull_name }}"
                        required>
                </div>
                <div>
                    <label class="form-label altona-sans-12" for="slug">
                        <div>Hull Slug</div>
                        <div class="altona-sans-10 ms-auto mt-0">example : 'something-cool'</div>
                    </label>
                    <input class="form-control" type="text" name="slug" id="slug" value="{{ $item->hull_slug }}"
                        required>
                </div>
                <div class="my-2">
                    <img src="{{ asset('storage/' . $item->hull_img) }}" class="medium-img d-block shadow" alt="">
                    <i class="d-block altona-sans-10">Current image</i>
                    <label class="form-label" for="img">Hull image</label>
                    <input class="form-control" type="file" name="img" id="img">
                </div>
            @endforeach

            <div class="d-grid">
                <input type="submit" class="btn btn-success mx-auto my-3 btn-lg" value="Edit hull">
            </div>
        </form>
    </div>

@endsection
