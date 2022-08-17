@extends('layouts.admin')
@section('title', 'Edit Post')
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

        <h1 class="mx-5 my-2">Edit Post</h1>
        <form action="/admin/blogs/update" class="mx-5 p-1 d-grid gap-1" method="POST" enctype="multipart/form-data">
            @csrf
            @foreach ($post as $p)
                <input type="hidden" name="id" value="{{ $p->id }}">
                <div>
                    <label class="form-label altona-sans-12" for="name">Title</label>
                    <input class="form-control" type="text" name="title" id="title" value="{{ $p->title }}">
                </div>
                <div>
                    <label class="form-label altona-sans-12" for="body">Body</label>
                    <textarea class="form-control" name="body" id="body" cols="30" rows="10">{{ $p->body }}</textarea>
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
                                    <option value="{{ $f->id }}"
                                        {{ $selected['tag-' . $i] == $f->id ? 'selected' : '' }}>{{ $f->tag_label }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endfor
                </div>


                <div class="d-grid">
                    @foreach($p->images as $key=>$i)
                        <input type="hidden" name="image-id-{{$key+1}}" value={{$i->id}}>
                        <div>
                            <label class="form-label altona-sans-12" for="image-{{ $key+1 }}">Image
                                {{ $key+1 }}</label>
                            <input class="form-control" type="file" name="image-{{ $key+1 }}"
                                id="image-{{ $key+1 }}">
                        </div>
                        <div class="my-2">
                            <label class="form-label altona-sans-12" for="caption-{{ $key+1 }}">Caption {{ $key+1 }}</label>
                            <input class="form-control altona-sans-12" type="text" name="caption-{{ $key+1 }}" id="caption-{{ $key+1 }}" value="{{$i->caption}}">
                        </div>
                    @endforeach
                </div>
            @endforeach


            <div class="d-grid">
                <input type="submit" class="btn btn-success mx-auto my-3 btn-lg" value="Edit Post">
            </div>
        </form>
    </div>

@endsection
