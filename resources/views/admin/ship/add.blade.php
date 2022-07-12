@extends('layouts.admin')
@section('title', 'Add Ships')
@section('contents')
    <script>
        $(document).ready(function() {
            let archetypeCounter = 2;
            let roleCounter = 2;
            for (i = 2; i < 6; i++){
                $("#archetype"+i).hide();
                $("#role"+i).hide();
            }

            $("#appendArc").click(function(){
                displaySelect('archetype',archetypeCounter);
                archetypeCounter++;
            })

            $("#appendRole").click(function(){
                displaySelect('role',roleCounter);
                roleCounter++;
            })


        })
    </script>
    <div class="d-grid pill-dark p-2 m-3">
        <h1 class="mx-5">Add Ships</h1>
        <form action="/admin/ships/post" class="mx-5 p-1" method="POST">
            @csrf
            <div>
                <label class="form-label" for="name">Ship Name</label>
                <input class="form-control" type="text" name="name" id="name">
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

            {{-- archetypes --}}
            <div>
                <label class="form-label" for="archetype">Archetype</label>
                <div class="columns-two">
                    <select class="form-select" name="archetype" id="archetype">
                        @foreach ($archetypes as $r)
                            <option value="{{ $r->id }}">{{ $r->archetype_name }}</option>
                        @endforeach
                    </select>
                    <div class="btn btn-primary w-50" id="appendArc">Add another Archetype</div>
                </div>


            </div>
            <div id="archetype2">
                <label class="form-label" for="archetype2">Archetype</label>
                <div class="columns-two" >
                    <select class="form-select" name="archetype2" id="archetype2">
                        @foreach ($archetypes as $r)
                            <option value="{{ $r->id }}">{{ $r->archetype_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div id="archetype3">
                <label class="form-label" for="archetype3">Archetype</label>
                <div class="columns-two" >
                    <select class="form-select" name="archetype3" id="archetype3">
                        @foreach ($archetypes as $r)
                            <option value="{{ $r->id }}">{{ $r->archetype_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div id="archetype4">
                <label class="form-label" for="archetype4">Archetype</label>
                <div class="columns-two" >
                    <select class="form-select" name="archetype4" id="archetype4">
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
                        @foreach ($archetypes as $r)
                            <option value="{{ $r->id }}">{{ $r->archetype_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            {{-- Roles --}}
            <div>
                <label class="form-label" for="role">role</label>
                <div class="columns-two" >
                    <select class="form-select" name="role" id="role">
                        @foreach ($roles as $r)
                            <option value="{{ $r->id }}">{{ $r->role_name }}</option>
                        @endforeach
                    </select>
                    <div class="btn btn-primary w-50" id="appendRole">Add another Role</div>
                </div>

            </div>
            <div id="role2">
                <label class="form-label" for="role2">role</label>
                <div class="columns-two" >
                    <select class="form-select" name="role2" id="role2">
                        @foreach ($roles as $r)
                            <option value="{{ $r->id }}">{{ $r->role_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div id="role3">
                <label class="form-label" for="role3">role</label>
                <div class="columns-two" >
                    <select class="form-select" name="role3" id="role3">
                        @foreach ($roles as $r)
                            <option value="{{ $r->id }}">{{ $r->role_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div id="role4">
                <label class="form-label" for="role4">role</label>
                <div class="columns-two" >
                    <select class="form-select" name="role4" id="role4">
                        @foreach ($roles as $r)
                            <option value="{{ $r->id }}">{{ $r->role_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div id="role5">
                <label class="form-label" for="role5">role</label>
                <div class="columns-two" >
                    <select class="form-select" name="role5" id="role5">
                        @foreach ($roles as $r)
                            <option value="{{ $r->id }}">{{ $r->role_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            {{-- gears --}}
            <div>

            </div>




            <div>
                <label class="form-label" for="sprite">Upload Sprite</label>
                <input class="form-control" type="file" name="sprite" id="sprite">
            </div>
            <div>
                <label class="form-label" for="chibi_sprite">Upload Chibi Sprite</label>
                <input class="form-control" type="file" name="chibi_sprite" id="chibi_sprite">
            </div>

            <div><input type="submit" value="Add ship"></div>
        </form>
    </div>
@endsection
