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
                    <label class="form-label altona-sans-12" for="subtitle_1">Subtitle 1</label>
                    <input class="form-control" type="text" name="subtitle_1" id="subtitle_1"
                        value="{{ $p->subtitle_1 }}">
                </div>

                <div>
                    <label class="form-label altona-sans-12" for="body_1">Body 1</label>
                    <textarea class="form-control" name="body" id="body" cols="30" rows="10">{{ $p->body }}</textarea>
                </div>

                <div>
                    <label class="form-label altona-sans-12" for="subtitle_2">Subtitle 2</label>
                    <input class="form-control" type="text" name="subtitle_2" id="subtitle_2"
                        value="{{ $p->subtitle_2 }}">
                </div>

                <div>
                    <label class="form-label altona-sans-12" for="body_2">Body 2</label>
                    <textarea class="form-control" name="body_2" id="body_2" cols="30" rows="10">{{ $p->body_2 }}</textarea>
                </div>

                <div>
                    <label class="form-label altona-sans-12" for="subtitle_3">Subtitle 3</label>
                    <input class="form-control" type="text" name="subtitle_3" id="subtitle_3"
                        value="{{ $p->subtitle_3 }}">
                </div>

                <div>
                    <label class="form-label altona-sans-12" for="body_3">Body 3</label>
                    <textarea class="form-control" name="body_3" id="body_3" cols="30" rows="10"> {{ $p->body_3 }}</textarea>
                </div>

                <div>
                    <label class="form-label altona-sans-12" for="subtitle_4">Subtitle 4</label>
                    <input class="form-control" type="text" name="subtitle_4" id="subtitle_4"
                        value="{{ $p->subtitle_4 }}">
                </div>

                <div>
                    <label class="form-label altona-sans-12" for="body_4">Body 4</label>
                    <textarea class="form-control" name="body_4" id="body_4" cols="30" rows="10"> {{ $p->body_4 }}</textarea>
                </div>

                <div>
                    <label class="form-label altona-sans-12" for="subtitle_5">Subtitle 5</label>
                    <input class="form-control" type="text" name="subtitle_5" id="subtitle_5"
                        value="{{ $p->subtitle_5 }}">
                </div>

                <div>
                    <label class="form-label altona-sans-12" for="body_5">Body 5</label>
                    <textarea class="form-control" name="body_5" id="body_5" cols="30" rows="10"> {{ $p->body_5 }}</textarea>
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
                                        {{ $selected['tag-' . $i] == $f->id ? 'selected' : '' }}>{{ $f->tag_label }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    @endfor
                </div>

                <div class="d-grid">
                    <label class="form-label altona-sans-12" for="table">Insert table (.xlsx)</label>
                    <input class="form-control" type="file" name="table" id="table">
                </div>
                <div>
                    <label class="form-label altona-sans-12" for="table_caption">Table Caption</label>
                    <input class="form-control" type="text" name="table_caption" id="table_caption"
                        value="{{ $p->table_caption }}">
                </div>

                <hr>
                <div class="d-grid">
                    @if ($p->images->count() > 0)
                        {{ $num_img = $p->images->count() }}
                        @for ($j = $num_img + 1; $j < 6; $j++)
                            <div>
                                <label class="form-label altona-sans-12" for="image-{{ $j }}">Image
                                    {{ $i }}</label>
                                <input class="form-control" type="file" name="image-{{ $j }}"
                                    id="image-{{ $i }}">
                            </div>
                            <div class="my-2">
                                <label class="form-label altona-sans-12" for="caption-{{ $j }}">Caption
                                    {{ $i }}</label>
                                <input class="form-control altona-sans-12" type="text"
                                    name="caption-{{ $j }}" id="caption-{{ $j }}">
                            </div>
                        @endfor
                    @else
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
                                <input class="form-control altona-sans-12" type="text"
                                    name="caption-{{ $i }}" id="caption-{{ $i }}">
                            </div>
                        @endfor
                    @endif
                    @foreach ($p->images as $key => $i)
                        <input type="hidden" name="image-id-{{ $key + 1 }}" value={{ $i->id }}>
                        <div>
                            <label class="form-label altona-sans-12" for="image-{{ $key + 1 }}">Image
                                {{ $key + 1 }}</label>
                            <input class="form-control" type="file" name="image-{{ $key + 1 }}"
                                id="image-{{ $key + 1 }}">
                        </div>
                        <div class="my-2">
                            <label class="form-label altona-sans-12" for="caption-{{ $key + 1 }}">Caption
                                {{ $key + 1 }}</label>
                            <input class="form-control altona-sans-12" type="text" name="caption-{{ $key + 1 }}"
                                id="caption-{{ $key + 1 }}" value="{{ $i->caption }}">
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
