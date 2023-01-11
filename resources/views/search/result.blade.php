@extends('layouts.layout')
@section('title', 'Search page')
@section('contents')
    <section class="d-grid">
        <div class="container text-white mx-auto gap-1 d-grid p-3 shadow">
            <div>
                <h1>Search Results for '{{ $result }}'</h1>
                <form action="/search/results" class="d-grid">
                    <div>
                        <input type="text" name="ship" id="ship" class="form-control my-3 shadow"
                            value="{{ $result }}">
                    </div>
                    <div><input type="submit" value="Search" class="pill altona-sans-12 text-center"></div>
                </form>
            </div>

            <hr>

            <div class="ships">
                <table class=" ship-table">
                    <thead class="bg-gray1 text-white altona-sans-12">
                        <th>&nbsp;</th>
                        <th>@sortablelink('name')</th>
                        <th class="r-hide"><a href="#" class="altona-sans-12 link-none">Archetype</a></th>
                        <th class="r-hide"><a href="#" class="altona-sans-12 link-none">Role</a></th>
                        <th class="r-hide"><span>@sortablelink('positions.position_name', 'Position')</span></th>
                    </thead>
                    <tbody>
                        @foreach ($ships as $s)
                            <tr class="text-white shadow">
                                <td class="rarity-tag" data-rarity="{{ $s->rarity->rarity_tag }}">
                                    <span class="rotate--90 justify-content-center">{{ $s->rarity->rarity_tag }}</span>
                                </td>
                                <td class="bg-gray1 ">
                                    <div class="row">
                                        <div class="col-10">
                                            <a href="/ships/{{ $s->id }}" class="swiss-font-12 ms-1 link-none">
                                                <span class="r-hide">
                                                    <img class="chibi-img" src="{{ asset('storage/' . $s->chibi_sprite) }}"
                                                        alt="">
                                                    {{ $s->name }}
                                                </span>
                                                <span class="r-show">
                                                    <img class="chibi-img" src="{{ asset('storage/' . $s->chibi_sprite) }}"
                                                        alt="">
                                                    {{ Str::limit($s->name, 13) }}
                                                </span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <div class="r-show btn btn-outline-light altona-sans-10 justify-content-end"
                                                id="button-{{ $s->id }}" data-id="{{ $s->name . '-' . $s->id }}"
                                                style="font-size: 0.6rem; padding:0.1em" onclick="dropdown(this)">
                                                +
                                            </div>
                                        </div>
                                    </div>


                                    <div class="details mt-2 pt-2" id="{{ $s->name . '-' . $s->id }}">
                                        <div class="altona-sans-10 ms-1" style="font-size: 0.8rem">
                                            Archetypes :
                                            @foreach ($s->archetypes as $a)
                                                {{ $a->archetype_name }},
                                            @endforeach
                                        </div>
                                        <div class="altona-sans-10 ms-1" style="font-size: 0.8rem">
                                            Roles :
                                            @foreach ($s->roles as $a)
                                                {{ $a->role_name }},
                                            @endforeach
                                        </div>
                                        <div class="altona-sans-10 ms-1" style="font-size: 0.8rem">
                                            Position :
                                            {{ $s->positions->position_name }}
                                        </div>
                                    </div>

                                </td>
                                <td class="bg-gray1 altona-sans-10 border-left-white text-align-center r-hide">
                                    @foreach ($s->archetypes as $a)
                                        <div>{{ $a->archetype_name }}</div>
                                    @endforeach
                                </td>
                                <td class="bg-gray1 altona-sans-10 border-left-white text-align-center r-hide">
                                    @foreach ($s->roles as $a)
                                        <div>{{ $a->role_name }}</div>
                                    @endforeach
                                </td>
                                <td class="bg-gray1 altona-sans-10 border-left-white text-align-center r-hide">
                                    <div>
                                        {{ $s->positions->position_name }}
                                    </div>
                                    <div class="mx-auto">
                                        <img class="position-row-img"
                                            src=" {{ asset('storage/' . $s->positions->position_image) }}" alt="position">
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>

                </table>

                <script>
                    x = document.getElementsByClassName('rarity-tag');
                    for (i = 0; i < x.length; i++) {
                        changeTag(x[i]);
                    }
                </script>

            </div>
            <div class="ships">
                <div class="mx-auto" style="width:max-content;">{{ $ships->links() }}</div>
            </div>


        </div>
    </section>
@endsection
