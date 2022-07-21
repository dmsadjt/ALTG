@extends('layouts.admin')
@section('title', 'Edit Position')
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

        <h1 class="mx-5 my-2">Edit Position</h1>
        <form action="/admin/positions/update" class="mx-5 p-1 d-grid gap-1" method="POST" enctype="multipart/form-data">
            @csrf
            @foreach ($position as $f)
                <input type="hidden" name="id" value="{{ $f->id }}">
                <div>
                    <label class="form-label altona-sans-12" for="name">Position Name</label>
                    <input class="form-control altona-sans-12" type="text" name="name" id="name"
                        value="{{ $f->position_name }}" disabled>
                </div>
                <div>
                    <label class="form-label altona-sans-12" for="slug">Position Slug</label>
                    <input class="form-control altona-sans-12" type="text" name="slug" id="slug"
                        value="{{ $f->position_slug }}" disabled>
                </div>
                <div>
                    <input class="form-control altona-sans-12" type="text" name="category" id="category"
                        value="{{ $f->position_category }}" disabled>
                </div>
                <div>
                    <input class="form-control altona-sans-12" type="text" name="type" id="type"
                        value="{{ $f->position_type }}" disabled>
                </div>
                <div>
                    <textarea class="form-control altona-sans-12" name="explanation" id="explanation" cols="30" rows="10">
                        {{ $f->explanation }}
                    </textarea>
                </div>
                <div>
                    <input type="file" name="img" id="img">

                </div>
            @endforeach

            <div class="d-grid">
                <input type="submit" class="btn btn-success mx-auto my-3 btn-lg" value="Edit Position">
            </div>
        </form>
    </div>

@endsection
