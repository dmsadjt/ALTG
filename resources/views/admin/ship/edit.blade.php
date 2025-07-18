@extends('layouts.admin')
@section('title', 'Edit Ships')
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

        <h1 class="mx-5">Edit Ships</h1>
        <form action="/admin/ships/update" class="mx-5 p-1" method="POST" enctype="multipart/form-data">
            @foreach ($ship as $s)
                <h2>General data</h2>
                <input type="hidden" name="id" value="{{ $s->id }}">
                <div>
                    <label class="form-label altona-sans-12 my-1" for="name">Ship Name</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{ $s->name }}"
                        required>
                </div>
                <div>
                    <label class="form-label altona-sans-12 my-1" for="hull">Hull type</label>
                    <select class="form-select" name="hull" id="hull" selected="3">
                        @foreach ($hulls as $h)
                            <option value="{{ $h->id }}" {{ $h->id == $selected['hull'] ? 'selected' : '' }}>
                                {{ $h->hull_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="form-label altona-sans-12 my-1" for="rarity">Rarity</label>
                    <select class="form-select" class="form-select" name="rarity" id="rarity">
                        @foreach ($rarities as $r)
                            <option value="{{ $r->id }}" {{ $r->id == $selected['rarity'] ? 'selected' : '' }}>
                                {{ $r->rarity_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="form-label altona-sans-12 my-1" for="position">Position</label>
                    <select class="form-select" name="position" id="position">
                        @foreach ($positions as $r)
                            <option value="{{ $r->id }}" {{ $r->id == $selected['position'] ? 'selected' : '' }}>
                                {{ $r->position_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="form-label altona-sans-12 my-1" for="faction">Faction</label>
                    <select class="form-select" name="faction" id="faction">
                        @foreach ($factions as $r)
                            <option value="{{ $r->id }}" {{ $r->id == $selected['faction'] ? 'selected' : '' }}>
                                {{ $r->faction_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="my-2">
                    <img src="{{ asset('storage/' . $s->sprite) }}" class="medium-img d-block shadow" alt="">
                    <i class="d-block altona-sans-10">Current image</i>
                    <label class="form-label altona-sans-12 my-1" for="sprite">Upload Sprite</label>
                    <input class="form-control" type="file" name="sprite" id="sprite">
                </div>
                <div>
                    <img src="{{ asset('storage/' . $s->chibi_sprite) }}" class="medium-img d-block shadow" alt="">
                    <i class="d-block altona-sans-10">Current image</i>
                    <label class="form-label altona-sans-12 my-1" for="chibi_sprite">Upload Chibi Sprite</label>
                    <input class="form-control" type="file" name="chibi_sprite" id="chibi_sprite">
                </div>

                <div>
                    <label class="form-label altona-sans-12 my-1" for="notes">Notes</label>
                    <textarea class="form-control" name="notes" id="" cols="30" rows="10">{{ $s->notes }}</textarea>
                </div>

                {{-- Skills --}}
                <h2 class="my-3">Skill</h2>
                <div>
                    @if ($s->skill->count() == 3)
                        @for ($i = 0; $i < 3; $i++)
                            <div class="columns-three">
                                <div class="mb-2">
                                    <label class="form-label altona-sans-12 my-1" for="skillname-{{ $i + 1 }}">Skill
                                        {{ $i + 1 }}
                                        name</label>
                                    <input class="form-control" type="text" name="skillname-{{ $i + 1 }}"
                                        id="skillname-{{ $i + 1 }}" value="{{ $s->skill[$i]->skill_name }}">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label altona-sans-12 my-1"
                                        for="skillpriority-{{ $i + 1 }}">Skill
                                        {{ $i + 1 }} priority</label>
                                    <input class="form-control" type="number" name="skillpriority-{{ $i + 1 }}"
                                        id="skillpriority-{{ $i + 1 }}"
                                        value="{{ $s->skill[$i]->skill_priority }}">
                                </div>
                                <div class="mb-2 columns-two__5-1">
                                    <div>
                                        <label class="form-label altona-sans-12 my-1"
                                            for="skillimg-{{ $i + 1 }}">Skill
                                            {{ $i + 1 }}
                                            image</label>
                                        <input class="form-control" type="file" name="skillimg-{{ $i + 1 }}"
                                            id="skillimg-{{ $i + 1 }}">
                                    </div>
                                    <div>
                                        <img src="{{ asset('storage/' . $s->skill[$i]->skill_img) }}"
                                            class="medium-img d-block shadow" alt="">
                                        <i class="d-block altona-sans-10">Current image</i>
                                    </div>

                                </div>
                            </div>
                        @endfor
                    @elseif($s->skill->count() == 2)
                        @foreach ($s->skill as $key => $k)
                            <div class="columns-three">
                                <div class="mb-2">
                                    <label class="form-label altona-sans-12 my-1"
                                        for="skillname-{{ $key + 1 }}">Skill
                                        {{ $key + 1 }}
                                        name</label>
                                    <input class="form-control" type="text" name="skillname-{{ $key + 1 }}"
                                        id="skillname-{{ $key + 1 }}" value="{{ $k->skill_name }}">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label altona-sans-12 my-1"
                                        for="skillpriority-{{ $key + 1 }}">Skill
                                        {{ $key + 1 }} priority</label>
                                    <input class="form-control" type="number" name="skillpriority-{{ $key + 1 }}"
                                        id="skillpriority-{{ $key + 1 }}" value="{{ $k->skill_priority }}">
                                </div>
                                <div class="mb-2 columns-two">
                                    <div>
                                        <label class="form-label altona-sans-12 my-1"
                                            for="skillimg-{{ $key + 1 }}">Skill
                                            {{ $key + 1 }}
                                            image</label>
                                        <input class="form-control" type="file" name="skillimg-{{ $key + 1 }}"
                                            id="skillimg-{{ $key + 1 }}">
                                    </div>
                                    <div>
                                        <img src="{{ asset('storage/' . $k->skill_img) }}"
                                            class="medium-img d-block shadow" alt="">
                                        <i class="d-block altona-sans-10">Current image</i>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                        @for ($i = 2; $i < 3; $i++)
                            <div class="columns-three">
                                <div class="mb-2">
                                    <label class="form-label altona-sans-12 my-1"
                                        for="skillname-{{ $i + 1 }}">Skill
                                        {{ $i + 1 }}
                                        name</label>
                                    <input class="form-control" type="text" name="skillname-{{ $i + 1 }}"
                                        id="skillname-{{ $i + 1 }}"
                                        onchange="addRequired('skillname-{{ $i + 1 }}','skillpriority-{{ $i + 1 }}')">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label altona-sans-12 my-1"
                                        for="skillpriority-{{ $i + 1 }}">Skill
                                        {{ $i + 1 }} priority</label>
                                    <input class="form-control" type="number" name="skillpriority-{{ $i + 1 }}"
                                        id="skillpriority-{{ $i + 1 }}">
                                </div>
                                <div class="mb-2">
                                    <div>
                                        <label class="form-label altona-sans-12 my-1"
                                            for="skillimg-{{ $key + 1 }}">Skill
                                            {{ $key + 1 }}
                                            image</label>
                                        <input class="form-control" type="file" name="skillimg-{{ $key + 1 }}"
                                            id="skillimg-{{ $key + 1 }}">
                                    </div>
                                    <div>
                                        <img src="{{ asset('storage/' . $k->skill_img) }}"
                                            class="medium-img d-block shadow" alt="">
                                        <i class="d-block altona-sans-10">Current image</i>
                                    </div>

                                </div>
                            </div>
                        @endfor
                    @elseif($s->skill->count() == 1)
                        @foreach ($s->skill as $key => $k)
                            <div class="columns-three">
                                <div class="mb-2">
                                    <label class="form-label altona-sans-12 my-1"
                                        for="skillname-{{ $key + 1 }}">Skill
                                        {{ $key + 1 }}
                                        name</label>
                                    <input class="form-control" type="text" name="skillname-{{ $key + 1 }}"
                                        id="skillname-{{ $key + 1 }}" value="{{ $k->skill_name }}">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label altona-sans-12 my-1"
                                        for="skillpriority-{{ $key + 1 }}">Skill
                                        {{ $key + 1 }} priority</label>
                                    <input class="form-control" type="number" name="skillpriority-{{ $key + 1 }}"
                                        id="skillpriority-{{ $key + 1 }}" value="{{ $k->skill_priority }}">
                                </div>
                                <div class="mb-2">
                                    <div>
                                        <label class="form-label altona-sans-12 my-1"
                                            for="skillimg-{{ $key + 1 }}">Skill
                                            {{ $key + 1 }}
                                            image</label>
                                        <input class="form-control" type="file" name="skillimg-{{ $key + 1 }}"
                                            id="skillimg-{{ $key + 1 }}">
                                    </div>
                                    <div>
                                        <img src="{{ asset('storage/' . $k->skill_img) }}"
                                            class="medium-img d-block shadow" alt="">
                                        <i class="d-block altona-sans-10">Current image</i>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                        @for ($i = 1; $i < 3; $i++)
                            <div class="columns-three">
                                <div class="mb-2">
                                    <label class="form-label altona-sans-12 my-1"
                                        for="skillname-{{ $i + 1 }}">Skill
                                        {{ $i + 1 }}
                                        name</label>
                                    <input class="form-control" type="text" name="skillname-{{ $i + 1 }}"
                                        id="skillname-{{ $i + 1 }}"
                                        onchange="addRequired('skillname-{{ $i + 1 }}','skillpriority-{{ $i + 1 }}')">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label altona-sans-12 my-1"
                                        for="skillpriority-{{ $i + 1 }}">Skill
                                        {{ $i + 1 }} priority</label>
                                    <input class="form-control" type="number" name="skillpriority-{{ $i + 1 }}"
                                        id="skillpriority-{{ $i + 1 }}">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label altona-sans-12 my-1"
                                        for="skillimg-{{ $i + 1 }}">Skill
                                        {{ $i + 1 }}
                                        image</label>
                                    <input class="form-control" type="file" name="skillimg-{{ $i + 1 }}"
                                        id="skillimg-{{ $i + 1 }}">
                                </div>
                            </div>
                        @endfor
                    @elseif($s->skill->count() == 0)
                        @for ($i = 0; $i < 3; $i++)
                            <div class="columns-three">
                                <div class="mb-2">
                                    <label class="form-label altona-sans-12 my-1"
                                        for="skillname-{{ $i + 1 }}">Skill
                                        {{ $i + 1 }}
                                        name</label>
                                    <input class="form-control" type="text" name="skillname-{{ $i + 1 }}"
                                        id="skillname-{{ $i + 1 }}"
                                        onchange="addRequired('skillname-{{ $i + 1 }}','skillpriority-{{ $i + 1 }}')">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label altona-sans-12 my-1"
                                        for="skillpriority-{{ $i + 1 }}">Skill
                                        {{ $i + 1 }} priority</label>
                                    <input class="form-control" type="number" name="skillpriority-{{ $i + 1 }}"
                                        id="skillpriority-{{ $i + 1 }}">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label altona-sans-12 my-1"
                                        for="skillimg-{{ $i + 1 }}">Skill
                                        {{ $i + 1 }}
                                        image</label>
                                    <input class="form-control" type="file" name="skillimg-{{ $i + 1 }}"
                                        id="skillimg-{{ $i + 1 }}">
                                </div>
                            </div>
                        @endfor
                    @endif
                </div>


                {{-- archetypes --}}
                <h2 class="my-3">Archetype</h2>
                <div>
                    <label class="form-label altona-sans-12 my-1" for="archetype">Archetype 1</label>
                    <div class="columns-two">
                        <select class="form-select" name="archetype1" id="archetype">
                            <option value="" selected>Select Archetype</option>
                            @foreach ($archetypes as $r)
                                <option value="{{ $r->id }}"
                                    {{ $r->id == $selected['archetype1'] ? 'selected' : '' }}>{{ $r->archetype_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                </div>
                <div id="archetype2">
                    <label class="form-label altona-sans-12 my-1" for="archetype2">Archetype 2</label>
                    <div class="columns-two">
                        <select class="form-select" name="archetype2" id="archetype2">
                            <option value="" selected>Select Archetype</option>
                            @foreach ($archetypes as $r)
                                <option value="{{ $r->id }}"
                                    {{ $r->id == $selected['archetype2'] ? 'selected' : '' }}>{{ $r->archetype_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div id="archetype3">
                    <label class="form-label altona-sans-12 my-1" for="archetype3">Archetype 3</label>
                    <div class="columns-two">
                        <select class="form-select" name="archetype3" id="archetype3">
                            <option value="" selected>Select Archetype</option>
                            @foreach ($archetypes as $r)
                                <option value="{{ $r->id }}"
                                    {{ $r->id == $selected['archetype3'] ? 'selected' : '' }}>{{ $r->archetype_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div id="archetype4">
                    <label class="form-label altona-sans-12 my-1" for="archetype4">Archetype 4</label>
                    <div class="columns-two">
                        <select class="form-select" name="archetype4" id="archetype4">
                            <option value="" selected>Select Archetype</option>
                            @foreach ($archetypes as $r)
                                <option value="{{ $r->id }}"
                                    {{ $r->id == $selected['archetype4'] ? 'selected' : '' }}>{{ $r->archetype_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div id="archetype5">
                    <label class="form-label altona-sans-12 my-1" for="archetype5">Archetype 5</label>
                    <div class="columns-two">
                        <select class="form-select" name="archetype5" id="archetype5">
                            <option value="" selected>Select Archetype</option>
                            @foreach ($archetypes as $r)
                                <option value="{{ $r->id }}"
                                    {{ $r->id == $selected['archetype5'] ? 'selected' : '' }}>{{ $r->archetype_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>


                {{-- Roles --}}
                <h2 class="my-2">Roles</h2>
                <div class="my-1">
                    <label class="form-label altona-sans-12 my-1" for="role">Role 1</label>
                    <div class="columns-two">
                        <select class="form-select" name="role1" id="role">
                            <option value="" selected>Select Roles</option>
                            @foreach ($roles as $r)
                                <option value="{{ $r->id }}"
                                    {{ $r->id == $selected['role1'] ? 'selected' : '' }}>
                                    {{ $r->role_name }}</option>
                            @endforeach
                        </select>
                        <div></div>
                    </div>

                </div>
                <div id="role2" class="my-1">
                    <label class="form-label altona-sans-12 my-1" for="role2">Role 2</label>
                    <div class="columns-two">
                        <select class="form-select" name="role2" id="role2">
                            <option value="" selected>Select Roles</option>
                            @foreach ($roles as $r)
                                <option value="{{ $r->id }}"
                                    {{ $r->id == $selected['role2'] ? 'selected' : '' }}>
                                    {{ $r->role_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div id="role3" class="my-1">
                    <label class="form-label altona-sans-12 my-1" for="role3">Role 3</label>
                    <div class="columns-two">
                        <select class="form-select" name="role3" id="role3">
                            <option value="" selected>Select Roles</option>
                            @foreach ($roles as $r)
                                <option value="{{ $r->id }}"
                                    {{ $r->id == $selected['role3'] ? 'selected' : '' }}>
                                    {{ $r->role_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div id="role4" class="my-1">
                    <label class="form-label altona-sans-12 my-1" for="role4">Role 4</label>
                    <div class="columns-two">
                        <select class="form-select" name="role4" id="role4">
                            <option value="" selected>Select Roles</option>
                            @foreach ($roles as $r)
                                <option value="{{ $r->id }}"
                                    {{ $r->id == $selected['role4'] ? 'selected' : '' }}>
                                    {{ $r->role_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div id="role5" class="my-1">
                    <label class="form-label altona-sans-12 my-1" for="role5">Role 5</label>
                    <div class="columns-two">
                        <select class="form-select" name="role5" id="role5">
                            <option value="" selected>Select Roles</option>
                            @foreach ($roles as $r)
                                <option value="{{ $r->id }}"
                                    {{ $r->id == $selected['role5'] ? 'selected' : '' }}>
                                    {{ $r->role_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- scores --}}
                <h2 class="my-2">Scores</h2>
                <h3>Mob</h3>
                <div class="columns-three">
                    <div>
                        <label class="form-label altona-sans-12 my-1" for="mob1">9-11</label>
                        <input class="form-control" type="number" name="mob1" id="mob1"
                            value="{{ $s->mobScore->mob_9_11 }}">
                    </div>
                    <div>
                        <label class="form-label altona-sans-12 my-1" for="mob1">12-13</label>
                        <input class="form-control" type="number" name="mob2" id="mob2"
                            value="{{ $s->mobScore->mob_12_13 }}">
                    </div>
                    <div>
                        <label class="form-label altona-sans-12 my-1" for="mob1">14</label>
                        <input class="form-control" type="number" name="mob3" id="mob3"
                            value="{{ $s->mobScore->mob_14 }}">
                    </div>
                </div>

                <h3 class="mt-3">Boss</h3>
                <div class="columns-three">
                    <div>
                        <label class="form-label altona-sans-12 my-1" for="boss1">9-11</label>
                        <input class="form-control" type="number" name="boss1" id="boss1"
                            value="{{ $s->bossScore->boss_9_11 }}">
                    </div>
                    <div>
                        <label class="form-label altona-sans-12 my-1" for="boss2">12-13</label>
                        <input class="form-control" type="number" name="boss2" id="boss2"
                            value="{{ $s->bossScore->boss_12_13 }}">
                    </div>
                    <div>
                        <label class="form-label altona-sans-12 my-1" for="boss3">14</label>
                        <input class="form-control" type="number" name="boss3" id="boss3"
                            value="{{ $s->bossScore->boss_14 }}">
                    </div>
                </div>


                {{-- gears --}}
                <h2 class="mt-3">Gears</h2>
                <div class=" border shadow-lg p-3 my-4 rounded">
                    <h2 class="mt-3">Gears</h2>
                    <div id="general">
                        <label class="form-label altona-sans-12 my-2" for="template-general">Template (General)</label>
                        <select class="form-select" name="template-general" id="template-general">
                            <option value="">Select Template</option>
                            @foreach ($templates as $t)
                                @if ($t->build == 'General')
                                    <option value="{{ $t->id }}"
                                        {{ $selected['general'] == $t->id ? 'selected' : '' }}>{{ $t->name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        <script></script>
                    </div>
                    <div id="light">
                        <label class="form-label altona-sans-12 my-2" for="template-light">Template (Light)</label>
                        <select class="form-select" name="template-light" id="template-light">
                            <option value="">Select Template</option>
                            @foreach ($templates as $t)
                                @if ($t->build == 'Light')
                                    <option value="{{ $t->id }}"
                                        {{ $selected['light'] == $t->id ? 'selected' : '' }}>{{ $t->name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div id="medium">
                        <label class="form-label altona-sans-12 my-2" for="template-medium">Template (Medium)</label>
                        <select class="form-select" name="template-medium" id="template-medium">
                            <option value="">Select Template</option>
                            @foreach ($templates as $t)
                                @if ($t->build == 'Medium')
                                    <option value="{{ $t->id }}"
                                        {{ $selected['medium'] == $t->id ? 'selected' : '' }}>{{ $t->name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div id="heavy">
                        <label class="form-label altona-sans-12 my-2" for="template-heavy">Template (Heavy)</label>
                        <select class="form-select" name="template-heavy" id="template-heavy">
                            <option value="">Select Template</option>
                            @foreach ($templates as $t)
                                @if ($t->build == 'Heavy')
                                    <option value="{{ $t->id }}"
                                        {{ $selected['heavy'] == $t->id ? 'selected' : '' }}>{{ $t->name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="d-grid">
                    <input type="submit" class="btn btn-success mx-auto my-3 btn-lg" value="Edit ship">
                </div>
            @endforeach
            @csrf

        </form>
    </div>
@endsection
