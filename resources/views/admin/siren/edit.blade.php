@extends('layouts.admin')
@section('title', 'Edit Boss')
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

        <h1 class="mx-5">Edit Boss</h1>
        <form action="/admin/sirens/update" class="mx-5 p-1" method="POST" enctype="multipart/form-data">
            @foreach ($siren as $s)
                <input type="hidden" name="id" id="id" value={{ $s->id }}>
                <div>
                    <label for="name">Boss Name</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{ $s->name }}">
                </div>
                <div class="columns-three">
                    <div>
                        <label class="form-label" for="type">Boss type</label>
                        <select class="form-select" name="type" id="type" disabled>
                            <option value="stronghold" {{ $selected['type'] == 'stronghold' ? 'selected' : '' }}>Stronghold
                            </option>
                            <option value="abyssal" {{ $selected['type'] == 'abyssal' ? 'selected' : '' }}>Abyssal</option>
                            <option value="arbiter" {{ $selected['type'] == 'arbiter' ? 'selected' : '' }}>Arbiter</option>
                            <option value="meta" {{ $selected['type'] == 'meta' ? 'selected' : '' }}>Meta</option>
                            <option value="guild" {{ $selected['type'] == 'guild' ? 'selected' : '' }}>Guild</option>
                        </select>
                    </div>
                    <div>
                        <label class="form-label" for="adaptability">Boss Adaptability</label>
                        <select class="form-select" name="adaptability" id="adaptability" disabled>
                            <option value="none" {{ $selected['adaptability'] == 'none' ? 'selected' : '' }}>None</option>
                            <option value="full" {{ $selected['adaptability'] == 'full' ? 'selected' : '' }}>Full</option>
                        </select>
                    </div>
                    <div>
                        <label class="form-label" for="difficulty">Boss Difficulty</label>
                        <select class="form-select" name="difficulty" id="difficulty" disabled>
                            <option value="normal" {{ $selected['difficulty'] == 'normal' ? 'selected' : '' }}>Normal
                            </option>
                            <option value="hard" {{ $selected['difficulty'] == 'hard' ? 'selected' : '' }}>Hard</option>
                        </select>
                    </div>
                    <div>
                        <label class="form-label" for="hull">Boss Hull</label>
                        <select class="form-select" name="hull" id="hull">
                            @foreach ($hulls as $h)
                                <option value="{{ $h->id }}"
                                    {{ $selected['hull'] == $h->id ? 'selected' : '' }}> {{ $h->hull_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="columns-two">
                    <div>
                        <label class="form-label" for="level">Boss Level</label>
                        <input class="form-control" type="number" name="level" id="level" value={{ $s->level }}>
                    </div>
                    <div>
                        <label class="form-label" for="armor">Boss Armor</label>
                        <select class="form-select" name="armor" id="armor">
                            <option value="Light" {{ $selected['armor'] == 'Light' ? 'selected' : '' }}>Light</option>
                            <option value="Medium" {{ $selected['armor'] == 'Medium' ? 'selected' : '' }}>Medium</option>
                            <option value="Heavy" {{ $selected['armor'] == 'Heavy' ? 'selected' : '' }}>Heavy</option>
                        </select>
                    </div>
                </div>

                <div class="columns-three">
                    <div>
                        <label class="form-label" for="hp">HP</label>
                        <input class="form-control" type="number" name="hp" id="hp" value={{ $s->hp }}>
                    </div>
                    <div>
                        <label class="form-label" for="fp">FP</label>
                        <input class="form-control" type="number" name="fp" id="fp" value={{ $s->fp }}>
                    </div>
                    <div>
                        <label class="form-label" for="trp">TRP</label>
                        <input class="form-control" type="number" name="trp" id="trp" value={{ $s->trp }}>
                    </div>
                    <div>
                        <label class="form-label" for="aa">AA</label>
                        <input class="form-control" type="number" name="aa" id="aa" value={{ $s->aa }}>
                    </div>
                    <div>
                        <label class="form-label" for="avi">AVI</label>
                        <input class="form-control" type="number" name="avi" id="avi" value={{ $s->avi }}>
                    </div>
                    <div>
                        <label class="form-label" for="acc">ACC</label>
                        <input class="form-control" type="number" name="acc" id="acc" value={{ $s->acc }}>
                    </div>
                    <div>
                        <label class="form-label" for="eva">EVA</label>
                        <input class="form-control" type="number" name="eva" id="eva"
                            value={{ $s->eva }}>
                    </div>
                    <div>
                        <label class="form-label" for="lck">LCK</label>
                        <input class="form-control" type="number" name="lck" id="lck"
                            value={{ $s->lck }}>
                    </div>
                    <div>
                        <label class="form-label" for="spd">SPD</label>
                        <input class="form-control" type="number" name="spd" id="spd"
                            value={{ $s->spd }}>
                    </div>
                </div>
                <div>
                    <label class="form-label" for="weakness">Boss Weakness</label>
                    <input class="form-control" type="text" name="weakness" id="weakness"
                        value={{ $s->weakness }}>
                </div>

                <div>
                    <label class="form-label" for="img">Boss Image</label>
                    <input class="form-control" type="file" name="img" id="img">
                </div>
                <div class="d-grid">
                    <input type="submit" class="btn btn-success mx-auto my-3 btn-lg" value="Edit Boss">
                </div>
            @endforeach
            @csrf

        </form>
    </div>
@endsection
