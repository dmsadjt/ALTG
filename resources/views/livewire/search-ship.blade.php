<div class="text-white m-5">
    <div>
        <label for="ships">Search Ships</label>
        <input type="text" wire:model="search" id="ships" name="ships">
    </div>

    <div class="ships">
        <table class=" ship-table">
            <thead class="bg-gray1 text-white altona-sans-12">
                <th>&nbsp;</th>
                <th>@sortablelink('name')</th>
                <th><a href="#" class="altona-sans-12 link-none">Archetype</a></th>
                <th><a href="#" class="altona-sans-12 link-none">Role</a></th>
                <th><span>@sortablelink('positions.position_name', 'Position')</span></th>
            </thead>
            <tbody>
                @foreach ($ships as $s)
                    <tr class="text-white shadow">
                        <td class="rarity-tag">
                            <span class="rotate--90 justify-content-center raritys">{{ $s->rarity->rarity_tag }}</span>
                        </td>
                        <td class="bg-gray1 swiss-font-18"><img class="chibi-img r-hide"
                                src="/img/ships/chibi/{{ $s->chibi_sprite }}" alt=""> <a
                                href="/ships/{{ $s->id }}" class="ms-1 link-none font-inherit">
                                {{ $s->name }}
                            </a></td>
                        <td class="bg-gray1 altona-sans-10 border-left-white text-align-center">
                            @foreach ($s->archetypes as $a)
                                <div>{{ $a->archetype_name }}</div>
                            @endforeach
                        </td>
                        <td class="bg-gray1 altona-sans-10 border-left-white text-align-center">
                            @foreach ($s->roles as $a)
                                <div>{{ $a->role_name }}</div>
                            @endforeach
                        </td>
                        <td class="bg-gray1 altona-sans-10 border-left-white text-align-center">
                            <div>
                                {{ $s->positions->position_name }}
                            </div>
                            <div class="mx-auto">
                                <img class="position-row-img" src="/img/positions/{{ $s->positions->position_image }}"
                                    alt="position">
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>



    </div>

    <script>
        document.addEventListener('livewire:load', function() {
            x = document.getElementsByClassName('raritys');
            for (i = 0; i < x.length; i++) {
                changeTag(x[i]);
            }
        })

        document.addEventListener('test', function() {
            x = document.getElementsByClassName('raritys');
            for (i = 0; i < x.length; i++) {
                changeTag(x[i]);
            }
        })
    </script>

    {{ $ships->links() }}
</div>
