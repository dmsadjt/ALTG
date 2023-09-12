@extends('layouts.admin')
@section('title', 'Add Gear')
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

        <h1 class="mx-5 my-2">Add Gear</h1>
        <form action="/admin/gears/post" class="mx-5 p-1 d-grid gap-1" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label class="form-label altona-sans-12" for="name">Gear Name</label>
                <input class="form-control" type="text" name="name" id="name" required>
            </div>
            <div>
                <label class="form-label" for="type">Gear Type</label>
                <select class="form-select" name="type" id="type">
                    <option value="">Select Gear Type</option>
                    @foreach ($category as $c)
                        <option value="{{ $c->id }}">{{ $c->gear_category_name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="form-label" for="rarity">Gear Rarity</label>
                <select class="form-select" name="rarity" id="rarity">
                    <option value="">Select Rarity</option>
                    @foreach ($rarity as $r)
                        <option value="{{ strtolower($r->rarity_tag) }}">{{ $r->rarity_name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="form-label altona-sans-12" for="img">Gear image</label>
                <input class="form-control" type="file" name="img" id="img">
            </div>
            <div class="d-grid">
                <input type="submit" class="btn btn-success mx-auto my-3 btn-lg" value="Add gear">
            </div>
        </form>
    </div>

@endsection
