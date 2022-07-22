@extends('layouts.admin')
@section('title', 'Add Post')
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

    <h1 class="mx-5 my-2">Add Post</h1>
    <form action="/admin/blogs/post" class="mx-5 p-1 d-grid gap-1" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label class="form-label altona-sans-12" for="name">Title</label>
            <input class="form-control" type="text" name="title" id="title">
        </div>
        <div>
            <label class="form-label altona-sans-12" for="body">Body</label>
            <textarea class="form-control" name="body" id="body" cols="30" rows="10"></textarea>
        </div>

        <div class="columns-five my-3">
            @for ($i = 1 ; $i < 6; $i++)
                <div>
                    <label class="form-label altona-sans-12" for="tag-{{$i}}">Tag {{$i}}</label>
                    <select class="form-select altona-sans-12" name="tag-{{$i}}" id="tag-{{$i}}">
                        <option value="">Select Tags</option>
                        @foreach ($tags as $f)
                            <option value="{{$f->id}}">{{$f->tag_label}}</option>
                        @endforeach
                    </select>
                </div>
            @endfor
        </div>

        <div class="d-grid">
            @for ($i = 1 ; $i < 6; $i++)
            <div>
                <label class="form-label altona-sans-12" for="image-{{$i}}">Image {{$i}}</label>
                <input class="form-control" type="file" name="image-{{$i}}" id="image-{{$i}}">
            </div>
            <div class="my-2">
                <label class="form-label altona-sans-12" for="caption-{{$i}}">Caption {{$i}}</label>
                <input class="form-control altona-sans-12" type="text" name="caption-{{$i}}" id="caption-{{$i}}">
            </div>

            @endfor
        </div>

        <div class="d-grid">
            <input type="submit" class="btn btn-success mx-auto my-3 btn-lg" value="Add Post">
        </div>
    </form>
</div>

@endsection
