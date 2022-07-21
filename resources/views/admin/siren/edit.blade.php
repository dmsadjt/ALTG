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
        <form action="/admin/ships/update" class="mx-5 p-1" method="POST" enctype="multipart/form-data">
            @foreach ($siren as $s)
                <div>
                    <label for="name">Boss Name</label>
                    <input class="form-control" type="text" name="name" id="name">
                </div>
                <div class="columns-three">
                    <div>
                        <label class="form-label" for="type">Boss type</label>
                        <select class="form-select" name="type" id="type" disabled>
                            <option value="stronghold">Stronghold</option>
                            <option value="abyssal">Abyssal</option>
                            <option value="arbiter">Arbiter</option>
                            <option value="meta">Meta</option>
                            <option value="guild">Guild</option>
                        </select>
                    </div>
                    <div>
                        <label class="form-label" for="difficulty">Boss Difficulty</label>
                        <select class="form-select" name="difficulty" id="difficulty" disabled>
                            <option value="normal">Normal</option>
                            <option value="hard">Hard</option>
                        </select>
                    </div>
                    <div>
                        <label class="form-label" for="hull">Boss Hull</label>
                        <select class="form-select" name="hull" id="hull">
                            @foreach ($hulls as $h)
                                <option value="{{ $h->hull_tag }}">{{ $h->hull_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="columns-two">
                        <div>
                            <label class="form-label" for="level">Boss Level</label>
                            <input class="form-control" type="number" name="level" id="level">
                        </div>
                        <div>
                            <label class="form-label" for="armor">Boss Armor</label>
                            <select class="form-select" name="armor" id="armor">
                                <option value="Light">Light</option>
                                <option value="Medium">Medium</option>
                                <option value="Heavy">Heavy</option>
                            </select>
                        </div>
                    </div>

                    <div class="columns-three">
                        <div>
                            <label class="form-label" for="hp">HP</label>
                            <input class="form-control" type="number" name="hp" id="hp">
                        </div>
                        <div>
                            <label class="form-label" for="fp">FP</label>
                            <input class="form-control" type="number" name="fp" id="fp">
                        </div>
                        <div>
                            <label class="form-label" for="trp">TRP</label>
                            <input class="form-control" type="number" name="trp" id="trp">
                        </div>
                        <div>
                            <label class="form-label" for="aa">AA</label>
                            <input class="form-control" type="number" name="aa" id="aa">
                        </div>
                        <div>
                            <label class="form-label" for="avi">AVI</label>
                            <input class="form-control" type="number" name="avi" id="avi">
                        </div>
                        <div>
                            <label class="form-label" for="acc">ACC</label>
                            <input class="form-control" type="number" name="acc" id="acc">
                        </div>
                        <div>
                            <label class="form-label" for="eva">EVA</label>
                            <input class="form-control" type="number" name="eva" id="eva">
                        </div>
                        <div>
                            <label class="form-label" for="lck">LCK</label>
                            <input class="form-control" type="number" name="lck" id="lck">
                        </div>
                        <div>
                            <label class="form-label" for="spd">SPD</label>
                            <input class="form-control" type="number" name="spd" id="spd">
                        </div>
                    </div>

                    <div>
                        <label class="form-label" for="weakness">Boss Weakness</label>
                        <input class="form-control" type="text" name="weakness" id="weakness">
                    </div>

                    <div>
                        <label class="form-label" for="img">Boss Image</label>
                        <input class="form-control" type="file" name="img" id="img">
                    </div>

                </div>
                <div class="d-grid">
                    <input type="submit" class="btn btn-success mx-auto my-3 btn-lg" value="Edit Boss">
                </div>
            @endforeach
            @csrf

        </form>
    </div>
@endsection
