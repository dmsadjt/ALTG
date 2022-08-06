@extends('layouts.admin')
@section('title', 'Add Templates')
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

        <h1 class="mx-5 my-2">Add Templates</h1>
        <form action="/admin/templates/update" class="mx-5 p-1 d-grid gap-1" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$template->id}}">
            <div class="mt-2">
                <label class="form-label altona-sans-12" for="name">Template name</label>
                <input class="form-control" type="text" name="name" id="name" value="{{$template->name}}">
            </div>

            <h2 class="mt-3">Gears</h2>
            <div>
                @foreach ($gear_category as $g)
                    <div class="accordion text-black-50" id="accordionGear">

                        <div class="accordion-item altona-sans-10">
                            <h3 class="accordion-header" id="heading-{{ $g->id }}">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-{{ $g->id }}" aria-expanded="true"
                                    aria-controls="collapse-{{ $g->id }}">
                                    {{ $g->gear_category_name }}
                                </button>
                            </h3>
                            <div id="collapse-{{ $g->id }}" class="accordion-collapse collapse"
                                aria-labelledby="heading-{{ $g->id }}" data-bs-parent="#accordionGear">
                                <div class="columns-two accordion-body bg-white">
                                    @for ($i = 1; $i < 16; $i++)
                                        <div>
                                            <label class="form-label"
                                                for="{{ $g->id }}-gear-{{ $i }}">Gear
                                                {{ $i }}</label>
                                            <select name="{{ $g->id }}-gear-{{ $i }}"
                                                id="{{ $g->id }}-gear-{{ $i }}"
                                                class="form-select">
                                                <option value="" selected>Select Gear</option>
                                                @foreach ($gears as $s)
                                                    @if ($s->gear_type == $g->id)
                                                        <option value="{{ $s->id }}"
                                                            {{ $selected[$g->id . '-gear-' . ($i)] == $s->id ? 'selected' : '' }}>
                                                            {{ $s->gear_name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div>
                                            <label class="form-label"
                                                for="{{ $g->id }}-category-{{ $i }}">Gear
                                                Category {{ $i }}</label>
                                            <select class="form-select"
                                                name="{{ $g->id }}-category-{{ $i }}"
                                                id="{{ $g->id }}-category-{{ $i }}">
                                                <option value=""
                                                    {{ $selected[$g->id . '-category-' . ($i)] == '' ? 'selected' : '' }}>
                                                    Select Gear Category</option>
                                                <option value="General"
                                                    {{ $selected[$g->id . '-category-' . ($i)] == 'General' ? 'selected' : '' }}>
                                                    General</option>
                                                <option value="Light"
                                                    {{ $selected[$g->id . '-category-' . ($i)] == 'Light' ? 'selected' : '' }}>
                                                    Light</option>
                                                <option value="Medium"
                                                    {{ $selected[$g->id . '-category-' . ($i)] == 'Medium' ? 'selected' : '' }}>
                                                    Med</option>
                                                <option value="Heavy"
                                                    {{ $selected[$g->id . '-category-' . ($i)] == 'Heavy' ? 'selected' : '' }}>
                                                    Heavy</option>
                                            </select>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="d-grid">
                <input type="submit" class="btn btn-success mx-auto my-3 btn-lg" value="Add Tag">
            </div>
        </form>
    </div>

@endsection
