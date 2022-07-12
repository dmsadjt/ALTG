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


            for (i=1; i<16;i++){
                $("#sgear-"+i).hide();
                $("#scategory-"+i).hide();
            }

        })
    </script>
    <div class="d-grid pill-dark p-2 m-3">
        <h1 class="mx-5">Add Ships</h1>
        <form action="/admin/ships/post" class="mx-5 p-1" method="POST">
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

            {{-- archetypes --}}
            <h2 class="my-3">Archetype</h2>
            <div>
                <label class="form-label" for="archetype">Archetype</label>
                <div class="columns-two">
                    <select class="form-select" name="archetype" id="archetype">
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
                    <select class="form-select" name="role" id="role">
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
            <h2>Gears</h2>
            <div>
                @foreach ($gear_category as $g)
                    <h3>{{ $g->gear_category_name }}</h3>

                    <div class="columns-two">
                        @for ($i = 0; $i < 15; $i++)
                            <div id="sgear-{{$i}}">
                                <select name="gear-{{$i}}" id="{{$g->gear_category_slug}}-gear-{{$i}}" class="form-select">
                                        <option value="" selected>Select Gear</option>
                                    @foreach ($gears as $s)
                                        <option value="{{ $s->id }}">{{ $s->gear_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div id="scategory-{{$i}}">
                                <select class="form-select" name="{{$g->gear_category_slug}}-category-{{$i}}" id="category-{{$i}}">
                                    <option value="" selected>Select Gear Category</option>
                                    <option value="General">General</option>
                                    <option value="Light">Light</option>
                                    <option value="Med">Med</option>
                                    <option value="Heavy">Heavy</option>
                                </select>
                            </div>
                        @endfor
                    </div>

                @endforeach
            </div>





            <div><input type="submit" value="Add ship"></div>
        </form>
    </div>
@endsection
