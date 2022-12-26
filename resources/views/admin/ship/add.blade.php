@extends('layouts.admin')
@section('title', 'Add Ships')
@section('contents')
    <script>
        $(document).ready(function() {
            let archetypeCounter = 2;
            let roleCounter = 2;
            for (i = 2; i < 6; i++) {
                $("#archetype" + i).hide();
                $("#role" + i).hide();
            }

            $("#appendArc").click(function() {
                displaySelect('archetype', archetypeCounter);
                archetypeCounter++;
            })

            $("#appendRole").click(function() {
                displaySelect('role', roleCounter);
                roleCounter++;
            })

        })
    </script>


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

        <form action="/admin/ships/post" class="mx-5 p-1" method="POST" enctype="multipart/form-data">
            <h1>Add Ships</h1>
            @csrf
            <h2>General data</h2>
            <div>
                <label class="form-label" for="name">Ship Name</label>
                <input class="form-control" type="text" name="name" id="name" required>
            </div>
            <div>
                <label class="form-label" for="hull">Hull type</label>
                <select class="form-select" name="hull" id="hull">
                    @foreach ($hulls as $h)
                        <option value="{{ $h->id }}">{{ $h->hull_name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="form-label" for="rarity">Rarity</label>
                <select class="form-select" class="form-select" name="rarity" id="rarity">
                    @foreach ($rarities as $r)
                        <option value="{{ $r->id }}">{{ $r->rarity_name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="form-label" for="position">Position</label>
                <select class="form-select" name="position" id="position">
                    @foreach ($positions as $r)
                        <option value="{{ $r->id }}">{{ $r->position_name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="form-label" for="faction">Faction</label>
                <select class="form-select" name="faction" id="faction">
                    @foreach ($factions as $r)
                        <option value="{{ $r->id }}">{{ $r->faction_name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="form-label" for="sprite">Upload Sprite</label>
                <input class="form-control" type="file" name="sprite" id="sprite">
            </div>
            <div>
                <label class="form-label" for="chibi_sprite">Upload Chibi Sprite</label>
                <input class="form-control" type="file" name="chibi_sprite" id="chibi_sprite">
            </div>

            <div>
                <label class="form-label" for="notes">Notes</label>
                <textarea class="form-control" name="notes" id="" cols="30" rows="10"></textarea>
            </div>

            {{-- Skills --}}
            <h2 class="my-3">Skill</h2>
            <div>
                @for ($i = 0; $i < 3; $i++)
                    <div class="columns-three">
                        <div class="mb-2">
                            <label class="form-label" for="skillname-{{ $i + 1 }}">Skill {{ $i + 1 }}
                                name</label>
                            <input class="form-control" type="text" name="skillname-{{ $i + 1 }}"
                                id="skillname-{{ $i + 1 }}"
                                onchange="addRequired('skillname-{{ $i + 1 }}','skillpriority-{{ $i + 1 }}')">
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="skillpriority-{{ $i + 1 }}">Skill {{ $i + 1 }}
                                priority</label>
                            <input class="form-control" type="number" name="skillpriority-{{ $i + 1 }}"
                                id="skillpriority-{{ $i + 1 }}">
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="skillimg-{{ $i + 1 }}">Skill {{ $i + 1 }}
                                image</label>
                            <input class="form-control" type="file" name="skillimg-{{ $i + 1 }}"
                                id="skillimg-{{ $i + 1 }}">
                        </div>
                    </div>
                @endfor
            </div>


            {{-- archetypes --}}
            <h2 class="my-3">Archetype</h2>
            <div>
                <label class="form-label" for="archetype">Archetype</label>
                <div class="columns-two">
                    <select class="form-select" name="archetype1" id="archetype">
                        <option value="" selected>Select Archetype</option>
                        @foreach ($archetypes as $r)
                            <option value="{{ $r->id }}">{{ $r->archetype_name }}</option>
                        @endforeach
                    </select>
                    <div class="btn btn-primary w-50" id="appendArc">Add another Archetype</div>
                </div>


            </div>
            <div id="archetype2">
                <label class="form-label" for="archetype2">Archetype</label>
                <div class="columns-two">
                    <select class="form-select" name="archetype2" id="archetype2">
                        <option value="" selected>Select Archetype</option>
                        @foreach ($archetypes as $r)
                            <option value="{{ $r->id }}">{{ $r->archetype_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div id="archetype3">
                <label class="form-label" for="archetype3">Archetype</label>
                <div class="columns-two">
                    <select class="form-select" name="archetype3" id="archetype3">
                        <option value="" selected>Select Archetype</option>
                        @foreach ($archetypes as $r)
                            <option value="{{ $r->id }}">{{ $r->archetype_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div id="archetype4">
                <label class="form-label" for="archetype4">Archetype</label>
                <div class="columns-two">
                    <select class="form-select" name="archetype4" id="archetype4">
                        <option value="" selected>Select Archetype</option>
                        @foreach ($archetypes as $r)
                            <option value="{{ $r->id }}">{{ $r->archetype_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div id="archetype5">
                <label class="form-label" for="archetype5">Archetype</label>
                <div class="columns-two">
                    <select class="form-select" name="archetype5" id="archetype5">
                        <option value="" selected>Select Archetype</option>
                        @foreach ($archetypes as $r)
                            <option value="{{ $r->id }}">{{ $r->archetype_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            {{-- Roles --}}
            <h2 class="my-2">Roles</h2>
            <div>
                <label class="form-label" for="role">role</label>
                <div class="columns-two">
                    <select class="form-select" name="role1" id="role">
                        <option value="" selected>Select Roles</option>
                        @foreach ($roles as $r)
                            <option value="{{ $r->id }}">{{ $r->role_name }}</option>
                        @endforeach
                    </select>
                    <div class="btn btn-primary w-50" id="appendRole">Add another Role</div>
                </div>

            </div>
            <div id="role2">
                <label class="form-label" for="role2">role</label>
                <div class="columns-two">
                    <select class="form-select" name="role2" id="role2">
                        <option value="" selected>Select Roles</option>
                        @foreach ($roles as $r)
                            <option value="{{ $r->id }}">{{ $r->role_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div id="role3">
                <label class="form-label" for="role3">role</label>
                <div class="columns-two">
                    <select class="form-select" name="role3" id="role3">
                        <option value="" selected>Select Roles</option>
                        @foreach ($roles as $r)
                            <option value="{{ $r->id }}">{{ $r->role_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div id="role4">
                <label class="form-label" for="role4">role</label>
                <div class="columns-two">
                    <select class="form-select" name="role4" id="role4">
                        <option value="" selected>Select Roles</option>
                        @foreach ($roles as $r)
                            <option value="{{ $r->id }}">{{ $r->role_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div id="role5">
                <label class="form-label" for="role5">role</label>
                <div class="columns-two">
                    <select class="form-select" name="role5" id="role5">
                        <option value="" selected>Select Roles</option>
                        @foreach ($roles as $r)
                            <option value="{{ $r->id }}">{{ $r->role_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- scores --}}
            <h2 class="my-2">Scores</h2>
            <h3>Mob</h3>
            <div class="columns-three">
                <div>
                    <label class="form-label" for="mob1">9-11</label>
                    <input class="form-control" type="number" name="mob1" id="mob1">
                </div>
                <div>
                    <label class="form-label" for="mob1">12-13</label>
                    <input class="form-control" type="number" name="mob2" id="mob2">
                </div>
                <div>
                    <label class="form-label" for="mob1">14</label>
                    <input class="form-control" type="number" name="mob3" id="mob3">
                </div>
            </div>

            <h3 class="mt-3">Boss</h3>
            <div class="columns-three">
                <div>
                    <label class="form-label" for="boss1">9-11</label>
                    <input class="form-control" type="number" name="boss1" id="boss1">
                </div>
                <div>
                    <label class="form-label" for="boss2">12-13</label>
                    <input class="form-control" type="number" name="boss2" id="boss2">
                </div>
                <div>
                    <label class="form-label" for="boss3">14</label>
                    <input class="form-control" type="number" name="boss3" id="boss3">
                </div>
            </div>


            {{-- gears --}}
            <div class=" border shadow-lg p-3 my-4 rounded">
                <h2 class="mt-3">Gears</h2>
                <div id="general">
                    <label class="altona-sans-12 my-2" for="template-general">Template (General)</label>
                    <select class="form-select" name="template-general" id="template-general">
                        <option value="">Select Template</option>
                        @foreach ($templates as $t)
                            @if ($t->build == 'General')
                                <option value="{{ $t->id }}">{{ $t->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    <script></script>
                </div>
                <div id="light">
                    <label class="altona-sans-12 my-2" for="template-light">Template (Light)</label>
                    <select class="form-select" name="template-light" id="template-light">
                        <option value="">Select Template</option>
                        @foreach ($templates as $t)
                            @if ($t->build == 'Light')
                                <option value="{{ $t->id }}">{{ $t->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div id="medium">
                    <label class="altona-sans-12 my-2" for="template-medium">Template (Medium)</label>
                    <select class="form-select" name="template-medium" id="template-medium">
                        <option value="">Select Template</option>
                        @foreach ($templates as $t)
                            @if ($t->build == 'Medium')
                                <option value="{{ $t->id }}">{{ $t->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div id="heavy">
                    <label class="altona-sans-12 my-2" for="template-heavy">Template (Heavy)</label>
                    <select class="form-select" name="template-heavy" id="template-heavy">
                        <option value="">Select Template</option>
                        @foreach ($templates as $t)
                            @if ($t->build == 'Heavy')
                                <option value="{{ $t->id }}">{{ $t->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>


    </div>


    <div class="d-grid">
        <input type="submit" class="btn btn-primary mx-auto my-3 btn-lg" value="Add ship">
    </div>
    </form>
    </div>
@endsection
