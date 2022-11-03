<div>
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
        <p class="mx-5 altona-sans-12">Edit current Boss</p>
        <form action="/admin/sirens/update" class="mx-5 p-1" method="POST" enctype="multipart/form-data">
            <div>
                <label class="form-label altona-sans-12" for="name">Boss Name</label>
                <input class="form-control" type="text" name="name" id="name" value="{{ $boss->name }}">
            </div>

            <div class="columns-four">
                <div class="my-2">
                    <label class="form-label altona-sans-12 mt-2" for="type">Boss type</label>
                    <select class="form-select" name="type" id="type" wire:model="bossType">
                        <option value="">Select Type</option>
                        <option value="stronghold">Stronghold
                        </option>
                        <option value="abyssal">Abyssal</option>
                        <option value="arbiter">Arbiter</option>
                        <option value="meta">Meta</option>
                        <option value="guild">Guild</option>
                    </select>
                </div>

                <div class="my-2">
                    <label class="form-label altona-sans-12 mt-2" for="weakness">Boss Weakness</label>
                    <input class="form-control" type="text" name="weakness" id="weakness"
                        value="{{ $boss->weakness }}">

                </div>

                <div class="my-2">
                    <label class="form-label altona-sans-12 mt-2" for="img">Boss Image</label>
                    <input class="form-control" type="file" name="img" id="img">
                </div>

                <div class="my-2">
                    <img src="{{ asset('storage/' . $boss->img) }}" class="medium-img d-block shadow" alt="">
                    <i class="d-block altona-sans-10">Current image</i>
                </div>

            </div>

            <hr>
            <h2>None</h2>
            <h3>Normal</h3>
            <div class="columns-three">
                <div>
                    <label class="form-label altona-sans-12 mt-2" for="level">Boss Level</label>
                    <input class="form-control" type="number" name="level" id="level"
                        value="{{ $boss->normal?->level }}">
                </div>
                <div>
                    <label class="form-label altona-sans-12 mt-2" for="armor">Boss Armor</label>
                    <select class="form-select" name="armor" id="armor">
                        <option value="Light" {{ $boss->normal?->armor == 'Light' ? 'selected' : '' }}>Light</option>
                        <option value="Medium" {{ $boss->normal?->armor == 'Medium' ? 'selected' : '' }}>Medium</option>
                        <option value="Heavy" {{ $boss->normal?->armor == 'Heavy' ? 'selected' : '' }}>Heavy</option>
                    </select>
                </div>
                <div>
                    <label class="form-label altona-sans-12 mt-2" for="hull">Boss Hull</label>
                    <select class="form-select" name="hull" id="hull">
                        @foreach ($hulls as $h)
                            <option value="{{ $h->id }}"
                                {{ $boss->normal?->hull_id == $h->id ? 'selected' : '' }}>
                                {{ $h->hull_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="form-label altona-sans-12 mt-2" for="hp">HP</label>
                    <input class="form-control" type="number" name="hp" id="hp"
                        value="{{ $boss->normal?->hp }}">
                </div>
                <div>
                    <label class="form-label altona-sans-12 mt-2" for="fp">FP</label>
                    <input class="form-control" type="number" name="fp" id="fp"
                        value="{{ $boss->normal?->fp }}">
                </div>
                <div>
                    <label class="form-label altona-sans-12 mt-2" for="trp">TRP</label>
                    <input class="form-control" type="number" name="trp" id="trp"
                        value="{{ $boss->normal?->trp }}">
                </div>
                <div>
                    <label class="form-label altona-sans-12 mt-2" for="aa">AA</label>
                    <input class="form-control" type="number" name="aa" id="aa"
                        value="{{ $boss->normal?->aa }}">
                </div>
                <div>
                    <label class="form-label altona-sans-12 mt-2" for="avi">AVI</label>
                    <input class="form-control" type="number" name="avi" id="avi"
                        value="{{ $boss->normal?->avi }}">
                </div>
                <div>
                    <label class="form-label altona-sans-12 mt-2" for="acc">ACC</label>
                    <input class="form-control" type="number" name="acc" id="acc"
                        value="{{ $boss->normal?->acc }}">
                </div>
                <div>
                    <label class="form-label altona-sans-12 mt-2" for="eva">EVA</label>
                    <input class="form-control" type="number" name="eva" id="eva"
                        value="{{ $boss->normal?->eva }}">
                </div>
                <div>
                    <label class="form-label altona-sans-12 mt-2" for="lck">LCK</label>
                    <input class="form-control" type="number" name="lck" id="lck"
                        value="{{ $boss->normal?->lck }}">
                </div>
                <div>
                    <label class="form-label altona-sans-12 mt-2" for="spd">SPD</label>
                    <input class="form-control" type="number" name="spd" id="spd"
                        value="{{ $boss->normal?->spd }}">
                </div>
            </div>

            <hr>

            @if ($bossType == 'arbiter')
                <h3>Hard</h3>

                <div class="columns-three">
                    <div>
                        <label class="form-label altona-sans-12 mt-2" for="level-hard">Boss Level</label>
                        <input class="form-control" type="number" name="level-hard" id="level-hard"
                            value="{{ $boss->hard?->level }}">
                    </div>
                    <div>
                        <label class="form-label altona-sans-12 mt-2" for="armor-hard">Boss Armor</label>
                        <select class="form-select" name="armor-hard" id="armor-hard">
                            <option value="Light" {{ $boss->hard?->armor == 'Light' ? 'selected' : '' }}>Light
                            </option>
                            <option value="Medium" {{ $boss->hard?->armor == 'Medium' ? 'selected' : '' }}>Medium
                            </option>
                            <option value="Heavy" {{ $boss->hard?->armor == 'Heavy' ? 'selected' : '' }}>Heavy
                            </option>
                        </select>
                    </div>
                    <div>
                        <label class="form-label altona-sans-12 mt-2" for="hull-hard">Boss Hull</label>
                        <select class="form-select" name="hull-hard" id="hull-hard">
                            @foreach ($hulls as $h)
                                <option value="{{ $h->id }}"
                                    {{ $boss->hard?->hull_id == $h->id ? 'selected' : '' }}>
                                    {{ $h->hull_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="form-label altona-sans-12 mt-2" for="hp-hard">HP</label>
                        <input class="form-control" type="number" name="hp-hard" id="hp-hard"
                            value="{{ $boss->hard?->hp }}">
                    </div>
                    <div>
                        <label class="form-label altona-sans-12 mt-2" for="fp-hard">FP</label>
                        <input class="form-control" type="number" name="fp-hard" id="fp-hard"
                            value="{{ $boss->hard?->fp }}">
                    </div>
                    <div>
                        <label class="form-label altona-sans-12 mt-2" for="trp-hard">TRP</label>
                        <input class="form-control" type="number" name="trp-hard" id="trp-hard"
                            value="{{ $boss->hard?->trp }}">
                    </div>
                    <div>
                        <label class="form-label altona-sans-12 mt-2" for="aa-hard">AA</label>
                        <input class="form-control" type="number" name="aa-hard" id="aa-hard"
                            value="{{ $boss->hard?->aa }}">
                    </div>
                    <div>
                        <label class="form-label altona-sans-12 mt-2" for="avi-hard">AVI</label>
                        <input class="form-control" type="number" name="avi-hard" id="avi-hard"
                            value="{{ $boss->hard?->avi }}">
                    </div>
                    <div>
                        <label class="form-label altona-sans-12 mt-2" for="acc-hard">ACC</label>
                        <input class="form-control" type="number" name="acc-hard" id="acc-hard"
                            value="{{ $boss->hard?->acc }}">
                    </div>
                    <div>
                        <label class="form-label altona-sans-12 mt-2" for="eva-hard">EVA</label>
                        <input class="form-control" type="number" name="eva-hard" id="eva-hard"
                            value="{{ $boss->hard?->eva }}">
                    </div>
                    <div>
                        <label class="form-label altona-sans-12 mt-2" for="lck-hard">LCK</label>
                        <input class="form-control" type="number" name="lck-hard" id="lck-hard"
                            value="{{ $boss->hard?->lck }}">
                    </div>
                    <div>
                        <label class="form-label altona-sans-12 mt-2" for="spd-hard">SPD</label>
                        <input class="form-control" type="number" name="spd-hard" id="spd-hard"
                            value="{{ $boss->hard?->spd }}">
                    </div>
                </div>
                <hr>
            @endif


            @if ($bossType == 'stronghold' || $bossType == 'abyssal' || $bossType == 'arbiter')
                <div>
                    <h2>Full</h2>
                    <h3>Normal</h3>
                    <div class="columns-three">
                        <div>
                            <label class="form-label altona-sans-12 mt-2" for="full-level">Boss Level</label>
                            <input class="form-control" type="number" name="full-level" id="full-level"
                                value="{{ $boss->fullNormal?->level }}">
                        </div>
                        <div>
                            <label class="form-label altona-sans-12 mt-2" for="full-armor">Boss Armor</label>
                            <select class="form-select" name="full-armor" id="full-armor">
                                <option value="Light" {{ $boss->fullNormal?->armor == 'Light' ? 'selected' : '' }}>
                                    Light</option>
                                <option value="Medium" {{ $boss->fullNormal?->armor == 'Medium' ? 'selected' : '' }}>
                                    Medium</option>
                                <option value="Heavy" {{ $boss->fullNormal?->armor == 'Heavy' ? 'selected' : '' }}>
                                    Heavy</option>
                            </select>
                        </div>
                        <div>
                            <label class="form-label altona-sans-12 mt-2" for="full-hull">Boss Hull</label>
                            <select class="form-select" name="full-hull" id="full-hull">
                                @foreach ($hulls as $h)
                                    <option value="{{ $h->id }}"
                                        {{ $boss->fullNormal?->hull_id == $h->id ? 'selected' : '' }}>
                                        {{ $h->hull_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="form-label altona-sans-12 mt-2" for="full-hp">HP</label>
                            <input class="form-control" type="number" name="full-hp" id="full-hp"
                                value="{{ $boss->fullNormal?->hp }}">
                        </div>
                        <div>
                            <label class="form-label altona-sans-12 mt-2" for="full-fp">FP</label>
                            <input class="form-control" type="number" name="full-fp" id="full-fp"
                                value="{{ $boss->fullNormal?->fp }}">
                        </div>
                        <div>
                            <label class="form-label altona-sans-12 mt-2" for="full-trp">TRP</label>
                            <input class="form-control" type="number" name="full-trp" id="full-trp"
                                value="{{ $boss->fullNormal?->trp }}">
                        </div>
                        <div>
                            <label class="form-label altona-sans-12 mt-2" for="full-aa">AA</label>
                            <input class="form-control" type="number" name="full-aa" id="full-aa"
                                value="{{ $boss->fullNormal?->aa }}">
                        </div>
                        <div>
                            <label class="form-label altona-sans-12 mt-2" for="full-avi">AVI</label>
                            <input class="form-control" type="number" name="full-avi" id="full-avi"
                                value="{{ $boss->fullNormal?->avi }}">
                        </div>
                        <div>
                            <label class="form-label altona-sans-12 mt-2" for="full-acc">ACC</label>
                            <input class="form-control" type="number" name="full-acc" id="full-acc"
                                value="{{ $boss->fullNormal?->acc }}">
                        </div>
                        <div>
                            <label class="form-label altona-sans-12 mt-2" for="full-eva">EVA</label>
                            <input class="form-control" type="number" name="full-eva" id="full-eva"
                                value="{{ $boss->fullNormal?->eva }}">
                        </div>
                        <div>
                            <label class="form-label altona-sans-12 mt-2" for="full-lck">LCK</label>
                            <input class="form-control" type="number" name="full-lck" id="full-lck"
                                value="{{ $boss->fullNormal?->lck }}">
                        </div>
                        <div>
                            <label class="form-label altona-sans-12 mt-2" for="full-spd">SPD</label>
                            <input class="form-control" type="number" name="full-spd" id="full-spd"
                                value="{{ $boss->fullNormal?->spd }}">
                        </div>
                    </div>

                    @if ($bossType == 'arbiter')
                        <h3>Hard</h3>
                        <div class="columns-three">
                            <div>
                                <label class="form-label altona-sans-12 mt-2" for="full-level-hard">Boss Level</label>
                                <input class="form-control" type="number" name="full-level-hard"
                                    id="full-level-hard" value="{{ $boss->fullHard?->level }}">
                            </div>
                            <div>
                                <label class="form-label altona-sans-12 mt-2" for="full-armor-hard">Boss Armor</label>
                                <select class="form-select" name="full-armor-hard" id="full-armor-hard">
                                    <option value="Light" {{ $boss->fullHard?->armor == 'Light' ? 'selected' : '' }}>
                                        Light</option>
                                    <option value="Medium"
                                        {{ $boss->fullHard?->armor == 'Medium' ? 'selected' : '' }}>Medium</option>
                                    <option value="Heavy" {{ $boss->fullHard?->armor == 'Heavy' ? 'selected' : '' }}>
                                        Heavy</option>
                                </select>
                            </div>
                            <div>
                                <label class="form-label altona-sans-12 mt-2" for="full-hull-hard">Boss Hull</label>
                                <select class="form-select" name="full-hull-hard" id="full-hull-hard">
                                    @foreach ($hulls as $h)
                                        <option value="{{ $h->id }}"
                                            {{ $boss->fullHard?->hull_id == $h->id ? 'selected' : '' }}>
                                            {{ $h->hull_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="form-label altona-sans-12 mt-2" for="full-hp-hard">HP</label>
                                <input class="form-control" type="number" name="full-hp-hard" id="full-hp-hard"
                                    value="{{ $boss->fullHard?->hp }}">
                            </div>
                            <div>
                                <label class="form-label altona-sans-12 mt-2" for="full-fp-hard">FP</label>
                                <input class="form-control" type="number" name="full-fp-hard" id="full-fp-hard"
                                    value="{{ $boss->fullHard?->fp }}">
                            </div>
                            <div>
                                <label class="form-label altona-sans-12 mt-2" for="full-trp-hard">TRP</label>
                                <input class="form-control" type="number" name="full-trp-hard" id="full-trp-hard"
                                    value="{{ $boss->fullHard?->trp }}">
                            </div>
                            <div>
                                <label class="form-label altona-sans-12 mt-2" for="full-aa-hard">AA</label>
                                <input class="form-control" type="number" name="full-aa-hard" id="full-aa-hard"
                                    value="{{ $boss->fullHard?->aa }}">
                            </div>
                            <div>
                                <label class="form-label altona-sans-12 mt-2" for="full-avi-hard">AVI</label>
                                <input class="form-control" type="number" name="full-avi-hard" id="full-avi-hard"
                                    value="{{ $boss->fullHard?->avi }}">
                            </div>
                            <div>
                                <label class="form-label altona-sans-12 mt-2" for="full-acc-hard">ACC</label>
                                <input class="form-control" type="number" name="full-acc-hard" id="full-acc-hard"
                                    value="{{ $boss->fullHard?->acc }}">
                            </div>
                            <div>
                                <label class="form-label altona-sans-12 mt-2" for="full-eva-hard">EVA</label>
                                <input class="form-control" type="number" name="full-eva-hard" id="full-eva-hard"
                                    value="{{ $boss->fullHard?->eva }}">
                            </div>
                            <div>
                                <label class="form-label altona-sans-12 mt-2" for="full-lck-hard">LCK</label>
                                <input class="form-control" type="number" name="full-lck-hard" id="full-lck-hard"
                                    value="{{ $boss->fullHard?->lck }}">
                            </div>
                            <div>
                                <label class="form-label altona-sans-12 mt-2" for="full-spd-hard">SPD</label>
                                <input class="form-control" type="number" name="full-spd-hard" id="full-spd-hard"
                                    value="{{ $boss->fullHard?->spd }}">
                            </div>
                        </div>

                </div>
            @endif
            <hr>
            @endif
            <div class="d-grid">
                <input type="submit" class="btn btn-success mx-auto my-3 btn-lg" value="Add Boss">
            </div>
            @csrf

        </form>
    </div>
</div>
