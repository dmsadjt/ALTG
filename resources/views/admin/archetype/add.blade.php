@extends('layouts.admin')
@section('title', 'Add Archetype')
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

        <h1 class="mx-5 my-2">Add Archetype</h1>
        <form action="/admin/archetypes/post" class="mx-5 p-1 d-grid gap-1" method="POST">
            @csrf
            <div>
                <label class="form-label altona-sans-12" for="name">Archetype Name</label>
                <input class="form-control" type="text" name="name" id="name">
            </div>
            <div class="d-grid">
                <input type="submit" class="btn btn-success mx-auto my-3 btn-lg" value="Add Archetype">
            </div>
        </form>
    </div>

@endsection
