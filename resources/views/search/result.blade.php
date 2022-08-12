@extends('layouts.layout')
@section('title', 'Search page')
@section('contents')
    <section class="d-grid">
        <div class="container text-white mx-auto w-75 gap-1 d-grid p-5 shadow">
            <h1>Search Results for '{{$result}}'</h1>

            <form action="/search/results" class="d-grid">
                <input type="text" name="ship" id="ship" class="form-control my-3 shadow" value="{{$result}}">
                <input type="submit" value="Search" class="pill altona-sans-12 w-25 text-center" >
            </form>

            <hr>

            <table class=" ship-table" style="width:100%;">
                <thead class="bg-gray1 text-white altona-sans-12">
                    <th style="width:2%">&nbsp;</th>
                    <th style="width:48%">@sortablelink('name')</th>
                    <th class="r-hide"><a href="#" class="altona-sans-12 link-none">Archetype</a></th>
                    <th class="r-hide"><a href="#" class="altona-sans-12 link-none">Role</a></th>
                    <th class="r-hide"><span>@sortablelink('positions.position_name','Position')</span></th>
                </thead>
                <tbody>
                    @foreach ($ships as $s)
                        <tr class="text-white shadow">
                            <td class="rarity-tag" id={{ $s->rarity->rarity_tag }}>
                                <span class="rotate--90 justify-content-center">{{ $s->rarity->rarity_tag }}</span>
                            </td>
                            <td class="bg-gray1 swiss-font-18"><img class="chibi-img"
                                    src="/img/ships/chibi/{{ $s->chibi_sprite }}" alt=""> <a
                                    href="/ships/{{ $s->id }}" class="link-none font-inherit">
                                    {{ $s->name }}
                                </a></td>
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
                                    <img class="position-row-img" src="/img/positions/{{ $s->positions->position_image }}"
                                        alt="position">
                                </div>
                            </td>
                            <script>
                                idTag = document.getElementsByClassName('rarity-tag')[0].id;
                                changeLabel(idTag);
                            </script>
                        </tr>
                    @endforeach
                </tbody>
            </table>

                    {{$ships->links()}}
        </div>
    </section>
@endsection
