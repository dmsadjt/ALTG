@extends('layouts.admin')
@section('title', 'Add Tags')
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

        <h1 class="mx-5 my-2">Add Tags</h1>
        <form action="/admin/tags/post" class="mx-5 p-1 d-grid gap-1" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-2">
                <label class="form-label altona-sans-12" for="label">Tag Label</label>
                <input class="form-control" type="text" name="label" id="label">
            </div>
            <div class="d-grid">
                <input type="submit" class="btn btn-success mx-auto my-3 btn-lg" value="Add Tag">
            </div>
        </form>
    </div>

@endsection
