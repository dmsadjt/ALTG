@extends('layouts.admin')
@section('title', 'Edit Gear')
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

        <h1 class="mx-5 my-2">Edit Gear</h1>
        <form action="/admin/gears/update" class="mx-5 p-1 d-grid gap-1" method="POST" enctype="multipart/form-data">
            @csrf
            @foreach ($gear as $f)
                <input type="hidden" name="id" value="{{ $f->id }}">
                <div>
                    <label class="form-label altona-sans-12" for="name">Gear Name</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{ $f->gear_name }}"
                        required>
                </div>
                <div>
                    <label class="form-label" for="type">Gear Type</label>
                    <select class="form-select" name="type" id="type">
                        <option value="">Select Gear Type</option>
                        @foreach ($category as $c)
                            <option value="{{ $c->id }}" {{ $selected['type'] == $c->id ? 'selected' : '' }}>
                                {{ $c->gear_category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="form-label" for="rarity">Gear Rarity</label>
                    <select class="form-select" name="rarity" id="rarity">
                        <option value="">Select Rarity</option>
                        @foreach ($rarity as $r)
                            <option value="{{ strtolower($r->rarity_tag) }}"
                                {{ $selected['rarity'] == strtolower($r->rarity_tag) ? 'selected' : '' }}>
                                {{ $r->rarity_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="my-3">
                    <img src="{{ asset('storage/' . $f->gear_img) }}" class="medium-img d-block shadow" alt="">
                    <i class="d-block altona-sans-10">Current image</i>
                    <label class="form-label altona-sans-12" for="img">Gear image</label>
                    <input class="form-control" type="file" name="img" id="img">
                </div>
            @endforeach

            <div class="d-grid">
                <input type="submit" class="btn btn-success mx-auto my-3 btn-lg" value="Edit gear">
            </div>
        </form>
    </div>

@endsection
