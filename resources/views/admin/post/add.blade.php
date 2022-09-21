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
                <label class="form-label altona-sans-12" for="body_1">Body 1</label>
                <textarea class="form-control" name="body_1" id="body_1" cols="30" rows="10"></textarea>
            </div>

            <div>
                <label class="form-label altona-sans-12" for="subtitle_1">Subtitle 1</label>
                <input class="form-control" type="text" name="subtitle_1" id="subtitle_1">
            </div>

            <div>
                <label class="form-label altona-sans-12" for="body_2">Body 2</label>
                <textarea class="form-control" name="body_2" id="body_2" cols="30" rows="10"></textarea>
            </div>

            <div>
                <label class="form-label altona-sans-12" for="subtitle_2">Subtitle 2</label>
                <input class="form-control" type="text" name="subtitle_2" id="subtitle_2">
            </div>

            <div>
                <label class="form-label altona-sans-12" for="body_3">Body 2</label>
                <textarea class="form-control" name="body_3" id="body_3" cols="30" rows="10"></textarea>
            </div>

            <div>
                <label class="form-label altona-sans-12" for="subtitle_3">Subtitle 3</label>
                <input class="form-control" type="text" name="subtitle_3" id="subtitle_3">
            </div>

            <div>
                <label class="form-label altona-sans-12" for="body_4">Body 2</label>
                <textarea class="form-control" name="body_4" id="body_4" cols="30" rows="10"></textarea>
            </div>

            <div>
                <label class="form-label altona-sans-12" for="subtitle_4">Subtitle 4</label>
                <input class="form-control" type="text" name="subtitle_4" id="subtitle_4">
            </div>

            <div>
                <label class="form-label altona-sans-12" for="body_5">Body 2</label>
                <textarea class="form-control" name="body_5" id="body_5" cols="30" rows="10"></textarea>
            </div>


            <div class="columns-five my-3">
                @for ($i = 1; $i < 6; $i++)
                    <div>
                        <label class="form-label altona-sans-12" for="tag-{{ $i }}">Tag
                            {{ $i }}</label>
                        <select class="form-select altona-sans-12" name="tag-{{ $i }}"
                            id="tag-{{ $i }}">
                            <option value="">Select Tags</option>
                            @foreach ($tags as $f)
                                <option value="{{ $f->id }}">{{ $f->tag_label }}</option>
                            @endforeach
                        </select>
                    </div>
                @endfor
            </div>

            <div class="d-grid">
                <label class="form-label altona-sans-12" for="table">Insert table (.xlsx)</label>
                <input class="form-control" type="file" name="table" id="table">
            </div>
            <hr>

            <div class="d-grid">
                @for ($i = 1; $i < 6; $i++)
                    <div>
                        <label class="form-label altona-sans-12" for="image-{{ $i }}">Image
                            {{ $i }}</label>
                        <input class="form-control" type="file" name="image-{{ $i }}"
                            id="image-{{ $i }}">
                    </div>
                    <div class="my-2">
                        <label class="form-label altona-sans-12" for="caption-{{ $i }}">Caption
                            {{ $i }}</label>
                        <input class="form-control altona-sans-12" type="text" name="caption-{{ $i }}"
                            id="caption-{{ $i }}">
                    </div>
                @endfor
            </div>

            <div class="d-grid">
                <input type="submit" class="btn btn-success mx-auto my-3 btn-lg" value="Add Post">
            </div>
        </form>
    </div>

@endsection
