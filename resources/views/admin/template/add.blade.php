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
        <form action="/admin/templates/post" class="mx-5 p-1 d-grid gap-1" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-2">
                <label class="form-label altona-sans-12" for="name">Template name</label>
                <input class="form-control" type="text" name="name" id="name" required>
            </div>

            <div class="mt-2">
                <label class="form-label" for="build">Build</label>
                <select class="form-select" name="build" id="build">
                    <option value="General">General</option>
                    <option value="Light">Light</option>
                    <option value="Medium">Medium</option>
                    <option value="Heavy">Heavy</option>
                </select>
            </div>

            <h2 class="mt-3">Gears</h2>
            <div>

                @for ($i = 1; $i < 7; $i++)
                    <div class="accordion text-black-50" id="accordionGear">
                        <div class="accordion-item altona-sans-10">
                            @if ($i == 6)
                                <h3 class="accordion-header" id="heading-{{ $i }}">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-{{ $i }}" aria-expanded="true"
                                        aria-controls="collapse-{{ $i }}">
                                        Augment
                                    </button>
                                </h3>

                                <div id="collapse-{{ $i }}" class="accordion-collapse collapse"
                                    aria-labelledby="heading-{{ $i }}" data-bs-parent="#accordionGear">
                                    <div class="accordion-body bg-white">

                                        @for ($j = 1; $j < 9; $j++)
                                            <div>

                                                <label class="form-label"
                                                    for="{{ $i }}-gear-{{ $j }}">Gear
                                                    {{ $i }}</label>
                                                <select name="{{ $i }}-gear-{{ $j }}"
                                                    id="{{ $i }}-gear-{{ $j }}" class="form-select">
                                                    <option value="" selected>Select Gear</option>
                                                    @foreach ($gears as $s)
                                                        @if ($s->gear_type == 13)
                                                            <option value="{{ $s->id }}">{{ $s->gear_name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>

                                            </div>
                                        @endfor

                                    </div>
                                </div>

                                @continue
                            @endif
                            <h3 class="accordion-header" id="heading-{{ $i }}">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-{{ $i }}" aria-expanded="true"
                                    aria-controls="collapse-{{ $i }}">
                                    Slot {{ $i }}
                                </button>
                            </h3>

                            <div id="collapse-{{ $i }}" class="accordion-collapse collapse"
                                aria-labelledby="heading-{{ $i }}" data-bs-parent="#accordionGear">
                                <div class="accordion-body bg-white">

                                    @for ($j = 1; $j < 9; $j++)
                                        @livewire('select-gear', ['category_id' => "$i-category-$j", 'gear_id' => "$i-gear-$j"])
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor

            </div>

            <div class="d-grid">
                <input type="submit" class="btn btn-success mx-auto my-3 btn-lg" value="Add Template">
            </div>
        </form>
    </div>

@endsection
