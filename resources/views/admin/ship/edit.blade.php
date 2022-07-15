@extends('layouts.admin')
@section('title', 'Add Ships')
@section('contents')
    <script>
        $(document).ready(function() {
            // let archetypeCounter = 2;
            // let roleCounter = 2;
            // // for (i = 2; i < 6; i++) {
            // //     $("#archetype" + i).hide();
            // //     $("#role" + i).hide();
            // // }

            // // $("#appendArc").click(function() {
            // //     displaySelect('archetype', archetypeCounter);
            // //     archetypeCounter++;
            // // })

            // // $("#appendRole").click(function() {
            // //     displaySelect('role', roleCounter);
            // //     roleCounter++;
            // // })

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

        <h1 class="mx-5">Add Ships</h1>
        <form action="/admin/ships/post" class="mx-5 p-1" method="POST" enctype="multipart/form-data">
            @foreach ($ship as $s)
                <h2>General data</h2>
                <div>
                    <label class="form-label" for="name">Ship Name</label>
                    <input class="form-control" type="text" name="name" id="name" value={{$s->name}} required>
                </div>
                <div>
                    <label class="form-label" for="hull">Hull type</label>
                    <select class="form-select" name="hull" id="hull" selected="3">
                        @foreach ($hulls as $h)
                            <option value="{{ $h->id }}" {{$h->id == $selected['hull'] ? 'selected':''}} >{{ $h->hull_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="form-label" for="rarity">Rarity</label>
                    <select class="form-select" class="form-select" name="rarity" id="rarity">
                        @foreach ($rarities as $r)
                            <option value="{{ $r->id }}" {{$r->id == $selected['rarity'] ? 'selected':'' }} >{{ $r->rarity_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="form-label" for="position">Position</label>
                    <select class="form-select" name="position" id="position">
                        @foreach ($positions as $r)
                            <option value="{{ $r->id }}" {{$r->id == $selected['position'] ? 'selected':'' }}>{{ $r->position_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="form-label" for="faction">Faction</label>
                    <select class="form-select" name="faction" id="faction">
                        @foreach ($factions as $r)
                            <option value="{{ $r->id }}" {{$r->id == $selected['faction'] ? 'selected':'' }} >{{ $r->faction_name }}</option>
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
                    <textarea class="form-control" name="notes" id="" cols="30" rows="10" >{{$s->notes}}</textarea>
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
                                    id="skillname-{{ $i + 1 }}" value="{{$s->skill[$i]->skill_name}}">
                            </div>
                            <div class="mb-2">
                                <label class="form-label" for="skillpriority-{{ $i + 1 }}">Skill
                                    {{ $i + 1 }} priority</label>
                                <input class="form-control" type="number" name="skillpriority-{{ $i + 1 }}"
                                    id="skillpriority-{{ $i + 1 }}" value="{{$s->skill[$i]->skill_priority}}">
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
                                <option value="{{ $r->id }}" {{$r->id == $selected['archetype1'] ? 'selected':''}} >{{ $r->archetype_name }}</option>
                            @endforeach
                        </select>
                        <div class="btn btn-primary w-50" disabled id="appendArc">Add another Archetype</div>
                    </div>


                </div>
                <div id="archetype2">
                    <label class="form-label" for="archetype2">Archetype</label>
                    <div class="columns-two">
                        <select class="form-select" name="archetype2" id="archetype2">
                            <option value="" selected>Select Archetype</option>
                            @foreach ($archetypes as $r)
                                <option value="{{ $r->id }}" {{$r->id == $selected['archetype2'] ? 'selected':''}} >{{ $r->archetype_name }}</option>
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
                                <option value="{{ $r->id }}" {{$r->id == $selected['archetype3'] ? 'selected':''}} >{{ $r->archetype_name }}</option>
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
                                <option value="{{ $r->id }}" {{$r->id == $selected['archetype4'] ? 'selected':''}} >{{ $r->archetype_name }}</option>
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
                                <option value="{{ $r->id }}" {{$r->id == $selected['archetype5'] ? 'selected':''}} >{{ $r->archetype_name }}</option>
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
                                <option value="{{ $r->id }}" {{$r->id == $selected['role1'] ? 'selected':''}} >{{ $r->role_name }}</option>
                            @endforeach
                        </select>
                        <div class="btn btn-primary w-50" id="appendRole" disabled>Add another Role</div>
                    </div>

                </div>
                <div id="role2">
                    <label class="form-label" for="role2">role</label>
                    <div class="columns-two">
                        <select class="form-select" name="role2" id="role2">
                            <option value="" selected>Select Roles</option>
                            @foreach ($roles as $r)
                                <option value="{{ $r->id }}" {{$r->id == $selected['role2'] ? 'selected':''}} >{{ $r->role_name }}</option>
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
                                <option value="{{ $r->id }}" {{$r->id == $selected['role3'] ? 'selected':''}} >{{ $r->role_name }}</option>
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
                                <option value="{{ $r->id }}" {{$r->id == $selected['role4'] ? 'selected':''}} >{{ $r->role_name }}</option>
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
                                <option value="{{ $r->id }}" {{$r->id == $selected['role5'] ? 'selected':''}} >{{ $r->role_name }}</option>
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
                        <input class="form-control" type="number" name="mob1" id="mob1" value="{{$s->mobScore->mob_9_11}}">
                    </div>
                    <div>
                        <label class="form-label" for="mob1">12-13</label>
                        <input class="form-control" type="number" name="mob2" id="mob2" value="{{$s->mobScore->mob_12_13}}">
                    </div>
                    <div>
                        <label class="form-label" for="mob1">14</label>
                        <input class="form-control" type="number" name="mob3" id="mob3" value="{{$s->mobScore->mob_14}}">
                    </div>
                </div>

                <h3 class="mt-3">Boss</h3>
                <div class="columns-three">
                    <div>
                        <label class="form-label" for="boss1">9-11</label>
                        <input class="form-control" type="number" name="boss1" id="boss1" value="{{$s->bossScore->boss_9_11}}">
                    </div>
                    <div>
                        <label class="form-label" for="boss2">12-13</label>
                        <input class="form-control" type="number" name="boss2" id="boss2" value="{{$s->bossScore->boss_12_13}}">
                    </div>
                    <div>
                        <label class="form-label" for="boss3">14</label>
                        <input class="form-control" type="number" name="boss3" id="boss3" value="{{$s->bossScore->boss_14}}">
                    </div>
                </div>


                {{-- gears --}}
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
                                        @for ($i = 0; $i < 15; $i++)
                                            <div>
                                                <label class="form-label"
                                                    for="{{ $g->id }}-gear-{{ $i }}">Gear
                                                    {{ $i + 1 }}</label>
                                                <select name="{{ $g->id }}-gear-{{ $i }}"
                                                    id="{{ $g->id }}-gear-{{ $i }}"
                                                    class="form-select">
                                                    <option value="" selected>Select Gear</option>
                                                    @foreach ($gears as $s)
                                                        @if ($s->gear_type == $g->id)
                                                            <option value="{{ $s->id }}">{{ $s->gear_name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div>
                                                <label class="form-label"
                                                    for="{{ $g->id }}-category-{{ $i }}">Gear
                                                    Category {{ $i + 1 }}</label>
                                                <select class="form-select"
                                                    name="{{ $g->id }}-category-{{ $i }}"
                                                    id="{{ $g->id }}-category-{{ $i }}">
                                                    <option value="" selected>Select Gear Category</option>
                                                    <option value="General">General</option>
                                                    <option value="Light">Light</option>
                                                    <option value="Medium">Med</option>
                                                    <option value="Heavy">Heavy</option>
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
                    <input type="submit" class="btn btn-success mx-auto my-3 btn-lg" value="Add ship">
                </div>
            @endforeach
            @csrf

        </form>
    </div>
@endsection
